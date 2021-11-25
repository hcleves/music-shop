<div>
    <select class="form-select" wire:model="selectedGenre">
        <option value=0>Select a genre</option>
        @foreach($genres as $genre)
        <option value="{{$genre->id}}">{{ $genre->name }}</option>
        @endforeach
    </select>

    <div>
        <table>
            @foreach($this->albums as $index=>$album)
            @if($index % 4 == 0)
            <tr>
                @endif
                <td>
                    <div>
                        <a href="/albums/{{ $album->id }}">
                            <img src="/images/{{ $album->cover_photo }}" alt="{{ $album->title }}" width="300"
                                height="300">
                        </a>
                    </div>
                <td>
                    @if($index % 4 == 3)
            </tr>
            @endif
            @endforeach
        </table>
    </div>