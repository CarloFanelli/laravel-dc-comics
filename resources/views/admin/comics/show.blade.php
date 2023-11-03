@extends('layouts.admin')

@section('title', 'comic')

@section('content')
    <h1></h1>

    <div class="p-3 mb-4 bg-light rounded-3">
        <div class="container">
            <div class="row">
                <div class="col">
                    <a name="edit" id="edit" class="btn btn-primary" href="{{ route('comics.edit', $comic->id) }}"
                        role="button">edit</a>
                </div>
            </div>
        </div>
        <div class="d-flex">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">{{ $comic->title }}</h1>
                <p class="col-md-8 fs-4">{{ $comic->description }}</p>
                <p class="fw-bold col-md-8 fs-4">{{ $comic->price }}</p>

                {{--             
            <a href="{{ route('index') }}" class="btn btn-primary btn-lg">back</a>
 --}}
            </div>
            <div class="container-fluid py-5">
                @if (str_contains($comic['thumb'], 'http'))
                    <img style="" class="img-fluid" src="{{ $comic['thumb'] }}" alt="">
                @else
                    <img style="" class="img-fluid" src="{{ asset('storage/' . $comic->thumb) }}" alt="">
                @endif
                <p class="m-0 col-md-8 fs-4">serie: {{ $comic->series }}</p>
                <p class="m-0 col-md-8 fs-4">release: {{ $comic->sale_date }}</p>
                <p class="m-0 col-md-8 fs-4">type: {{ $comic->type }}</p>
            </div>
        </div>

        @if ($comic['artists'])
            <h5 class="text-center">artists:</h5>
            <ul class="list-unstyled d-flex justify-content-evenly ">
                @foreach (json_decode($comic->artists) as $artist)
                    <li>{{ $artist }}</li>
                @endforeach
            </ul>
        @endif

        @if ($comic['writers'])
            <h5 class="text-center">writer:</h5>
            <ul class="list-unstyled d-flex justify-content-evenly ">
                @foreach (json_decode($comic->writers) as $writer)
                    <li>{{ $writer }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
