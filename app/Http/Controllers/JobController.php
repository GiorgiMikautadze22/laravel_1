<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        return view('jobs.index', [
            'jobs' => Job::with('employer')->latest()->simplePaginate(3)
//        'jobs' => Job::with('employer')->cursorPaginate(3)  can not go to page to page. it uses encoded url to fetch necessary from jobs table
//        'jobs' => Job::with('employer')->Paginate(3)
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }
    public function show(Job $job)
    {
        //    $job = Job::find($id);


        return view('jobs.show', ['job' => $job]);
    }
    public function store()
    {
        request()->validate([
            'title'=>['required', 'min:3'],
            'salary'=>['required']
        ]);

        Job::create([
            'title'=>request('title'),
            'salary'=>request('salary'),
            'employer_id'=>1
        ]);
        return redirect('jobs');
    }


    public function edit(Job $job)
    {
        //    $job = Job::find($id);


        return view('jobs.edit', ['job' => $job]);
    }
    public function update(Job $job)
    {
        request()->validate([
            'title'=>['required', 'min:3'],
            'salary'=>['required']
        ]);

//    $job = Job::findOrFail($id);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);

        return redirect('/jobs/' . $job->id);
    }
    public function destroy(Job $job)
    {
        $job->delete();

        return redirect('/jobs');
    }
}
