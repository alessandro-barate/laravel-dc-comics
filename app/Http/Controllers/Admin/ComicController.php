<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::all();

        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()  
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validation($request->all());
        $comic = new Comic();

        $comic->fill($data);
        $comic->save();

        return redirect()->route('comics.show', $comic->id);

        
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    public function show(Comic $comic)
    {
        // $comics = Comic::find($id);

        if ($comic === null) {
            return redirect()->route('errors.404');
        }

        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comic = Comic::findOrFail($id);

        return view('comics.edit' , compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comic = Comic::findOrFail($id);
        $data = $this->validation($request->all());
        $comic->update($data);
        $comic->title = $data['title'];
        $comic->save();

        return redirect()->route('comics.show', $comic->id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comic = Comic::findOrFail($id);

        $comic->delete();

        return redirect()->route('comics.index');
    }

    // Validazione dati
    public function validation($data) 
    {

        $validation = Validator::make($data, [
            'title' => 'required|max:100',
        ])->validate();
        
        return $validation;
    }

}
