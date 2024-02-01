@extends('layouts.system')
@section('content')
    <div style="padding: 20px">
        <div class="hstack">
            <div class="vstack">
                <h1>Recargas</h1>
                <nav>
                <ol class="breadcrumb">

                    <li class="breadcrumb-item">Recargas</li>
                    <li class="breadcrumb-item active fw-bold">Listado</li>
                </ol>
                </nav>
            </div>
            <a href="/system/recharges/create" class="btn btn-outline-primary">Nueva recarga</a>
          </div>
        <table id="table-recharges" class="table">
            <thead>
              <tr>
                <th>RED SOCIAL</th>
                <th >COD. VOUCHER</th>
                <th >MONTO</th>
                <th >FECHA VOUCHER</th>
                <th >BANCO</th>
                <th >JUGADOR</th>
                <th >VOUCHER</th>
                <th >FEC. REGISTRO</th>
                <th >EDITAR</th>

              </tr>
            </thead>
            <tbody>
              @foreach ($recharges as $recharge)
              <tr>
                <td>{{ $recharge->red_social }}</td>
                <td>{{ $recharge->codigo_voucher }}</td>
                <td>S/. {{ $recharge->monto_voucher }}</td>
                <td>{{ $recharge->fecha_hora_voucher }}</td>
                <td>{{ $recharge->banco_voucher }}</td>
                <td>{{ $recharge->player->nombres }} {{ $recharge->player->apellidos }}</td>
                <td>
                    <img src="/storage/{{ $recharge->imagen_voucher }}" alt="voucher foto" class="img-fluid" style="max-height: 50px">
                </td>
                <td>{{ $recharge->created_at->diffForHumans() }}</td>
                <td>
                    <a href="/system/recharges/{{ $recharge->id }}/edit" class="btn btn-outline-primary rounded-circle px-2">
                        <i class="bi bi-pen"></i>
                    </a>
                </td>

              </tr>
              @endforeach
            </tbody>
          </table>

        </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let table = new DataTable('#table-recharges');
        })
    </script>
@stop
