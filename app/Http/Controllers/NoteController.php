<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
{
    //

    public function notesPage(){
        $user = session('user');
        $notes = Note::where('user_id', $user->id)->get();
         return view('notes', ['notes'=> $notes]);
        //  return $notes;
    }
    public function createNote(Request $req){
        // return $req;
            $validation =  Validator::make($req->all(), [
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($validation->fails()) {
            return view('home', ['errors'=> $validation->errors()]);
        }


        $save = Note::create([
            'title' => $req->title,
            'content' => $req->description,
            'user_id'=> $req->student_id

        ]);
          $user = session('user');
            $notes = Note::where('user_id', $user->id)->get();
         return view('notes', ['notes'=> $notes]);

        if ($save) {
            return view('notes', [
                'message'=> 'Notes Created Successfuly',
                'notes'=> $notes,
                'status'=> true
            ]);
        }
    }

    public function editNote($id)
{
    $note = Note::find($id);
    return view('editNote', ['note' => $note]);
}

public function updateNote(Request $req, $id)
{
    $note = Note::find($id);
    $note->title = $req->title;
    $note->content = $req->description;
    $note->save();
    return redirect('/notes');
}

public function deleteNote($id)
{
    $note = Note::find($id);
    $note->delete();
    return redirect('/notes');
}
}
