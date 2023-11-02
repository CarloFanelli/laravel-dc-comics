@extends('layouts.admin')

@section('title', 'HomePage')

@section('content')
    <h1>comics admin index</h1>



    <div class="container p-3">

        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">title</th>
                        <th scope="col">thumb</th>
                        <th scope="col">price</th>
                        <th scope="col">series</th>
                        <th scope="col">Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($comics as $comic)
                        <tr class="">
                            <td>{{ $comic['id'] }}</td>
                            <td scope="row">{{ $comic['title'] }}</td>
                            <td>

                                @if (str_contains($comic['thumb'], 'http'))
                                    <img style="width:30px" class="img-fluid" src="{{ $comic['thumb'] }}" alt="">
                                @else
                                    <img style="width:30px" class="img-fluid" src="{{ asset('storage/' . $comic->thumb) }}"
                                        alt="">
                                @endif

                            <td>{{ $comic['price'] }}</td>
                            <td>{{ $comic['series'] }}</td>
                            <td>
                                <a href=" {{ route('comics.show', $comic->id) }}  " class="btn btn-secondary">more</a>
                                <a href="#" class="btn btn-info">edit</a>
                                <a href="#" class="btn btn-danger">delete</a>

                            </td>
                        </tr>
                    @empty
                        <h2>no comics here!</h2>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

@endsection
