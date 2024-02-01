@extends('layouts.system')
@section('content')
    <main class="content">
        <div class="hstack">
            <div class="vstack">
                <h1>Eventos deportivos</h1>
                <nav>
                <ol class="breadcrumb">

                    <li class="breadcrumb-item">Eventos deportivos</li>
                    <li class="breadcrumb-item active fw-bold">Listado</li>
                </ol>
                </nav>
            </div>
            <a href="/system/events/create" class="btn btn-outline-primary">Nuevo evento deportivo</a>
          </div>
        <table id="table-events" class="table">
            <thead>
              <tr>
                <th >TITULO</th>
                <th >FEC. INICIO</th>
                <th >FEC. TÉRMINO</th>
                <th >CUOTA</th>
                <th >FEC. CREACIÓN</th>

              </tr>
            </thead>
            <tbody>
              @foreach ($events as $event)
              <tr>
                <td>{{ $event->titulo }}</td>
                <td>{{ $event->fecha_hora_inicio }}</td>
                <td>{{ $event->fecha_hora_termino }}</td>
                <td>{{ $event->cuota }}</td>
                <td>{{ $event->created_at->diffForHumans() }}</td>

              </tr>
              @endforeach
            </tbody>
          </table>

    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let table = new DataTable('#table-events');
        })
    </script>
@stop
