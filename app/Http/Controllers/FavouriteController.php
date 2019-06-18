<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class FavouriteController extends Controller
{

    public function save($id){
        $jobId = Job::find($id);
        $jobId->favourites()->attach(auth()->user()->id);
        return redirect()->back();
    }

    public function unsave($id){
        $jobId = Job::find($id);
        $jobId->favourites()->detach(auth()->user()->id);
        return redirect()->back();

    }

}
