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
                    <div class="card-header">
                        <a href="{{ url('editprofile/' . $profile->id) }}" class="btn btn-primary">Edit Profile</a>
                    </div>
                    <div class="card-body px-lg-5 py-lg-5">

                        <div class="text-center text-muted mb-4">
                            <h4>{{ __('My Profile') }}</h4>
                        </div>
                        <div class="row">

                            <div class="col-md-4 mb-3">
                                <label for="">Student Id</label>
                                <div class="border p-2"> {{ $profile->student_id }}</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Name</label>
                                <div class="border p-2"> {{ $profile->name }}</div>
                            </div>

                            <div class="col-md-4">
                                <label for="">Last Name</label>
                                <div class="border p-2"> {{ $profile->lastname }}</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Email</label>
                                <div class="border p-2"> {{ $profile->email }}</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Track</label>
                                <div class="border p-2"> {{ $profile->track }}</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Course</label>
                                <div class="border p-2"> {{ $profile->course }}</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Country</label>
                                <div class="border p-2"> {{ $profile->country }}</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Phone</label>
                                <div class="border p-2"> {{ $profile->phone }}</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Gender</label>
                                <div class="border p-2"> {{ $profile->gender }}</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Age</label>
                                <div class="border p-2"> {{ $profile->age }}</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Education Level</label>
                                <div class="border p-2"> {{ $profile->education_level }}</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Disabilities</label>
                                <div class="border p-2"> {{ $profile->disabilities }}</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Experience Level</label>
                                <div class="border p-2"> {{ $profile->experience_level }}</div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
