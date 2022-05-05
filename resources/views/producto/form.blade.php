<h1>{{ $modo }} Producto</h1>

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>


@endif

<div class="form-group">
<label for="Nombre">Nombre</label>
<input type="text" class="form-control" name="Nombre" value="{{isset($producto->Nombre)?$producto->Nombre:old('Nombre')}}" id="Nombre">
</div>

<div class="form-group">
<label for="Descripcion">Descripcion</label>
<input type="text" class="form-control" name="Descripcion" value="{{isset($producto->Descripcion)?$producto->Descripcion:old('Descripcion')}}" id="Descripcion">
</div>

<div class="form-group">
<label for="Precio">Precio</label>
<input type="text" class="form-control" name="Precio" value="{{isset($producto->Precio)?$producto->Precio:old('Precio')}}" id="Precio">
</div>

<div class="form-group">
<label for="Foto"></label>
@if(isset($producto->Foto))
<img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$producto->Foto}}" width="100" alt="100">
@endif
<input type="file" class="form-control" name="Foto"  id="Foto">
</div>

<br>
<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a class="btn btn-primary" href="{{url('producto/')}}">Regresar</a>
