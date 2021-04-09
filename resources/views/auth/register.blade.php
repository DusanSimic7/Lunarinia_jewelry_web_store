@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark">{{ __('Registracija') }}</div>

                <div class="card-body bg-dark">
                    <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
                        @csrf

                        <div class="form-group row">
                            <label style="font-weight: normal" for="ime" class="col-md-4 col-form-label text-md-right">{{ __('Ime') }}</label>

                            <div class="col-md-6">
                                <input style="background: #e2e3e6" id="firstname" type="text" class="form-control @error('ime') is-invalid @enderror" name="ime" value="{{ old('ime') }}" required  autocomplete="ime" autofocus>
                                <div class="invalid-feedback">Molimo vas da unesete vaše ime.</div>

                                @error('ime')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style="font-weight: normal" for="prezime" class="col-md-4 col-form-label text-md-right">{{ __('Prezime') }}</label>

                            <div class="col-md-6">
                                <input style="background: #e2e3e6" id="lastname" type="text" class="form-control @error('prezime') is-invalid @enderror" name="prezime" required value="{{ old('prezime') }}"  autocomplete="prezime" autofocus>
                                <div class="invalid-feedback">Molimo vas da unesete vaše prezime.</div>

                                @error('prezime')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style="font-weight: normal" for="email" class="col-md-4 col-form-label text-md-right">{{ __('Imejl adresa') }}</label>

                            <div class="col-md-6">
                                <input style="background: #e2e3e6" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required value="{{ old('email') }}"  autocomplete="email">
                                <div class="invalid-feedback">Molimo vas da unesete vaš e-mail.</div>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style="font-weight: normal" for="telefon" class="col-md-4 col-form-label text-md-right">{{ __('Telefon') }}</label>

                            <div class="col-md-6">
                                <input style="background: #e2e3e6" id="phone" type="text" class="form-control @error('telefon') is-invalid @enderror" name="telefon" required value="{{ old('telefon') }}"  autocomplete="telefon" autofocus>
                                <div class="invalid-feedback">Molimo vas da unesete vaš telefon.</div>

                                @error('telefon')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style="font-weight: normal" for="država" class="col-md-4 col-form-label text-md-right">{{ __('Država') }}</label>

                            <div class="col-md-6">
                                <input style="background: #e2e3e6" id="country" type="text" class="form-control @error('drzava') is-invalid @enderror" name="drzava" required value="{{ old('drzava') }}"  autocomplete="drzava" autofocus>
                                <div class="invalid-feedback">Molimo vas da unesete vašu državu.</div>

                                @error('drzava')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style="font-weight: normal" for="grad" class="col-md-4 col-form-label text-md-right">{{ __('Grad i poštanski broj') }}</label>

                            <div class="col-md-6">
                                <input style="background: #e2e3e6" id="city" type="text" class="form-control @error('grad') is-invalid @enderror" name="grad" required value="{{ old('grad') }}"  autocomplete="grad" autofocus>
                                <div class="invalid-feedback">Molimo vas da unesete vaš grad.</div>

                                @error('grad')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style="font-weight: normal" for="ulica" class="col-md-4 col-form-label text-md-right">{{ __('Ulica i broj') }}</label>

                            <div class="col-md-6">
                                <input style="background: #e2e3e6" id="street" type="text" class="form-control @error('ulica') is-invalid @enderror" name="ulica" required value="{{ old('ulica') }}"  autocomplete="ulica" autofocus>
                                <div class="invalid-feedback">Molimo vas da unesete vašu ulicu.</div>

                                @error('ulica')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style="font-weight: normal" for="password" class="col-md-4 col-form-label text-md-right">{{ __('Šifra') }}</label>

                            <div class="col-md-6">
                                <input style="background: #e2e3e6" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required  autocomplete="new-password">
                                <div class="invalid-feedback">Molimo vas da unesete šifru.</div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style="font-weight: normal" for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Potvrdi šifru') }}</label>

                            <div class="col-md-6">
                                <input style="background: #e2e3e6" id="password-confirm" type="password" class="form-control" name="password_confirmation" required  autocomplete="new-password">
                                <div class="invalid-feedback">Molimo vas da potvrdite vašu šifru.</div>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registruj se') }}
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
