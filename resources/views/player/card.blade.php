<div class="card" style="margin-bottom: 1rem;">
    <a href="{{route('player.show', $player->id)}}">
        <div class="card-body">
            <h4 class="card-title">
                {{$player->name}}<br>
                <small>{{$player->real_name}}</small>
            </h4>
            <p class="card-text">
                <div class="d-inline-block pr-4">
                    @if($player->hit_points > 0)
                        <span class="fa fa-heart"></span> {{$player->hit_points}}
                    @else
                        <span class="fa fa-heart-o"></span> {{$player->hit_points}}
                    @endif
                    / {{$player->max_hit_points}}
                </div>
                <div class="d-inline-block">
                    <span class="fa fa-shield"></span> {{$player->defence}}
                </div>
            </p>
        </div>
    </a>
</div>