@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <!-- Modal -->
        <div class="modal fade" id="deletemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ url('delete') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Delete Employee</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="delete_employ" id="employ_id">
                            <h5>Are You sure you want to Delete this Employee?</h5>
                        </div>
                        <div class="modal-footer">
                            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                            <button type="submit" class="btn btn-danger">Yes Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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
                            <h4>{{ __('List of Users') }}</h4>
                        </div>

                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Track</th>
                                    <th scope="col">Course</th>
                                    <th scope="col">Role</th>
                                    <th scope="col" colspan="2">Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($user as $users)
                                    <tr>
                                        <td>{{ $users['name'] }}</td>
                                        <td>{{ $users['lastname'] }}</td>
                                        <td>{{ $users['email'] }}</td>
                                        <td>{{ $users['track'] }}</td>
                                        <td>{{ $users['course'] }}</td>
                                        <td>
                                            @if ($users->role_as == 0)
                                                Student
                                            @elseif($users->role_as == 1)
                                                Employee
                                            @else
                                                Admin
                                            @endif

                                        </td>
                                        <td>
                                         <a href="{{ url('viewuser/' . $users->id) }}" class="btn btn-primary">View</a>
                                        </td>
                                        <td>
                                        @if($users->status == 0)
                                            <a href="{{ url('verify/' . $users->id) }}" class="btn btn-danger">Verify</a>
                                        @else
                                         <a href="#" class="btn btn-success">Verified</a>
                                         @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.deletebtn').click(function(e) {
                e.preventDefault();

                var employ_id = $(this).val();
                $('#employ_id').val(employ_id);
                $('#deletemodal').modal('show')
            });
        });
    </script>
@endsection
