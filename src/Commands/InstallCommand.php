<?php

namespace Akukoder\FortifySoftUi\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class InstallCommand extends Command
{
    public $signature = 'fortify:softui';

    public $description = 'Install FortifySoftUi preset, with views and resources.';

    public function handle()
    {
        $this->callSilent('fortify:ui', ['--skip-provider' => true]);

        $this->info('FortifyUI has been installed. Proceeding to install FortifySoftUi.');

        $this->publishAssets();
        $this->updateProvider();
        $this->updateConfig();
        $this->updateRoutes();
        $this->addControllers();
        $this->addActions();
        $this->updateUserModel();
        $this->updateSessionDriver();

        $this->callSilent('migrate');
        $this->callSilent('optimize:clear');

        $this->line('');
        $this->comment('FortifySoftUi installation completed!');
    }

    protected function addControllers()
    {
        File::copy(__DIR__.'/../../stubs/app/Http/Controllers/ProfileController.stub', app_path('Http/Controllers/ProfileController.php'));
        File::copy(__DIR__.'/../../stubs/app/Http/Controllers/UsersController.stub', app_path('Http/Controllers/UsersController.php'));
    }

    protected function addActions()
    {
        File::copy(__DIR__.'/../../stubs/app/Actions/Fortify/ChangeUserPassword.stub', app_path('Actions/Fortify/ChangeUserPassword.php'));
    }

    protected function publishAssets()
    {
        $this->callSilent('vendor:publish', ['--tag' => 'fortify-soft-ui-resources', '--force' => true]);
        $this->callSilent('vendor:publish', ['--tag' => 'fortify-soft-ui-public', '--force' => true]);

        File::deleteDirectory(resource_path('css'));
    }

    protected function updateProvider()
    {
        File::delete(app_path('Providers/FortifyServiceProvider.php'));
        File::copy(__DIR__.'/../../stubs/provider/FortifyServiceProvider.stub', app_path('Providers/FortifyServiceProvider.php'));

        File::delete(app_path('Providers/AppServiceProvider.php'));
        File::copy(__DIR__.'/../../stubs/provider/AppServiceProvider.stub', app_path('Providers/AppServiceProvider.php'));
    }

    protected function updateConfig()
    {
        File::delete(config_path('fortify.php'));
        File::copy(__DIR__.'/../../stubs/config/fortify.stub', config_path('fortify.php'));
    }

    protected function updateRoutes()
    {
        File::delete(base_path('routes/web.php'));
        File::copy(__DIR__.'/../../stubs/routes/web.stub', base_path('routes/web.php'));
    }

    protected function updateSessionDriver()
    {
        // request information on session driver
        if (! Schema::hasTable('sessions')){
            $this->callSilent('session:table');

            $this->replaceInFile(
                "SESSION_DRIVER=file".PHP_EOL,
                "SESSION_DRIVER=database".PHP_EOL,
                base_path('.env')
            );
        }
    }

    protected function updateUserModel()
    {
        $this->replaceInFile(
            "class User extends Authenticatable".PHP_EOL,
            "class User extends Authenticatable implements MustVerifyEmail".PHP_EOL,
            app_path('Models/User.php')
        );

        $this->replaceInFile(
            "use HasFactory, Notifiable;".PHP_EOL,
            "use HasFactory, Notifiable, TwoFactorAuthenticatable;".PHP_EOL,
            app_path('Models/User.php')
        );

        $content = file_get_contents(app_path('Models/User.php'));

        if (strpos($content, 'Laravel\Fortify\TwoFactorAuthenticatable') === false) {
            $this->replaceInFile(
                "use Illuminate\Notifications\Notifiable;".PHP_EOL,
                "use Illuminate\Notifications\Notifiable;\nuse Laravel\Fortify\TwoFactorAuthenticatable;".PHP_EOL,
                app_path('Models/User.php')
            );
        }

        // TODO:
        //  - check if already added

    }

    /**
     * Replace a given string within a given file.
     *
     * @param  string  $search
     * @param  string  $replace
     * @param  string  $path
     * @return void
     */
    protected function replaceInFile($search, $replace, $path)
    {
        file_put_contents($path, str_replace($search, $replace, file_get_contents($path)));
    }
}
