@extends('layouts.book_main')
@section('card-body')
    <form action="{{ $route }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn" id="isbn" class="form-control" disabled value="{{ $book->isbn }}">
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control"
                value="{{ old('title', $book->title) }}" @error('title') is-invalid @enderror>
            @error('title')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" id="author" class="form-control"
                value="{{ old('author', $book->author) }}" @error('author') is-invalid @enderror>
            @error('author')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" step="0.01" value="{{ old('price', $book->price) }}"
                class="form-control" @error('price') is-invalid @enderror>
            @error('price')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="categoryid">Category</label>
            <select name="categoryid" id="categoryid" class="form-control" @error('categoryid') is-invalid @enderror>
                <option value="" {{ old('categoryid', $book->categoryid) == null ? 'selected' : '' }} disabled>---
                    Select Category ---
                </option>
                @foreach ($categories as $category)
                    <option value="{{ $category->categoryid }}"
                        {{ old('categoryid', $book->categoryid) == $category->categoryid ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
            @error('categoryid')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit Book</button>
        <a href="/books" class="btn btn-secondary">Back</a>
    </form>
@endsection
