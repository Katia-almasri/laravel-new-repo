<?php

namespace App\Exceptions\MessagesExceptions;

use App\Constants\CommonConstants\StatusCodeConstant;
use Exception;

class NoMessagesAvailableException extends Exception
{
    protected $message = "there is no messages available!";
    protected $code = StatusCodeConstant::NOT_FOUND;
}
