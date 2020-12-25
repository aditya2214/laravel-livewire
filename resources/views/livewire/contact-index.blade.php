<div>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif
    <br>
    @if($statusUpdate)
    <livewire:contact-update></livewire:contact-update>
    @else
    <livewire:contact-create></livewire:contact-create>
    @endif
    <hr>
    <table class="table table-hover">
        <thead>
            <tr class="thead-dark">
                <th>No</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $no=>$da)
            <tr>
                <td>{{$no+1}}</td>
                <td>{{$da->name}}</td>
                <td>{{$da->contact}}</td>
                <td>
                    <button wire:click="getContact({{$da->id}})" class="btn btn-info btn-sm">Edit</button>
                    <button class="btn btn-danger btn-sm">Hapus </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
