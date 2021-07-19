<?php

namespace Akukoder\FortifySoftUi\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class FortifySoftUiCommand extends Command
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

        $this->comment('FortifySoftUi installation completed!');

        $this->info('Remember to run npm i && npm run dev!');
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
}
