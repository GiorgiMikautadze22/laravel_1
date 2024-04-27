<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});



Route::get('/jobs', function () {
    return view('jobs.show', [
        'jobs' => Job::with('employer')->simplePaginate(3)
//        'jobs' => Job::with('employer')->cursorPaginate(3)  can not go to page to page. it uses encoded url to fetch necessary from jobs table
//        'jobs' => Job::with('employer')->Paginate(3)
    ]);
});

//Route::get('/jobs/create', function () {
//    return view('jobs.create');
//});

Route::get('/jobs/{id}', function ($id) {
    $jobs = Job::all();

    $job = Job::find($id);


    return view('jobs.index', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
