<?php

namespace App\View\Components\Chat\ContactList;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ContactListComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public String $userName)
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.chat.contact-list.contact-list-component');
    }
}
