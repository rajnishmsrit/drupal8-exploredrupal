<?php

namespace Drupal\explore_drupal\Controller;

use Drupal\Core\Controller\ControllerBase;

class ExploreController extends ControllerBase {

  /**
   * Display the markup.
   *
   * @return array
   */
  public function content() {
    return array(
      '#type' => 'markup',
      '#markup' => $this->t('Hello, World!'),
    );
  }

}
