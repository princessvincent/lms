use App\Models\level;
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

                    <div class="card-body px-lg-5 py-lg-5">

                        <div class="text-center text-muted mb-4">
                            <h4>{{ __('Submitted task') }}</h4>
                        </div>
                        <div class="row">

                            <div class="col-md-4 mb-3">
                                <label for="">Student Name</label>
                                <div class="border p-2"> {{$stude->name }}</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Student Email</label>
                                <div class="border p-2"> {{ $stude->email }}</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Student Id </label>
                                <div class="border p-2"> {{ $stude->student_id }}</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Course</label>
                                <div class="border p-2"> {{ $stude->course }}</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Track</label>
                                <div class="border p-2"> {{ $stude->track }}</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Level</label>
                                <div class="border p-2"> {{ $stude->level }}</div>
                            </div>

                             <div class="col-md-4 mb-3">
                                <label for="">Total Score</label>
                                <div class="border p-2"> {{ $subtask }}</div>
                            </div>

                             <div class="col-md-4 mb-3">
                                <label for="">Total Task Score</label>
                                <div class="border p-2"> {{ $task }}</div>
                            </div>

                             <div class="col-md-4 mb-3">
                                <label for="">Percentage</label>
                                <div class="border p-2"> {{ $percentage }}%</div>
                            </div>

                        </div>
                    </div>

                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="card-header text-primary">UpGrade Student Level</div>
                        <form action="{{ url('upgradelevel/' . $stude->id) }}" method="POST">
                            @csrf
                            <div class="form-group{{ $errors->has('level') ? ' has-danger' : '' }}">
                                <label for="level">Choose Level</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <select name="level" id="" class="form-control">
                                        @foreach ( $level as  $levels)
                                            <option value="{{ $levels->level_name }}">{{ $levels->level_name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                @if ($errors->has('level'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">UpGrade Level</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
