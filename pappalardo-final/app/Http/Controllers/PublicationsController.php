<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\TryCatch;

class PublicationsController extends Controller
{
    public function all()
    {

        $publications = Publication::with(['categories'])->paginate(9);

        return view('publications.index', [
            'publications' => $publications,
        ]);
    }

    public function view(int $id)
    {

        $publication = Publication::findOrFail($id);

        return view('publications.view', [
            'publication' => $publication,
        ]);
    }

    public function createForm()
    {
        return view('publications.create-form',
            ['categories' => Category::all()]
        );
    }

    public function createProcess(Request $request)
    {
        $request->validate(Publication::VALIDATION_RULES, Publication::VALIDATION_MESSAGES);

        $input = $request->only(['title', 'subtitle', 'content', 'author', 'publication_date', 'cover_description']);

        try {

            if($request->hasFile('cover')){
                $input['cover'] = $request->file('cover')->store('imgs');
            }
    
            DB::beginTransaction();
    
            $publication = Publication::create($input);

            $publication->categories()->attach($request->input('category_fk', []));
    
            DB::commit();
                
            return redirect()
                ->route('publications.index')
                ->with('feedback.message', 'La novedad "' . $input['title'] . '" se publicó con éxito.');
        }catch(\Exception $e){
    
            DB::rollback();
    
            return redirect()
                ->back(fallback: route('publications.create.form'))
                ->withInput()
                ->with('feedback.message', 'Ocurrió un error y la publicación no pudo ser agregada.')
                ->with('feedback.type', 'danger');
        }
    }

    public function editForm(int $id)
    {
        return view('publications.edit-form', [
            'publication' => Publication::findOrFail($id),
            'categories' => Category::all()
        ]);
    }

    public function editProcess(int $id, Request $request)
    {
        $request->validate(Publication::VALIDATION_RULES, Publication::VALIDATION_MESSAGES);

        $publication = Publication::findOrFail($id);

        $input = $request->only(['title', 'subtitle', 'content', 'author', 'publication_date','cover_description']);

        $oldImage = $publication->cover;

        try{
            if($request->hasFile('cover')){
                $input['cover'] = $request->file('cover')->store('imgs');
            }

            DB::beginTransaction();

            $publication->update($input);

            $publication->categories()->sync($request->input('category_fk', []));

            DB::commit();

            if($request->hasFile('image') && $oldImage !== null && Storage::exists($oldImage)) {
                Storage::delete($oldImage);
            }

            return redirect()
                ->route('publications.index')
                ->with('feedback.message', 'La novedad "' . $input['title'] . '" se editó con éxito.')
                ->with('feedback.type', 'success');;
        }catch(\Exception $e){

            DB::rollback();

            return redirect()
                ->back(fallback: route('publications.edit.form', ['id' => $id]))
                ->withInput()
                ->with('feedback.message', 'Ocurrió un error y la publicación no pudo ser editada.')
                ->with('feedback.type', 'danger');;

        }
    }

    public function deleteForm(int $id)
    {
        return view('publications.delete-form', [
            'publication' => Publication::findOrFail($id),
        ]);
    }

    public function deleteProcess(int $id)
    {
        $publication = Publication::findOrFail($id);

        try {

            DB::beginTransaction();

            $publication->categories()->detach();

            $publication->delete();

            DB::commit();

            if($publication->cover && Storage::exists($publication->cover)) {
                Storage::delete($publication->cover);
            }

            return redirect()
                ->route('publications.index')
                ->with('feedback.message', 'La novedad "' . e($publication->title) . '" se eliminó con éxito.');
        }catch(\Exception $e){

            return redirect()
                ->back(fallback: route('publications.delete.form', ['id' => $id]))
                ->withInput()
                ->with('feedback.message', 'Ocurrió un error y la publicación no pudo ser eliminada.')
                ->with('feedback.type', 'danger');
        }
    }
}