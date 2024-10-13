<?php

namespace App\Exceptions\ContactListException;

use App\Constants\CommonConstants\StatusCodeConstant;
use Exception;

class CantCreateContactExeption extends Exception
{
    protected $message = "can`t create new contact!";
    protected $code = StatusCodeConstant::VALIDATION_ERROR;
}
