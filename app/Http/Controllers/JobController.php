<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class JobController extends Controller
{

	public function index(){
		$jobs = Job::all()->take(10);
		return view('welcome', compact('jobs'));
	}

	public function show($id, Job $job){
		// the same as:
		// $job = Job::find($id);
		return view('jobs.show', compact('job'));
	}

}
