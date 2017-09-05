@extends('master')

@section('content')
    <div class="card" style="margin-bottom: 1rem;">
        <div class="card-body">
            <h4 class="card-title">
                {{$encounter->name}}
            </h4>
            <p class="card-text">
                <button type="button" class="btn btn-block btn-primary" onclick="nextCharacter();">Next</button>
            </p>
        </div>
    </div>

    <div style="padding: 2rem 0"></div>
    <a href="{{route('encounter.edit', $encounter->id)}}" class="floating-add">
        <span class="fa fa-pencil"></span>
    </a>
@endsection

@section('end')
    <script>
        function nextCharacter() {
            axios.get('/encounter/{{$encounter->id}}/next');
        }
    </script>
@endsection