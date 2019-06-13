<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Company;

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

	public function create()
	{
		return view('jobs.create');
	}

	public function store(Request $request)
	{
		$user_id = auth()->user()->id;
		$company = Company::where('user_id', $user_id)->first();
		$company_id = $company->id;
		Job::create([
			'user_id' => $user_id,
			'company_id' => $company_id,
			'title' => request('tile'),
			'slug' => str_slug(request('title')),
			'description' => request('description'),
			'roles' => request('roles'),
			'category_id' => request('category'),
			'position' => request('position'),
			'address' => request('address'),
			'type' => request('type'),
			'status' => request('status'),
			'last_date' => request('last_date')
		]);
	}

}
