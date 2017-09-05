<div class="form-group">
    <label for="name">Name</label>
    <input class="form-control" id="name" name="name" value="{{old('name', $encounter->name)}}">
</div>
<div class="form-group">
    <label for="casting">Casting</label>
    <select class="form-control" id="casting" name="casting">
        <option value="0" {{old('casting', $encounter->casting) == 0 ? 'selected' : ''}}>No</option>
        <option value="1" {{old('casting', $encounter->casting) == 1 ? 'selected' : ''}}>Yes</option>
    </select>
</div>
<hr>
<div class="row">
    <div class="col-7">
        Name
    </div>
    <div class="col-5">
        Initiative
    </div>
</div>
<div id="characters">
    @if($encounter->characters->count() > 0)
    @foreach($encounter->characters as $character)
        <hr>
        <div class="row">
            <div class="col-7">
                <input class="form-control" name="character[name][]" value="{{$character->name}}">
            </div>
            <div class="col-5">
                <input class="form-control" name="character[initiative][]" value="{{$character->initiative}}">
            </div>
        </div>
    @endforeach
    @else
        <hr>
        <div class="row">
            <div class="col-7">
                <input class="form-control" name="character[name][]">
            </div>
            <div class="col-5">
                <input class="form-control" name="character[initiative][]">
            </div>
        </div>
    @endif
</div>
<hr>
<button type="button" class="btn btn-info" onclick="addRow()">Add character</button>
<hr>
<button class="btn btn-primary">Save</button>

@section('end')
    <script>
        var html = '<hr><div class="row">\n' +
            '    <div class="col-7">\n' +
            '        <input class="form-control" name="character[name][]">\n' +
            '    </div>\n' +
            '    <div class="col-5">\n' +
            '        <input class="form-control" name="character[initiative][]">\n' +
            '    </div>\n' +
            '</div>';

        function addRow() {
            $('#characters').append(html);
        }
    </script>
@endsection