<?php

$url = $_SERVER['REQUEST_URI'];

if($url === '/') {
    $Page = 'index';
    $Module = 'index';
} else {
    $url = substr($url, 1);
    if(strpos($url, '?') === false) {
        if(strpos($url, '/') === false) {
            $Page = $url;
            $Module = 'index';
        } else {
            $Page = stristr($url, '/', true);
            $Module = substr(stristr($url, '/'), 1);
        }
    } else {
        if(strpos($url, '/') === false) {
            $Page = stristr($url, '?', true);
            $Module = 'index';
        } else {
            $Page = stristr($url, '/', true);
            $Module = substr(stristr($url, '/'), 1);
            $Module = stristr($Module, '?', true);
        }
    }
}

if(file_exists('application/pages/'.$Page.'.php')) {
    include 'application/pages/'.$Page.'.php';
}