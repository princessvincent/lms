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
                            <h4>{{ __('List of Submitted Tasks') }}</h4>
                        </div>
                        @if ($allsub->count() > 0)
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
                                    @foreach ($allsub as $allsubs)
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
        </div>
    </div>
@endsection
