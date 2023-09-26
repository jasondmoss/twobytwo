<?php

declare(strict_types=1);

namespace Drupal\twobytwo\Forms;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines a form that configures 'Two By Two' settings.
 */
class SettingsForm extends ConfigFormBase
{

    /**
     * Gets the configuration names that will be editable.
     *
     * @return array
     *   An array of configuration object names that are editable if called in
     *   conjunction with the trait's config() method.
     */
    public function getEditableConfigNames(): array
    {
        return [ 'twobytwo.settings' ];
    }


    /**
     * Returns a unique string identifying the form.
     *
     * The returned ID should be a unique string that can be a valid PHP function
     * name, since it's used in hook implementation names such as
     * hook_form_FORM_ID_alter().
     *
     * @return string
     *   The unique string identifying the form.
     */
    public function getFormId(): string
    {
        return 'twobytwo_settings';
    }


    /**
     * Builds and processes a form for a given form ID.
     *
     * @param array $form
     * @param \Drupal\Core\Form\FormStateInterface $form_state
     *
     * @return array
     */
    public function buildForm(array $form, FormStateInterface $form_state): array
    {
        parent::buildform($form, $form_state);

        $config = $this->config('twobytwo.settings');

        // Add a number input.
        $form['input_value_1'] = [
            '#type' => 'number',
            '#title' => $this->t('Value 1'),
            '#default_value' => $config->get('input_value_1'),
            '#description' => t('Enter a valid positive integer.')
        ];

        // Add a number input.
        $form['input_value_2'] = [
            '#type' => 'number',
            '#title' => $this->t('Value 2'),
            '#default_value' => $config->get('input_value_2'),
            '#description' => t('Enter a valid positive integer.')
        ];

        // Add a submit button.
        $form['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Submit Values')
        ];

        return $form;
    }


    /**
     * Retrieves, populates, and processes a form.
     *
     * @param array $form
     * @param \Drupal\Core\Form\FormStateInterface $form_state
     *
     * @return void
     */
    public function submitForm(array &$form, FormStateInterface $form_state): void
    {
        parent::submitform($form, $form_state);

        $this->config('twobytwo.settings')
            ->set('input_value_1', $form_state->getValue('input_value_1'))
            ->set('input_value_2', $form_state->getValue('input_value_2'))
            ->save();
    }

}


