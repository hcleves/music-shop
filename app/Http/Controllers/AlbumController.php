<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\MessageBag;

use App\Models\Album;
use App\Models\Genre;
use App\Models\Artist;
use App\Models\Track;


class AlbumController extends Controller
{

    public function load_create_page()
    {
        return view('album_create');
    }

    public function receive_form_data(Request $request)
    {
        //validate request 
        $validated = $request->validate([
            'title' => 'required|max:255',
            'genre' => 'required|max:255',
            'cover_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'artist' => 'required|max:255',
            'price' => 'required'
        ]);


        //get form data
        $album = new Album();
        $album->title = $request->title;
        $artist = Artist::firstOrCreate(['name' => $request->artist]);
        $album->artist_id = $artist->id;
        $genre = Genre::firstOrCreate(['name' => $request->genre]);
        $album->genre_id = $genre->id;

        $imageName = md5_file($request->cover_photo) . '.' . $request->cover_photo->extension();

        $request->cover_photo->move(public_path('images'), $imageName);

        $album->cover_photo = $imageName;
        $album->price = $request->price;

        $errors = new MessageBag();
        try {
            $album->save();
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                $errors->add('title', 'Album ja existe');
            } else {
                $errors->add('title', 'Erro desconhecido');
            }

            return redirect('/')->withErrors($errors);
        }

        if ($request->orderTracks) {
            foreach ($request->orderTracks as $track) {
                $insert_track = new Track();
                $insert_track->title = $track['title'];
                $insert_track->album_id = $album->id;
                $insert_track->number = $track['number'];
                $insert_track->save();
            }
        }

        return redirect('/');
    }

    public function load_view_page($id)
    {
        $album = Album::findOrFail($id);
        $tracks = Track::where('album_id', $id)->orderBy("number")->get();
        return view('album_view', ['album' => $album, 'tracks' => $tracks]);
    }

    public function load_edit_page($id)
    {
        $album = Album::findOrFail($id);
        return view('album-edit', ['album' => $album]);
    }

    public function receive_edit_data($id, Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'genre' => 'required|max:255',
            'cover_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'artist' => 'required|max:255',
            'price' => 'required'
        ]);

        $album = Album::findOrFail($id);
        $album->title = $request->title;
        $artist = Artist::firstOrCreate(['name' => $request->artist]);
        $album->artist_id = $artist->id;
        $genre = Genre::firstOrCreate(['name' => $request->genre]);
        $album->genre_id = $genre->id;

        if ($request->cover_photo) {
            $imageName = md5_file($request->cover_photo) . '.' . $request->cover_photo->extension();

            $request->cover_photo->move(public_path('images'), $imageName);

            $album->cover_photo = $imageName;
        }

        $album->price = $request->price;
        $errors = new MessageBag();
        try {
            $album->save();
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                $errors->add('title', 'Album ja existe');
            } else {
                $errors->add('title', 'Erro desconhecido');
            }

            return redirect('/albums/' . $id . '/edit')->withErrors($errors);
        }

        $tracks = Track::where('album_id', $id)->orderBy('number', 'ASC')->get();
        foreach ($tracks as $track) {
            $found = 0;
            foreach ($request->orderTracks as $new_track) {
                if ($track->id == $new_track['id']) {
                    $found = 1;
                }
            }
            if ($found == 0) {
                $track->delete();
            }
        }
        foreach ($request->orderTracks as $track) {
            if ($track['title'] != null) {
                $insert_track = Track::firstOrNew(['id' => $track['id']]);
                $insert_track->title = $track['title'];
                $insert_track->album_id = $album->id;
                $insert_track->number = $track['number'];
                if ($track['id'] != null) {
                    $insert_track->id = $track['id'];
                }
                $insert_track->save();
            }
        }

        return redirect('/albums/' . $id);
    }
}
