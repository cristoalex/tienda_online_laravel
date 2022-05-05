mostra la lista de productos

@if(Session::has('mensaje'))
{{Session::get('mensaje')}}
@endif

<a href="{{url('producto/create')}}">Registrar nuevo producto</a>

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


            <td>
                <img src="{{asset('storage').'/'.$producto->Foto}}" width="100" alt="100">
                
            </td>


            <td>{{$producto->Descripcion}}</td>
            <td>{{$producto->Precio}}</td>
            <td>
                
                <a href="{{url('/producto/'.$producto->id.'/edit')}}">
                    Editar
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
