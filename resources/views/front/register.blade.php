@extends('layouts.front.auth')

@section('content')
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ url('') }}" class="h1"><b>PPDB</b> <br> SD Alam Amani</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Daftar akun baru</p>

                @if (session()->has('registerError'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Registrasi Gagal!</h5>
                        {{ session('registerError') }}.
                    </div>
                @endif

                <form action{{ route('register.store') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Nama Lengkap Calon Siswa" value="{{ old('name') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Kata sandi">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="confirm_password" placeholder="Konfirmasi kata sandi">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" name="terms" value="1">
                                <label for="agreeTerms">
                                    Saya setuju dengan segala <a href="#">syarat dan ketentuan</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                Daftar
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <hr>
                    <p>
                        Anda sudah memiliki akun? Silahkan masuk dengan klik tombol di bawah ini.
                    </p>
                    <a href="{{ route('login') }}" class="btn btn-block btn-primary">
                        <i class="fas fa-sign-in-alt"></i>
                        Login!
                    </a>
                </div>

            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
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
