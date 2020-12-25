<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
class ContactUpdate extends Component
{
    public $name;
    public $contact;
    public $contactId;

    protected $listeners = [
        'getContact' => 'showContact'
    ];
    public function render()
    {
        return view('livewire.contact-update');
    }

    public function showContact($contact){
        $this->name = $contact['name'];
        $this->contact = $contact['contact'];
        $this->contactId = $contact['id'];
    }

    public function update(){
        $this->validate([
            'name'=> 'required|min:3',
            'contact'=> 'required|max:15'
        ]);

        if ($this->contactId) {
            $contact = \App\Contact::find($this->contactId);
            $contact->update([
                'name'=>$this->name,
                'contact'=>$this->contact,
                'id_user'=> Auth::user()->id
            ]);

            $this->resetInput();

            $this->emit('contactUpdated',$contact);

        }

    }

    private function resetInput(){
        $this->name = null;
        $this->contact = null;
    }
}
