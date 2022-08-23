<div>
    <div class="container">
        <h2>Envia tu tienda</h2>
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror "
                value="{{ old('name') }}" wire:model="name">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
          <label for="">Descripcion</label>
          <textarea class="form-control @error('description') is-invalid @enderror"  wire:model="description" rows="3"></textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <br>
        <button type="button" wire:click="registerShop();" class="btn btn-primary">Enviar</button>
    </div>
</div>
