<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Format;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\TryCatch;

class BooksController extends Controller
{
    public function all()
    {

        // $books = Book::all();
        $books = Book::with(['format', 'genres'])->paginate(9);

        return view('books.index', [
            'books' => $books,
        ]);
    }

    public function view(int $id)
    {

        $book = Book::findOrFail($id);

        return view('books.view', [
            'book' => $book,
        ]);
    }

    public function createForm()
    {
        return view('books.create-form', [
            'formats' => Format::all(),
            'genres' => Genre::orderBy('name')->get(),
        ]);
    }

    public function createProcess(Request $request)
    {
        $request->validate(Book::VALIDATION_RULES, Book::VALIDATION_MESSAGES);

        $input = $request->only(['title', 'price', 'description', 'author', 'pages','format_fk', 'cover_description']);

        try {

            if($request->hasFile('cover')){
                $input['cover'] = $request->file('cover')->store('imgs');
            }

            DB::beginTransaction();

            $book = Book::create($input);

            $book->genres()->attach($request->input('genre_fk', []));

            DB::commit();
            
            return redirect()
                ->route('books.index')
                ->with('feedback.message', 'El libro ' . $input['title'] . ' se publicó con éxito.');
        }catch(\Exception $e){

            DB::rollback();

            return redirect()
                ->back(fallback: route('books.create.form'))
                ->withInput()
                ->with('feedback.message', 'Ocurrió un error y el libro no pudo ser agregado.')
                ->with('feedback.type', 'danger');
        }
    }

    public function editForm(int $id)
    {
        return view('books.edit-form', [
            'book' => Book::findOrFail($id),
            'formats' => Format::all(),
            'genres' => Genre::orderBy('name')->get(),
        ]);
    }

    public function editProcess(int $id, Request $request)
    {
        $request->validate(Book::VALIDATION_RULES, Book::VALIDATION_MESSAGES);

        $book = Book::findOrFail($id);

        $input = $request->only(['title', 'price', 'description', 'pages', 'author', 'format_fk','cover_description']);

        $oldCover = $book->cover;

        try{
            if($request->hasFile('cover')) {
                $input['cover'] = $request->file('cover')->store('imgs');
            }

            DB::beginTransaction();

            $book->update($input);

            $book->genres()->sync($request->input('genre_fk', []));

            DB::commit();

            if($request->hasFile('cover') && $oldCover !== null && Storage::exists($oldCover)) {
                Storage::delete($oldCover);
            }

            return redirect()
                ->route('books.index')
                ->with('feedback.message', 'El libro ' . e($book->title) . ' se editó con éxito.')
                ->with('feedback.type', 'success');
        }catch(\Exception $e){

            DB::rollback();

            return redirect()
                ->back(fallback: route('books.edit.form', ['id' => $id]))
                ->withInput()
                ->with('feedback.message', 'Ocurrió un error y el libro no pudo ser editado.')
                ->with('feedback.type', 'dander');;

        }
    }

    public function deleteForm(int $id)
    {
        return view('books.delete-form', [
            'book' => Book::findOrFail($id),
        ]);
    }

    public function deleteProcess(int $id)
    {
        $book = Book::findOrFail($id);

        try {

            DB::beginTransaction();

            $book->genres()->detach();

            $book->delete();

            DB::commit();

            if($book->cover && Storage::exists($book->cover)) {
                Storage::delete($book->cover);
            }

            return redirect()
                ->route('books.index')
                ->with('feedback.message', 'El libro ' . e($book->title) . ' se elimino con éxito.');
        }catch(\Exception $e){

            return redirect()
                ->back(fallback: route('books.delete.form', ['id' => $id]))
                ->withInput()
                ->with('feedback.message', 'Ocurrió un error y el libro no pudo ser eliminado.')
                ->with('feedback.type', 'danger');
        }
    }
}
