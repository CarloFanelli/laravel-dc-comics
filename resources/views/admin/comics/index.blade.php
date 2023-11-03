@extends('layouts.admin')

@section('title', 'HomePage')

@section('content')
    <h1>comics admin index</h1>



    <div class="container p-3">


        @if (session('message'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Success</strong>
                {{ session('message') }}
            </div>

            <script>
                var alertList = document.querySelectorAll('.alert');
                alertList.forEach(function(alert) {
                    new bootstrap.Alert(alert)
                })
            </script>
        @endif

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
                                <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-info">edit</a>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal"
                                    data-bs-target="#modalId--{{ $comic->id }}">
                                    DELETE
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modalId--{{ $comic->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="modalTitleId--{{ $comic->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId--{{ $comic->id }}">Delete Comic
                                                    {{ $comic->title }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    Attenction! Destructive Operation
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('comics.destroy', $comic->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    var modalId--{{ $comic->id }} = document.getElementById('modalId--{{ $comic->id }}');

                                    modalId--{{ $comic->id }}.addEventListener('show.bs.modal', function(event) {
                                        // Button that triggered the modal
                                        let button = event.relatedTarget;
                                        // Extract info from data-bs-* attributes
                                        let recipient = button.getAttribute('data-bs-whatever');

                                        // Use above variables to manipulate the DOM
                                    });
                                </script>





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
