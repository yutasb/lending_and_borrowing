<!-- 編集及び削除 -->
<!-- マイページからしか遷移できないようにする予定 -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lent Edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('kashikari.update',$kashikari->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class=" form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $kashikari->title }}" autocomplete="title" autofocus>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                            <div class="col-md-6">
                                <select name='category_id'>
                                    @foreach(config('category') as $category => $name)
                                    <option value="{{ $category }}">{{$name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class=" form-group row">
                            <label for="method_id" class="col-md-4 col-form-label text-md-right">{{ __('Method') }}</label>
                            <div class="col-md-6">
                                <select name='method_id'>
                                    @foreach(config('method') as $method => $name)
                                    <option value="{{ $method }}">{{$name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="place" class="col-md-4 col-form-label text-md-right">{{ __('Place') }}</label>

                            <div class="col-md-6">
                                <input id="place" type="text" class="form-control @error('place') is-invalid @enderror" name="place" value="{{ $kashikari->place }}" autocomplete="place" autofocus>

                                @error('place')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $kashikari->price }}" autocomplete="price" autofocus>

                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('comment')}}</label>

                            <div class="col-md-6">
                                <textarea id="comment" type="text" class="form-control @error('comment') is-invalid @enderror" name="comment" autocomplete="comment" autofocus>{{ $kashikari->comment }}</textarea>

                                @error('comment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="pic1" class="col-md-4 col-form-label text-md-right">{{ __('pic1')}}</label>

                            <div class="col-md-6">
                                <img src="{{$kashikari->pic1}}" alt='イメージ画像' width=180px>
                                <input id="pic1" type="file" class="form-control-file @error('pic1') is-invalid @enderror" name="pic1" value="{{$kashikari->pic1}}">


                                @error('pic1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="pic2" class="col-md-4 col-form-label text-md-right">{{ __('pic2')}}</label>

                            <div class="col-md-6">
                                @if($kashikari->pic2 !== null)
                                <img src="{{$kashikari->pic2}}" alt='イメージ画像1' width=150px>
                                @endif

                                <input id="pic2" type="file" class="form-control-file @error('comment') is-invalid @enderror" name="pic2" value="{{ $kashikari->pic2 }}">

                                @error('pic2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pic3" class="col-md-4 col-form-label text-md-right">{{ __('pic3')}}</label>

                            <div class="col-md-6">
                                @if($kashikari->pic3 !== null)
                                <img src="{{$kashikari->pic3}}" alt='イメージ画像1' width=150px>
                                @endif

                                <input id="pic3" type="file" class="form-control-file @error('comment') is-invalid @enderror" name="pic3" value="{{ $kashikari->pic3 }}">
                                @error('pic3')
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
                    <div class='col-sm-6 offset-md-4'>
                        <form action="{{route('kashikari.delete',$kashikari->id)}}" method='post' class='d-line'>
                            @csrf
                            <button class="btn btn-danger" onclick='return confirm("削除しますか？");'>{{ __('Delete')  }}</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
