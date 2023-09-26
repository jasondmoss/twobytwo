<?php

declare(strict_types=1);

namespace Drupal\twobytwo\Controllers;

use Drupal\Core\Controller\ControllerBase;
use Drupal\twobytwo\Services\StringFormatterService;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * A controller that utilizes the string formatter service container, presenting
 * the result to a defined template.
 */
class TwoByTwoController
    extends ControllerBase
    implements TwoByTwoControllerInterface
{

    /**
     * @var \Drupal\twobytwo\Services\StringFormatterService
     */
    private StringFormatterService $stringFormatterService;


    /**
     * @param \Drupal\twobytwo\Services\StringFormatterService $stringFormatterService
     */
    public function __construct(StringFormatterService $stringFormatterService)
    {
        $this->stringFormatterService = $stringFormatterService;
    }


    /**
     * Instantiates a new instance of this class.
     *
     * @param \Drupal\Component\DependencyInjection\ContainerInterface $container
     *
     * @return static
     */
    public static function create(ContainerInterface $container): static
    {
        return new static($container->get('twobytwo.string_formatter'));
    }


    /**
     * @return array
     */
    public function view(): array
    {
        $presenterString = $this
            ->stringFormatterService
            ->formatAdderInputResults();

        return [
            '#theme' => 'twobytwo_presenter',
            '#presenter_string' => $presenterString
        ];
    }

}
