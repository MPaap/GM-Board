@extends('master')

@section('content')
    <div class="card" style="margin-bottom: 1rem;">
        <div class="card-body">
            <h4 class="card-title">
                {{$player->name}}<br>
                <small>{{$player->real_name}}</small>
            </h4>
            <p class="card-text">
                <div class="form-group">
                    <label for="hit_points">Hit points (max {{$player->max_hit_points}})</label>
                    <input type="number" class="form-control" name="hit_points" id="hit_points" value="{{old('hit_points', $player->hit_points)}}">
                </div>

                <div style="padding:0 0 0.5rem">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-block btn-danger" onclick="lose(1);"><span class="fa fa-heart"></span> -1</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-block btn-success" onclick="add(1);"><span class="fa fa-heart"></span> +1</button>
                        </div>
                    </div>
                </div>
                <div style="padding:0 0 0.5rem">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-block btn-danger" onclick="lose(5);"><span class="fa fa-heart"></span> -5</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-block btn-success" onclick="add(5);"><span class="fa fa-heart"></span> +5</button>
                        </div>
                    </div>
                </div>
                <div style="padding:0 0 0.5rem">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-block btn-danger" onclick="lose(10);"><span class="fa fa-heart"></span> -10</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-block btn-success" onclick="add(10);"><span class="fa fa-heart"></span> +10</button>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-block btn-primary" onclick="updateHP();">Update</button>
            </p>
        </div>
    </div>

    <div style="padding: 2rem 0"></div>
    <a href="{{route('player.edit', $player->id)}}" class="floating-add">
        <span class="fa fa-pencil"></span>
    </a>
@endsection

@section('end')
    <script>
        var max = {{$player->max_hit_points}};

        $('#hit_points').change(function () {
            var hp = parseInt($('#hit_points').val());
            if (max && hp > max) {
                hp = max;
            }
            if (hp < 0) {
                hp = 0;
            }
            $('#hit_points').val(hp);
        });

        function add(amount) {
            var hp = parseInt($('#hit_points').val()) + amount;
            if (max && hp > max) {
                hp = max;
            }
            $('#hit_points').val(hp);
        }

        function lose(amount) {
            var hp = parseInt($('#hit_points').val()) - amount;
            if (hp < 0) {
                hp = 0;
            }
            $('#hit_points').val(hp);
        }

        function updateHP() {
            var hp = $('#hit_points').val();
            var data = {
                _token: '{{csrf_token()}}',
                hit_points: hp
            };
            axios.post('/player/{{$player->id}}/hp', data);
        }
    </script>
@endsection