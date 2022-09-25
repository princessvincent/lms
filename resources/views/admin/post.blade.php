@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <div>
            @if (session()->has('status'))
                <div class="alert alert-success">
                    {{ session()->get('status') }}
                </div>
            @endif
        </div>
        <div class="">
            <div class="col-lg-12 col-md-12">
                <div class="card bg-secondary shadow border-0">
                
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                        <div class="btn-wrapper text-center">
                            <h4 class="btn btn-neutral btn-icon">Create Post</h4>
                        </div>
                        </div>
                        <form role="form" method="POST" action="{{ route('create') }}">
                            @csrf
                            <input class="form-control" type="hidden" name="user_id" value="{{ Auth::user()->id }}"
                                required autofocus>


                            <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                <label for="">Title</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                        type="text" placeholder="{{ __('Title') }}" name="title"
                                        value="{{ old('title') }}" required>
                                </div>
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                <label for="">Description</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" type="text"
                                        placeholder="{{ __('Description') }}" name="description" required>

                                        </textarea>
                                </div>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('link') ? ' has-danger' : '' }}">
                                <label for="">Link</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <input class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}"
                                        type="text" placeholder="{{ __('Add Link if Applicable') }}" name="link"
                                        value="{{ old('link') }}">
                                </div>
                                @if ($errors->has('link'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">{{ __('Make Announcement') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
