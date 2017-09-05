@extends('master')

@section('content')
    <div>
        <h3>Edit {{$encounter->name}}</h3>
    </div>

    <form method="post" action="{{route('encounter.update', $encounter->id)}}">
        <input type="hidden" name="_method" value="PUT" />
        {!! csrf_field() !!}
        @include('encounter.form')
    </form>
@endsection