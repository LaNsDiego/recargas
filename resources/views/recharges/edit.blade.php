@extends('layouts.system')
@section('content')
    <div style="padding: 20px">
        <form class="vstack" action="/system/recharges/{{ $recharge->id }}/update" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="hstack">
                <div class="vstack">
                    <h1>Editar recarga</h1>
                    <nav>
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="/system/recharges" class="nav-link">Recargas</a></li>
                        <li class="breadcrumb-item active">Editar</li>
                    </ol>
                    </nav>
                </div>
                <div class="hstack gap-2">
                    <a href="/system/recharges" class="btn btn-outline-secondary">Cancelar</a>
                    <button class="btn btn-outline-primary" type="submit">Guardar</button>
                </div>
            </div>


          <div class="row g-3">

            <div class="col-12">
                {{-- <div class="form-floating @error('player_id') is-invalid @enderror"> --}}
                    <div class="form-floating">
                        <input type="text" class="form-control" disabled
                        name="codigo_voucher" placeholder="Ingrese nombre" value="{{ $recharge->player->nombres }} {{ $recharge->player->apellidos }}">
                        <label for="codigo_voucher">Jugador</label>
                    </div>

                {{-- </div> --}}
                @error('player_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            <div class="col-12">
                <div class="form-floating @error('codigo_voucher') is-invalid @enderror">
                    <input type="text" class="form-control @error('codigo_voucher') is-invalid @enderror"
                        name="codigo_voucher" placeholder="Ingrese nombre" value="{{ $recharge->codigo_voucher }}">
                    <label for="codigo_voucher">Código voucher</label>
                </div>
                @error('codigo_voucher')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <div class="form-floating @error('monto_voucher') is-invalid @enderror">
                    <input type="text" class="form-control @error('monto_voucher') is-invalid @enderror"
                        name="monto_voucher" placeholder="Ingrese sus monto_voucher" value="{{ $recharge->monto_voucher }}">
                    <label for="monto_voucher">Monto (S/.)</label>
                </div>
                @error('monto_voucher')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <div class="form-floating @error('fecha_hora_voucher') is-invalid @enderror">
                    <input type="datetime-local" class="form-control @error('fecha_hora_voucher') is-invalid @enderror"
                        name="fecha_hora_voucher" placeholder="Ingrese sus fecha_hora_voucher" value="{{ $recharge->fecha_hora_voucher }}">
                    <label for="fecha_hora_voucher">Fecha y hora</label>
                </div>
                @error('fecha_hora_voucher')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <div class="form-floating @error('banco_voucher') is-invalid @enderror">
                    <select class="form-control @error('banco_voucher') is-invalid @enderror"
                        name="banco_voucher" value="{{ $recharge->banco_voucher }}">
                        <option value="BCP" {{ $recharge->banco_voucher == 'BCP' ? 'selected' : '' }}>BCP</option>
                        <option value="BBVA" {{ $recharge->banco_voucher == 'BBVA' ? 'selected' : '' }}>BBVA</option>
                        <option value="INTERBANK" {{ $recharge->banco_voucher == 'INTERBANK' ? 'selected' : '' }}>INTERBANK</option>
                        <option value="SCOTIABANK" {{ $recharge->banco_voucher == 'SCOTIABANK' ? 'selected' : '' }}>SCOTIABANK</option>
                        <option value="BANBIF" {{ $recharge->banco_voucher == 'BANBIF' ? 'selected' : '' }}>BANBIF</option>
                        <option value="BANCO DE LA NACIÓN" {{ $recharge->banco_voucher == 'BANCO DE LA NACIÓN' ? 'selected' : '' }}>BANCO DE LA NACIÓN</option>

                    </select>
                    <label for="banco_voucher">Banco</label>
                </div>
                @error('banco_voucher')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <div class="form-floating @error('red_social') is-invalid @enderror">
                    <select class="form-control @error('red_social') is-invalid @enderror"
                        name="red_social" value="{{ $recharge->red_social }}">
                        <option value="FACEBOOK" {{  $recharge->red_social == 'FACEBOOK' ? 'selected' : '' }}>FACEBOOK</option>
                        <option value="INSTAGRAM" {{  $recharge->red_social == 'INSTAGRAM' ? 'selected' : '' }}>INSTAGRAM</option>
                        <option value="TWITTER" {{  $recharge->red_social == 'TWITTER' ? 'selected' : '' }}>TWITTER</option>
                        <option value="WHATSAPP" {{  $recharge->red_social == 'WHATSAPP' ? 'selected' : '' }}>WHATSAPP</option>
                        <option value="TELEGRAM" {{  $recharge->red_social == 'TELEGRAM' ? 'selected' : '' }}>TELEGRAM</option>
                    </select>
                    <label for="red_social">Red social</label>
                </div>
                @error('red_social')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <label for="imagen_voucher" class="col-12 rounded-md border p-5">
                <div class="d-flex align-items-center  flex-column">
                    <div id="imagen_voucher_placeholder">Subir archivo</div>
                    <img src="/{{ $recharge->imagen_voucher }}" alt="Preview Uploaded Image" id="imagen_voucher_preview" class="img-fluid">
                </div>
            </label>
            <input id="imagen_voucher" name="imagen_voucher" type="file" accept=".jpg, .jpeg, .png" class="d-none"></div>



        </form>
    </div>

    <style>
        #imagen_voucher_preview{
            max-height: 150px;
        }
    </style>
    <script>
        const input = document.getElementById('imagen_voucher');
        const previewImagenVoucher = () => {
            const file = input.files;
            if (file) {
                const fileReader = new FileReader();
                const preview = document.getElementById('imagen_voucher_preview');
                fileReader.onload = event => {
                    preview.setAttribute('src', event.target.result);
                }
                fileReader.readAsDataURL(file[0]);
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            // new Choices(document.querySelector('#player_id'))

            input.addEventListener("change", previewImagenVoucher);


        })
    </script>
@stop
