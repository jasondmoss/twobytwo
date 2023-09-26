<?php

declare(strict_types=1);

namespace Drupal\twobytwo\Services;

/**
 * Adder
 * Provides a pluggable service container to add two numbers together.
 */
class AdderService implements AdderServiceInterface
{

    /**
     * @param int $input_number_1
     * @param int $input_number_2
     *
     * @return int
     */
    public function addFormInputs(int $input_number_1, int $input_number_2): int
    {
        return $input_number_1 + $input_number_2;
    }

}
