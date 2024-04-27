@extends('base')

@section('stylesheets')
    <link rel="stylesheet" href="/css/repair-done/parts.css">
    <link rel="stylesheet" href="/css/repair-common/common.css">
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
            <a class="active" href="/repair-list/{{ $car->uuid }}">Opérations à effectuer</a>
            <hr />
            <a href="/repair-done-list/{{ $car->uuid }}">Travaux effectués</a>
        </div>

        <div class="content-wrapper">
            d
        </div>

        <div class="content-wrapper">
            f
        </div>
    </div>

@endsection

@section('scripts')

@endsection