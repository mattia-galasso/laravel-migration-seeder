@extends('layouts.master')

@section('title', 'Tabellone Orari')

@section('content')
<div class="card my-5">
    <div class="card-header fs-4 fw-bold d-flex justify-content-between align-items-center">
        <span class="text-warning">🚄 PARTENZE - {{ now()->format('d-m-Y') }}</span>
        <span class="text-secondary" id="clock"></span>
    </div>
    <div class="card-body">


        <table class="table table-hover text-center align-middle">
            <thead>
                <tr>
                    <th class="text-secondary" scope="col">ORARIO</th>
                    <th class="text-secondary" scope="col">CODICE</th>
                    <th class="text-secondary" scope="col">AZIENDA</th>
                    <th class="text-secondary" scope="col">DESTINAZIONE</th>
                    <th class="text-secondary" scope="col">BINARIO</th>
                    <th class="text-secondary" scope="col">CARR.</th>
                    <th class="text-secondary" scope="col">STATO</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($trains as $train)
                    @if ($train->is_cancelled)
                        <tr class="row-item">
                            <td class="opacity-25">
                                <span class="departure-time">{{ $train->departure_time->format('H:i') }}</span>
                            </td>
                            <td class="text-uppercase opacity-25 text-warning">{{ $train->train_code }}</td>
                            <td class="opacity-25">{{ $train->company }}</td>
                            <td class="opacity-25 text-decoration-line-through">{{ $train->arrival_station }}</td>
                            <td class="opacity-25">Bin. {{ $train->platform }}</td>
                            <td class="opacity-25">{{ $train->total_carriages }}</td>
                            <td class="opacity-25">
                                <span class="status-badge status-cancel">CANCELLATO</span>
                            </td>
                        </tr>
                    @else
                        <tr class="row-item">
                            <td>
                                <div class="d-flex flex-column">
                                    <span class="departure-time">{{ $train->departure_time->format('H:i') }}</span>
                                    @if (!$train->is_on_time)
                                    <span class="text-warning delay-time">+{{ $train->delay_minutes }} min</span>
                                    @endif
                                </div>
                            </td>
                            <td class="text-uppercase text-warning">{{ $train->train_code }}</td>
                            <td class="opacity-50">{{ $train->company }}</td>
                            <td>{{ $train->arrival_station }}</td>
                            <td class="opacity-75">Bin. {{ $train->platform }}</td>
                            <td class="opacity-50">{{ $train->total_carriages }}</td>
                            <td>
                                @if (!$train->is_on_time)
                                <span class="status-badge status-delay">RITARDO</span>
                                @else
                                <span class="status-badge status-green">IN ORARIO</span>
                                @endif
                            </td>
                        </tr>
                    @endif  
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-secondary">Nessun treno disponibile</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection












