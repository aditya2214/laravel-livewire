<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactCreate extends Component
{
    public $name; 
    public $contact; 

    public function render()
    {
        return view('livewire.contact-create');
    }

    public function store(){
        $this->validate([
            'name'=> 'required|min:3',
            'contact'=> 'required|max:15'
        ]);

        $contact = \App\Contact::create([
            'name'=>$this->name,
            'contact'=>$this->contact
        ]);

        $this->resetInput();

        $this->emit('contactStored',$contact);
    }

    private function resetInput(){
        $this->name = null;
        $this->contact = null;
    }
}
