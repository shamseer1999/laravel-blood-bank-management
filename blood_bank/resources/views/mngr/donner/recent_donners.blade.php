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
                        <h4 class="card-title">All Recent Donetors (90 days)</h4><br>
                        <form action="" method="GET">
                        {{-- <div class="row">
                          <div class="col-md-3">
                            <label for="">First Name</label>
                            <input type="text" name="fname" value="{{Request::get('fname')}}" class="form-control border-primary rounded">
                          </div>
                          <div class="col-md-3">
                            <label for="">Last Name</label>
                            <input type="text" name="lname" value="{{Request::get('lname')}}" class="form-control border-primary rounded">
                          </div>
                          <div class="col-md-2">
                            <label for="">District</label>
                            <select name="district" id="" class="form-select border-primary rounded">
                              <option value="">--SELECT--</option>
                              @if (!empty($districts))
                                  @foreach ($districts as $item)
                                      <option value="{{$item->id}}" {{Request::get('district') == $item->id ? 'selected' : ''}}>{{$item->district_name}}</option>
                                  @endforeach
                              @endif
                            </select>
                          </div>
                          <div class="col-md-2">
                            <label for="">Blood Group</label>
                            <select name="group" id="" class="form-select border-primary rounded">
                              <option value="">--SELECT--</option>
                              <option value="1" {{Request::get('group') == 1 ? 'selected' : ''}}>A+ve</option>
                              <option value="2" {{Request::get('group') == 2 ? 'selected' : ''}}>B+ve</option>
                              <option value="3" {{Request::get('group') == 3 ? 'selected' : ''}}>AB+ve</option>
                              <option value="4" {{Request::get('group') == 4 ? 'selected' : ''}}>O+ve</option>
                              <option value="5" {{Request::get('group') == 5 ? 'selected' : ''}}>A-ve</option>
                              <option value="6" {{Request::get('group') == 6 ? 'selected' : ''}}>B-ve</option>
                              <option value="7" {{Request::get('group') == 7 ? 'selected' : ''}}>AB-ve</option>
                              <option value="8" {{Request::get('group') == 8 ? 'selected' : ''}}>O-ve</option>
                            </select>
                          </div>
                          
                          <div class="col-md-2 pt-3">
                            <input type="submit" value="Filter" name="filter" class="btn btn-sm btn-primary rounded">
                            <input type="submit" value="clear" name="filter" class="btn btn-sm btn-primary rounded">
                          </div>
                        </div> --}}
                      <br>
                    <br>
                  
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
                                <th>Donnated Date</th>
                                <th> Action </th>
                              </tr>
                            </thead>
                            <tbody>
                                @if (sizeof($result) >0)
                                    @foreach ($result as $item)
                                        <tr>
                                            <td> {{$loop->iteration}} </td>
                                            <td> {{$item->Donners->first_name.' '.$item->Donners->last_name}} </td>
                                            <td>
                                              @switch($item->Donners->blood_group)
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
                                            <td> {{$item->Donners->phone}} </td>
                                            <td> {{$item->Donners->city}}</td>
                                            <td> {{$item->Donners->districts->district_name}}</td>   
                                            <td>
                                                {{ $item->donated_date ? date('d-m-Y',strtotime($item->donated_date)) : '' }}
                                                {{-- <a href="{{route('view_donner',encrypt($item->id))}}" title="View" style="color: #27367f;"><i class="fa fa-eye" style="font-size:20px"></i></a>
                                                <a  href="{{route('edit_donner',encrypt($item->id))}}" title="Edit" style="color: #27367f;"><i class="fa fa-pencil" style="font-size:20px"></i></a>
                                                 --}}
                                            </td>
                                            <td></td>
                                      </tr>
                                    @endforeach
                                    @else
                                      <tr>
                                        <td colspan="7">No record found</td>
                                      </tr>
                                @endif
                              
                              
                            </tbody>
                          </table>
                          {{-- @if (sizeof($result) >0)
                            <div><br>
                              <input type="submit" name="filter" class="btn btn-primary" style="float:right;" value="Export Data">
                            </div> 
                          @endif --}}
                          

                          <!--Pagination-->
                          <div>
                            {{$result->links()}}
                          </div>
                          <!--Pagination-->

                        </div>
                      </form>
                      {{-- </div> --}}
                    {{-- </div> --}}
                  {{-- </div> --}}
                {{-- </div> --}}
            </div>
          </div>
    </div>
@endsection