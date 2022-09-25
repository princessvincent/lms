<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\role;
use App\Models\task;
use App\Models\User;
use App\Models\level;
use App\Models\course;
use App\Models\tracks;
use App\Models\countrys;
use Illuminate\Http\Request;
use App\Models\submittedtask;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File as FacadesFile;

class AdminsController extends Controller
{
    //for adding, editing,updating and deleting employee
    public function index()
    {
        $course = course::all();
        $country = countrys::all();
        $role = role::all();
        $track = tracks::all();
        return view('admin.add_employee', compact('course', 'country', 'role', 'track'));
    }

    public function add_employee(Request $request)
    {
        if (Auth::user()->role_as == 2) {

            $request->validate([
                'name' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|string|email|unique:users',
                'track' => 'required|string|max:255',
                'course' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'phone' => 'required|numeric|min:11|unique:users',
                'gender' => 'required|string|max:255',
                'age' => 'required|string|max:255',
                'education_level' => 'required|string|max:255',
                'disabilities' => 'required|string|max:255',
                'experience_level' => 'required|string|max:255',
                'role_as' => 'required|string',
                'password' => 'required|string|min:8',
                'password_confirmation' => 'required|same:password',
            ]);

            $employ = new User();
            $employ->name = $request->name;
            $employ->lastname = $request->lastname;
            $employ->email = $request->email;
            $employ->track = $request->track;
            $employ->course = $request->course;
            $employ->country = $request->country;
            $employ->phone = $request->phone;
            $employ->gender = $request->gender;
            $employ->age = $request->age;
            $employ->education_level = $request->education_level;
            $employ->disabilities = $request->disabilities;
            $employ->experience_level = $request->experience_level;
            $employ->role_as = $request->role_as;
            $employ->student_id = "";
            $employ->level = "";
            $employ->password = Hash::make($request->password);
            
            $employ->save();
            return redirect()->back()->with('status', 'You have Successfully Registered Employee!');
        } else {
            return redirect()->back()->with('status', 'Only admin is allowed to Add Employee!');

        }
    }

    public function showemployee()
    {
        $employ = User::where('role_as', 1)->get();
        return view('admin.show_employee', compact('employ'));
    }

    public function viewemployee($id)
    {
        $employ = User::find($id);
        return view('admin.view_employee', compact('employ'));
    }

    public function editemployee($id)
    {
        $employee = User::find($id);
        $course = course::all();
        $country = countrys::all();
        $track = tracks::all();
        return view('admin.edit_employee', compact('employee', 'course', 'country', 'track'));
    }

    public function updateemployee(Request $request, $id)
    {
        $update = User::find($id);
        $update->name = $request->name;
        $update->lastname = $request->lastname;
        $update->email = $request->email;
        $update->track = $request->track;
        $update->course = $request->course;
        $update->country = $request->country;
        $update->phone = $request->phone;
        $update->age = $request->age;
        $update->education_level = $request->education_level;
        $update->disabilities = $request->disabilities;
        $update->experience_level = $request->experience_level;
        $update->update();
        return redirect('showemploy')->with('status', 'Employee Info has been Updated Successfully!');

    }

    public function deleteemployee(Request $request)
    {
        $delete = User::find($request->delete_employ);
        if ($delete) {
            $delete->delete();
            return redirect('showemploy')->with('status', 'Employee Info has been Deleted Successfully!');

        }
    }

    //for adding, editing,updating and deleting announcement
    public function getpost()
    {
        return view('admin.post');
    }

    public function createpost(Request $request)
    {
        if (Auth::user()->role_as == 2 || Auth::user()->role_as == 1) {

            $request->validate([
                'user_id' => 'required',
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:500',
            ]);

            $post = new post();

            $post->user_id = Auth::user()->id;
            $post->title = $request->title;
            $post->description = $request->description;
            $post->link = $request->link;
            $post->save();
            return redirect()->back()->with('status', 'Announcement has been Successfully Created!');

        }

    }

    public function showpost()
    {
        $post = post::where('user_id', Auth::user()->id)->get();
        return view('admin.showpost', compact('post'));

    }

    public function editpost($id)
    {
        $editpost = post::find($id);
        return view('admin.edit_post', compact('editpost'));
    }

    public function updatepost(Request $request, $id)
    {
        $updpost = post::find($id);
        $updpost->title = $request->title;
        $updpost->description = $request->description;
        $updpost->link = $request->link;
        $updpost->update();
        return redirect('showpost')->with('status', 'Announcement Have been Updated Successfully!');
    }

    public function deletepost(Request $request)
    {
        $deletep = post::find($request->delete_post);
        // dd($deletep);
        if ($deletep) {
            $deletep->delete();
            return redirect()->back()->with('status', 'Announcement Deleted Successfully!');
        } else {
            return redirect()->back()->with('status', 'erro!');

        }

    }
//for adding, editing,updating and deleting task
    public function gettask()
    {
        $course = course::all();
        $track = tracks::all();
        $level = level::all();
        return view('employee.creat_tasks', compact('course', 'track','level'));
    }

