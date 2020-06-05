<?php

namespace Core;

class Util
{
    static public function baseUrl()
    {
        $baseUrl = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
        $baseUrl .= "://".$_SERVER['HTTP_HOST'];
        $baseUrl .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
        $baseUrl = str_replace('public/', '', $baseUrl);
        return $baseUrl;
    }
}