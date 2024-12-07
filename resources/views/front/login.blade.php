@extends('layouts.front.auth')

@section('content')
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ url('') }}" class="h1"><b>PPDB</b> Saka</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Login terlebih dahulu untuk melakukan pendaftaran</p>

                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Login Gagal!</h5>
                        {{ session('loginError') }}.
                    </div>
                @endif

                <form action="{{ route('loginAttempt') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="show-password">
                                <label for="show-password">
                                    Tampilkan sandi
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-sign-in-alt"></i>
                                Login
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <hr>
                <p class="mb-1 text-center">
                    <a href="forgot-password.html">Lupa kata sandi?</a>
                </p>
                <p class="mb-0 text-center">
                    <a href="{{ route('register') }}" class="text-center btn btn-primary">
                        <i class="fas fa-user-plus"></i>
                        Buat akun baru!
                    </a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#show-password').on('change', function() {
                if ($(this).is(':checked')) {
                    $('input#password').attr('type', 'text');
                } else {
                    $('input#password').attr('type', 'password');
                }
            });
        });
    </script>
@endpush
