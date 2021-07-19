[![Latest Stable Version](https://img.shields.io/github/v/release/proxeuse/fortify-tabler?style=flat-square)](https://packagist.org/packages/proxeuse/fortify-tabler) [![Total Downloads](https://img.shields.io/packagist/dt/proxeuse/fortify-tabler?style=flat-square)](https://packagist.org/packages/proxeuse/fortify-tabler) [![PHP Version Support](https://img.shields.io/packagist/php-v/proxeuse/fortify-tabler?style=flat-square)](https://packagist.org/packages/proxeuse/fortify-tabler)
[![License](https://img.shields.io/github/license/Proxeuse/fortify-tabler?style=flat-square)](https://github.com/Proxeuse/fortify-tabler/blob/master/LICENSE.md)

<p align="center">
<img width="400" src="https://github.com/akukoder/fortify-soft-ui/raw/master/fortify-soft-ui.png">
</p>


# Introduction

**FortifySoftUi** is a Laravel Fortify UI preset, built with [Soft UI Dashboard](https://www.creative-tim.com/product/soft-ui-dashboard) by [Creative Time](https://www.creative-tim.com).

- [Requirements](#requirements)
- [Installation](#installation)

<a name="installation"></a>
## Installation

To get started, you'll need to install **FortifySoftUi** using composer.

```bash
composer require akukoder/fortify-soft-ui
```

Next, you'll need to run the install command:

```bash
php artisan fortify:softui
```

This command will publish **FortifySoftUi's** views and resources to your project.

- All `auth` views
- a `webpack.mix.js` file, tuned for UIkit
- a `package.json` file, for required NPM modules
- a slightly opinionated `.editorconfig` file
- a `.gitignore` file
- a new route for `user/profile`

<p align="center"><img  src="https://github.com/zacksmash/fortify-uikit/raw/master/fortify-uikit-screenshot.png"></p>

## License

**FortifyUIkit** is open-sourced software licensed under the [MIT license](LICENSE.md).
