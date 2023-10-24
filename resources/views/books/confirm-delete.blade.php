@extends('layouts.book_main')
@section('card-body')
    <h5>Are you sure you want to delete this book?</h5>
    <form action="{{ $route }}" method="post">
        @csrf
        @method('DELETE')
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn" id="isbn" class="form-control" disabled value="{{ $book->isbn }}">
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" disabled value="{{ $book->title }}">
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" id="author" class="form-control" value="{{ $book->author }}" disabled>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" step="0.01" value="{{ $book->price }}"
                class="form-control" disabled>
        </div>
        <div class="form-group">
            <label for="categoryid">Category</label>
            <input type="text" name="categoryid" id="categoryid" class="form-control" value="{{ $book->category->name }}"
                disabled>
        </div>
        <button type="submit" class="btn btn-danger">Delete Book</button>
        <a href="/books" class="btn btn-secondary">Back</a>
    </form>
@endsection
