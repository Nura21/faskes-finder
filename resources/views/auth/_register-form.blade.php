<div class="input-group mb-3">
    <input type="name" class="form-control @error('name') is-invalid @enderror" placeholder=""
        name="name" id="name" required>
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-user"></span>
        </div>
    </div>
</div>
<div class="input-group mb-3">
    <input type="text" class="form-control @error('email') is-invalid @enderror"
        placeholder="email" name="email" id="email" required>
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-envelope"></span>
        </div>
    </div>
</div>
<div class="input-group mb-3">
    <input type="password" class="form-control @error('password') is-invalid @enderror"
        placeholder="Password" name="password" id="password" required>
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-lock"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-8">
        <div class="icheck-primary">
            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
            <label for="agreeTerms">
                I agree to the <a href="#">terms</a>
            </label>
        </div>
    </div>
    <div class="col-4">
        <button type="submit" class="btn btn-primary btn-block">{{ ucfirst(request()->segment(1)) }}</button>
    </div>
</div>
