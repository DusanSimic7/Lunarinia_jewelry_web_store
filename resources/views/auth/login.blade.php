@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark">{{ __('Login') }}</div>

                <div class="card-body bg-dark">
                    <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                        @csrf

                        <div class="form-group row">
                            <label style="font-weight: normal" for="inputEmail" class="col-md-4 col-form-label text-md-right">{{ __('Imejl adresa') }}</label>

                            <div class="col-md-6">
                                <input style="background: #e2e3e6" id="inputEmail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required value="{{ old('email') }}"  autocomplete="email" autofocus>
                                <div class="invalid-feedback">Molimo vas da unesete validnu e-mail adresu.</div>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style="font-weight: normal" for="password" class="col-md-4 col-form-label text-md-right">{{ __('Šifra') }}</label>

                            <div class="col-md-6">
                                <input style="background: #e2e3e6" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required  autocomplete="current-password">
                                <div class="invalid-feedback">Molimo vas da unesete validnu šifru.</div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

{{--                        <div class="form-group row">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                    <label class="form-check-label" for="remember">--}}
{{--                                        {{ __('Remember Me') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Uloguj se') }}
                                </button>


                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Zaboravili ste šifru?') }}
                                    </a><br>

                                @endif
                                <p style="font-weight: normal" class="mt-3 text-bold">Nemate nalog? <a class="text-blue" href="/register">Registruj se</a></p>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
