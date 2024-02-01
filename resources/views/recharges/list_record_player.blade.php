@extends('layouts.system')
@section('content')
    <div style="padding: 20px">
        <div class="hstack">
            <div class="vstack">
                <h1>Historial</h1>
                <nav>
                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="/system/recharges" class="text-primary">Recargas</a></li>
                    <li class="breadcrumb-item">{{ $player->nombres }} {{ $player->apellidos }}</li>
                    <li class="breadcrumb-item active fw-bold">Historial</li>
                </ol>
                </nav>
            </div>
            {{-- <a href="/system/recharges/create" class="btn btn-outline-primary">Nueva recarga</a> --}}
          </div>
        <table id="table-recharges" class="table">
            <thead>
              <tr>
                <th>RED SOCIAL</th>
                <th >COD. VOUCHER</th>
                <th >MONTO</th>
                <th >FECHA VOUCHER</th>
                <th >BANCO</th>
                <th >VOUCHER</th>
                <th >FEC. REGISTRO</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($recharges as $recharge)
              <tr>
                <td>{{ $recharge->red_social }}</td>
                <td>{{ $recharge->codigo_voucher }}</td>
                <td>{{ $recharge->monto_voucher }}</td>
                <td>{{ $recharge->fecha_hora_voucher }}</td>
                <td>{{ $recharge->banco_voucher }}</td>
                <td>
                    <img src="/storage/{{ $recharge->imagen_voucher }}" alt="voucher foto" class="img-fluid" style="max-height: 50px;cursor: pointer;">
                </td>
                <td>{{ $recharge->created_at->diffForHumans() }}</td>
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
