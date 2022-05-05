formulario que tendra dato en comun con create y edit
<br>

<label for="Nombre">Nombre</label>
<input type="text" name="Nombre" value="{{$producto->Nombre}}" id="Nombre">
<br>

<label for="Descripcion">Descripcion</label>
<input type="text" name="Descripcion" id="Descripcion">
<br>

<label for="Precio">Precio</label>
<input type="text" name="Precio" id="Precio">
<br>

<label for="Foto">Foto</label>
<input type="file" name="Foto" id="Foto">
<br>

<input type="submit" value="Enviar">
<br>