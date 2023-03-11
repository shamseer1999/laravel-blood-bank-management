@extends('mngr.layout.template')
@section('content')
    <div class="row">
        <div class="card">
          <ul class="ul-inline">
            <li class="url-anchor">
                <a href="{{route('dashbord')}}">Home<small>/</small></a>
                <a href="{{route('donners')}}">Donners</a>
            </li>
          </ul>
            <div class="card-body">
                {{-- <div class="row"> --}}
                {{-- <div class="col-md-12 grid-margin stretch-card"> --}}
                    {{-- <div class="card"> --}}
                      {{-- <div class="card-body"> --}}
                        <h4 class="card-title">All Donners</h4>
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th> Sl.No </th>
                                <th> Name </th>
                                <th>Blood Group</th>
                                <th> Phone </th>
                                <th> City </th>
                                <th> District </th>
                                <th> Action </th>
                              </tr>
                            </thead>
                            <tbody>
                                @if (sizeof($result) >0)
                                    @foreach ($result as $item)
                                        <tr>
                                            <td> {{$loop->iteration}} </td>
                                            <td> {{$item->first_name.' '.$item->last_name}} </td>
                                            <td>
                                              @switch($item->blood_group)
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
                                              @endswitch
                                            </td>
                                            <td> {{$item->phone}} </td>
                                            <td> {{$item->city}}</td>
                                            <td> {{$item->districts->district_name}}</td>   
                                            <td>
                                                <a href="{{route('view_donner',encrypt($item->id))}}" title="View" style="color: #27367f;"><i class="fa fa-eye" style="font-size:20px"></i></a>
                                                <a  href="{{route('edit_donner',encrypt($item->id))}}" title="Edit" style="color: #27367f;"><i class="fa fa-pencil" style="font-size:20px"></i></a>
                                                
                                            </td>
                                      </tr>
                                    @endforeach
                                @endif
                              
                              
                            </tbody>
                          </table>

                          <!--Pagination-->
                          <div>
                            {{$result->links()}}
                          </div>
                          <!--Pagination-->

                        </div>
                      {{-- </div> --}}
                    {{-- </div> --}}
                  {{-- </div> --}}
                {{-- </div> --}}
            </div>
          </div>
    </div>
@endsection