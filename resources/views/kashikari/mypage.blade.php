@extends('layouts.app')

@section('content')
<div class="container">

    <img src="{{$pic}}" alt='icon' width=150px>

    <h3>{{$user->name}}</h3>

    <p>{!! nl2br(e($user->myself)) !!}</p>
    <a href="{{ route('kashikari.myprofedit',$user->id ) }}" class="btn btn-primary">{{ __('Profile Edit')  }}</a>
    <br><br><br>
    <h2>{{__('My Lent List')}}</h2>
    <div class="row">
        @foreach($kashikaris as $kashikari)
        @if($kashikari->user_id == Auth::user()->id )
        @if($kashikari->kashikari_using == 0)
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body text-center">
                    <a href="{{ route('kashikari.edit',$kashikari->id ) }}">
                        <img src="{{asset('storage/post_images/'.$kashikari->pic1)}}" alt='イメージ画像' width=150px>
                        <h3 class="card-title">{{$kashikari->title}}</h3>
                    </a>
                </div>
            </div>
        </div>
        @endif
        @endif
        @endforeach
    </div>
    <br><br><br>

    <h2>{{__('Using')}}</h2>
    <div class="row">
        @foreach($kashikaris as $kashikari)
        @if($kashikari->user_id == Auth::user()->id )
        @if($kashikari->kashikari_using == 1)
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body text-center">
                    <a href="{{ route('chat.index',$kashikari->id ) }}">
                        <img src="{{asset('storage/post_images/'.$kashikari->pic1)}}" alt='イメージ画像' width=180px>
                        <h5 class="card-title text-center">
                            {{$kashikari->title}}　
                        </h5>
                        <p class='card body text-left'>
                            <!-- そのチャットの最後のメッセージ表示したい -->
                        </p>
                    </a>
                    <a href="{{route('return.confirm',$kashikari->id)}}">
                        <input name='return' type='button' class='btn btn-warning' value="{{__('Return')}}">
                    </a>
                    </a>
                </div>
            </div>
        </div>
        @endif
        @endif
        @endforeach
    </div>
    <br><br><br>


    <h2>{{__('Borrow')}}</h2>
    <div class="row">
        @foreach($kashikaris as $kashikari)
        @if ($kashikari -> borrower == Auth::user()->id)
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body text-center">
                    <a href="{{ route('chat.index',$kashikari->id ) }}">
                        <img src="{{asset('storage/post_images/'.$kashikari->pic1)}}" alt='イメージ画像' width=180px>
                        <h5 class="card-title text-center">
                            {{$kashikari->title}}　
                        </h5>
                    </a>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>

</div>
@endsection
