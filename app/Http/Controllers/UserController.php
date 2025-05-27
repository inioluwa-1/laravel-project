<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index() {
    $name = "Arogungbogunmi";
    $school = "Lagos State University";
    $username = "iyanutisele";
    // //methods
    // // with method
    // // return view('home')-> with('name', $name)-> with('school', $school);

    // // //compatible method
    // // return view('home', compact('name', 'school', 'username'));

    return view('home', [
        'name' => $name,
        'school' => $school,
        'username' => $username
    ]);
    }
    public function createUser( Request $req ) {
        // return User::get(); in json format to get all users
        // return User::where('email', 'ifeini048@gmail.com')->first(); a particular user
        $validation = Validator::make($req->all(), [
            'full_name' => 'required|max:20|min:5',
            'email' => ['required','email','unique:users', 'lowercase'],
            'password' => 'required|min:8|regex:^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$^'
        ],[
            'password' => 'Password must contain letter, number and special character'
        ]);

        if ($validation->fails()) {
            // return $validation->errors();
            return view('home')->with('errors', $validation->errors());
        };
        $user = User::where('email', $req->email)->first();
        if ($user) {
            return view('home')->with('message', 'User already exists') ->with('status', false);
        }

        $save = User::create([
            'name' => $req->full_name,
            'email' => $req->email,
            'password' => $req->password   //hash::make($req->password)
        ]);

        if ($save) {
            return redirect('/login');
            // return view('home')->with('message', 'Details saved successfully.')->with('status', true);
        }

        // echo $req->phone_number;
        // return view('home')->with('message', 'Details received. We will process soon.');
    }

    public function loginUser(Request $req) {
        return view('login');
    }
    public function loginAccount(Request $req) {
       $validation = Validator::make($req->all(), [
           'email' => ['required','email'],
           'password' => 'required|min:8'
       ]);

    // return $req;

   //validate user
        if ($validation->fails()) {
            return view('login')->with('errors', $validation->errors());
        }
        else {
            $user = User::where('email', $req->email)->first();
            if($user && Hash::check($req->password, $user->password)) {
                session(['user' => $user]);
                return redirect ('/dashboard');
            }
            else {
                return view('login')->with('message', 'Invalid email or password');
            }
        }        
    }

    public function dashboard() {
        $user = session('user');
        if (!$user) {
            return view ('login')->with('message', 'You are not logged in');
        }
        return view('dashboard')->with('user', $user);
        // return view('dashboard');
        // return redirect ('/dashboard')->with('message', 'Login successful')->with('status', true);
    }

    public function deleteuser(Request $req) {
        $delete = User::where('id', $req->user_id)->first()->delete();
        if ($delete){
            return redirect ('/login');
        }
        else {
            return view('dashboard');
        }
        // return $req->user_id;

        
    }
public function edituser(Request $req, $id) {
    if ($req->isMethod('get')) {
        $user = User::find($id);
        return view('edituser', compact('user'));
    } elseif ($req->isMethod('post')) {
        $validator = Validator::make($req->all(), [
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::find($req->id);
        if ($user) {
            // Update the user's details here
            $user->name = $req->name;
            $user->email = $req->email;
            $user->save();

            session (['user' => $user]);
            return redirect('/dashboard');
        } else {
            return view('edituser')->with('message', 'User not found');
        }
    }
}

public function forgotpass() {
    return view('forgot');
}
public function forgot(Request $req) {
    $User = User::where('email',$req->email)->first();
    $msg = 'user not found';
    if ($User) {
        session(['id'=> $User->id]);
        return redirect('/forgotpassword');
        // return session('id');
        // return $user->user;
    } 
    else {
        return view('forgot')->with('msg',$msg);
    }
    // return $req;
}
public function forgotpassword() {
    $id=session('id');
    // $error=session('errormsg');
    return view('verifypass')->with('id', $id);
}

public function verifypass(Request $request) {
    if($request->passwordone!==$request->passwordtwo) {
        $errormsg='abeg password must be same';
        // session(['errormsg'=>$errormsg]);
        return redirect()->route('verifypassword')->with('success', $errormsg);
        // return redirect ()->back()->with    route('errormsg', $errormsg);
    }
     else 
     {
        $update = User::where('id', $request->id)->update([
            'password' => Hash::make($request->passwordtwo)
        ]);
        if ($update) {
            return 'updated';
        } 
        else {
            return 'not updated';
        }
    }
}

public function allusers() {
    $users=User::with('keepnotes')->get();
    $user = session('users');
    return $user;
}

public function admin()
{
    $users = User::with('keepnotes')->get();
    $notes = Note::with('keepusers')->get();
    // return $users;
    return view('admin')->with('users', $users)->with('notes', $notes);
}

public function checklist($id){
    // return $id;
    $user = User::with('keepnotes')->find($id);
    return view('checklist')->with('user', $user);

}

    
}
