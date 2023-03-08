@extends('mngr.layout.template')
@section('content')
    <div class="row">
        <div class="card">
            <ul class="ul-inline">
                <li class="url-anchor">
                    <a href="{{route('dashbord')}}">Home<small>/</small></a>
                    <a href="{{route('donners')}}">Donners<small>/</small></a>
                    <a href="{{route('donners')}}"><small> &larr;</small> back</a>
                </li>
            </ul>
            <div class="card-body">
                <h4 class="card-title">Donner Profile</h4>
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{asset('storage/profile/'.$result->profile_image)}}" alt="" class="avatar">
                    </div>
                    <div class="col-md-4">
                        <p>Name : {{$result->first_name.' '.$result->last_name}}</p>
                        <p>Phone : {{$result->phone}}</p>
                        <p>City : {{$result->city}}</p>
                        <p>District : {{$result->districts->district_name}}</p>
                        <p>Address : {{$result->address}}</p>
                    </div>
                    <div class="col-md-4">
                        <p>Blood Group : @switch($result->blood_group)
                            @case(1)
                                {{'A +ve'}}
                                @break
                            @case(2)
                                {{'B +ve'}}
                                @break
                            @case(3)
                                {{'AB +ve'}}
                                @break
                            @case(4)
                                {{'O +ve'}}
                                @break
                            @case(5)
                                {{'A -ve'}}
                                @break
                            @case(6)
                                {{'B -ve'}}
                                @break
                            @case(7)
                                {{'AB -ve'}}
                                @break
                            @default
                                {{'O -ve'}}
                        @endswitch</p>
                        <p>Age : {{$result->age}}</p>
                        <p>Job : {{$result->donner_job}}</p>
                        <p>Height : {{$result->height}}</p>
                        <p>Weight : {{$result->weight}}</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection