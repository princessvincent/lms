@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">

        <!-- Table -->
        <div class="">
            <div class="col-lg-12 col-md-12">
                <div class="card bg-secondary shadow border-0">

                    <div>
                        @if (session()->has('status'))
                            <div class="alert alert-success">
                                {{ session()->get('status') }}
                            </div>
                        @endif
                    </div>

                    <div class="row card-body px-lg-5 py-lg-5 p-0">

                        <div class="text-center text-muted mb-4">
                            <h4>{{ __('List of all Your Student') }}</h4>
                        </div>
                        @if ($stud->count() > 0)
                            <table class="table table-responsive w-full">
                                <thead>
                                    <tr>
                                        <th scope="col">Student Name</th>
                                        <th scope="col">Student Email</th>
                                        <th scope="col">Student Id</th>
                                        <th scope="col">Course</th>
                                        <th scope="col">Track</th>
                                        <th scope="col">level</th>
                                        <th scope="col">Total Score</th>
                                        <th scope="col">Total Task Score</th>
                                        <th scope="col">Percentage</th>
                                        <th scope="col" colspan="1">Action</th>
                                    </tr>

                                </thead>
                                @foreach ($stud as $studs)
                                    <tbody>

                                        <tr>
                                            <td>{{ $studs->name }}</td>
                                            <td>{{ $studs->email }}</td>
                                            <td>{{ $studs->student_id }}</td>
                                            <td>{{ $studs->course }}</td>
                                            <td>{{ $studs->track }}</td>
                                            <td>{{ $studs->level }}</td>
                               
                                <td>{{ $subtask }}</td>
                                <td>{{ $task }}</td>
                                <td>{{ $percentage }}%</td>
                                <td> <a href="{{ url('viewstud/'.$studs->id) }}" class="btn btn-success">View</a>
                                </td>
                                </tr>


                                </tbody>

 @endforeach
                            </table>
                        @else
                            <div class="card-body text-center">
                                <h2>No Student Yet!</h2>

                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
