<?php

use Dotenv\Dotenv;
use Dotenv\Exception\InvalidPathException;

try {
    $dotenv = Dotenv::create(__DIR__ . '/../');
    $dotenv->load();
} catch (InvalidPathException $exception) {

}

