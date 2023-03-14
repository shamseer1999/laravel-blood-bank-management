@extends('mngr.layout.template')
@section('content')
    <div class="row">
        <div class="card">
          <ul class="ul-inline">
            <li class="url-anchor">
                <a href="{{route('dashbord')}}">Home<small>/</small></a>
                <a href="{{route('roles')}}">Roles</a>
            </li>
          </ul>
            <div class="card-body">
                {{-- <div class="row"> --}}
                {{-- <div class="col-md-12 grid-margin stretch-card"> --}}
                    {{-- <div class="card"> --}}
                      {{-- <div class="card-body"> --}}
                        <h4 class="card-title">Roles</h4>
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th> Sl.No </th>
                                <th> Role Name </th>
                                <th> Status </th>
                                <th> Action </th>
                              </tr>
                            </thead>
                            <tbody>
                                @if (sizeof($result) >0)
                                    @foreach ($result as $item)
                                        <tr>
                                            <td> {{$loop->iteration}} </td>
                                            <td> {{$item->role_name}} </td> 
                                            <td>
                                              {{$item->status}}
                                            </td>
                                            <td>
                                              <a  href="{{route('edit_role',encrypt($item->id))}}" title="Edit" style="color: #27367f;"><i class="fa fa-pencil" style="font-size:20px"></i></a>
 
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