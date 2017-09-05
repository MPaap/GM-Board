@extends('master')

@section('content')
    @foreach($encounters as $encounter)
        <div class="card" style="margin-bottom: 1rem;">
            <a href="{{route('encounter.show', $encounter->id)}}">
                <div class="card-body">
                    <h4 class="card-title">
                        @if($encounter->casting)
                            <span class="fa fa-eye"></span>
                        @endif
                        {{$encounter->name}}({{$encounter->characters->count()}})
                    </h4>
                </div>
            </a>
        </div>
    @endforeach

    <div style="padding: 2rem 0"></div>
    <a href="{{route('encounter.create')}}" class="floating-add">
        <span class="fa fa-plus"></span>
    </a>
@endsection