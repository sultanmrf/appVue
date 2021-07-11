<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function getBooks()
    {
        $books = Book::query()->get();
        return view('index', ['books' => $books]);
    }
    public function index()
    {
        $books = Book::all()->toArray();
        return response()->json(['books' => $books]);
    }

    public function create(Request $request)
    {
         $book = new Book();
         $book->title = $request->title;
         $book->author = $request->author;
         $book->save();

      return response()->json('کتاب حدید اضافه شد','200');

    }

    public function edit($id)
    {
        $books = Book::query()->find($id);
        return response()->json(['book' => $books]);
    }

    public function update(Request $request,$id)
    {
        $book = Book::query()->find($id);
        $book->update([
            'title' => $request->title,
            'author' => $request->author
        ]);
        return response()->json('ویرایش شما با موفقیت انجام شد');
    }

    public function delete($id)
    {
        $book = Book::query()->find($id);
        $book->delete();
        return response()->json('کتاب مورد نظر با موفقیت حذف شد');

    }
}
