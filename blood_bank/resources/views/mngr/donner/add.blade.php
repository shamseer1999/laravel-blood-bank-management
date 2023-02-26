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
                  <div class="col">
                    <label for="">First Name</label><small class="text-danger">*</small>
                    <input type="text" name="first_name" class="form-control border-primary" required value="{{old('first_name')}}">
                  </div>
                  <div class="col">
                    <label for="">Last Name</label><small class="text-danger">*</small>
                    <input type="text" name="last_name" class="form-control border-primary" required value="{{old('last_name')}}">
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <label for="">Phone</label><small class="text-danger">*</small>
                    <input type="text" name="phone" class="form-control border-primary" required value="{{old('phone')}}">
                  </div>
                  <div class="col">
                    <label for="">Email</label><small class="text-danger">*</small>
                    <input type="email" name="email" class="form-control border-primary" required value="{{old('email')}}">
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <label for="">City</label><small class="text-danger">*</small>
                    <input type="text" name="city" class="form-control border-primary" required value="{{old('city')}}">
                  </div>
                  <div class="col">
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
                  <div class="col">
                    <label for="">Address</label><small class="text-danger">*</small>
                    <textarea name="address" id="" class="form-control border-primary" cols="10" rows="4" required>{{old('address')}}</textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <label for="">Profile Image</label>
                    <input type="file" class="form-control border-primary" name="pr_image">
                  </div>
                </div><br>
                <div class="text-center">
                  <input type="submit" value="Submit" class="btn btn-primary">
                </div>
                
              </form>
            </div>
          </div>
    </div>
@endsection