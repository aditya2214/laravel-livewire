<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Alert;
class ContactIndex extends Component
{
    public $statusUpdate = false;

    protected $listeners = [
        'contactStored' => 'handleStore',
        'contactUpdated' => 'handleUpdate'

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

    public function handleUpdate($contact){
        // dd($contact);
        session()->flash('message', 'kontak '.$contact['name'].' berhasil di update');
    }

    public function getContact($id){
        $this->statusUpdate = true;

        $contact = \App\Contact::find($id);

        $this->emit('getContact',$contact);
    }
}
