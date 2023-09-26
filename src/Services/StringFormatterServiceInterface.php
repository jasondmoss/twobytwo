<?php

declare(strict_types=1);

namespace Drupal\twobytwo\Services;

use Drupal\Core\StringTranslation\TranslatableMarkup;

interface StringFormatterServiceInterface
{
    public function formatAdderInputResults(): TranslatableMarkup|string;
}
