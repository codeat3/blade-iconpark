<p align="center">
    <img src="./socialcard-blade-iconpark.png" width="1280" title="Social Card Blade Icon Park">
</p>

# Blade Icon Park

<a href="https://github.com/codeat3/blade-iconpark/actions?query=workflow%3ATests">
    <img src="https://github.com/codeat3/blade-iconpark/workflows/Tests/badge.svg" alt="Tests">
</a>
<a href="https://packagist.org/packages/codeat3/blade-iconpark">
    <img src="https://img.shields.io/packagist/v/codeat3/blade-iconpark" alt="Latest Stable Version">
</a>
<a href="https://packagist.org/packages/codeat3/blade-iconpark">
    <img src="https://img.shields.io/packagist/dt/codeat3/blade-iconpark" alt="Total Downloads">
</a>

A package to easily make use of [Icon Park](https://github.com/bytedance/IconPark) in your Laravel Blade views.

For a full list of available icons see [the SVG directory](resources/svg).

## Requirements

- PHP 7.4 or higher
- Laravel 8.0 or higher

## Installation

```bash
composer require codeat3/blade-iconpark
```

## Updating

Please refer to [`the upgrade guide`](UPGRADE.md) when updating the library.

## Blade Icons

Blade Icon Park uses Blade Icons under the hood. Please refer to [the Blade Icons readme](https://github.com/blade-ui-kit/blade-icons) for additional functionality. We also recommend to [enable icon caching](https://github.com/blade-ui-kit/blade-icons#caching) with this library.

## Configuration

Blade Icon Park also offers the ability to use features from Blade Icons like default classes, default attributes, etc. If you'd like to configure these, publish the `blade-iconpark.php` config file:

```bash
php artisan vendor:publish --tag=blade-iconpark-config
```

## Usage

Icons can be used as self-closing Blade components which will be compiled to SVG icons:

```blade
<x-iconpark-acane/>
```

You can also pass classes to your icon components:

```blade
<x-iconpark-acane class="w-6 h-6 text-gray-500"/>
```

And even use inline styles:

```blade
<x-iconpark-acane style="color: #555"/>
```

To use outline version append `-o`
```blade
<x-iconpark-acane-o/>
```

### Raw SVG Icons

If you want to use the raw SVG icons as assets, you can publish them using:

```bash
php artisan vendor:publish --tag=blade-iconpark --force
```

Then use them in your views like:

```blade
<img src="{{ asset('vendor/blade-iconpark/acane.svg') }}" width="10" height="10"/>
```

## Changelog

Check out the [CHANGELOG](CHANGELOG.md) in this repository for all the recent changes.

## Maintainers

Blade Icon Park is developed and maintained by [Swapnil Sarwe](https://swapnilsarwe.com).

## License

Blade Icon Park is open-sourced software licensed under [the MIT license](LICENSE.md).
