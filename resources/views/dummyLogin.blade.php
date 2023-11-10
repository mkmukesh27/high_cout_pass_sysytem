@extends('layouts.app')

@section('css')

@endsection


@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session('failed'))
<div class="alert alert-danger" role="alert">
    {{ session('failed') }}
</div>
@endif


<div class="container-fluid m-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white font-weight-bold">{{ __('Department Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('doLogin') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="user_id" class="col-md-4 col-form-label text-md-end">{{ __('User Id') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control form_input @error('user_id') is-invalid @enderror text-uppercase block-copy-paste" name="user_id" value="{{ old('user_id') }}">

                                    @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <span id="user_id_err" class="font-weight-800 text-danger">{{ Session::get('user_id') }}</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control form_input @error('password') is-invalid @enderror block-copy-paste" name="password" required autocomplete=off>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    @if (Session::has('pwd'))
                                    <span id="password_err" class="font-weight-800 text-danger">{{ Session::get('pwd') }}</span>
                                    @endif

                                </div>
                            </div>
                            



                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
<script type="text/javascript">
    $('#reload').click(function() {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function(data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });

    $('.block-copy-paste').on("cut copy paste", function(e) {
        e.preventDefault();
        return false;
    });
    $(".block-copy-paste").on("drop", function() {
        // e.preventDefault();
        return false;
    });

    $('input[name=user_id]').on('input', function(evt) {
        var input = $(this);
        var start = input[0].selectionStart;
        $(this).val(function(_, val) {
            return val.toUpperCase();
        });
        input[0].selectionStart = input[0].selectionEnd = start;
    });
</script>
@endsection