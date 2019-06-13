<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
	public function show($id, Company $company){
		return view('company.show', compact('company'));
	}

	public function create()
	{
		return view('company.create');
	}

}
