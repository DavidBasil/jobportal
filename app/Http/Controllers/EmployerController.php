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
				'email' => $data['email'],
				'password' => Hash::make('password'),
				'user_type' => request('user_type')
		]);

		Company::create([
			'user_id' => $user->id,
			'cname' => request('cname'),
			'slug' => str_slug(requrest('cname'))
		]);

		return redirect()->to('login');
	}
}
