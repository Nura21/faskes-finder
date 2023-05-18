<h6>Search Your Email</h6>
<div class="row">
    <div class="col-md-12">
        <nav class="navbar navbar-light bg-light">
            <form class="form-inline" action="{{ url(request()->segment(1).'/1/edit') }}" method="POST">
                @csrf
                @method('GET')
                <div class="row justify-content-between">
                    <input class="form-control mr-sm-2 @error('phone') is-invalid @enderror" type="email"
                        placeholder="Search" aria-label="Search" name="email">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </div>
            </form>
        </nav>
    </div>
</div>
