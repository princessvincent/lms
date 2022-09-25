@extends('layouts.app')

@section('content')
    {{-- @include('layouts.headers.cards') --}}
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <h3 class="text-white"><strong>Student Id:</strong> {{ Auth::user()->student_id }}</h3>
            <h3 class="text-white mb-5"><strong>Your Track:</strong> {{ Auth::user()->track }}</h3>

            <div class="header-body">
                <!-- Card stats -->

                <div class="row">

                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Point</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $point }} /
                                            {{ $taskpoint }}</span>
                                    </div>
                                    <div class="col-auto">
                                        
                                         <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                            <i class="fas fa-percent"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i>
                                        {{ $percentage }}%</span>
                                    <span class="text-nowrap">Percentage</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col text-center">
                                        <h5 class="card-title text-uppercase text-muted mb-3 ">Track & Course</h5>
                                        <span class="text-muted mb-0 mt-5"> <strong
                                                class="h2 font-weight-bold mb-0 text-nowrap">{{ $track }}</strong>
                                            Track</span> <br />
                                        <span class="text-muted mb-0"> <strong
                                                class="h2 font-weight-bold mb-0 text-nowrap">{{ $course }}</strong>
                                            Course</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                                {{-- <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                                    <span class="text-nowrap">Since yesterday</span>
                                </p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">

                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Task</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $task }}</span>
                                    </div>
                                    <div class="col-auto">
                                       <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                            <i class="fas fa-chart-pie"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    {{-- <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span> --}}
                                    <span class="text-nowrap">Total Task Created</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Stages</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ Auth::user()->level }}
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                       <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    {{-- <span class="text-success mr-2"><i class="fas fa-arrow-up"></i>
                                       </span> --}}
                                    <span class="text-nowrap">Your Current Level</span>
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
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Latest Task</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ url('gettask') }}" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        @if ($tasksc->count() > 0)
                            <table class="table align-items-center table-flush" sty>
                                <thead>
                                    <tr>
                                        <th scope="col">Course</th>
                                        <th scope="col">Task Title</th>
                                        <th scope="col">Task Points</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Deadline</th>
                                        <td scope="col" colspan="1">Action</td>

                                        {{-- <th scope="col" colspan="2">Action</th> --}}
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($tasksc as $tasks)
                                        <tr>

                                            <td>{{ $tasks['course'] }}</td>
                                            <td>{{ $tasks['title'] }}</td>
                                            <td>{{ $tasks['points'] }}</td>
                                            <td>
                                                @if ($tasks->submittedtask != null && $tasks->submittedtask->status == '0')
                                                    Submitted
                                                @elseif($tasks->submittedtask != null && $tasks->submittedtask->status != '0')
                                                    {{ $tasks->submittedtask->status }}
                                                @else
                                                    Not Submitted
                                                @endif
                                            </td>
                                            <td>
                                                @php
                                                    $nowdate = new DateTime();
                                                    $due_date = new DateTime($tasks->deadline);
                                                @endphp
                                                @if ($nowdate > $due_date)
                                                    Submission Close
                                                @else
                                                    {{ $tasks->deadline }}
                                                @endif

                                            </td>

                                            <td> <a href="{{ url('viewtask/' . $tasks->id) }}"
                                                    class="btn btn-success">View</a>
                                            </td>
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
            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Recent Post</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ url('getpost') }}" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        @if ($post->count() > 0)
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
                                    @foreach ($post as $posts)
                                        <tr>
                                            {{-- <td>{{ $posts->user->name }}</td> --}}
                                            <td>{{ $posts['title'] }}</td>
                                            <td class="desc">{{ $posts['description'] }}</td>
                                            <td>{{ $posts['link'] }}</td>
                                            {{-- <td> <a href="{{ url('editpost/' . $posts->id) }}"
                                                    class="btn btn-success">Edit</a>
                                            </td>
                                            <td>
                                                <button type="button" value="{{ $posts->id }}"
                                                    class="btn btn-danger deletebtn">Delete</button>

                                            </td> --}}
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
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
