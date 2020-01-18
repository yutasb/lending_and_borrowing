@extends('layouts.app')

@section('content')

<div class='container'>

    <h2>{{__('Lent List')}}</h2><br>
    <div class="row">

        @foreach($kashikaris as $kashikari)
        @if($kashikari->kashikari_using == 1)

        <div class="card text-danger ml-3 mb-3">
            <a href="{{ route('kashikari.show',$kashikari->id ) }}">
                <img src="{{asset('storage/post_images/'.$kashikari->pic1)}}" alt='イメージ画像' width=180px>
                <h5 class="card-title text-center">
                    {{$kashikari->title}}　
                </h5>

                <div class="card-img-overlay">　
                    <h2 class='card-text'>{{__('Using')}}</h2>
                </div>
            </a>
        </div>

        @else
        <div class="card ml-3 mb-3">
            <a href="{{ route('kashikari.show',$kashikari->id ) }}">
                <img src="{{asset('storage/post_images/'.$kashikari->pic1)}}" alt='イメージ画像' width=180px> 　
                <h5 class="card-title text-center">
                    {{$kashikari->title}}　
                </h5>
            </a>
        </div>
        @endif @endforeach
    </div>
    <!-- </div> -->
</div>

</div> @endsection



<h2>{{__('Like')}}</h2>
<div class="row">
    @foreach($kashikaris as $kashikari)
    @foreach ($likes as $like)
    @if($like->user_id == Auth::user()->id)
    <!-- likeがあれば -->
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body text-center">
                <a href="{{ route('kashikari.show',$kashikari->id ) }}">
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
    @endforeach
</div>
<br><br><br>
