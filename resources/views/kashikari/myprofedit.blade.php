<!-- プロフィール編集 -->
<!-- マイページからしか遷移できないようにする予定 -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My profile Edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('kashikari.myprofupdate',$user->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="pic" class="col-md-4 col-form-label text-md-right">{{ __('Pic') }}</label>
                            <div class="col-md-6">
                                <input id=" pic" type="file" class="form-control-file @error('pic') is-invalid @enderror" name="pic" value="{{ $pic }}" autocomplete="pic" autofocus>

                                @error('pic')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="myself" class="col-md-4 col-form-label text-md-right">{{ __('myself') }}</label>

                            <div class="col-md-6">
                                <textarea id="myself" type="text" rows='5' cols='40' class="form-control @error('myself') is-invalid @enderror" name="myself" autocomplete="myself" autofocus>{{ $user->myself }}</textarea>

                                @error('myself')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <br>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
