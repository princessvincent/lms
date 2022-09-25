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
                        @if ($submit->count() > 0)
                            <table class="table table-responsive w-full">
                                <thead>
                                    <tr>
                                        
                                        <th scope="col">Student Id</th>
                                        <th scope="col">Course</th>
                                        <th scope="col">Track</th>
                                        <th scope="col">Level</th>
                                        <th scope="col">Link</th>
                                        <th scope="col" colspan="1">Action</th>
                                    </tr>

                                </thead>
                                @foreach ($submit as $submits)
                                <tbody>
                                    
                                        <tr>
                                            <td>{{ $submits->student_id }}</td>
                                            <td>{{ $submits->course }}</td>
                                            <td>{{ $submits->track }}</td>
                                            <td>{{ $submits->level }}</td>
                                            <td>{{ $submits->link }}</td>
                                            @if(Auth::user()->name == $submits->feedback_by)
                                                <td> <a href="#"
                                                    class="btn btn-success">Graded</a>
                                            </td>

                                            <td> <a href="{{ url('regrade/' . $submits->id) }}"
                                                    class="btn btn-success">Regrade</a>
                                            </td>
                                              @else  
                                            
                                            <td> <a href="{{ url('viewsubtask/' . $submits->id) }}"
                                                    class="btn btn-success">View</a>
                                            </td>
                                            @endif
                                        </tr>
                                   

                                </tbody>
                                 @endforeach

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











