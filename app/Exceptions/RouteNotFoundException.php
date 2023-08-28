<?php


declare(strict_types = 1);

namespace App\Exceptions;


class RouteNotFoundException Extends \Exception
{
    protected $message = 'Route not found';
}