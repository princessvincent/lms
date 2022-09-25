@extends('layouts.app')

@section('content')
    {{-- @include('layouts.headers.cards') --}}

    <head>


    </head>
    @if (Auth::user()->role_as == 2)
        <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
            <div class="container-fluid">
                <div class="header-body">
                    <!-- Card stats -->
                    <div class="row">
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Employees</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $employ }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                                <i class="fas fa-users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        {{-- <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span> --}}
                                        <span class="text-nowrap">Total number of Employees</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Students</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $student }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                                <i class="fas fa-users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        {{-- <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span> --}}
                                        <span class="text-nowrap">Total number of Students</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Verified Users</h5>
                                            <span class="font-weight-bold mb-0">{{ $user }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                                <i class="fas fa-users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        {{-- <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span> --}}
                                        <span class="text-nowrap">Both Admin, Employee and Student</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Unverified Users</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $unverifieduser }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                                <i class="fas fa-users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        {{-- <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span> --}}
                                        <span class="text-nowrap">Total number of Students</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 mt-3">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Total Post</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $post }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                                <i class="fas fa-chart-pie"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        {{-- <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span> --}}
                                        <span class="text-nowrap"> All Post Created by Employees</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


         <div class="container-fluid mt--7">

        <div class="row mt-5">
            <div class="col-xl-6 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Tasks</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ url('alltask') }}" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        @if ($task->count() > 0)
                            <table class="table align-items-center table-flush" sty>
                                <thead>
                                    <tr>
                                        <th scope="col">Author</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Track</th>
                                        <th scope="col">Course</th>
                                        <th scope="col">Link</th>
                                        <th scope="col">Point</th>
                                        <th scope="col">Deadline</th>
                                        <th scope="col">Description</th>
                                        {{-- <th scope="col" colspan="2">Action</th> --}}
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($task as $alltasks)
                                        <tr>
                                            <td>{{ $alltasks->user->name }}</td>
                                            <td>{{ $alltasks['title'] }}</td>
                                            <td>{{ $alltasks['track'] }}</td>
                                            <td>{{ $alltasks['course'] }}</td>
                                            <td>{{ $alltasks['link'] }}</td>
                                            <td>{{ $alltasks['points'] }}</td>
                                            <td>{{ $alltasks['deadline'] }}</td>
                                            <td class="desc">{{ $alltasks['description'] }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        @else
                            <div class="card-body text-center">
                                <h2>No Task have been Created Yet!</h2>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Submitted Tasks</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ url('allsubtask') }}" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        @if ($submit->count() > 0)
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">Student Id</th>
                                        <th scope="col">Track</th>
                                        <th scope="col">Course</th>
                                        <th scope="col">Link</th>
                                        <th scope="col">Feedback</th>
                                        <th scope="col">Feedback By</th>
                                        <th scope="col">Point</th>
                                        <th scope="col">Time</th>
                                        {{-- <th scope="col" colspan="2">Action</th> --}}
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($submit as $allsubs)
                                        <tr>
                                            <td>{{ $allsubs['student_id'] }}</td>
                                            <td>{{ $allsubs['track'] }}</td>
                                            <td>{{ $allsubs['course'] }}</td>
                                            <td>{{ $allsubs['link'] }}</td>
                                            <td>{{ $allsubs['feedback'] }}</td>
                                            <td>{{ $allsubs['feedback_by'] }}</td>
                                            <td>{{ $allsubs['status'] }}</td>
                                            <td>{{ $allsubs['time'] }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        @else
                            <div class="card-body text-center">
                                <h2>No Task have been Submitted Yet!</h2>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-xl-12 mt-3">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Posts</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ url('getpost') }}" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        @if ($posts->count() > 0)
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        {{-- <th scope="col">Created by</th> --}}
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Link</th>
                                        {{-- <th scope="col" colspan="2">Action</th> --}}
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            {{-- <td>{{ $post->user->name }}</td> --}}
                                            <td>{{ $post['title'] }}</td>
                                            <td class="desc">{{ $post['description'] }}</td>
                                            <td>{{ $post['link'] }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        @else
                            <div class="card-body text-center">
                                <h2>You have not created any post</h2>
                                <a href="{{ url('post') }}" class="btn btn-outline-primary float-end">Create a
                                    Post</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>

    @elseif(Auth::user()->role_as ==1)
        <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
            <div class="container-fluid">
                <div class="header-body">
                    <!-- Card stats -->
                    <div class="row">
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Tasks</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $employtask }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                                <i class="fas fa-users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        {{-- <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span> --}}
                                        <span class="text-nowrap">Total Task created by you</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Submitted Tasks</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $employsubmit }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                                <i class="fas fa-users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        {{-- <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span> --}}
                                        <span class="text-nowrap">Total Submitted Tasks by Your Student</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Students</h5>
                                            <span class="font-weight-bold mb-0">{{ $employstudent }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                                <i class="fas fa-users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        {{-- <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span> --}}
                                        <span class="text-nowrap">Total number of your Students</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Total Post</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $post }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                                <i class="fas fa-chart-pie"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        {{-- <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span> --}}
                                        <span class="text-nowrap"> All Post Created by Employees</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


          <div class="container-fluid mt--7">

        <div class="row mt-5">
            <div class="col-xl-6 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Tasks</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ url('showtask') }}" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        @if ($employcreate->count() > 0)
                            <table class="table align-items-center table-flush" sty>
                                <thead>
                                    <tr>
                                       
                                        <th scope="col">Title</th>
                                        <th scope="col">Track</th>
                                        <th scope="col">Course</th>
                                        <th scope="col">Link</th>
                                        <th scope="col">Point</th>
                                        <th scope="col">Deadline</th>
                                        <th scope="col">Description</th>
                                        {{-- <th scope="col" colspan="2">Action</th> --}}
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($employcreate as $tasks)
                                        <tr>
                                            
                                            <td>{{$tasks['title'] }}</td>
                                            <td>{{$tasks['track'] }}</td>
                                            <td>{{$tasks['course'] }}</td>
                                            <td>{{$tasks['link'] }}</td>
                                            <td>{{$tasks['points'] }}</td>
                                            <td>{{$tasks['deadline'] }}</td>
                                            <td class="desc">{{$tasks['description'] }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        @else
                            <div class="card-body text-center">
                                <h2>You have not Created any Task Yet!</h2>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Submitted Tasks</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ url('getsubtask') }}" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        @if ($studsubmit->count() > 0)
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">Student Id</th>
                                        <th scope="col">Track</th>
                                        <th scope="col">Course</th>
                                        <th scope="col">Link</th>
                                        <th scope="col">Feedback</th>
                                        <th scope="col">Feedback By</th>
                                        <th scope="col">Point</th>
                                        <th scope="col">Time</th>
                                        {{-- <th scope="col" colspan="2">Action</th> --}}
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($studsubmit as $allsubs)
                                        <tr>
                                            <td>{{ $allsubs['student_id'] }}</td>
                                            <td>{{ $allsubs['track'] }}</td>
                                            <td>{{ $allsubs['course'] }}</td>
                                            <td>{{ $allsubs['link'] }}</td>
                                            <td>{{ $allsubs['feedback'] }}</td>
                                            <td>{{ $allsubs['feedback_by'] }}</td>
                                            <td>{{ $allsubs['status'] }}</td>
                                            <td>{{ $allsubs['time'] }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        @else
                            <div class="card-body text-center">
                                <h2>No Task have been Submitted Yet!</h2>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-xl-12 mt-3">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Posts</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ url('getpost') }}" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        @if ($posts->count() > 0)
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        {{-- <th scope="col">Created by</th> --}}
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Link</th>
                                        {{-- <th scope="col" colspan="2">Action</th> --}}
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            {{-- <td>{{ $post->user->name }}</td> --}}
                                            <td>{{ $post['title'] }}</td>
                                            <td class="desc">{{ $post['description'] }}</td>
                                            <td>{{ $post['link'] }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        @else
                            <div class="card-body text-center">
                                <h2>You have not created any post</h2>
                                <a href="{{ url('post') }}" class="btn btn-outline-primary float-end">Create a
                                    Post</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
    @endif



  
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
