<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Alert;
use Auth;
use Livewire\WithPagination;
class ContactIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $statusUpdate = false;

    public $paginate = 5;
    public $search;
    protected $listeners = [
        'contactStored' => 'handleStore',
        'contactUpdated' => 'handleUpdate'

    ];

    protected $updatesQueryString = ['search'];

    public function mount(){
        $this->search = request()->query('search',$this->search);
    }

    public function render()
    {
        return view('livewire.contact-index', [
            'data' => $this->search === null ?
                \App\Contact::where('id_user',Auth::user()->id)->orderby('id','DESC')->paginate($this->paginate):
                \App\Contact::where('name','like','%'.$this->search.'%')->orWhere('contact','like','%'.$this->search.'%')->where('id_user',Auth::user()->id)->orderby('id','DESC')->paginate($this->paginate)
        ]);
        
        // $data = \App\Contact::all(); 
        // return view('livewire.contact-index',compact('data'));
    }

    public function handleStore($contact){
        // dd($contact);
        session()->flash('message', 'kontak '.$contact['name'].' berhasil di simpan');
    }

    public function handleUpdate($contact){
        // dd($contact);
        session()->flash('message', 'kontak '.$contact['name'].' berhasil di update');
    }

    public function destroy($id){
     if ($id) {
        $data = \App\Contact::find($id)->delete();
        // dd($data->name);

        session()->flash('message', 'kontak berhasil di delete');

     }   
    }

    public function getContact($id){
        $this->statusUpdate = true;

        $contact = \App\Contact::find($id);

        $this->emit('getContact',$contact);
    }
}
