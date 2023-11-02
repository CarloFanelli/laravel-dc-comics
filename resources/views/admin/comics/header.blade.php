<header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary px-2">
        <a class="navbar-brand" href="">COMICS</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav w-100 m-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home') }}" aria-current="page">Home User <span
                            class="visually-hidden">(current)</span></a>
                </li>

                <li class="nav-item ms-auto">
                    <a class="nav-link" href="{{ route('comics.create') }}">add comic<i class="fa fa-user"
                            aria-hidden="true"></i></a>
                </li>

            </ul>

        </div>
    </nav>
</header>
