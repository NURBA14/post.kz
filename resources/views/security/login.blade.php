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
            @include('layouts.errors')
            <div class="modal-content rounded-4 shadow-lg">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">Login</h1>
                </div>
                <div class="modal-body p-5 pt-0">

                    <form action="{{ route('login.store') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control rounded-3 @error('email') is-invalid @enderror"
                                id="email" placeholder="name@example.com" name="email">
                            <label for="email">Email address</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control rounded-3 @error('password') is-invalid @enderror"
                                id="Password" placeholder="Password" name="password">
                            <label for="Password">Password</label>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-check text-start my-3">
                            <input class="form-check-input" type="checkbox" value="true" id="remember_me"
                                name="remember_me">
                            <label class="form-check-label" for="remember_me">
                                Remember me
                            </label>
                        </div>

                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-warning" type="submit">Login</button>
                        <hr class="my-4">
                        <a href="{{ route('reg.create') }}"><button class="w-100 mb-2 btn btn-lg rounded-3 btn-secondary"
                                type="button">Sign up</button></a>
                    </form>

                </div>
            </div>
            <br><br><br><br><br><br>
        </div>
    </div>
@endsection

@section('footer')
@endsection
