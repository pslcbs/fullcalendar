<?php

/**
 * @file
 * Contains \Drupal\fullcalendar\Plugin\FullcalendarInterface.
 */

namespace Drupal\fullcalendar\Plugin;

use Drupal\views\Plugin\views\style\StylePluginBase;

/**
 * @todo.
 */
interface FullcalendarInterface {

  public function setStyle(StylePluginBase $style);

  public function defineOptions();

  public function buildOptionsForm(&$form, &$form_state);

  public function submitOptionsForm(&$form, &$form_state);

  public function process(&$settings);

  public function preView(&$settings);

}
