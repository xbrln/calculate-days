<?php

declare(strict_types=1);

require '../vendor/autoload.php';

Router::load('../src/routes/routes.php')->direct(Request::uri(), Request::method());

function view(string $name, array $data)
{
    extract($data);

    return require "../src/view/{$name}.blade.php";
}
