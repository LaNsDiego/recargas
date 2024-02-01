@extends('layouts.system')
@section('content')
    <div style="padding: 20px">
        <form class="vstack" action="/system/recharges/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="hstack">
                <div class="vstack">
                    <h1>Nueva recarga</h1>
                    <nav>
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="/system/recharges" class="nav-link text-primary">Recargas</a></li>
                        <li class="breadcrumb-item active fw-bold">Crear</li>
                    </ol>
                    </nav>
                </div>
                <div class="hstack gap-2">
                    <a href="/system/recharges" class="btn btn-outline-secondary">Cancelar</a>
                    <button class="btn btn-outline-primary" type="submit">Crear</button>
                </div>
            </div>


          <div class="row g-3">

            <div class="col-12 z-3">
                {{-- <div class="form-floating @error('player_id') is-invalid @enderror"> --}}
                    <label for="player_id" class="mb-2 ms-1">Jugador</label>
                    <select id="player_id" class="form-select @error('player_id') is-invalid @enderror z-3"
                        name="player_id" value="{{ old('player_id') }}">
                        @foreach ($players as $player)
                            <option value="{{ $player->id }}">{{ $player->dni }} {{ $player->nombres }} {{ $player->apellidos }}</option>
                        @endforeach
                    </select>

                {{-- </div> --}}
                @error('player_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            <div class="col-12 col-lg-6">
                <div class="form-floating @error('codigo_voucher') is-invalid @enderror">
                    <input type="text" class="form-control @error('codigo_voucher') is-invalid @enderror"
                        name="codigo_voucher" placeholder="Ingrese nombre" value="{{ old('codigo_voucher') }}">
                    <label for="codigo_voucher">Código voucher</label>
                </div>
                @error('codigo_voucher')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 col-lg-6">
                <div class="form-floating @error('monto_voucher') is-invalid @enderror">
                    <input type="number" class="form-control @error('monto_voucher') is-invalid @enderror"
                        name="monto_voucher" min="20" step="0.01" value="{{ old('monto_voucher') }}">
                    <label for="monto_voucher">Monto (S/.)</label>
                </div>
                @error('monto_voucher')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 col-lg-4">
                <div class="form-floating @error('fecha_hora_voucher') is-invalid @enderror">
                    <input type="datetime-local" class="form-control @error('fecha_hora_voucher') is-invalid @enderror"
                        name="fecha_hora_voucher" placeholder="Ingrese sus fecha_hora_voucher" value="{{ old('fecha_hora_voucher') }}">
                    <label for="fecha_hora_voucher">Fecha y hora</label>
                </div>
                @error('fecha_hora_voucher')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 col-lg-4 col-md-6">
                <div class="form-floating @error('banco_voucher') is-invalid @enderror">
                    <select class="form-control @error('banco_voucher') is-invalid @enderror"
                        name="banco_voucher">
                        <option {{ old('banco_voucher') ==  'BCP' ? 'selected' : ''  }} value="BCP">BCP</option>
                        <option {{ old('banco_voucher') ==  'BBVA' ? 'selected' : ''  }} value="BBVA">BBVA</option>
                        <option {{ old('banco_voucher') ==  'INTERBANK' ? 'selected' : ''  }} value="INTERBANK">INTERBANK</option>
                        <option {{ old('banco_voucher') ==  'SCOTIABANK' ? 'selected' : ''  }} value="SCOTIABANK">SCOTIABANK</option>
                        <option {{ old('banco_voucher') ==  'BANBIF' ? 'selected' : ''  }} value="BANBIF">BANBIF</option>
                        <option {{ old('banco_voucher') ==  'BANCO DE LA NACIÓN' ? 'selected' : ''  }} value="BANCO DE LA NACIÓN">BANCO DE LA NACIÓN</option>

                    </select>
                    <label for="banco_voucher">Banco</label>
                </div>
                @error('banco_voucher')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12 col-lg-4 col-md-6">
                <div class="form-floating @error('red_social') is-invalid @enderror">
                    <select class="form-control @error('red_social') is-invalid @enderror"
                        name="red_social" value="{{ old('red_social') }}">
                        <option value="FACEBOOK" {{ old('red_social') == 'FACEBOOK'? 'selected' : '' }}>FACEBOOK</option>
                        <option value="INSTAGRAM" {{ old('red_social') == 'INSTAGRAM'? 'selected' : '' }}>INSTAGRAM</option>
                        <option value="TWITTER" {{ old('red_social') == 'TWITTER'? 'selected' : '' }}>TWITTER</option>
                        <option value="WHATSAPP" {{ old('red_social') == 'WHATSAPP'? 'selected' : '' }}>WHATSAPP</option>
                        <option value="TELEGRAM" {{ old('red_social') == 'TELEGRAM'? 'selected' : '' }}>TELEGRAM</option>
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
                    <img src="/preview.png" alt="Preview Uploaded Image" id="imagen_voucher_preview" class="img-fluid">
                </div>
                @error('imagen_voucher')
                    <div class="text-danger w-100 text-center mt-2">{{ $message }}</div>
                @enderror
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
            new Choices(document.querySelector('#player_id'))

            input.addEventListener("change", previewImagenVoucher);


        })
    </script>
@stop
