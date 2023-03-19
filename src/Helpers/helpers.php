<?php

use FelipeMenezesDM\LaravelCommons\Utils\GeneralUtils;
use FelipeMenezesDM\LaravelCommons\Utils\StringUtils;

if(!function_exists('hideEmail')) {
    function hideEmail($email) : string
    {
        return StringUtils::hideEmail($email);
    }
}

if(!function_exists('excerpt')) {
    function excerpt(string|null $text, int $length = 80) : string
    {
        return StringUtils::excerpt($text, $length);
    }
}

if(!function_exists('addQueryArg')) {
    function addQueryArg(string $query, $arg, string $url = null) : string
    {
        return GeneralUtils::addQueryArg($query, $arg, $url);
    }
}

if(!function_exists('addQueryArgs')) {
    function addQueryArgs(array $args, string $url = null) : string
    {
        return GeneralUtils::addQueryArgs($args, $url);
    }
}

if(!function_exists('removeQueryArgs')) {
    function removeQueryArgs(array $args, string $url = null) : string
    {
        return GeneralUtils::removeQueryArgs($args, $url);
    }
}

if(!function_exists('removeArrayItems')) {
    function removeArrayItems($remove, &$list) : void
    {
        GeneralUtils::removeArrayItems($remove, $list);
    }
}
