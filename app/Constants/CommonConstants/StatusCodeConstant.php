<?php

namespace App\Constants\CommonConstants;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

/**
 * THIS CLASS IS TO DEFINE THE COMMON CONSTANTS OF THE STATUS CODE RETURNED AS A RESPOSNE
 */
class StatusCodeConstant
{
    public const OK = Response::HTTP_OK;
    public const INTERNAL_SERVER_ERROR = Response::HTTP_INTERNAL_SERVER_ERROR;
    public const NOT_FOUND = Response::HTTP_NOT_FOUND;
    public const CREATED = Response::HTTP_CREATED;
    public const VALIDATION_ERROR = Response::HTTP_UNPROCESSABLE_ENTITY;
}
