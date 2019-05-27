<?php
declare(strict_types=1);
\error_reporting(-1);

function array_merge_recursive_adv(array ...$arrays): array
{
    $master = [];

    foreach ($arrays as $array) {
        foreach ($array as $key => $values) {

            if (!isset($master[$key])) {
                // If it doesn't already exist, add it and keep the incoming contents
                $master[$key] = $values;
            } else {
                // If it DOES exist...
                if (is_scalar($values)) {
                    // Replace the contents
                    $master[$key] = $values;
                } elseif (is_array($values)) {
                    $master[$key] = array_merge_recursive_adv($master[$key], $values);
                }
            }
        }
    }

    return $master;
}

/**
 * Perform a case-insensitive, natural key sort on the associative array.
 *
 * @param array &$array The array to sort. Updates the array in-place.
 */
function natkeysort(&$array): void
{
    uksort($array, function($a, $b): int {
        return strcasecmp($a, $b);
    });
}

/**
 * Perform a custom sort, intended for the "requires" (or "requires-dev") key.
 *
 * @param array &$array The array to sort. Updates the array in-place.
 */
function composersort(&$array): void
{
    // Groups
    $master = [];
    $php    = null;
    $ext    = [];
    $lib    = [];
    $pack   = [];

    // Sift the entries
    foreach ($array as $key => $value) {
        if ('php' === $key) {
            $php = $value;
            unset($array[$key]);
        } elseif ('ext-' === substr($key, 0, 4)) {
            $ext[$key] = $value;
            unset($array[$key]);
        } elseif ('lib-' === substr($key, 0, 4)) {
            $lib[$key] = $value;
            unset($array[$key]);
        }
    }

    // Sort the entries
    natkeysort($ext);
    natkeysort($lib);
    natkeysort($array);

    // Re-merge the entries
    $master['php'] = $php;

    foreach ($ext as $key => $value) {
        $master[$key] = $value;
    }

    foreach ($lib as $key => $value) {
        $master[$key] = $value;
    }

    foreach ($array as $key => $value) {
        $master[$key] = $value;
    }

    // Replace the old array with the new one
    $array = $master;
}

/**
 * Strips the `.tmpl` from the template filename.
 *
 * @param string $s The template filename.
 */
function strip_tmpl($s): string
{
    return str_replace('.tmpl', '', $s);
}

/**
 * Gets the template ID for the filename.
 *
 * @param string $s The template filename.
 */
function get_tmpl($s): string
{
    $a = explode('.', $s);

    return array_shift($a);
}
