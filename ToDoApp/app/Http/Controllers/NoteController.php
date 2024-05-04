<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Note;

class NoteController extends Controller
{
    public function index(){
        $notes = Note::all();
        return view('notes.index',['notes' => $notes]);
        
    }

    public function create(){
        return view('notes.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $newNote = Note::create($data);

        return redirect(route('note.index'));
    }
}
