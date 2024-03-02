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

    <div class="container">
        <form action="{{ route('post.store') }}" class="mt-5" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    placeholder="Title" type="text" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div><br>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" cols="30"
                    rows="5" placeholder="Content">{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div><br>
            <div class="form-group">
                <label for="rubric_id">Rubric</label>
                <select class="form-control @error('rubric_id') is-invalid @enderror" name="rubric_id" id="rubric_id">
                    <option>Select rubric</option>
                    @foreach ($rubrics as $key => $title)
                        <option value="{{ $key }}" @if (old('rubric_id') == $key) selected @endif>
                            {{ $title }}</option>
                    @endforeach
                </select>
                @error('rubric_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div><br>

            <div class="form-group">
                <div class="mb-3">
                    <label for="img" class="form-label">Image</label>
                    <input class="form-control form-control-sm @error('img') is-invalid @enderror" id="img"
                        type="file" name="img">
                    @error('img')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button class="btn btn-primary" type="submit">SEND</button>
        </form>
    </div>
@endsection

@section('footer')
    @parent
@endsection
