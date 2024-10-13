<?php

namespace App\Exceptions\ChatExceptions;

use App\Constants\CommonConstants\StatusCodeConstant;
use Exception;

class NoChatsAvailableException extends Exception
{
    protected $message = "there is no chat available!";
    protected $code = StatusCodeConstant::NOT_FOUND;
}
