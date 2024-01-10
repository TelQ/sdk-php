<?php

namespace TelQ\Sdk\Http;

class Url
{
    /**
     * @param string $url
     * @param array $queryParams
     * @return string
     */
    public static function create($url, $queryParams = [])
    {
        $queryStrings = [];
        foreach ($queryParams as $param => $value) {
            $queryStrings[] = $param . '=' . urlencode($value);
        }
        if ($queryStrings) {
            $url .= '?' . implode('&', $queryStrings);
        }
        return $url;
    }
}