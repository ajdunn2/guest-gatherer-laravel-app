<?php

# Example for PHP Pest
if (!function_exists('sum')) {
    function sum(...$numbers) {
        return array_sum($numbers);
    }
}
