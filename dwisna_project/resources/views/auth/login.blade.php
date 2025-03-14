@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="form-group row">
    <label for="username" class="col-md-4 col-form-label text-md-right">Username/Email</label>
    <div class="col-md-6">
        <input id="username" type="text" 
            class="form-control @error('username') is-invalid @enderror" 
            name="username" value="{{ old('username') }}" 
            required autocomplete="username" autofocus>

        @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row mt-3">
    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
    <div class="col-md-6">
        <input id="password" type="password" 
            class="form-control @error('password') is-invalid @enderror" 
            name="password" required autocomplete="current-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row mt-3">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            Login
        </button>
    </div>
</div>
