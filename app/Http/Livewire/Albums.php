<?php

namespace App\Http\Livewire;
use App\Models\Album;
use App\Models\Genre;

use Livewire\Component;

class Albums extends Component
{
    public $selectedGenre = 0;
    public $albums;
    public $genres;
    public $teste = 10;

    public function Mount(){
        $this->genres = Genre::all();
        $this->albums = Album::all();
    }

    public function render()
    {   
        return view('livewire.albums');
    }

    public function updatedSelectedGenre($genre){
        $this->teste = $genre;
        error_log("there");
        if($genre == 0){
            $this->albums = Album::all();
        }else{
            error_log("Hello");
            $this->albums = Album::where('genre_id', $genre)->get();
            error_log($genre);
        }
    }
}
