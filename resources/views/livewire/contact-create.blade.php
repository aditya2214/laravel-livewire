<div>
    <form wire:submit.prevent="store">
        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <input wire:model="name" type="text" class="form-control" placeholder="name"  name="name" id="name">
                </div>
                <div class="col">
                    <input wire:model="contact" type="text" class="form-control" placeholder="contact" name="contact" id="contact">
                </div>
            </div>
        </div>
        <button tyle="submit" class="btn btn-primary btn-sm">Simpan</button>
    </form>
</div>
