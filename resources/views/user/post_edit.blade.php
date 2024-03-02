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
                </div>

                <div class="col-md-8">
                    <div class="card mb-3 border border-warning">
                        <div class="card-body">

                            <form action="{{ route('user.profile.post.store', ['id' => $post->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <img src="{{ asset("storage/$post->img") }}" alt="">
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Title</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control form-control-sm @error('title') is-invalid @enderror"
                                            value="{{ $post->title }}" name="title">
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Content</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control form-control-sm @error('content') is-invalid @enderror" name="content" id="" cols="10" rows="5">{{ $post->content }}</textarea>
                                        @error('content')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Img</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="form-control form-control-sm @error('img') is-invalid @enderror" id="img" name="img"
                                            type="file">
                                            @error('img')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Rubric</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select class="form-control @error('rubric_id') is-invalid @enderror" name="rubric_id" id="rubric_id">
                                            <option value="{{ $post->rubric->id }}">{{ $post->rubric->title }}
                                            </option>
                                            @foreach ($rubrics as $key => $title)
                                                <option value="{{ $key }}">{{ $title }}</option>
                                            @endforeach
                                        </select>
                                        @error('rubric_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-10">
                                        <button class="btn btn-outline-warning" type="submit">Save</button>
                                    </div>
                                    <div class="col-sm-1">
                                        <a href="{{ route('user.profile.post.delete', ['id' => $post->id]) }}"><button
                                                class="btn btn-danger" type="button">Delete</button></a>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('footer')
        @parent
    @endsection
