<?php

namespace Contact\Http\Controllers;

use Contact\Contracts\ContactRepositoryInterface;
use Contact\Http\Models\Contact;

class ContactController
{

    public function __construct(
        private ContactRepositoryInterface $contactRepositoryInterface
    ) {}

    public function index()
    {
        $contacts = $this->contactRepositoryInterface->all();
        
        return view('ContactViews::contact', [
            'contacts' => $contacts
        ]);
    }
}
