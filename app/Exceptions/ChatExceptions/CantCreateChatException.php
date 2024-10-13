<?php

namespace App\Exceptions\ChatExceptions;

use App\Constants\CommonConstants\StatusCodeConstant;
use Exception;

class CantCreateChatException extends Exception
{
    protected $message = "can`t create new chat!";
    protected $code = StatusCodeConstant::VALIDATION_ERROR;
}
