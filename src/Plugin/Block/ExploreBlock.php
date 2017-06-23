<?php

namespace Drupal\explore_drupal\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "explore_block",
 *   admin_label = @Translation("explore block"),
 *   category = @Translation("Hello World"),
 * )
 */
//class ExploreBlock extends BlockBase {
//
class ExploreBlock extends BlockBase implements BlockPluginInterface {

  /**
   * {@inheritdoc}
   */
  /*
  public function build() {
    return array(
      '#markup' => $this->t('explore, World!'),
    );
  }
  */

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = $this->getConfiguration();

    if (!empty($config['explore_block_name'])) {
      $name = $config['explore_block_name'];
    }
    else {
      $name = $this->t('to no one');
    }
    return array(
      '#markup' => $this->t('Hello @name!', array (
          '@name' => $name,
        )
      ),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);

    $config = $this->getConfiguration();

    $form['explore_block_name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Who'),
      '#description' => $this->t('Who do you want to say explore to?'),
      '#default_value' => isset($config['explore_block_name']) ? $config['explore_block_name'] : '',
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  /*
  public function blockSubmit($form, FormStateInterface $form_state) {
    parent::blockSubmit($form, $form_state);
    $values = $form_state->getValues();
    $this->configuration['explore_block_name'] = $values['explore_block_name'];
  }
  */

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['explore_block_name'] = $form_state->getValue('explore_block_name');
  }

  /**
   * Verifying autoload of config from file /config/install/explore_drupal.setting.yml
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    $default_config = \Drupal::config('explore_drupal.settings');
    return array(
      'name' => $default_config->get('explore.name'),
    );
  }
}
