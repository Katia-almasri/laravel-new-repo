<?php

namespace App\Exceptions\ContactListException;

use App\Constants\CommonConstants\StatusCodeConstant;
use Exception;

class NoContactListException extends Exception
{
    protected $message = "there is no contact list available!";
    protected $code = StatusCodeConstant::NOT_FOUND;
}
