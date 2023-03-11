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
              <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="text-center">
                  <h3><u>EDIT DONNER</u></h3>
                </div>
                @if($errors->any())
                  <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{$error}}
                    @endforeach
                  </div>
                @endif
                <div class="row">
                  <div class="col-md-6">
                    <label for="">First Name</label><small class="text-danger">*</small>
                    <input type="text" name="first_name" class="form-control border-primary" required value="{{$edit_data->first_name}}">
                  </div>
                  <div class="col-md-6">
                    <label for="">Last Name</label><small class="text-danger">*</small>
                    <input type="text" name="last_name" class="form-control border-primary" required value="{{$edit_data->last_name}}">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <label for="">Age</label><small class="text-danger">*</small>
                    <input type="number" name="age" class="form-control border-primary" required value="{{$edit_data->age}}">
                  </div>
                  <div class="col-md-4">
                    <label for="">City</label><small class="text-danger">*</small>
                    <input type="text" name="city" class="form-control border-primary" required value="{{$edit_data->city}}">
                  </div>
                  <div class="col-md-4">
                    <label for="">District</label><small class="text-danger">*</small>
                    <select name="district" id="" class="form-control border-primary" required>
                      <option value="">--SELECT--</option>
                      @if (!empty($districts))
                          @foreach ($districts as $item)
                              <option value="{{$item->id}}" {{$edit_data->district==$item->id ? 'selected' : ''}}>{{$item->district_name}}</option>
                          @endforeach
                      @endif
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label for="">Job</label><small class="text-danger">*</small>
                    <input type="text" name="job" class="form-control border-primary" value="{{$edit_data->donner_job}}">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="">Height<small>(cm)</small></label>
                        <input type="number" name="height" class="form-control border-primary" value="{{$edit_data->height}}">

                      </div>
                      <div class="col-md-6">
                        <label for="">Weight<small>(kg)</small></label>
                        <input type="number" name="weight" class="form-control border-primary" value="{{$edit_data->weight}}">

                      </div>
                     
                    </div>
                    
                  </div>
                  
                  <div class="col-md-6">
                    <label for="">Address</label><small class="text-danger">*</small>
                    <textarea name="address" id="" class="form-control border-primary" cols="10" rows="6" required>{{$edit_data->address}}</textarea>
                  </div>
                  <div class="col-md-3">
                    <label for="">Blood Group</label><small class="text-danger">*</small>
                    <select name="blood" id="" class="form-control border-primary">
                      <option value="">--SELECT--</option>
                      <option value="1" {{$edit_data->blood_group==1 ? 'selected' : ''}}>A +ve</option>
                      <option value="2" {{$edit_data->blood_group==2 ? 'selected' : ''}}>B +ve</option>
                      <option value="3" {{$edit_data->blood_group==3 ? 'selected' : ''}}>AB +ve</option>
                      <option value="4" {{$edit_data->blood_group==4 ? 'selected' : ''}}>O +ve</option>
                      <option value="5" {{$edit_data->blood_group==5 ? 'selected' : ''}}>A -ve</option>
                      <option value="6" {{$edit_data->blood_group==6 ? 'selected' : ''}}>B -ve</option>
                      <option value="7" {{$edit_data->blood_group==7 ? 'selected' : ''}}>AB -ve</option>
                      <option value="8"{{$edit_data->blood_group==8 ? 'selected' : ''}} >O -ve</option>
                    </select>
                  </div>
                </div>
                <br>
                <div class="text-center">
                  <input type="submit" value="Update" class="btn btn-primary">
                </div>
                
              </form>
            </div>
          </div>
    </div>
@endsection