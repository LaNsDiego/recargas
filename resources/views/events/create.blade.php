@extends('layouts.system')
@section('content')
    <main class="content">
        <form class="vstack" action="/system/events/store" method="POST">
            @csrf
            <div class="hstack">
                <div class="vstack">
                    <h1>Nuevo evento deportivo</h1>
                    <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/system/events" class="text-primary">Eventos deportivos</a>
                        </li>
                        <li class="breadcrumb-item active fw-bold">Crear</li>
                    </ol>
                    </nav>
                </div>
                <div class="hstack gap-2">
                    <a href="/system/events" class="btn btn-outline-secondary">Cancelar</a>
                    <button class="btn btn-outline-primary" type="submit">Crear</button>
                </div>
            </div>


          <div class="row g-3">
            <div class="col-12">
                <div class="form-floating @error('titulo') is-invalid @enderror">
                    <input type="text" class="form-control @error('titulo') is-invalid @enderror"
                        name="titulo" placeholder="Ingrese nombre" value="{{ old('titulo') }}">
                    <label for="titulo">Titulo</label>
                </div>
                @error('titulo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <div class="form-floating @error('fecha_hora_inicio') is-invalid @enderror">
                    <input type="datetime-local" class="form-control @error('fecha_hora_inicio') is-invalid @enderror"
                        name="fecha_hora_inicio"  value="{{ old('fecha_hora_inicio') }}">
                    <label for="fecha_hora_inicio">Fecha inicio</label>
                </div>
                @error('fecha_hora_inicio')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <div class="form-floating @error('fecha_hora_termino') is-invalid @enderror">
                    <input type="datetime-local" class="form-control @error('fecha_hora_termino') is-invalid @enderror"
                        name="fecha_hora_termino"  value="{{ old('fecha_hora_termino') }}">
                    <label for="fecha_hora_termino">Fecha de término</label>
                </div>
                @error('fecha_hora_termino')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <div class="form-floating @error('cuota') is-invalid @enderror">
                    <input type="number" step="0.01" min="0" class="form-control @error('cuota') is-invalid @enderror"
                        name="cuota"  value="{{ old('cuota') }}">
                    <label for="cuota">Cuota</label>
                </div>
                @error('cuota')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

          </div>
        </form>
    </main>
@stop
