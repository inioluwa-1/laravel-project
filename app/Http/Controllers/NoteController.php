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
        //  return $notes;\\
        
    }
    public function createNote(Request $req){
        // dd($req);
        // return $req->image;
        // return time().
        // $req->image->getClientOriginalName();
        if ($req->title && $req->description && $req->image) {
            $newname=time().$req->image->getClientOriginalName();
            $move=$req->image->move(public_path('image'),$newname);
            if($move){
                $user=session('user');
                $notes=new Note;
                $notes->title=$req->title;
                $notes->content=$req->description;
                $notes->noteimage=$newname;
                $notes->user_id=$user->id;
                $notes->save();
                return redirect('/notes');
            }
            else {
                return view('home');
            }
            $note = Note::find($id);
            $imagePath = public_path('image/'.$note->noteimage);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            } else {
                echo 'File does not exist';
            }
            
        }
        elseif ($req->title && $req->description ) {
                 $user=session('user');
                 $notes=new Note;
                $notes->title=$req->title;
                $notes->content=$req->description;
                $notes->user_id=$user->id;
                $notes->save();
                return redirect('/notes');
        }
        else {
        return redirect('/dashboard')->with('message', 'Please fill all fields')->with('status', false);
        }

        // $newname=time().$req->image->getClientOriginalName();
        // $move=$req->image->move(public_path('image'),$newname);
        // if($move){
        //     $user=session('user');
        //     $notes=new Note;
        //     $notes->title=$req->title;
        //     $notes->content=$req->description;
        //     $notes->noteimage=$newname;
        //     $notes->user_id=$user->id;
        //     $notes->save();
        //     return redirect('/notes');
        // }
        // else {
        //     return view('home');
        // }
        // $note = Note::find($id);
        // $imagePath = public_path('image/'.$note->noteimage);
        // if (file_exists($imagePath)) {
        //     unlink($imagePath);
        // } else {
        //     echo 'File does not exist';
        // }


        // return $req;
        //     $validation =  Validator::make($req->all(), [
        //     'title' => 'required',
        //     'description' => 'required'
        // ]);

        // if ($validation->fails()) {
        //     return view('home', ['errors'=> $validation->errors()]);
        // }

            
        


        // $save = Note::create([
        //     'title' => $req->title,
        //     'content' => $req->description,
        //     'user_id'=> $req->student_id

        // ]);
        //   $user = session('user');
        //     $notes = Note::where('user_id', $user->id)->get();
        //  return view('notes', ['notes'=> $notes]);

        // if ($save) {
        //     return view('notes', [
        //         'message'=> 'Notes Created Successfuly',
        //         'notes'=> $notes,
        //         'status'=> true
        //     ]);
        // }
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
