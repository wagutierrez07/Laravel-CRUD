@extends('layouts.welcome')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col md-7 mt-5">
                    <!-- mensaje flash-->
            @if (session('estudianteEditado'))
    <div class="alert alert-success">
        {{session('estudianteEditado')}}
    </div>
    @endif
            <!-- Validar errores-->
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <div class="card">
            <form action="{{route('edit', $usuario->id)}}" method="post">
             {{ csrf_field() }}
                {{ method_field('PATCH') }}
                    <div class="card header text-center">editar usuario</div>
                    <div class="card body">
                    <div class="row form-group">
                    <label class="col-2">Nombre</label>
                    <input type="text" name="name" class="form-control col md-9" value="{{$usuario->name}}" >
                    </div>
                    <div class="row form-group">
                    <label for="" class="col-2">Apellido</label>
                    <input type="text" name="surname" class="form-control col md-9" value="{{$usuario->surname}}" >
                </div>
                <div class="row form-group">
                    <label for="" class="col-2">Cedula</label>
                    <input type="text" name="code" class="form-control col md-9" maxlength="8" value="{{$usuario->code}}"> 
                </div>
                
                <div class="row form-group">
                    <label for="" class="col-2">Fecha de nacimiento</label>
                    <input type="date" name="birthdate" class="form-control col md-9" value="{{$usuario->birthdate}}">
                </div>
                <div class="row form-group">
                    <label for="" class="col-2">Telefono</label>
                    <input type="number" name="cellphone" class="form-control col md-9" maxlength="7" value="{{$usuario->cellphone}}">
                </div>
                <div class="row form-group">
                    <label for="" class="col-2">Cargo</label>
                    <input type="text" name="charge" class="form-control col md-9" value="{{$usuario->charge}}">
                </div>
                <div class="row form-group">
                    <button type="submit" class="btn btn-success col md-9 offset-2">editar</button>

                
</div>
                    </div>   
                </form>
            </div>
        </div>
    </div>
    <a href="{{url('/')}}" class="btn btn-light btn-xs mt-5">Volver</a>
</div>