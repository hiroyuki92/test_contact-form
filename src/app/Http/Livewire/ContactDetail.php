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
       \Log::info("受け取ったID: " . $contactId);  // ログでIDを確認

    $this->contact = Contact::find($contactId);

    if ($this->contact) {
        \Log::info("データ取得成功: " . $this->contact->first_name);
        $this->isOpen = true;
    } else {
        \Log::warning("IDが見つかりませんでした: " . $contactId);
    }
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
