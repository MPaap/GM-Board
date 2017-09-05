@extends('master')

@section('content')
    @foreach($players as $player)
        @include('player.card')
    @endforeach

    <div style="padding: 2rem 0"></div>
    <a href="{{route('player.create')}}" class="floating-add">
        <span class="fa fa-plus"></span>
    </a>
@endsection