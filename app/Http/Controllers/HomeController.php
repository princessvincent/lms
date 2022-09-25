<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\task;
use App\Models\User;
use App\Models\level;
use Illuminate\Http\Request;
use App\Models\submittedtask;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $employ = User::where('role_as', 1)->count();
        $student = User::where('role_as', 0)->count();
        $user = User::where('status', 1)->count();
        $unverifieduser = User::where('status', 0)->count();
        $post = post::all()->count();

        $task = task::all()->take(8);
        $submit = submittedtask::all()->take(8);
        $posts = post::all()->take(8);
        $employtask = task::where('track', Auth::user()->track)->where('course', Auth::user()->course)->where('user_id', Auth::user()->id)->count();
        $employsubmit = submittedtask::where('track', Auth::user()->track)->where('course', Auth::user()->course)->count();
        $employstudent = User::where('track', Auth::user()->track)->where('course', Auth::user()->course)->where('role_as', 0)->count();
        $employcreate = task::where('track', Auth::user()->track)->where('course', Auth::user()->course)->where('user_id', Auth::user()->id)->get()->take(8);
        $studsubmit = submittedtask::where('track', Auth::user()->track)->where('course', Auth::user()->course)->get()->take(8);
        return view('dashboard', compact('employ', 'student', 'user', 'post', 'task', 'submit', 'posts', 'employtask', 'employsubmit', 'employstudent', 'employcreate', 'studsubmit', 'unverifieduser'));
    }

    public function getstudent()
    {
        $stud = User::where('role_as', '0')->where('course', Auth::user()->course)->where('track', Auth::user()->track)->get();
        foreach ($stud as $student) {
            $subtask = submittedtask::where('user_id', $student->id)->sum('status');
        }

        $task = task::where('course', Auth::user()->course)->where('track', Auth::user()->track)->sum('points');
        $percentage = $subtask / $task * 100;

        return view('employee.showstud', compact('stud', 'subtask', 'task', 'percentage'));
    }
    public function viewstud($id)
    {
        $stude = User::find($id);
            $subtask = submittedtask::where('user_id', $stude->id)->sum('status');
    

        $task = task::where('course', Auth::user()->course)->where('track', Auth::user()->track)->sum('points');
        $percentage = $subtask / $task * 100;
        $level = level::all();
        return view('employee.viewstud', compact('stude', 'task', 'subtask', 'percentage', 'level'));
    }

    public function upgradestud(Request $request, $id)
    {
        $student = User::find($id);
        $student->level = $request->level;
        $student->update();
        if($student->update()){
            return redirect()->back()->with('status', 'Student Level Updated Successfully');
        }
    }

}
