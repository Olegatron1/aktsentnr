@extends('layouts.app')

@section('title', 'Город')

@section('header')
    <h5>{{ $city->name }}</h5>
@endsection

@section('content')
    <a href="{{ route('news.index', ['slug' => $city->slug]) }}">News</a>
@endsection
