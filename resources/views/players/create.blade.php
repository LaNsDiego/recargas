@extends('layouts.system')
@section('content')
    <div style="padding: 20px">
        <form class="vstack" action="/system/players/store" method="POST">
            @csrf
            <div class="hstack">
                <div class="vstack">
                    <h1>Nuevo jugador</h1>
                    <nav>
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item">
                            <a href="/system/players" class="text-primary">Jugadores</a>
                        </li>
                        <li class="breadcrumb-item active">Crear</li>
                    </ol>
                    </nav>
                </div>
                <div class="hstack gap-2">
                    <a href="/system/players" class="btn btn-outline-secondary">Cancelar</a>
                    <button class="btn btn-outline-primary" type="submit">Crear</button>
                </div>
            </div>


          <div class="row g-3">
            <div class="col-12">
                <div class="form-floating @error('dni') is-invalid @enderror">
                    <input type="text" class="form-control @error('dni') is-invalid @enderror"
                        name="dni" placeholder="Ingrese nombre" value="{{ old('dni') }}">
                    <label for="dni">DNI</label>
                </div>
                @error('dni')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <div class="form-floating @error('nombres') is-invalid @enderror">
                    <input type="text" class="form-control @error('nombres') is-invalid @enderror"
                        name="nombres" placeholder="Ingrese sus nombres" value="{{ old('nombres') }}">
                    <label for="nombres">Nombres</label>
                </div>
                @error('nombres')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <div class="form-floating @error('apellidos') is-invalid @enderror">
                    <input type="text" class="form-control @error('apellidos') is-invalid @enderror"
                        name="apellidos" placeholder="Ingrese sus apellidos" value="{{ old('apellidos') }}">
                    <label for="apellidos">Apellidos</label>
                </div>
                @error('apellidos')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
          </div>
        </form>
    </div>
@stop
