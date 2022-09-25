@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

   

    <div class="container mt--8 pb-5">

        <!-- Table -->
        <div class="row justify-content-center">
        
            <div class="col-lg-6 col-md-8">
             <div>
       {{-- <video src="https://www.w3schools.com/html/mov_bbb.mp4" width="320" height="240" autoplay poster="posterimage.jpg" controls>
  
</video> --}}

 <iframe width="560" height="315" src="https://www.youtube.com/embed/X8UQqMT5quE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    
                <div class="card bg-secondary shadow border-0">
                    <div>
                        @if (session()->has('status'))
                            <div class="alert alert-success">
                                {{ session()->get('status') }}
                            </div>
                        @endif
                    </div>
                    {{-- <div class="card-header bg-transparent pb-5">
                        <div class="text-muted text-center mt-2 mb-4"><small>{{ __('Sign up with') }}</small></div>
                        <div class="text-center">
                            <a href="/auth/github/redirect" class="btn btn-neutral btn-icon mr-4">
                                <span class="btn-inner--icon"><img
                                        src="{{ asset('argon') }}/img/icons/common/github.svg"></span>
                                <span class="btn-inner--text">{{ __('Github') }}</span>
                            </a>
                            <a href="#" class="btn btn-neutral btn-icon">
                                <span class="btn-inner--icon"><img
                                        src="{{ asset('argon') }}/img/icons/common/google.svg"></span>
                                <span class="btn-inner--text">{{ __('Google') }}</span>
                            </a>
                        </div>
                    </div> --}}


                    <div class="row card-body px-lg-5 py-lg-5">

                        <div class="text-center text-muted mb-4">
                            <small>{{ __('Sign up with Your Credentials') }}</small>
                        </div>
                        <form role="form" method="POST" action="{{ route('addstud') }}">
                            @csrf

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('First Name') }}" type="text" name="name"
                                        value="{{ old('name') }}" required autofocus>
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
                                        value="{{ old('lastname') }}" required autofocus>
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
                                        value="{{ old('email') }}" required>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('track') ? ' has-danger' : '' }}">
                                <label for="track">Choose Track</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <select name="track" id="" class="form-control">
                                        @foreach ($tracks as $track)
                                            <option value="{{ $track->name }}">{{ $track->name }}</option>
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
                                <label for="course">Choose Course</label>
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
                                <label for="">Choose Country</label>
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
                                        type="number" placeholder="{{ __('Phone') }}" name="phone"
                                        value="{{ old('phone') }}" required>
                                </div>
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('gender') ? ' has-danger' : '' }}">
                                <label for="">Gender</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <select name="gender" id="" class="form-control">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
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
                            <div class=" form-group{{ $errors->has('hear_aboutus') ? ' has-danger' : '' }}">
                                <label for="">How did you Hear about us</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <textarea name="hear_aboutus" id="" class="form-control">
                                     
                                     </textarea>
                                </div>
                                @if ($errors->has('hear_aboutus'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('hear_aboutus') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class=" form-group{{ $errors->has('about_yourself') ? ' has-danger' : '' }}">
                                <label for="">Say something about Yourself</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <textarea name="about_yourself" id="" class="form-control">
                                     
                                     </textarea>
                                </div>
                                @if ($errors->has('about_yourself'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('about_yourself') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class=" form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Password') }}" type="password" name="password" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class=" form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="{{ __('Confirm Password') }}"
                                        type="password" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="text-muted font-italic">
                                <small>{{ __('password strength') }}: <span
                                        class="text-success font-weight-700">{{ __('strong') }}strong</span></small>
                            </div>
                            <div class="row my-4">
                                <div class="col-12">
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                                        <label class="custom-control-label" for="customCheckRegister">
                                            <span class="text-muted">{{ __('I agree with the') }} <a
                                                    href="#!">{{ __('Privacy Policy') }}</a></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4">{{ __('Create account') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
