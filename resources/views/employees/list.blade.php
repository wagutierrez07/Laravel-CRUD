@extends('layouts.welcome')

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col md-10">
      <h2 class="text-center mb-5">Usuarios listados</h2>
         <!-- mensaje flash-->
            @if (session('estudianteEliminado'))
    <div class="alert alert-success">
        {{session('estudianteEliminado')}}
    </div>
       @endif
      <table class="table table-bordered table-striped text-center">
        <thead>
        <tr>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Cedula</th>
          <th>Fecha de nacimiento</th>
          <th>Telefono</th>
          <th>Cargo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $key)
        <tr>
          <td>{{$key->name}}</td>
          <td>{{$key->surname}}</td>
          <td>{{$key->code}}</td>
          <td>{{$key->birthdate}}</td>
          <td>{{$key->cellphone}}</td>
          <td>{{$key->charge}}</td>
          <td> 
            <a href="{{url('/editform', $key->id)}}" class="btn btn-primary"> <i class=" fas fa-pencil-alt"></i></a>
            <form action="{{url('/delete', $key->id)}}" method="post">
               {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" onclick="return confirm('desea eliminar al usuario?');" class="btn btn-danger">
                  <i class="fas fa-trash-alt"></i>
                </button>
          </form>
        </td>
        </tr>
        @endforeach
      </tbody>
      </table>
      {{$users->links()}}
      <a href="{{url('/')}}" class="btn btn-light btn-xs mt-5">Volver</a> 
    </div>
  </div>
</div>