<?php
set_include_path(
    get_include_path() .
    PATH_SEPARATOR . realpath(__DIR__ . '/..') . '/_model' .
    PATH_SEPARATOR . realpath(__DIR__ . '/..') . '/_controller' .
    PATH_SEPARATOR . realpath(__DIR__ . '/..') . '/_view' .
    PATH_SEPARATOR . realpath(__DIR__ . '/..') . '/ajax' .
    PATH_SEPARATOR . realpath(__DIR__ . '/..') . '/DAO'
);

define("SITE_URL", "http://192.168.100.21/Project-Web/");
define("ROOT_PATH", "/home/www/Project-Web/");
define("DEFAULT_URL", "Inicio");
