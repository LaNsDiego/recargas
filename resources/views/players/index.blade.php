@extends('layouts.system')
@section('content')
    <div style="padding: 20px">
        <div class="hstack">
            <div class="vstack">
                <h1>Jugadores</h1>
                <nav>
                <ol class="breadcrumb">

                    <li class="breadcrumb-item">Jugadores</li>
                    <li class="breadcrumb-item active fw-bold">Listado</li>
                </ol>
                </nav>
            </div>
            <a href="/system/players/create" class="btn btn-outline-primary">Nuevo cliente</a>
          </div>
        <table id="table-players" class="table">
            <thead>
              <tr>
                <th>DNI</th>
                <th >NOMBRES</th>
                <th >APELLIDOS</th>
                <th >SALDO</th>
                <th >HISTORIAL</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($players as $player)
              <tr>
                <td>{{ $player->dni }}</td>
                <td>{{ $player->nombres }}</td>
                <td>{{ $player->apellidos }}</td>
                <td>S/. {{ $player->saldo }}</td>
                <td>
                    <a href="/system/recharges/{{ $player->id }}/record" class="btn btn-outline-primary">Ver</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let table = new DataTable('#table-players');
        })
    </script>
@stop
