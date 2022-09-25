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
                            <h4>{{ __('List of Employees') }}</h4>
                        </div>

                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Track</th>
                                    <th scope="col">Course</th>
                                    <th scope="col" colspan="3">Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($employ as $employs)
                                    <tr>
                                        <td>{{ $employs['name'] }}</td>
                                        <td>{{ $employs['lastname'] }}</td>
                                        <td>{{ $employs['email'] }}</td>
                                        <td>{{ $employs['track'] }}</td> 
                                        <td>{{ $employs['course'] }}</td>
                                        <td> <a href="{{ url('editemplo/' . $employs->id) }}"
                                                class="btn btn-success">Edit</a> </td>
                                        <td> <a href="{{ url('viewemploy/' . $employs->id) }}"
                                                class="btn btn-primary">View</a> </td>
                                        <td>
                                            {{-- <a href="{{ url('delete/' .$employs->id) }}" class="btn btn-danger">Delete</a> --}}
                                            <button type="button" value="{{ $employs->id }}"
                                                class="btn btn-danger deletebtn">Delete</button>

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
