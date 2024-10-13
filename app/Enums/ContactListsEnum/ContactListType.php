<?php

namespace App\Enums\ContactListsEnum;

use phpDocumentor\Reflection\Types\Boolean;

enum ContactListType: int
{
    case has_account  = 1;
    case no_account = 0;
}
