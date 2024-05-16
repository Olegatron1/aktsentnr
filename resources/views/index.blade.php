@extends('layouts.app')

@section('title', 'Главная страница')

@section('header')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="cityFilter" placeholder="Фильтр по городам">
            </div>
            <ul class="list-group" id="cityList">
                @foreach($cities as $city)
                    <a href="/{{$city->slug}}">
                        <li class="list-group-item">{{ $city->name }}</li>
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
