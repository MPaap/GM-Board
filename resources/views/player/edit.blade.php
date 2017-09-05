@extends('master')

@section('content')
    <div>
        <h3>Edit {{$player->name}}</h3>
    </div>

    <form method="post" action="{{route('player.update', $player->id)}}">
        <input type="hidden" name="_method" value="PUT" />
        {!! csrf_field() !!}
        @include('player.form')
    </form>
@endsection