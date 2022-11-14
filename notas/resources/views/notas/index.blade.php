@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col">
            <h1>POST-IT</h1>
        </div>
    </div>
    <div class="row">
        @foreach ($notas as $nota)
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">{{ $nota->titulo }}</h5>
                      <p class="card-text">{{ $nota->contenido }}</p>
                      <a href="{{ route('destroy.nota', $nota) }}" class="card-link">Borrar</a>
                    </div>
                  </div>
            </div>

        @endforeach
    </div>
    
<a class="btn-flotante" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar nota</a>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Post-it</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('store.nota') }}" method="POST" class="form">
            @csrf
            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" id="titulo" class="form-control">
            </div>
            <div class="form-group">
                <label for="descripcion">Contenido</label>
                <input type="text" name="contenido" id="descripcion" class="form-control">
            </div>
            <br>
            <input type="submit" value="Guardar" class="btn btn-primary">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection