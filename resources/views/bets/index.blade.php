@extends('layouts.system')
@section('content')
    <main class="content">
        <div class="hstack">
            <div class="vstack">
                <h1>Apuestas</h1>
                <nav>
                <ol class="breadcrumb">

                    <li class="breadcrumb-item">Apuestas</li>
                    <li class="breadcrumb-item active fw-bold">Listado</li>
                </ol>
                </nav>
            </div>
            <a href="/system/bets/create" class="btn btn-outline-primary">Nueva apuesta</a>
          </div>
        <table id="table-bets" class="table">
            <thead>
              <tr>
                <th >TITULO</th>

                <th >MONTO</th>

                <th >ASESOR</th>
                <th >JUGADOR</th>
                <th >CUOTAS</th>
                <th >GANANCIA</th>
                <th >FEC. CREACIÓN</th>

              </tr>
            </thead>
            <tbody>
              @foreach ($bets as $bet)
              <tr>
                <td>{{ $bet->titulo }}</td>
                <td>{{ $bet->amount }}</td>
                <td>{{ $bet->advisor->name }}</td>
                <td>{{ $bet->player->nombres }} {{ $bet->player->apellidos }}</td>
                <td>{{ $bet->cuota }}</td>
                <td>{{ $bet->ganancia }}</td>
                <td>{{ $bet->created_at->diffForHumans() }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>

    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let table = new DataTable('#table-bets');
        })
    </script>
@stop
