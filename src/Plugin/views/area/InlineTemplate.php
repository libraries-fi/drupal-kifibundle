<?php

namespace Drupal\kifibundle\Plugin\views\area;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\area\AreaPluginBase;

/**
 * Render an inline template.
 *
 * @ViewsArea("kifibundle_twig_inline")
 */
class InlineTemplate extends AreaPluginBase {
  public function render($empty = FALSE) {
    return [
      '#type' => 'inline_template',
      '#template' => $this->options['content'],
    ];
  }

  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);

    // throw new \Exception('YOU LOADED ME!!!');

    $form['content'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Content'),
      '#required' => TRUE,
      '#default_value' => $this->options['content'],
    ];
  }

  protected function defineOptions() {
    $options = parent::defineOptions();
    $options['content'] = ['default' => ''];
    return $options;
  }
}
