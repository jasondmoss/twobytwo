<?php

declare(strict_types=1);

namespace Drupal\twobytwo\Services;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * String Formatter
 * Provides a pluggable service container to format a string.
 */
class StringFormatterService implements StringFormatterServiceInterface
{

    use StringTranslationTrait;

    /**
     * @var \Drupal\Core\Config\ConfigFactoryInterface
     */
    protected ConfigFactoryInterface $config;

    /**
     * @var \Drupal\twobytwo\Services\AdderService
     */
    protected AdderService $adderService;


    /**
     * @param \Drupal\Core\Config\ConfigFactoryInterface $config
     * @param \Drupal\twobytwo\Services\AdderService $adderService
     */
    public function __construct(
        ConfigFactoryInterface $config,
        AdderService $adderService
    ) {
        $this->config = $config;
        $this->adderService = $adderService;
    }


    /**
     * @return \Drupal\Core\StringTranslation\TranslatableMarkup|string
     */
    public function formatAdderInputResults(): TranslatableMarkup|string
    {
        $input1 = (int) $this->config->get('twobytwo.settings')
            ->get('input_value_1');

        $input2 = (int) $this->config->get('twobytwo.settings')
            ->get('input_value_2');

        $total_value = $this->adderService->addFormInputs($input1, $input2);

        if ($total_value <= 0) {
            return '';
        }

        $stringValue = "The product of <strong>@input1</strong> and "
            . "<strong>@input2</strong> is <strong>@total</strong>.";

        return $this->t($stringValue, [
            '@input1' => $input1,
            '@input2' => $input2,
            '@total' => number_format($total_value)
        ]);
    }

}
