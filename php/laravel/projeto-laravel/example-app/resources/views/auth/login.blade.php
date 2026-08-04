@extends('layouts.app')

@section('content')
<div class="flex justify-content-center">
    <div class="col-md-5 mx-auto bg-gray-500 border border-gray-800 rounded-lg m-2 p-2">
        <div class="card shadow-lg border-0 bg-secondary text-white">
            <div class="card-header bg-dark text-white">{{ __('Login') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control text-black"
                            style=" background:#ffffff;
                            border:2px solid  #353535;
                            border-radius:5px;
                            " name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control text-black"
                                style=" background:#ffffff;
                                border:2px solid #353535;
                                border-radius:5px;
                                " name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-dark w-100 border border-gray-800 rounded-lg m-2 hover:bg-gray-800 transition ease-in-out duration-300 cursor-pointer" style="height:48px; font-size:17px;">
                                Login
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
