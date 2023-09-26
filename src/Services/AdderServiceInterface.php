<?php

declare(strict_types=1);

namespace Drupal\twobytwo\Services;

interface AdderServiceInterface
{
    public function addFormInputs(int $input_number_1, int $input_number_2): int;
}
