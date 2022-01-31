<?php

namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function index()
    {
        return Note::all();
    }

    public function show(Note $note)
    {
        return $note;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);
        
        $note = Note::create($request->all());


        return response()->json($note, 201);
    }

    public function update(Request $request, Note $note)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);
        
        $note->update($request->all());

        return response()->json($note, 200);
    }

    public function delete(Note $note)
    {
        $note->delete();
        return response()->json(null, 204);
    }
}
