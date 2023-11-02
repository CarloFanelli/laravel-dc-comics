@extends('layouts.app')

@section('title', 'HomePage')

@section('content')
    <h1>comics</h1>

    <div class="container">
        <div class="row">
            @foreach ($comics as $comic)
                <div class="col-6 col-md-4 col-lg-3 g-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <h4>{{ $comic['title'] }}</h4>
                            <div class="details d-flex justify-content-between">
                                <span>{{ $comic['price'] }}</span>
                                <span>{{ $comic['series'] }}</span>
                            </div>
                        </div>
                        <div class="card-body">

                            @if (str_contains($comic['thumb'], 'http'))
                                <img style="" class="img-fluid" src="{{ $comic['thumb'] }}" alt="">
                            @else
                                <img style="" class="img-fluid" src="{{ asset('storage/' . $comic->thumb) }}"
                                    alt="">
                            @endif
                        </div>
                        <div class="card-footer">
                            <div class="details d-flex justify-content-between">
                                <span>{{ $comic['sale_date'] }}</span>
                                <span>{{ $comic['type'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
