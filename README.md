[![Build Status](https://app.travis-ci.com/alexanderkulnyow/dds-start-template.svg?branch=master)](https://app.travis-ci.com/alexanderkulnyow/dds-start-template)
DDS Start Template
===
Hi, this is started Wordpress Theme based on [underscores.me](https://underscores.me/) template with several addition

* A modern workflow with a pre-made command-line interface to turn your project into a more pleasant experience.
* A just right amount of lean, well-commented, modern, HTML5 templates.
* A custom header implementation in `inc/custom-header.php`. Just add the code snippet found in the comments of `inc/custom-header.php` to your `header.php` template.
* Custom template tags in `inc/template-tags.php` that keep your templates clean and neat and prevent code duplication.
* Some small tweaks in `inc/template-functions.php` that can improve your theming experience.
* A script at `js/navigation.js` that makes your menu a toggled dropdown on small screens (like your phone), ready for CSS artistry. It's enqueued in `functions.php`.
* 2 sample layouts in `sass/layout/` made using CSS Grid for a sidebar on either side of your content. Just uncomment the layout of your choice in `sass/site/_site.scss`.
Note: `.no-sidebar` styles are automatically loaded.
* Smartly organized starter CSS in `style.css` that will help you to quickly get your design off the ground.
* Full support for `WooCommerce plugin` integration with hooks in `inc/woocommerce.php`, styling override woocommerce.css with product gallery features (zoom, swipe, lightbox) enabled.
* Licensed under GPLv2 or later. :) Use it to make something cool.

### DDS addition (placed in /libs)
* [Slick slider 1.8.0](https://github.com/kenwheeler/slick)
* [Bootstrap v5.0.0-beta1](https://getbootstrap.com/docs/5.0/getting-started/introduction/)
* sass 7 in 1 with BEM


Installation
---------------

### Requirements

`DDS Start Template` requires the following dependencies:

- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)

### Quick Start

Clone or download this repository, change its name to something else (like, say, `megatherium-is-awesome`), and then you'll need to do a six-step find and replace on the name in all the templates.

1. Search for `'dds-start-template'` (inside single quotations) to capture the text domain and replace with: `'megatherium-is-awesome'`.
2. Search for `dds_start_template_` to capture all the functions names and replace with: `megatherium_is_awesome_`.
3. Search for `Text Domain: dds-start-template` in `style.css` and replace with: `Text Domain: megatherium-is-awesome`.
4. Search for <code>&nbsp;dds-start-template</code> (with a space before it) to capture DocBlocks and replace with: <code>&nbsp;Megatherium_is_Awesome</code>.
5. Search for `dds-start-template-` to capture prefixed handles and replace with: `megatherium-is-awesome-`.
6. Search for `DDS_START_TEMPLATE_` (in uppercase) to capture constants and replace with: `MEGATHERIUM_IS_AWESOME_`.

Then, update the stylesheet header in `style.css`, the links in `footer.php` with your own information and rename `_s.pot` from `languages` folder to use the theme's slug. Next, update or delete this readme.

### Setup


```sh
$ composer install
$ npm install
```

### Available CLI commands

`dds-start-template` comes packed with CLI commands tailored for WordPress theme development :

- `composer lint:wpcs` : checks all PHP files against [PHP Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/).
- `Composer lint:php` : checks all PHP files for syntax errors.
- `Composer make-pot` : generates a .pot file in the `language/` directory.
- `npm run compile:css` : compiles SASS files to css.
- `npm run compile:rtl` : generates an RTL stylesheet.
- `npm run lint:scss` : checks all SASS files against [CSS Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/css/).
- `npm run lint:js` : checks all JavaScript files against [JavaScript Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/javascript/).
- `npm run bundle` : generates a .zip archive for distribution, excluding development and system files.

Now you're ready to go! The next step is easy to say, but harder to do: make an awesome WordPress theme. :)

Good luck!
