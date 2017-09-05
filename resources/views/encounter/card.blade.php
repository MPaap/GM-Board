<div class="card" style="margin-bottom: 1rem;">
    <a href="{{route('player.show', $player->id)}}">
        <div class="card-body">
            <h4 class="card-title">
                {{$player->name}}<br>
                <small>{{$player->real_name}}</small>
            </h4>
            <p class="card-text">
                @if($player->hit_points > 0)
                    <span class="fa fa-heart"></span> {{$player->hit_points}}
                @else
                    <span class="fa fa-heart-o"></span> {{$player->hit_points}}
                @endif
            </p>
        </div>
    </a>
</div>