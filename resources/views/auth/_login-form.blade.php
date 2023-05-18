<div class="input-group mb-3">
    <input type="email" class="form-control  @error('email') is-invalid @enderror" placeholder="email" name="email"
        id="email">
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-envelope"></span>
        </div>
    </div>
</div>
<div class="input-group mb-3">
    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password"
        name="password" id="password">
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-lock"></span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary btn-block" id="login">Sign In</button>
    </div>
</div>
