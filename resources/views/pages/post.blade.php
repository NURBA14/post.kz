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
                                <img src="{{ asset($post->user->getAvatar()) }}" alt="Admin" class="rounded-circle"
                                    width="250px" height="250px">
                                <div class="mt-3">
                                    <a class="text-warning" href="{{ route('user.bridge', ['id' => $post->user->id]) }}">
                                        <h4>{{ $post->user->name }}</h4>
                                    </a>
                                    <p class="text-muted font-size-sm">{{ $post->user->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    @auth
                        <div class="card border border-warning align-items-center">
                            <br>
                            <h2>Add comment</h2>
                            <form action="{{ route('comment.store', ['post_id' => $post->id]) }}"
                                class="row gy-2 gx-3 align-items-center" method="POST">
                                @csrf
                                <div class="col-auto">
                                    <label class="visually-hidden" for="comment">Comment</label>
                                    <textarea name="text" class="form-control @error('text') is-invalid @enderror" id="comment" cols="25"
                                        rows="1"></textarea>
                                </div>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div><br><br><br>
                            </form>
                            <br>
                        </div>
                    @endauth

                </div>

                <div class="col-md-8">
                    <div class="card mb-3 border border-warning">
                        <div class="card-body">
                            <div class="row">
                                <img src="{{ asset("storage/$post->img") }}" alt="">
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Title</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $post->title }}
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Content</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $post->content }}
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Rubric</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $post->rubric->title }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                </div>


                <div class="col-md-8">
                    <div class="card mb-3 border border-warning">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <h1>Comments:</h1>
                            </div>
                            <br>
                            @foreach ($comments as $comment)
                                <div class="card border border-warning">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="d-flex flex-column align-items-center mt-3 mb-3">
                                                <img src="{{ asset($comment->user->getAvatar()) }}" alt="Admin"
                                                    class="rounded-circle" width="70px" height="70px">
                                            </div>
                                        </div>
                                        <div
                                            class="col-sm-10 d-flex flex-column align-items-start justify-content-center text-secondary">
                                            {{ $comment->user->name }}<br>
                                            <p>{{ $comment->text }}</p>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            @endforeach()
                        </div>
                    </div>
                </div>


            </div>
        </div>
    @endsection

    @section('footer')
        @parent
    @endsection
