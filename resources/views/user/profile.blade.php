@extends('layouts.layout')

@section('title')
    {{ $title }}
@endsection

@section('header')
    @parent
@endsection

@section('main')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">{{ $title }}</h1>
            </div>
        </div>
    </section>

    @include('layouts.alerts')

    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">

                <div class="col-md-4 mb-3">
                    <div class="card border border-warning">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Admin"
                                    class="rounded-circle" width="250px" height="250px">
                                <div class="mt-3">
                                    <h4>{{ auth()->user()->name }}</h4>
                                    <p class="text-muted font-size-sm">{{ auth()->user()->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3 border border-warning">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">Telegram</h6>
                                <span class="text-secondary">{{ auth()->user()->telegram }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">Instagram</h6>
                                <a
                                    href="{{ auth()->user()->instagram }}"class="text-secondary">{{ auth()->user()->instagram }}</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card mb-3 border border-warning">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ auth()->user()->name }}
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <a href="mailto:{{ auth()->user()->email }}">{{ auth()->user()->email }}</a>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Registration date</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ auth()->user()->created_at }}
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Posts count</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $posts_count }}
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-outline-warning" href="{{ route('user.profile.edit') }}">Edit</a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent
@endsection
