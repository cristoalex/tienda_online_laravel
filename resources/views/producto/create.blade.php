formulario de creacion de productos

<form action="{{ url('/producto') }}" method="post" enctype="multipart/form-data" >
@csrf

@include('producto.form')

</form>
