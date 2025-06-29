<?php
set_include_path(
    get_include_path() .
    PATH_SEPARATOR . realpath(__DIR__ . '/..') . '/_model' .
    PATH_SEPARATOR . realpath(__DIR__ . '/..') . '/_controller' .
    PATH_SEPARATOR . realpath(__DIR__ . '/..') . '/_view' .
    PATH_SEPARATOR . realpath(__DIR__ . '/..') . '/ajax' .
    PATH_SEPARATOR . realpath(__DIR__ . '/..') . '/DAO'
);

define("SITE_URL", "https://schoolshield.azurewebsites.net/");
define("DEFAULT_URL", "Inicio");
define('MAX_LOGIN_ATTEMPTS', 5);
define('LOCKOUT_TIME', 60);
