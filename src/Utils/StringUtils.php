<?php

namespace FelipeMenezesDM\LaravelCommons\Utils;

class StringUtils
{
    /**
     * Hide email address
     *
     * @param string $email
     * @return string
     */
    public static function hideEmail(string $email) : string
    {
        $em = explode("@", $email);
        $name = implode('@', array_slice($em, 0, count($em)-1));
        $len = floor(strlen($name)/3);

        return substr($name,0, $len) . str_repeat('*', strlen($name) - $len) . "@" . end($em);
    }

    /**
     * Parse long text to excerpt
     *
     * @param string|null $text
     * @param int $length
     * @return string
     */
    public static function excerpt(string|null $text, int $length = 80) : string
    {
        if(is_null($text)) {
            return '';
        }

        return trim(mb_substr($text, 0, $length), ' ') . (mb_strlen(trim($text, ' ')) > $length ? '...' : '');
    }
}
