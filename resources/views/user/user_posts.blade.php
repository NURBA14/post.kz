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
                                @if (auth()->user()->avatar)
                                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Admin"
                                        class="rounded-circle" width="250px" height="250px">
                                @else
                                    <img src="{{ asset('storage/users_avatar/default/default.jpg') }}" alt="Admin"
                                        class="rounded-circle" width="250px" height="250px">
                                @endif
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
                            <div class="row gutters-sm">
                                @foreach ($posts as $post)
                                    <div class="col-sm-6 mb-3">
                                        <div class="card h-100 border border-warning">
                                            <img src="{{ asset('storage/' . $post->img) }}" class="post-img card-img-top"
                                                alt="...">
                                            <div class="card-body">
                                                <h4 class="card-text">{{ $post->title }}</h4>
                                                Rubric: <em>{{ $post->rubric->title }}</em><br>
                                                Comments: <em>{{ $post->comments_count }}</em>
                                                <p class="card-text">{{ Str::limit($post->content, 60, '...') }}</p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                        <a href="{{ route('post.view', ['id' => $post->id]) }}"
                                                            class="btn btn-sm text-warning btn-outline-warning">See more
                                                            details</a>
                                                        <a href="{{ route('user.profile.post.edit', ['id' => $post->id]) }}"
                                                            class="btn btn-sm text-dark btn-warning">Edit</a>
                                                        <a
                                                            href="{{ route('user.profile.post.delete', ['id' => $post->id]) }}"><button
                                                                class="btn btn-sm text-light btn-danger"
                                                                type="button">Delete</button></a>
                                                    </div>
                                                    <small class="text-body-secondary">{{ $post->created_at }}</small>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="pagination justify-content-center mt-5">
                            {{ $posts->onEachSide(2)->links('vendor.pagination.bootstrap-4') }}
                        </div>

                    </div>
                </div>

            </div>
        </div>
    @endsection

    @section('footer')
        @parent
    @endsection
