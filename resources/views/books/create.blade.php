@extends('layouts.book_main')
@section('card-body')
    <form action="{{ $route }}" method="post">
        @csrf
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn" id="isbn" class="form-control" maxlength="13" value="{{ old('isbn') }}"
                @error('isbn') is-invalid @enderror>
            @error('isbn')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" maxlength="100"
                value="{{ old('title') }}" @error('title') is-invalid @enderror>
            @error('title')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" id="author" class="form-control" maxlength=50"
                value="{{ old('author') }}" @error('author') is-invalid @enderror>
            @error('author')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" step="0.01" value="{{ old('price') }}"
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
                <option value="" {{ old('categoryid') == null ? 'selected' : '' }} disabled>--- Select Category ---
                </option>
                @foreach ($categories as $category)
                    <option value="{{ $category->categoryid }}"
                        {{ old('categoryid') == $category->categoryid ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('categoryid')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add Book</button>
        <a href="/books" class="btn btn-secondary">Back</a>
    </form>
@endsection
