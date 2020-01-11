@extends('layouts.app')

@section('content')
<div class="container">

    <img src="{{$pic}}" alt='icon' width=150px>

    <h3>{{$user->name}}</h3>
    <p>{{$user->myself}}</p>

    <a href="{{ route('kashikari.myprofedit',$user->id ) }}" class="btn btn-primary">{{ __('Profile Edit')  }}</a>
    <br><br><br>
    <h2>{{__('My Lent List')}}</h2>
    <div class="row">
        @foreach($kashikaris as $kashikari)
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('kashikari.edit',$kashikari->id ) }}">
                        <h3 class="card-title">{{$kashikari->title}}</h3>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