    public function createtask(Request $request)
    {
        if (Auth::user()->role_as == 2 || Auth::user()->role_as == 1) {

            $request->validate([
                'user_id' => 'required',
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:500',
                'course' => 'required|string',
                'track' => 'required|string',
                'points' => 'required',
                'level' => 'required',
                'deadline' => 'required',
            ]);

            $task = new task();
            $task->user_id = Auth::user()->id;
            $task->title = $request->title;
            $task->description = $request->description;
            $task->course = $request->course;
            $task->track = $request->track;
            $task->points = $request->points;
            $task->deadline = $request->deadline;
            $task->level = $request->level;
            $task->link = $request->link;
            $task->save();
            return redirect()->back()->with('status', 'Task has been Successfully Created!');

        }

    }

    public function showtasks()
    {
        $task = task::where('user_id', Auth::user()->id)->get();
        return view('employee.show_tasks', compact('task'));
    }

    public function edittask($id)
    {
        $task = task::find($id);
        $course = course::all();
        $track = tracks::all();
        return view('employee.edit_task', compact('task', 'course', 'track'));
    }

    public function updatetask(Request $request, $id)
    {
        $task = task::find($id);
        $task->title = $request->title;
        $task->course = $request->course;
        $task->track = $request->track;
        $task->description = $request->description;
        $task->points = $request->points;
        $task->deadline = $request->deadline;
        $task->update();
        return redirect()->back()->with('status', 'Task have been Successfully Updated!');

    }
    public function getuser()
    {
        $user = User::all();
        return view('admin.showallusers', compact('user'));
    }

    public function viewuser($id)
    {
        $users = User::find($id);
        return view('admin.viewallusers', compact('users'));
    }

    public function submittedtask()
    {
        if (Auth::user()->role_as == 1 || Auth::user()->role_as == 2) {

            $submit = submittedtask::where('course', Auth::user()->course)->where('track', Auth::user()->track)->get();
            return view('employee.showsubmittedtask', compact('submit'));
        } else {
            return redirect()->back()->with('status', 'Only Employee or Admin can view Submitted Tasks!');
        }
    }

    public function viewsubmitted($id)
    {
        $submitted = submittedtask::find($id);
        return view('employee.viewsubmittedtask', compact('submitted'));

    }

    public function gradetask(Request $request, $id)
    {
        if (Auth::user()->role_as == 1 || Auth::user()->role_as == 2) {

            $grade = submittedtask::find($id);
            $grade->feedback = $request->feedback;
            $grade->feedback_by = Auth::user()->name;
            $grade->status = $request->status;
            $grade->time = $request->time;
            $grade->update();
            if ($grade->update()) {

                return redirect('getsubtask')->with('status', 'You have successfully graded this task');

            } else {
                return redirect()->back()->with('status', 'error');

            }

        } else {
            return redirect()->back()->with('status', 'Only Admin or Employee can Grade Task!');
        }
    }

    public function alltask()
    {
        $alltask = task::all();
        return view('admin.alltask', compact('alltask'));
    }

    public function allsubtask()
    {
        $allsub = submittedtask::all();
        return view('admin.allsubmittedtask', compact('allsub'));
    }

    public function regrade($id)
    {
        $regrade = submittedtask::find($id);
        return view('employee.regrade', compact('regrade'));
    }

    public function myprofile()
    {
        $profile = User::where('id', Auth::user()->id)->first();
        return view('myprofile', compact('profile'));
    }

    public function editprofile($id)
    {
        $editpro = User::find($id);
        return view('editprofile', compact('editpro'));
    }

    public function updateprofile(Request $request, $id)
    {
        $users = User::find($id);

        if ($request->hasFile('profile')) {
            $path = 'assets/img/' . $users->profile;

            if (FacadesFile::exists($path)) {
                FacadesFile::delete($path);
            }

            if ($request->hasFile('profile')) {
                $file = $request->file('profile');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . "." . $ext;
                $file->move('assets/img/', $filename);
                $users->profile = $filename;

            }
        }

        $users->name = $request->name;
        $users->lastname = $request->lastname;
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->disabilities = $request->disabilities;
        $users->update();
        return redirect()->back()->with('status', 'Info Updated Successfully!');

    }

    public function changepass()
    {
        $change = User::where('id', Auth::user()->id)->first();
        return view('changepass', compact('change'));
    }

    public function updatepass(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|max:250',
            'confirm_password' => 'required|same:password',
        ]);

        if(!Hash::check($request->old_password, Auth::user()->password)){
            return redirect()->back()->with("error", "Old Password Doesn't match!");
        }

        User::where('id',Auth::user()->id)->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back()->with("status", "Password changed successfully!");
    }

    public function verifyuser($id)
    {
        $verify = User::find($id);
        $verify->status = 1;
        $verify->update();
        return redirect()->back()->with("status", "User Verified!");

    }

}
