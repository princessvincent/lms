

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
                        <div class="card-header text-primary">Choose Course</div>
                        <form action="{{ url('updatecourse') }}" method="POST">
                            @csrf
                            <label for="course">Course</label>
                            <select name="course" class="form-control mb-3" id="">
                                @foreach($course as $courses)
                                     <option value="{{ $courses->name }}">{{ $courses->name }}</option>
                                @endforeach
                           
                            </select>
                            
                            <button type="submit" class="btn btn-primary">Update Course</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

