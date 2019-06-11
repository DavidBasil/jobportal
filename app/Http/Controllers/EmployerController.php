<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Company;
use Hash;

class EmployerController extends Controller
{
	public function register()
	{
		$user = User::create([
				'email' => request('email'),
				'password' => Hash::make(request('password')),
				'user_type' => request('user_type')
		]);

		Company::create([
			'user_id' => $user->id,
			'cname' => request('cname'),
			'slug' => str_slug(request('cname'))
		]);

		return redirect()->to('login');
	}
}
