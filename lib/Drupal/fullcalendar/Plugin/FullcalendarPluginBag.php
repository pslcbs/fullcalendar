<?php

/**
 * @file
 * Contains \Drupal\fullcalendar\Plugin\FullcalendarPluginBag.
 */

namespace Drupal\fullcalendar\Plugin;

use Drupal\Component\Plugin\PluginBag;
use Drupal\Component\Plugin\PluginManagerInterface;
use Drupal\views\Plugin\views\style\StylePluginBase;

/**
 * @todo.
 */
class FullcalendarPluginBag extends PluginBag {

  /**
   * The manager used to instantiate the plugins.
   *
   * @var \Drupal\Component\Plugin\PluginManagerInterface
   */
  protected $manager;

  /**
   * @todo.
   *
   * @var \Drupal\views\Plugin\views\style\StylePluginBase
   */
  protected $style;

  /**
   * Constructs a FullcalendarPluginBag object.
   *
   * @param \Drupal\views\ViewExecutable
   *   The view which has this displays attached.
   * @param \Drupal\Component\Plugin\PluginManagerInterface $manager
   *   The manager to be used for instantiating plugins.
   */
  public function __construct(PluginManagerInterface $manager, StylePluginBase $style) {
    $this->manager = $manager;
    $this->style = $style;

    // Store all display IDs to access them easy and fast.
    $definitions = $this->manager->getDefinitions();
    $this->instanceIDs = drupal_map_assoc(array_keys($definitions));
  }

  /**
   * Overrides \Drupal\Component\Plugin\PluginBag::initializePlugin().
   */
  protected function initializePlugin($plugin_id) {
    if (isset($this->pluginInstances[$plugin_id])) {
      return;
    }

    $this->pluginInstances[$plugin_id] = $this->manager->createInstance($plugin_id, array(), $this->style);
  }


}