@extends('base')

@section('stylesheets')
    <link rel="stylesheet" href="/css/repair/parts.css">
    <link rel="stylesheet" href="/css/repair/switch-btn.css">
@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="custom-container">
        
        <div class="repair-nav">
            <a class="active" href="/repair-list">Opérations à effectuer</a>
            <hr />
            <a href="/">Travaux effectués</a>
        </div>

        <div class="content-wrapper">
            <form id="repair-form" method="POST" action="/repair/store/{{ $car->uuid }}">
                @csrf
                <div id="part-name-wrapper">
                    <div class="label-wrapper">
                        <span class="number">1</span><label for="part-name-input">pièce ou opération</label>
                    </div>
                    <input placeholder="Courroie de distribution" class="purple-input" type="text" name="part-name" id="part-name-input">
                </div>

                <div>

                    <div class="label-wrapper">
                        <span class="number">2</span>
                        <span>à remplacer au bout de</span>
                    </div>

                    <div id="km-time-inputs-wrapper">
                        <div class="input-group">
                            <input placeholder="ex: 160000" class="purple-input" type="text" name="km" id="km-input">
                            <label for="km-input">km</label>
                        </div>
                        
                        <span>et/ou</span>
                        <div id="time-inputs-wrapper">
                            <div class="input-group">
                                <input placeholder="ex: 6" class="purple-input" type="text" name="years" id="years-input">
                                <label for="years-input">année</label>
                            </div>

                            <div class="input-group">
                                <input placeholder="ex: 72" class="purple-input" type="text" name="months" id="months-input">
                                <label for="months-input">mois</label>
                            </div>
                        </div>
                    </div>

                </div>

                <div id="send-email-wrapper">
                    <div class="label-wrapper">
                        <span class="number">3</span>
                        <label for="switch-email">envoyer un email avant l'échéance (configurer ici)</label>
                    </div>
                    <!-- Rounded switch -->
                    <label class="switch">
                        <input type="checkbox" checked="checked">
                        <span class="slider round"></span>
                    </label>
                </div>

                <button type="submit" class="save-btn">Ajouter</button>
            </form>
        </div>

        <div class="content-wrapper">
            <table>

                <thead>
                    <tr>
                        <th colspan="5">Liste de vos pièces et opérations sur votre {{ $car->name }}</th>
                    </tr>
                    <tr>
                        <th colspan="1">Nom</th>
                        <th colspan="1">Intervalle (km)</th>
                        <th colspan="1">Intervalle (mois/année)</th>
                        <th colspan="1">Notification</th>
                        <th colspan="1">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($car->repairs as $repair)
                        <tr>
                            <th scope="row">{{ $repair->name }}</th>
                            <td>{{ $repair->km_interval }} km</td>
                           
                            <td>{{$repair->month_time_interval % 12 === 0 ? $repair->month_time_interval/12 : $repair->month_time_interval}} {{ ($repair->month_time_interval % 12 === 0) ? 'ans' : 'mois' }}</td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" {{$repair->is_notified ? "checked" : '' }}>
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            <td>Delete</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>

@endsection

@section('scripts')
    <script src="/js/repair/calculateDate.js"></script>
@endsection