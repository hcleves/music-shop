@extends('master')

@section('title', $album->title)

@section('content')

<div>
    <div>
        <div class="col-xs-6">

            <img src="/images/{{$album->cover_photo}}" alt="{{$album->title}}" class="float-start img-fluid"
                style="max-width:50%">
            <h1><b>{{ $album->title }}<b></h1>
            <h3>{{ $album->artist->name }}</h3>
            <h4>{{ $album->genre->name }} - R${{ $album->price}}</h4>
        </div>
        <br>

        <div class="card">
            <table class="table">
                @foreach($tracks as $song)
                <tr>
                    <td>{{ $song->number}}</td>
                    <td>{{ $song->title }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div>
            <div>


                <a class="btn btn-primary float-end" href={{ "/albums/" .strval($album->id)."/edit" }} >Edit</a>

                @endsection