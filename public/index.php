<?php

ini_set('max_execution_time', '300');
ini_set('memory_limit', '256M');

use App\Kernel;
ini_set('memory_limit','2G');

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
