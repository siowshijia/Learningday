# Web Imp Wordpress Theme

Boilerplate Theme for Wordpress themes made by Web Imp.

## 1. Theme Packages

These packages come out of the box with this template. If you need to add more packages, refer to Section 4.2.

- [Bootstrap 4](https://getbootstrap.com/)
- [Brand Colors](https://brand-colors.com/)
- [Font Awesome](https://fontawesome.com/)
- [Masonry](https://masonry.desandro.com/)
- [Swipebox](http://brutaldesign.github.io/swipebox/)
- [Swiper](https://swiperjs.com/)

## 2. Toolchain Packages

These packages are used as part of the toolchain to manage our assets for the theme.

- [Grunt](https://gruntjs.com/) + Many Grunt Plugins
- [Node Sass](https://www.npmjs.com/package/node-sass)
- [Eslint](https://eslint.org/)
- [Composer](https://getcomposer.org/)

## 3. Environment Requirements

Read more about the core requirements of running [Wordpress](https://wordpress.org/about/requirements/).

## 4. Theme Dependencies

### 4.1. Production

Assets are compiled and kept separate from dependencies so that the theme is self-contained and the production files are compact. Refer to `gruntfile.js` for compilation details.

### 4.2. Development

Packages are managed using Node Package Manager ([NPM](https://www.npmjs.com/get-npm/)). Current packages are defined in `package.json`. Additional packages can be found on [NPMJS](https://www.npmjs.com/). Add them to the project as development dependencies (`npm i -D <vendor/package>`) and configure it into the project via the `gruntfile.js` to compile properly as assets.

Compiled assets are then added to the theme via `includes/core.php:theme_scripts()`.

Asset updates are managed as easily as running `npm update`, followed by `npm run build`.

## 5. Recommended Plugins

### 5.1. WooCommerce

URL: https://woocommerce.com/

Compatibility with this plugin is available but optional. Feel free to remove the `woocommerce` folder and its related tasks defined in `gruntfile.js` if WooCommerce is not needed.

### 5.2. Advanced Custom Fields (ACF)

URL: https://www.advancedcustomfields.com/

The existance of the `acf-json` folder is to force ACF field settings to sync with the theme changes. [Read More about Syncing Changes](https://www.advancedcustomfields.com/resources/local-json/#syncing-changes)

## 6. Pre-configured Toolchain

### 6.1. NPM

Commands configured on NPM's `run` command:

- `build`: execute Grunt tasks to compile assets
- `watch`: monitor changes to folders and recompile when changes are detected
- `clean`: remove all compiled assets

### 6.2. Composer

Commands configured on Composer's `run` command:

- `tests`: run PHP checks on the theme files
