@extends('layouts.system')
@section('content')
    <main class="content">
        <form class="vstack" action="/system/bets/store" method="POST">
            @csrf
            <div class="hstack">
                <div class="vstack">
                    <h1>Nueva apuesta</h1>
                    <nav>
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item">
                            <a href="/system/bets" class="text-primary">Apuestas</a>
                        </li>
                        <li class="breadcrumb-item active">Crear</li>
                    </ol>
                    </nav>
                </div>
                <div class="hstack gap-2">
                    <a href="/system/bets" class="btn btn-outline-secondary">Cancelar</a>
                    <button class="btn btn-outline-primary" type="submit">Crear</button>
                </div>
            </div>


          <div class="row g-3">
            <div class="col-12"  style="z-index:6">
                <label for="event_id" class="mb-2 ms-1">Evento deportivo</label>
                <select id="event_id" class="form-select @error('event_id') is-invalid @enderror z-3"
                    name="event_id" value="{{ old('event_id') }}">
                </select>
                @error('event_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12" style="z-index:5">
                <label for="player_id" class="mb-2 ms-1">Jugador</label>
                <select id="player_id" class="form-select @error('player_id') is-invalid @enderror z-3"
                    name="player_id" value="{{ old('player_id') }}">
                    @foreach ($players as $player)
                        <option value="{{ $player->id }}">{{ $player->nombres }} {{ $player->apellidos }} (Saldo S/. {{ $player->saldo }})</option>
                    @endforeach
                </select>
                @error('player_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <div class="form-floating @error('monto') is-invalid @enderror">
                    <input type="number" step="0.01" min="0" class="form-control @error('monto') is-invalid @enderror"
                        name="monto" placeholder="Ingrese sus monto" value="{{ old('monto') }}">
                    <label for="monto">Monto</label>
                </div>
                @error('monto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <div class="form-floating @error('cuota') is-invalid @enderror">
                    <input type="text" class="form-control @error('cuota') is-invalid @enderror"
                        name="cuota" placeholder="Ingrese sus cuotas" value="{{ old('cuota') }}" readonly>
                    <label for="cuota">Cuota</label>
                </div>
                @error('cuota')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <div class="form-floating @error('ganancia') is-invalid @enderror">
                    <input type="text" class="form-control @error('ganancia') is-invalid @enderror"
                        name="ganancia" placeholder="Ingrese sus ganancia" value="{{ old('ganancia') }}" readonly>
                    <label for="ganancia">Ganancia = Monto x Cuota</label>
                </div>
                @error('ganancia')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

          </div>
        </form>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const events = @json($events) ;
            let eventsSelect = new Choices(document.querySelector('#event_id'))
            new Choices(document.querySelector('#player_id'))
            let inputCuotas = document.querySelector("input[name='cuota']")
            let inputGanancia = document.querySelector("input[name='ganancia']")
            let inputMonto = document.querySelector("input[name='monto']")

            eventsSelect.setChoices(
                events.map(ev => ({ value: ev.id, label: `${ev.titulo} (Cuota ${ev.cuota})` , customProperties : ev })),
                'value',
                'label',
                false,
            );

            @if(old('event_id'))
                eventsSelect.setChoiceByValue(parseInt("{{ old('event_id') }}"))
            @endif

            eventsSelect.passedElement.element.addEventListener(
                'addItem',
                function(event) {
                    console.log(event.detail)


                    inputCuotas.value = event.detail.customProperties.cuota
                    let monto = inputMonto.value != "" ? new Decimal(inputMonto.value) : new Decimal(0)
                    let cuota = inputCuotas.value != "" ? new Decimal(inputCuotas.value) : new Decimal(0)

                    inputGanancia.value = cuota.mul(monto).toNumber().toFixed(2)
                },
                false,
            )

            inputMonto.addEventListener('input', function(event) {
                let monto = inputMonto.value != "" ? new Decimal(inputMonto.value) : new Decimal(0)
                let cuota = inputCuotas.value != "" ? new Decimal(inputCuotas.value) : new Decimal(0)
                inputGanancia.value = cuota.mul(monto).toNumber().toFixed(2)
            })


        })
    </script>
@stop
