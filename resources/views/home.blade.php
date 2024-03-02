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
            <div class="col-lg-6 col-md-8 mx-auto ">
                <h1 class="fw-light">{{ $title }}</h1>
            </div>
        </div>
    </section>

    @include('layouts.alerts')
    @include('layouts.errors')

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($posts as $post)
                    <div class="col">
                        <div class="card shadow-sm border-warning">
                            <img src="{{ asset('storage/' . $post->img) }}" class="post-img card-img-top" alt="...">
                            <div class="card-body">
                                <h4 class="card-text">{{ Str::limit($post->title, 20, '...') }}</h4>
                                <a href="{{ route('user.bridge', ['id' => $post->user->id]) }}"
                                    class="text-warning">{{ $post->user->name }}</a><br>
                                <em>{{ $post->rubric->title }}</em>
                                <p class="card-text">{{ Str::limit($post->content, 45, '...') }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('post.view', ['id' => $post->id]) }}"
                                            class="btn btn-sm text-warning btn-outline-warning">See more
                                            details</a>
                                    </div>
                                    <small class="text-body-secondary">{{ $post->created_at }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="pagination justify-content-center mt-5">
                {{ $posts->onEachSide(2)->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>
    </div>
@endsection

@section('footer')
    @parent
@endsection
