@extends('master')

@section('content')
    <div>
        <h3>Create a new player</h3>
    </div>

    <form method="post" action="{{route('player.store')}}">
        {!! csrf_field() !!}
        @include('player.form')
    </form>
@endsection