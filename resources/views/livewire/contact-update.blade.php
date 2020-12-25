<div>
    <form wire:submit.prevent="update">
    <input type="hidden" wire:model="contactId">
        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <input wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="name"  name="name" id="name">
                    @error('name')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <input wire:model="contact" type="text" class="form-control  @error('contact') is-invalid @enderror" placeholder="contact" name="contact" id="contact">
                    @error('contact')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <button tyle="submit" class="btn btn-primary btn-sm">Simpan</button>
    </form>
</div>
