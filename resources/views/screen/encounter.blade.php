@if($encounter)
    @foreach($encounter->characters as $character)
        <div class="card {{$character->id == $encounter->character_id ? 'bg-success' : ''}}" style="margin-bottom: 1rem;">
            <div class="card-body">
                <h4 class="card-title">
                    {{$character->name}}
                </h4>
            </div>
        </div>
    @endforeach
@endif