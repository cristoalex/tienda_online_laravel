@extends('layouts.app')

@section('content')

<main>
    <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                   
                    @foreach ($products as $producto) 
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <h6>{{$producto->Nombre}}</h6>
                                <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$producto->Foto}}" width="250" alt="250">                          
                            </div>                  
                            <div class="card-body text-center">
                                <h5>Precio: ${{$producto->Precio}}</h5>
                                <br>

                                <p><td>{{$producto->Descripcion}}</td></p>
                                <br>
                                
                            </div>  
                        </div>
                    </div>
                    @endforeach
                </div>
                <br>
            </div>
        </div> 
</main>

@endsection
