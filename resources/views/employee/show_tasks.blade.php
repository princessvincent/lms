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
                            <h4>{{ __('List of Tasks') }}</h4>
                        </div>
                        @if ($task->count() > 0)
                            <table class="table table-responsive w-full">
                                <thead>
                                    <tr>
                                        
                                        <th scope="col">Title</th>
                                        <th scope="col">Course</th>
                                        <th scope="col">Track</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Points</th>
                                        <th scope="col">Deadline</th>
                                        <th scope="col" colspan="2">Action</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($task as $tasks)
                                        <tr>
                                            <td>{{ $tasks['title'] }}</td>
                                            <td>{{ $tasks['course'] }}</td>
                                            <td>{{ $tasks['track'] }}</td>
                                            <td class="desc">{{ $tasks['description'] }}</td>
                                            <td>{{ $tasks['points'] }}</td>
                                            <td>{{ $tasks['deadline'] }}</td>
                                            <td> <a href="{{ url('edittask/' . $tasks->id) }}"
                                                    class="btn btn-success">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        @else
                            <div class="card-body text-center">
                                <h2>You have not created any Task for your Student</h2>
                                <a href="{{ url('task') }}" class="btn btn-outline-primary float-end">Create a
                                    Task</a>
                            </div>
                        @endif
                    </div>
                 </div>
            </div>
        </div>
    </div>
@endsection


