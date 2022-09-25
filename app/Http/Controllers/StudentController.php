<?php

namespace App\Http\Controllers;

use App\Models\countrys;
use App\Models\course;
use App\Models\post;
use App\Models\role;
use App\Models\submittedtask;
use App\Models\task;
use App\Models\tracks;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function getstud()
    {
        $country = countrys::all();
        $tracks = tracks::all();
        $course = course::all();
        $role = role::all();

        return view('auth.register', compact('country', 'tracks', 'course', 'role'));
    }

    public function student(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'track' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'phone' => 'required|numeric|min:11',
            'gender' => 'required|string|max:255',
            'age' => 'required|string|max:255',
            'education_level' => 'required|string|max:255',
            'disabilities' => 'required|string|max:255',
            'experience_level' => 'required|string|max:255',
            'hear_aboutus' => 'string|max:255',
            'about_yourself' => 'string|max:255',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password',
        ]);

        $users = new User();
        $users->name = $request->name;
        $users->lastname = $request->lastname;
        $users->email = $request->email;
        $users->track = $request->track;
        $users->course = $request->course;
        $users->country = $request->country;
        $users->phone = $request->phone;
        $users->gender = $request->gender;
        $users->age = $request->age;
        $users->education_level = $request->education_level;
        $users->disabilities = $request->disabilities;
        $users->experience_level = $request->experience_level;
        $users->hear_aboutus = $request->hear_aboutus;
        $users->about_yourself = $request->about_yourself;
        $users->status = '0';
        $users->role_as = '0';
        $users->level = 'Beginner';
        $users->student_id = 'TECH4ALL' . rand();
        $users->password = Hash::make($request->password);
        $users->save();
        return redirect()->back()->with('status', 'You have Successfully Registered!, Please Wait for further instructions from us, We will contact you via Email. Thank You.');

    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $email = $request->email;
        $password = $request->password;
        //  dd($password);
        // $user = User::where('status', 1)->first();
        // dd($user);

        if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => 1])) {
            if (Auth::user()->role_as == 1 || Auth::user()->role_as == 2) {
                return redirect('home')->with('status', 'Welcome');
            } else {
                return redirect('studashboard')->with('status', 'Welcome');
            }

        } else {
            return redirect()->back()->with('status', 'Account not Found! or admin has not approved your account!');

        }
    }

    //for displaying task in student navbar
    public function getstudtask()
    {
        $task = task::where('track', Auth::user()->track)->where('course', Auth::user()->course)->where('level', Auth::user()->level)->get();
        return view('student.showtask', compact('task'));
    }

    public function viewtask($id)
    {
        $task = task::find($id);
        $subtask = submittedtask::where('user_id', Auth::user()->id)->where('task_id', $task->id)->get();
        return view('student.viewtasks', compact('task', 'subtask'));
    }

    public function submittask(Request $request)
    {
        if (Auth::user()->role_as == 0) {
            $task_check = submittedtask::where('user_id', Auth::user()->id)->where('task_id', $request->task_id)->exists();
            if ($task_check) {
                return redirect()->back()->with('status', 'You have already submitted this task! Thank You');
            } else {

                $submit = new submittedtask();
                $submit->user_id = Auth::user()->id;
                $submit->task_id = $request->task_id;
                $submit->student_id = Auth::user()->student_id;
                $submit->link = $request->submittask;
                $submit->track = Auth::user()->track;
                $submit->level = Auth::user()->level;
                $submit->course = Auth::user()->course;
                $submit->feedback = '';
                $submit->feedback_by = '';
                $submit->status = '0';
                $submit->save();
                return redirect()->back()->with('status', 'Task Submitted');
            }
        } else {
            return redirect()->back()->with('status', 'Only Student can Submit Task!');
        }
    }
    //for Displaying post in the student navbar
    public function getstudpost()
    {
        $post = post::all();
        return view('student.showpost', compact('post'));
    }

    public function viewpost($id)
    {
        $viewpost = post::find($id);
        $user = User::where('id', $viewpost->user_id)->get();
        return view('student.viewpost', compact('viewpost', 'user'));
    }

    public function dashboard()

    {          
        $tasksc = task::where('track', Auth::user()->track)->where('course', Auth::user()->course)->where('level', Auth::user()->level)->get();        
        $subtask = submittedtask::where('track', Auth::user()->track)->where('course', Auth::user()->course)->where('user_id', Auth::user()->id)->get();
        $taskpoint = task::where('track', Auth::user()->track)->where('course', Auth::user()->course)->sum('points');
        $point = submittedtask::where('track', Auth::user()->track)->where('course', Auth::user()->course)->where('user_id', Auth::user()->id)->sum('status');

        $percentage = $point / $taskpoint * 100;

        $task = task::where('track', Auth::user()->track)->where('course', Auth::user()->course)->count();
        $track = User::where('track', Auth::user()->track)->where('id', Auth::user()->id)->count();
        $course = User::where('course', Auth::user()->course)->where('id', Auth::user()->id)->count();
        $post = post::all();
       
        


        return view('student.studentdash', compact('task', 'track', 'course','taskpoint','point', 'percentage', 'tasksc', 'subtask', 'post'));
    }

    public function changetrack()
    {
        $track = tracks::all();
        return view('student.change_track', compact('track'));
    }

    public function updatetrack(Request $request)
    {
        User::where('id',Auth::user()->id)->update([
            'track' => $request->track
        ]);
        return redirect()->back()->with('status', 'Track Updated Successfully!');

    }

    public function changecourse()
    {
        $course = course::all();
        return view('student.change_cour', compact('course'));
    }

    public function updatecourse(Request $request)
    {
        User::where('id',Auth::user()->id)->update([
            'course' => $request->course
        ]);
        return redirect()->back()->with('status', 'Course Updated Successfully!');


    }

}
