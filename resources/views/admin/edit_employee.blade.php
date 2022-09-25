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

                    <div class=" card-body px-lg-5 py-lg-5">

                        <div class="text-center text-muted mb-4 col-md-12">
                            <h4>{{ __('Edit Employee Info') }}</h4>
                        </div>
                        <form role="form" method="POST" action="{{ url('updatemplo/' . $employee->id) }}">
                            @csrf

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('First Name') }}" type="text" name="name"
                                        value="{{ $employee->name }}" required autofocus>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('lastname') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Last Name') }}" type="text" name="lastname"
                                        value="{{ $employee->lastname }}" required autofocus>
                                </div>
                                @if ($errors->has('lastname'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Email') }}" type="email" name="email"
                                        value="{{ $employee->email }}" required>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('track') ? ' has-danger' : '' }}">
                                <label for="track">Track</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <select name="track" id="" class="form-control">
                                        @foreach ($track as $tracks)
                                            <option value="{{ $tracks->name }}">{{ $tracks->name }}</option>
                                        @endforeach

                                    </select>

                                </div>
                                @if ($errors->has('track'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('track') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('course') ? ' has-danger' : '' }}">
                                <label for="course">Course</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <select name="course" id="" class="form-control">
                                        @foreach ($course as $courses)
                                            <option value="{{ $courses->name }}">{{ $courses->name }}</option>
                                        @endforeach

                                    </select>

                                </div>
                                @if ($errors->has('course'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('course') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('country') ? ' has-danger' : '' }}">
                                <label for="">Country</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <select name="country" id="" class="form-control">

                                        @foreach ($country as $countrys)
                                            <option value="{{ $countrys->name }}">{{ $countrys->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                <label for="">Phone</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                        type="number" name="phone" value="{{ $employee->phone }}" required>
                                </div>
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>

                           <div class="form-group{{ $errors->has('age') ? ' has-danger' : '' }}">
                                <label for="">Age</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <select name="age" id="" class="form-control">
                                        <option value="Less than 16">Less than 16</option>
                                        <option value="16-25 Years">16-25 Years</option>
                                        <option value="26-40 Years">26-40 Years</option>
                                        <option value="Above 40">Above 40</option>
                                    </select>
                                </div>
                                @if ($errors->has('age'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class=" form-group{{ $errors->has('education_level') ? ' has-danger' : '' }}">
                                <label for="">Highest Educationa Qualification</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <select name="education_level" id="" class="form-control">
                                        <option value="Primary">Primary</option>
                                        <option value="High School">High School</option>
                                        <option value="Undergraduate">Undergraduate</option>
                                        <option value="Graduate">Graduate</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                @if ($errors->has('education_level'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('education_level') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class=" form-group{{ $errors->has('disabilities') ? ' has-danger' : '' }}">
                                <label for="">Disabilities</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <textarea name="disabilities" id="" class="form-control">
                                     {{ $employee->disabilities }}
                                     </textarea>
                                </div>
                                @if ($errors->has('disabilities'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('disabilities') }}</strong>
                                    </span>
                                @endif
                            </div>

                             <div class=" form-group{{ $errors->has('experience_level') ? ' has-danger' : '' }}">
                                <label for="">Level of Experience</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <select name="experience_level" id="" class="form-control">
                                        <option value="None">None</option>
                                        <option value="less than 1 Year">less than 1 Year</option>
                                        <option value="1-2 Years">1-2 Years</option>
                                        <option value="2-3 Years">2-3 Years</option>
                                        <option value="4 Years+">4 Years+</option>
                                    </select>
                                </div>
                                @if ($errors->has('experience_level'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('experience_level') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4">{{ __('Update Info') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
