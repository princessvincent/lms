

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
                        <div class="card-header text-primary">Regrade Task</div>
                        <form action="{{ url('gradetask/' . $regrade->id) }}" method="POST">
                            @csrf
                            <label for="feedback">Feedback</label>
                            <input type="text" name="feedback" class="form-control mb-3"
                                placeholder="Give your feedback to your student please" required>
                            <label for="">Mark</label>
                            <input type="number" name="status" class="form-control mb-3"
                                placeholder="Give mark for the task. e.g 10.0" required>
                            <label for="">Time</label>
                            <input type="time" name="time" class="form-control mb-3"
                                placeholder="the time you graded the task" required>
                            <button type="submit" class="btn btn-primary">Grade</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

