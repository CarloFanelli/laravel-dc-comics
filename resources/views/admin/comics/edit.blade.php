@extends('layouts.admin')

@section('title', 'create')

@section('content')

    <div class="container py-5">
        <h3>edit comic here!</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <form action="{{ route('comics.update', $comic) }}" method="POST" enctype="multipart/form-data">

                @csrf

                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId"
                        placeholder="inserti title" value="{{ $comic->title }}">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" name="price" id="price" aria-describedby="helpId"
                        placeholder="insert price" {{ $comic->price }}>
                </div>

                <div class="mb-3">
                    <label for="thumb" class="form-label">Choose file</label>
                    <input type="file" class="form-control" name="thumb" id="thumb" placeholder="select a file"
                        aria-describedby="fileHelpImg">
                    {{--                     <div id="fileHelpImg" class="form-text">Help text</div>
 --}}
                </div>

                <button type="submit" class="btn btn-primary">Send</button>

            </form>
        </div>
    </div>

@endsection
