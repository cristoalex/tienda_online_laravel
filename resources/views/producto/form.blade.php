formulario que tendra dato en comun con create y edit

<br>

<label for="Nombre">Nombre</label>
<input type="text" name="Nombre" value="{{isset($producto->Nombre)?$producto->Nombre:''}}" id="Nombre">
<br>

<label for="Descripcion">Descripcion</label>
<input type="text" name="Descripcion" value="{{isset($producto->Descripcion)?$producto->Descripcion:''}}" id="Descripcion">
<br>

<label for="Precio">Precio</label>
<input type="text" name="Precio" value="{{isset($producto->Precio)?$producto->Precio:''}}" id="Precio">
<br>

<label for="Foto">Foto</label>
@if(isset($producto->Foto))
<img src="{{asset('storage').'/'.$producto->Foto}}" width="100" alt="100">
@endif
<input type="file" name="Foto"  id="Foto">
<br>

<input type="submit" value="Enviar">
<br>