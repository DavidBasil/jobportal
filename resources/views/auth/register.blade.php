@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        {{-- <div class="card-header">{{ __('Job Seeker Registration') }}</div> --}}

        <div class="card-body pt-4">
          <form method="POST" action="{{ route('register') }}">
            @csrf

            <input type="hidden" name="user_type" value="seeker">

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right font-weight-bold"><h6>{{ __('Name') }}</h6></label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right font-weight-bold"><h6>{{ __('E-Mail Address') }}</h6></label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
            </div>

            {{-- dob --}}	
            <div class="form-group row">
              <label for="dob" class="col-md-4 col-form-label text-md-right font-weight"><h6>{{ __('Date of birth') }}</h6></label>

              <div class="col-md-6">
                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob">

                @error('dob')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
            </div>

            {{-- gender --}}
            <div class="form-group row mb-0">
              <label for="dob" class="col-md-4 col-form-label text-md-right font-weight-bold"><h6>{{ __('Gender') }}</h6></label>

              <div class="form-check form-check-radio mt-1">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="exampleRadios" value="male" >
                  <span class="form-check-sign"></span>
                Male
                </label>
              </div>

              <div class="form-check form-check-radio mt-1 ml-2">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="gender" value="female" value="option1" >
                  <span class="form-check-sign"></span>
                Female
                </label>
              </div>

              {{-- <div class="col-md-6"> --}}
              {{--   <input type="radio" name="gender" value="male" class="form-check-input" required> Male --}}
              {{--   <input type="radio" name="gender" value="female" class="form-check-input"> Female --}}

                @error('gender')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
            </div>

            {{-- password --}}
            <div class="form-group row mt-0">
              <label for="password" class="col-md-4 col-form-label text-md-right font-weight-bold"><h6>{{ __('Password') }}</h6></label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right font-weight-bold"><h6>{{ __('Confirm Password') }}</h6></label>

              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary btn-block text-uppercase font-weight-bold">
                  {{ __('Register') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
