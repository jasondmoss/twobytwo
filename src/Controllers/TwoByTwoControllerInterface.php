<?php

declare(strict_types=1);

namespace Drupal\twobytwo\Controllers;

use Drupal\Component\DependencyInjection\ContainerInterface;

interface TwoByTwoControllerInterface
{
    public static function create(ContainerInterface $container): static;

    public function view(): array;
}
