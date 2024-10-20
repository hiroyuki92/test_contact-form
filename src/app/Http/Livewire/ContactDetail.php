<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactDetail extends Component
{
    public $contact;
    public $isOpen = false;
    protected $listeners = ['showContact'];

    public function showContact($contactId)
    {
    $this->contact = Contact::findOrFail($contactId);
    $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.contact-detail');
    }
}
