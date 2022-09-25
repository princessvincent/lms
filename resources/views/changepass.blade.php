

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
                        <div class="card-header text-primary">Change Password</div>
                        <form action="{{ url('updatepass') }}" method="POST">
                            @csrf
                            <label for="feedback">Old password</label>
                            <input type="password" name="old_password" class="form-control mb-3"
                                placeholder="Old Password" required>
                            <label for="">New Password</label>
                            <input type="password" name="password" class="form-control mb-3"
                                placeholder="New Password" required>
                            <label for="">Confirm New Password</label>
                            <input type="password" name="confirm_password" class="form-control mb-3"
                                placeholder="Confirm New Password" required>
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

