@extends('auth.layouts')

@section('content')
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Login</h3>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login.custom') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Username" id="username" class="form-control" name="username" required autofocus>
                                    @if ($errors->has('username'))
                                        <span class="text-danger">{{ $errors->first('username') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="parola" id="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
