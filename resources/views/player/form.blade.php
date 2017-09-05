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
<button class="btn btn-primary">Save</button>