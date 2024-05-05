@extends('base')

@section('stylesheets')
    <link rel="stylesheet" href="/css/repair-done/parts.css">
    <link rel="stylesheet" href="/css/repair-common/common.css">
@endsection

@section('content')

    <div class="custom-container">
        
        <div class="repair-nav">
            <a href="/repair-list/{{ $car->uuid }}">Opérations à effectuer</a>
            <hr />
            <a class="active" href="/repair-done-list/{{ $car->uuid }}">Travaux effectués</a>
        </div>

        <div class="content-wrapper">
            <form id="repair-done-form" method="POST" action="/repair-done/store/{{ $car->uuid }}">
                @csrf
                <label for="repair_id"></label>
                <select name="repair_id" id="repair_id">
                    <option value="" selected disabled hidden>Choose here</option>
                    @foreach($car->repairs as $repair)
                        <option value="{{$repair->uuid}}">{{$repair->name}}</option>
                    @endforeach
                </select>

                <label for="kilometers">Effectué à</label>
                <input type="text" name="kilometers" id="kilometers">
                <div>km</div>

                <label for="date_of_replacement">Effectué le</label>
                <input type="date" name="date_of_replacement" id="date_of_replacement">

                <button type="submit">Ajouter</button>
            </form>
        </div>

        <div class="content-wrapper">
            <table>
                <thead>
                    <tr>
                        <th colspan="3">Réparations effectuées depuis le début</th>
                    </tr>
                    <tr>
                        <th>Nom</th>
                        <th>Fait le</th>
                        <th>Kilométrage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($repairDones as $repairDone)
                        <tr>
                            <td>{{ $repairDone->repair->name }}</td>
                            <td>{{ $repairDone->date }}</td>
                            <td>{{ $repairDone->kilometers }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('scripts')

@endsection