<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    public function __construct(){
        $this->middleware(['employer', 'verified'], ['except' => ['index', 'show']]);
    }

    public function show($id, Company $company){
        return view('company.show', compact('company'));
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        $user_id = auth()->user()->id;

        Company::where('user_id', $user_id)->update([
            'address' => request('address'),
            'phone' => request('phone'),
            'website' => request('website'),
            'slogan' => request('slogan'),
            'description' => request('description')
        ]);

        return redirect()->back()->with('message', 'Company Updated!');
    }

    public function coverPhoto(Request $request)
    {
        $user_id = auth()->user()->id;

        if($request->hasFile('cover_photo')){
            $file = $request->file('cover_photo');

            $ext = $file->getClientOriginalExtension();

            $filename = time().'.'.$ext;

            $file->move('uploads/coverphoto/', $filename);

            Company::where('user_id', $user_id)->update([
                'cover_photo' => $filename
            ]);

            return redirect()->back()->with('message', 'Cover photo updated');
        }
    }

    public function logo(Request $request)
    {
        $user_id = auth()->user()->id;

        if($request->hasFile('logo')){
            $file = $request->file('logo');

            $ext = $file->getClientOriginalExtension();

            $filename = time().'.'.$ext;

            $file->move('uploads/logo/', $filename);

            Company::where('user_id', $user_id)->update([
                'logo' => $filename
            ]);

            return redirect()->back()->with('message', 'Logo updated');
        }

    }

}
