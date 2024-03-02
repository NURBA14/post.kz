@extends('layouts.layout')

@section('title')
    {{ $title }}
@endsection

@section('header')
    @parent
@endsection

@section('main')
    <div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog"
        id="modalSignin">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow-lg">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">Registration</h1>
                </div>
                <div class="modal-body p-5 pt-0">
                    <form action="{{ route('reg.store') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3 @error('name') is-invalid @enderror"
                                id="name" placeholder="Name" name="name" value="{{ old('name') }}">
                            <label for="name">Name</label>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control rounded-3 @error('email') is-invalid @enderror"
                                id="floatingInput" placeholder="name@example.com" name="email"
                                value="{{ old('email') }}">
                            <label for="floatingInput">Email address</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control rounded-3 @error('password') is-invalid @enderror"
                                id="floatingPassword" placeholder="Password" name="password">
                            <label for="floatingPassword">Password</label>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password"
                                class="form-control rounded-3 @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation" placeholder="Re-password" name="password_confirmation">
                            <label for="password_confirmation">Re-password</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-warning" type="submit">Sign up</button>
                        <small class="text-body-secondary">By clicking Sign up, you agree to the terms of use.</small>
                        <hr class="my-4">
                        <a href="{{ route('login.create') }}"><button class="w-100 mb-2 btn btn-lg rounded-3 btn-secondary"
                                type="button">Login</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
@endsection
