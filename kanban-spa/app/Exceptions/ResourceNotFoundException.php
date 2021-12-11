<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ResourceNotFoundException extends NotFoundHttpException
{
    public function __construct($message = 'The resource was not found.')
    {
        parent::__construct($message);
    }
}
