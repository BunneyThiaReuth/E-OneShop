@extends('layouts.app')

@section('content')
<div class="container">
                <div class="mt-5 d-flex justify-content-center">
                    <img src="{{ URL::asset('admin/assets/images/favicon.png')}}" alt="Logo" style="width:40px;">
                    <h1 class="text-primary"> <storng>Reset Password</storng></h1>
                </div>
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-center">

                <div class="w-50">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class=" control-label">E-Mail Address</label>

                            <div>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
