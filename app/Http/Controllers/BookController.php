<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Select all books
    public function index()
    {
        $books = Book::with('category')->get();
        $page_title = 'Book List';
        return view(
            'books.books',
            compact('books', 'page_title')
        );
    }

    // Show add book page
    public function create()
    {
        $page_title = 'Add Book';
        $categories = Category::all();
        return view(
            'books.create',
            compact('categories', 'page_title')
        )->with('route', route('books.store'));
    }

    // Add book logic
    public function store(Request $request)
    {
        $custom_messages = [
            'required' => ':attribute column must be filled!',
            'unique' => ':attribute :value already exist!'
        ];

        $custom_attributes = [
            'isbn' => 'ISBN',
            'title' => 'Title',
            'author' => 'Author',
            'price' => 'Price',
            'categoryid' => 'Category'
        ];

        $validated_data = $request->validate([
            'isbn' => 'required|unique:books',
            'title' => 'required',
            'author' => 'required',
            'price' => 'required',
            'categoryid' => 'required'
        ], $custom_messages, $custom_attributes);

        Book::create($validated_data);

        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }

    public function edit($isbn)
    {
        $page_title = 'Edit Book';

        $book = Book::where('isbn', $isbn)->first();
        if (!$book) {
            abort(404, 'Book not found');
        }

        $categories = Category::all();
        return view(
            'books.edit',
            compact('book', 'categories', 'page_title')
        )->with('route', route('books.update', ['isbn' => $book->isbn]));
    }

    public function update(Request $request, $isbn)
    {
        $book = Book::where('isbn', $isbn)->first();
        if (!$book) {
            abort(404, 'Book not found!');
        }

        $custom_messages = [
            'required' => ':attribute column must be filled!',
        ];

        $custom_attributes = [
            'title' => 'Title',
            'author' => 'Author',
            'price' => 'Price',
            'categoryid' => 'Category'
        ];

        $validated_data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'price' => 'required',
            'categoryid' => 'required'
        ], $custom_messages, $custom_attributes);

        if ($request->has('isbn') && $request->isbn !== $isbn) {
            return redirect()->back()->withErrors(['isbn' => 'ISBN can not be changed!']);
        }

        $book->update($validated_data);

        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    public function confirmDelete($isbn)
    {
        $page_title = 'Delete Book';

        $book = Book::where('isbn', $isbn)->first();
        if (!$book) {
            abort(404, 'Book not found');
        }

        $categories = Category::all();
        return view(
            'books.confirm-delete',
            compact('book', 'categories', 'page_title')
        )->with('route', route('books.destroy', ['isbn' => $book->isbn]));
    }

    public function destroy($isbn)
    {
        $book = Book::where('isbn', $isbn)->first();
        if (!$book) {
            abort(404, 'Book not found');
        }

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }
}
