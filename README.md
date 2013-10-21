# Famelo Base Theme

### Structure

```
Assets                        // Contains all css, js, images, fonts, etc
  - Media/*
  - Components/*
  - Styles/Main.less
  - Scripts/Main.js

Library                       // Contains all PHP code to modify WP behavior
  - Assets.php                // Include Main.less and Main.js from Assets
  - Config.php                // Setup Menus, Imagesizes, etc
  - Layout.php                // Wraps the templates in a neat Layout
  - Navigation.php            // everything related to Navigation
  - Shortcodes.php            // Custom Shortcodes
  - Title.php                 // Handling of the page title

Templates
  - Content/content-*.php     // Contains all content-* templates
  - ContentLayouts/*.php      // Contains layouts for flexible ACF fields
  - Layouts/*.php             // Contains layouts that are used to wrap templates
  - Partials/Header.php       // The header that is used in the layouts
  - Partials/Footer.php       // The footer that is used in the layouts

404.php                       // Custom 404-error page
functions.php                 // includes the Library files
index.php                     // template for the index
page.php                      // default page template
style.css                     // Theme name, description, etc. (No Styles!)
```

### Layouts

Every main template ist wrapped by the Famelo_Layout class. This means that by
default you don't need to worry about putting anything at the top and bottom
of your template to get a proper site. By default the content of the main
template will be embedded into the Layout "Templates/Layouts/Main.php"

But you can easily use a different layout be specifiying the this at the top
of your main template:

```
<?php
/*
Layout: MyLayout
*/
?>
```

Make sure you have this in there to put in the content from your template:

```
<?php Famelo_Layout::content(); ?>
```
