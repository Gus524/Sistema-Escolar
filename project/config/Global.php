<?php
set_include_path(
    get_include_path() .
    PATH_SEPARATOR . realpath(__DIR__ . '/..') . '/_model' .
    PATH_SEPARATOR . realpath(__DIR__ . '/..') . '/_controller' .
    PATH_SEPARATOR . realpath(__DIR__ . '/..') . '/_view'
);

define("SITE_URL", "https://my-workspace.local/php/Project-Web/");
define("ROOT_PATH", "/home/gus/www/php/Project-Web/");
define("DEFAULT_URL", "Inicio");
