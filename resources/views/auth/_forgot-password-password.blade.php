<h6>Write your password!</h6>
<div class="row">
    <div class="col-md-12">
        <nav class="navbar navbar-light bg-light">
            <form action="{{ url('forgot-password/1') }}" method="POST" id="loginForm">
                @method('PATCH')
                @csrf
                <input type="hidden" name="email" value="{{ $email ?? '' }}">
                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder="write your password!"
                        class="form-control">
                </div>

                <button type="submit" class="btn btn-primary btn-block" name="submit" id="submit"
                    classForm="col-4">Submit</button>
            </form>
        </nav>
    </div>
</div>
