@extends('layouts.app')

@section('content')
<div class="container">
    <div class='row justify-content-center'>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('kashikari.otherprofile',$kashikari->user_id)}}"><img src="{{asset('storage/post_images/'.$kashikari->getIcon())}}" width=50px></a>
                    {{__($kashikari->title.''.$kashikari->category_id)}}
                    <a href="{{route('kashikari.msg',$kashikari->id)}}" class='btn btn-warning'>{{__('Borrow!')}} </a>




                </div>
                <div class='card-body text-center'>


                    @if($kashikari->pic1 == null)
                    <img src="/storage/post_images/noimage.png" width=150px>
                    @else
                    <img src="{{asset('storage/post_images/'.$kashikari->pic1)}}" alt='イメージ画像1' width=150px>
                    @endif


                    @if($kashikari->pic2 == null)
                    <img src="/storage/post_images/noimage.png" width=150px>
                    @else
                    <img src="{{asset('storage/post_images/'.$kashikari->pic2)}}" alt='イメージ画像2' width=150px>
                    @endif

                    @if($kashikari->pic3 == null)
                    <img src="/storage/post_images/noimage.png" width=150px>
                    @else
                    <img src="{{asset('storage/post_images/'.$kashikari->pic3)}}" alt='イメージ画像3' width=150px>
                    @endif


                    <p>{{$kashikari->place}}</p>
                    <p>{{$kashikari->price}}円　/ 1泊</p>
                    <p>{{$kashikari->comment}}</p>

                </div>
                <div class='card-header text-left'>
                    <h6>{{__('Board')}}</h6>
                    <form method='post'>
                        @csrf

                        <input type='submit' value='送信'>
                    </form>

                </div>

            </div>



        </div>
    </div>
</div>
@endsection
