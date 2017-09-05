@extends('master')

@section('content')
    <div>
        <h3>Create a new encounter</h3>
    </div>

    <form method="post" action="{{route('encounter.store')}}">
        {!! csrf_field() !!}
        @include('encounter.form')
    </form>
@endsection