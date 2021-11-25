@extends('master')

@section('title', $album->title)

@section('content')

    <h1 class="text-center">{{ $album->title }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    @livewire('album-edit', ['album' => $album])
    
@endsection