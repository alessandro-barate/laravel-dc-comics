<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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
        $data = $request->all();

        $comic = new Comic();

        $comic->title = $data['title'];

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
        return view('comics.update')
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
