@extends('master')

@section('title', 'Home')

@section('content')

    <h1 class="text-center">Criação de Album</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @livewire('album-create')
@endsection