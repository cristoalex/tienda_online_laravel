mostra la lista de productos

<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th> 
            <th>Acciones</th>

        </tr>
    </thead>

    <tbody>
        @foreach ($productos as $producto)
        <tr>
            <td>{{$producto->id}}</td>
            <td>{{$producto->Foto}}</td>
            <td>{{$producto->Descripcion}}</td>
            <td>{{$producto->Precio}}</td>
            <td>
                
                <a href="{{url('/producto/'.$producto->id.'/edit')}}">
                    Edita
                </a>        
                 | 

            <form action="{{ url('/producto/'.$producto->id ) }}" method="post">
                @csrf
                {{method_field('DELETE')}}
            <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
            </form>

            <form>
            </form>

            </td>

        </tr>
        @endforeach
    </tbody>

</table>
