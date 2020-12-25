<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Alert;
class ContactIndex extends Component
{
    protected $listeners = [
        'contactStored' => 'handleStore'
    ];

    public $data;
    
    public function render()
    {
        $this->data = \App\Contact::latest()->get();

        return view('livewire.contact-index');
        
        // $data = \App\Contact::all(); 
        // return view('livewire.contact-index',compact('data'));
    }

    public function handleStore($contact){
        // dd($contact);
        session()->flash('message', 'kontak '.$contact['name'].' berhasil disimpan');
    }
}
