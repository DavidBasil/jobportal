<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class UserController extends Controller
{

	public function index(){
		return view('profile.index');
	}

	public function store(Request $request){
		$user_id = auth()->user()->id;
		Profile::where('user_id', $user_id)->update([
			'address' => request('address'),
			'experience' => request('experience'),
			'bio' => request('bio')
		]);
		return redirect()->back()->with('profile_message', 'Profile Updated');
	}

	public function coverletter(Request $request){
		$user_id = auth()->user()->id;
		/* $cover = $request->file('cover_letter')->store('public/files'); */
		$cover = $request->file('cover_letter');
		if(isset($cover)){
			$cover->store('public/files');
			Profile::where('user_id', $user_id)->update([
			'cover_letter' => $cover	
			]);
			return redirect()->back()->with('cover_letter_message', 'Cover letter updated')->with('class', 'alert alert-success');
		} else {
			return redirect()->back()->with('cover_letter_message', 'Choose a file')->with('class', 'alert alert-danger');
		}
	}

	public function resume(Request $request){
		$user_id = auth()->user()->id;
		$resume = $request->file('resume');
		if(isset($resume)){
			$resume->store('public/files');
			Profile::where('user_id', $user_id)->update([
			'resume' => $resume	
			]);
			return redirect()->back()->with('resume_message', 'Resume updated')->with('class', 'alert alert-success');
		} else {
			return redirect()->back()->with('resume_message', 'Choose a file')->with('class', 'alert alert-danger');
		}
	}

}
