<?php

namespace App\Exceptions\ChatExceptions;

use App\Constants\CommonConstants\StatusCodeConstant;
use Exception;

class CantCreateGroupException extends Exception
{
    protected $message = "can`t create new group!";
    protected $code = StatusCodeConstant::VALIDATION_ERROR;
}
