<?php

/**
 * Normalize a numeric string, handling null values and default values.
 * Doesn't support scientific notation.
 *
 * @param string|null $nbr  The numeric string to normalize.
 * @param string|null $default  The default value to use if $nbr is falsy. Default is '0'.
 *
 * @return string  The normalized numeric string.
 */
function normalizeNumber(?string $nbr, string $default = '0'): string {
    $nbr = $nbr ?: $default;
    $nbr = str_replace(',', '.', $nbr);
    if ($nbr[0] === '.') {
        $nbr = '0'.$nbr;
    }
    if (str_contains($nbr, '.')) {
        $nbr = rtrim(rtrim($nbr, '0'), '.');
    }
    return $nbr;
}
