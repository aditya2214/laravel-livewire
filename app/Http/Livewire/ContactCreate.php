<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
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
            'contact'=>$this->contact,
            'id_user'=> Auth::user()->id
        ]);

        $this->resetInput();

        $this->emit('contactStored',$contact);
    }

    private function resetInput(){
        $this->name = null;
        $this->contact = null;
    }
}
