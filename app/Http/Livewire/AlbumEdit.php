<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Track;

class AlbumEdit extends Component
{
    public $album = null;
    public $tracks = null;

    public $orderTracks = [];

    public function mount($album){
        $this->album = $album;
        $this->tracks = Track::where('album_id', $this->album->id)->orderBy("number")->get();
        foreach($this->tracks as $track){
            $this->orderTracks[] = [
                'id' => $track->id,
                'title' => $track->title,
                'number' => $track->number
            ];
        };
   }

    public function addTrack(){
        $this->orderTracks[] = [
            'id'=>null,'number'=>null,'title'=>' '
        ];
    }

    public function removeTrack($index){
        unset($this->orderTracks[$index]);
        array_values($this->orderTracks);
    }

    public function render()
    {
        return view('livewire.album-edit');
    }
}
