@extends('mngr.layout.template')
@section('content')
    <div class="row">
        <div class="card">
          <ul class="ul-inline">
            <li class="url-anchor">
                <a href="{{route('dashbord')}}">Home<small>/</small></a>
                <a href="{{route('admins')}}">Admins</a>
            </li>
          </ul>
            <div class="card-body">
                {{-- <div class="row"> --}}
                {{-- <div class="col-md-12 grid-margin stretch-card"> --}}
                    {{-- <div class="card"> --}}
                      {{-- <div class="card-body"> --}}
                        <h4 class="card-title">Admins</h4>
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th> Sl.No </th>
                                <th> Name </th>
                                <th> Phone </th>
                                <th> Email </th>
                                <th> Status </th>
                                <th> Action </th>
                              </tr>
                            </thead>
                            <tbody>
                                @if (sizeof($result) >0)
                                    @foreach ($result as $item)
                                        <tr>
                                            <td> {{$loop->iteration}} </td>
                                            <td> {{$item->name}} </td>
                                            <td> {{$item->phone}} </td>
                                            <td> {{$item->email}}</td> 
                                            <td>
                                              @if ($item->trashed())
                                                  Inactive
                                                @else
                                                  Active
                                              @endif
                                            </td>
                                            <td>
                                              <a  href="{{route('admin_edit',encrypt($item->id))}}" title="Edit" style="color: #27367f;"><i class="fa fa-pencil" style="font-size:20px"></i></a>

                                              @if ($item->trashed() ==false)
                                              <a href="{{route('admin_delete',encrypt($item->id))}}" title="Delete" style="color: #27367f;"><i class="fa fa-close" onclick="return confirm('Are you sure you want to delete')" style="font-size:20px"></i></a>
                                                @else
                                                <a href="{{route('admin_activate',encrypt($item->id))}}" title="Delete" style="color: #27367f;"><i class="fa fa-refresh" onclick="return confirm('Are you sure you want to activate')" style="font-size:20px"></i></a>
                                                @endif
                                                
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