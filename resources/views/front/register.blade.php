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

                <form action{{ route('register.store') }}" method="post" enctype="multipart/form-data">
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
                        <input type="password" class="form-control" id="password" name="password" placeholder="Kata sandi">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Konfirmasi kata sandi">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" name="bukti_bayar" role="button" class="custom-file-input" id="bukti_bayar">
                            <label class="custom-file-label" for="bukti_bayar">Bukti Pembayaran</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="icheck-primary">
                                <input type="checkbox" id="show-password">
                                <label for="show-password">
                                    Tampilkan sandi
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
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
                            <button type="submit" class="btn btn-primary btn-block" disabled="true">
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
                    $('input#confirm_password').attr('type', 'text');
                } else {
                    $('input#password').attr('type', 'password');
                    $('input#confirm_password').attr('type', 'password');
                }
            });

            $("#agreeTerms").on('change', function() {
                if ($(this).is(':checked')) {
                    $("button[type='submit']").removeAttr('disabled');
                } else {
                    $("button[type='submit']").attr('disabled', "disabled");
                }
            });

            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        });
    </script>
@endpush
