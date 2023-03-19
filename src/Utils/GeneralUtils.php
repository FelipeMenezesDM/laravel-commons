<?php

namespace App\Utils;

class GeneralUtils
{
    /**
     * Add query argument to url string
     *
     * @param string $query
     * @param $arg
     * @param string|null $url
     * @return string
     */
    public static function addQueryArg(string $query, $arg, string $url = null) : string
    {
        $url = parse_url(is_null($url) ? url()->full() : $url);
        $queries = [];

        if(isset($url['query'])) {
            parse_str($url['query'], $queries);
        }

        $queries = array_replace_recursive($queries, [$query => $arg]);
        $url['scheme'] = $url['scheme'] . '://';
        $url['query'] = '?' . http_build_query($queries);

        return implode('', $url);
    }

    /**
     * Add many query args to URL string
     *
     * @param array $args
     * @param string|null $url
     * @return string
     */
    public static function addQueryArgs(array $args, string $url = null) : string
    {
        foreach( $args as $query => $arg ) {
            $url = self::addQueryArg($query, $arg, $url);
        }

        return $url;
    }

    /**
     * Remove query args from url string
     *
     * @param array $args
     * @param string|null $url
     * @return string
     */
    public static function removeQueryArgs(array $args, string $url = null) : string
    {
        $url = parse_url(is_null($url) ? url()->full() : $url);
        $queries = [];

        if(isset($url['query'])) {
            parse_str($url['query'], $queries);
            self::removeArrayItems($args, $queries);
        }

        $url['scheme'] = $url['scheme'] . '://';
        $url['query'] = (!empty($queries) ? '?' . http_build_query($queries) : '');

        return implode('', $url);
    }

    /**
     * Remove args from array
     *
     * @param $remove
     * @param $list
     * @return void
     */
    public static function removeArrayItems($remove, &$list) : void
    {
        foreach((array) $remove as $key => $value) {
            if(!is_array($value)) {
                $search = array_search($value, array_keys($list));

                if ($search !== false) {
                    array_splice($list, $search, 1);
                }
            }else{
                self::removeArrayItems($value, $list[$key]);
            }
        }
    }
}
