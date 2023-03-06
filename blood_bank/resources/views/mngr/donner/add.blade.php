@extends('mngr.layout.template')
@section('content')
    <div class="row">
        <div class="card">
            {{-- <div class="card-header w-100 mt-1">
              Add Donner
            </div> --}}
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="text-center">
                  <h3><u>ADD DONNER</u></h3>
                </div>
                @if($errors->any())
                  <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{$error}}
                    @endforeach
                  </div>
                @endif
                <div class="row">
                  <div class="col-md-3">
                    <label for="">First Name</label><small class="text-danger">*</small>
                    <input type="text" name="first_name" class="form-control border-primary" required value="{{old('first_name')}}">
                  </div>
                  <div class="col-md-3">
                    <label for="">Last Name</label><small class="text-danger">*</small>
                    <input type="text" name="last_name" class="form-control border-primary" required value="{{old('last_name')}}">
                  </div>
                  <div class="col-md-3">
                    <label for="">Phone</label><small class="text-danger">*</small>
                    <input type="text" name="phone" class="form-control border-primary" required value="{{old('phone')}}">
                  </div>
                  <div class="col-md-3">
                    <label for="">Email</label><small class="text-danger">*</small>
                    <input type="email" name="email" class="form-control border-primary" required value="{{old('email')}}">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label for="">Age</label><small class="text-danger">*</small>
                    <input type="number" name="age" class="form-control border-primary" required value="{{old('age')}}">
                  </div>
                  <div class="col-md-3">
                    <label for="">Date of Birth</label><small class="text-danger">*</small>
                    <input type="date" name="dob" class="form-control border-primary" required value="{{old('dob')}}">
                  </div>
                  <div class="col-md-3">
                    <label for="">City</label><small class="text-danger">*</small>
                    <input type="text" name="city" class="form-control border-primary" required value="{{old('city')}}">
                  </div>
                  <div class="col-md-3">
                    <label for="">District</label><small class="text-danger">*</small>
                    <select name="district" id="" class="form-control border-primary" required>
                      <option value="">--SELECT--</option>
                      @if (!empty($districts))
                          @foreach ($districts as $item)
                              <option value="{{$item->id}}" {{old('district')==$item->id ? 'selected' : ''}}>{{$item->district_name}}</option>
                          @endforeach
                      @endif
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label for="">Job</label><small class="text-danger">*</small>
                    <input type="text" name="job" class="form-control border-primary">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="">Height<small>(cm)</small></label>
                        <input type="number" name="height" class="form-control border-primary">

                      </div>
                      <div class="col-md-6">
                        <label for="">Weight<small>(kg)</small></label>
                        <input type="number" name="weight" class="form-control border-primary">

                      </div>
                     
                    </div>
                    
                  </div>
                  <div class="col-md-9">
                    <label for="">Address</label><small class="text-danger">*</small>
                    <textarea name="address" id="" class="form-control border-primary" cols="10" rows="6" required>{{old('address')}}</textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label for="">Blood Group</label><small class="text-danger">*</small>
                    <select name="blood" id="" class="form-control border-primary">
                      <option value="">--SELECT--</option>
                      <option value="1">A +ve</option>
                      <option value="2">B +ve</option>
                      <option value="3">AB +ve</option>
                      <option value="4">O +ve</option>
                      <option value="5">A -ve</option>
                      <option value="6">B -ve</option>
                      <option value="7">AB -ve</option>
                      <option value="8">O -ve</option>
                    </select>
                  </div>
                  <div class="col-md-9">
                    <label for="">Profile Image</label>
                    <input type="file" class="form-control border-primary" name="pr_image">
                  </div>
                </div>
                <br>
                <div class="text-center">
                  <input type="submit" value="Submit" class="btn btn-primary">
                </div>
                
              </form>
            </div>
          </div>
    </div>
@endsection