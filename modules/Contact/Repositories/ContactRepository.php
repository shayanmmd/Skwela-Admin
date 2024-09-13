<?php

namespace Contact\Repositories;

use Contact\Contracts\ContactRepositoryInterface;
use Contact\Http\Models\Contact;

class ContactRepository implements ContactRepositoryInterface
{
    public function all()
    {
        return Contact::all()->sortBy('created_at', descending: true);
    }
}
