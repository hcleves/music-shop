<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AlbumCreate extends Component
{
    public $tracks = [];

    public $orderTracks = [];

    public function mount(){
        $this->tracks = [];
        $this->orderTracks = [
            ['number'=>1,'title'=>' ']
        ];
    }

    public function addTrack(){
        $this->orderTracks[] = [
            'number'=>'1','title'=>' '
        ];
    }

    public function removeTrack($index){
        unset($this->orderTracks[$index]);
        array_values($this->orderTracks);
    }

    public function render()
    {
        return view('livewire.album-create');
    }
}
