<?php
/**
 * Theme wrapper
 *
 * @link http://scribu.net/wordpress/theme-wrappers.html
 */

class Famelo_Layout {
  static $layoutName = 'Main';
  static $templatePath;
  static $layoutPath = 'templates/Layouts/';

  static function content() {
    include self::$templatePath;
  }

  static function apply($templatePath) {
    self::$templatePath = $templatePath;
    $templateName = basename($templatePath, '.php');
    $layoutSlug = strtolower(basename(self::getLayoutName($templatePath), '.php'));
    $layout = self::$layoutPath . self::getLayoutName($templatePath) . '.php';

    $templates = apply_filters('famelo_layout_' . $layoutSlug, array($layout));
    return locate_template($templates);
  }

  static function getLayoutName($templatePath) {
    if (file_exists($templatePath)) {
      $template = file_get_contents($templatePath);

      $configuration = array('Remove' => '');
      $headers = array_keys($configuration);
      foreach (get_file_data($templatePath, array('Layout')) as $layoutName) {
        if (strlen($layoutName) > 0) {
          return $layoutName;
        }
      }
    }

    return self::$layoutName;
  }
}
add_filter('template_include', array('Famelo_Layout', 'apply'), 99);
