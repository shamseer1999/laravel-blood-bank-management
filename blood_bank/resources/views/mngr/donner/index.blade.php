@extends('mngr.layout.template')
@section('content')
    <div class="row">
        <div class="card">
            {{-- <div class="card-header w-100 mt-1">
              Add Donner
            </div> --}}
            <div class="card-body">
                <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">All Donners</h4>
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th> Sl.No </th>
                                <th> Name </th>
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
                                            <td> {{$item->phone}} </td>
                                            <td> {{$item->city}}</td>
                                            <td> {{$item->districts->district_name}}</td>   
                                            <td>
                                                <a href="" title="View" style="color: #27367f;"><i class="fa fa-eye" style="font-size:20px"></i></a>
                                                <a  href="#ui-basic" title="Edit" style="color: #27367f;"><i class="fa fa-pencil" style="font-size:20px"></i></a>
                                                
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
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
    </div>
@endsection