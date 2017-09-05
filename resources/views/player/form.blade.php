<div class="form-group">
    <label for="name">Name</label>
    <input class="form-control" id="name" name="name" value="{{old('name', $player->name)}}">
</div>
<div class="form-group">
    <label for="real_name">Real name</label>
    <input class="form-control" id="real_name" name="real_name" value="{{old('real_name', $player->real_name)}}">
</div>
<div class="form-group">
    <label for="hit_points">Hit points</label>
    <input type="number" class="form-control" name="hit_points" id="hit_points" value="{{old('hit_points', $player->hit_points)}}">
</div>
<div class="form-group">
    <label for="max_hit_points">Max hit points</label>
    <input type="number" class="form-control" name="max_hit_points" id="max_hit_points" value="{{old('max_hit_points', $player->max_hit_points)}}">
</div>
<div class="form-group">
    <label for="defence">Defence</label>
    <input type="number" class="form-control" name="defence" id="defence" value="{{old('defence', $player->defence)}}">
</div>
<button class="btn btn-primary">Save</button>