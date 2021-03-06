<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware(['seeker', 'verified']);
    }

    public function index(){
        return view('profile.index');
    }

    public function store(Request $request){
        $this->validate($request, [
            'address' => 'required',
            'phone_number' => 'required|numeric',
            'experience' => 'required|min:20',
            'bio' => 'required|min:20'
        ]);

        $user_id = auth()->user()->id;

        Profile::where('user_id', $user_id)->update([
            'address' => request('address'),
            'phone_number' => request('phone_number'),
            'experience' => request('experience'),
            'bio' => request('bio')
        ]);

        return redirect()->back()->with('profile_message', 'Profile Updated');
    }

    public function coverletter(Request $request){
        $this->validate($request, [
            'cover_letter' => 'required|mimes:pdf,doc,docx,txt'
        ]);

        $user_id = auth()->user()->id;

        $cover = $request->file('cover_letter')->store('public/files');

        Profile::where('user_id', $user_id)->update(['cover_letter' => $cover]);

        return redirect()->back()
            ->with('cover_letter_message', 'Cover letter updated');
    }
    /* $cover = $request->file('cover_letter'); */
    /* if(isset($cover)){ */
    /* 	$cover->store('public/files'); */
    /* 	Profile::where('user_id', $user_id)->update([ */
    /* 	'cover_letter' => $cover */	
    /* 	]); */
    /* 	return redirect()->back()->with('cover_letter_message', 'Cover letter updated')->with('class', 'alert alert-success'); */
    /* } else { */
    /* 	return redirect()->back()->with('cover_letter_message', 'Choose a file')->with('class', 'alert alert-danger'); */
    /* } */

    public function resume(Request $request){
        $this->validate($request, [
            'resume' => 'required|mimes:pdf,doc,docx,txt'
        ]);
        $user_id = auth()->user()->id;

        $resume = $request->file('resume')->store('public/files');
        Profile::where('user_id', $user_id)->update([
            'resume' => $resume	
        ]);

        return redirect()->back()
            ->with('resume_message', 'Resume updated');

    }

    public function avatar(Request $request){
        $this->validate($request, [
            'avatar' => 'required|mimes:png,jpeg,jpg'
        ]);
        $user_id = auth()->user()->id;

        if($request->hasFile('avatar')){
            $file = $request->file('avatar');

            $ext = $file->getClientOriginalExtension();

            $filename = time().'.'.$ext;

            $file->move('uploads/avatar/', $filename);

            Profile::where('user_id', $user_id)->update([
                'avatar' => $filename
            ]);

            return redirect()->back()
                ->with('avatar_message', 'Avagar Updated')
                ->with('class', 'alert alert-success');

        } else {
            return redirect()->back()
                ->with('avatar_message', 'Choose a file')
                ->with('class', 'alert alert-danger');
        }
    }


}
