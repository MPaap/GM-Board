@foreach($players as $player)
    <div class="card" style="margin-bottom: 1rem;">
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
                <div class="pt-3">
                    <div class="progress">
                        <div class="progress-bar {{$player->getBgColor() }}" role="progressbar" style="width: {{($player->hit_points/$player->max_hit_points)*100}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </p>
        </div>
    </div>
@endforeach