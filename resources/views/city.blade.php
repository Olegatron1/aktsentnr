@extends('layouts.app')

@section('title', 'Город')

@section('header')
    <h5>{{ $city->name }}</h5>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="cityFilter" placeholder="Фильтр по городам">
            </div>
            <ul class="list-group" id="cityList">
                @foreach($cities as $cityItem)
                    <a href="{{ url($cityItem->slug) }}">
                        <li class="list-group-item @if($city->slug == $cityItem->slug) font-weight-bold @endif">{{ $cityItem->name }}</li>
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
