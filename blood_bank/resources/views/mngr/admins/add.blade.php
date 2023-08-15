@extends('mngr.layout.template')
@section('content')
    <div class="row">
        <div class="card">
            <ul class="ul-inline">
                <li class="url-anchor">
                    <a href="{{route('dashbord')}}">Home<small>/</small></a>
                    <a href="{{route('admins')}}">Admins<small>/</small></a>
                    <a href="{{route('admins')}}"><small> &larr;</small> back</a>
                </li>
            </ul>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="text-center">
                  <h3><u>ADD ADMIN</u></h3>
                </div>
                @if($errors->any())
                  <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{$error}}<br>
                    @endforeach
                  </div>
                @endif
                <div class="row">
                  <div class="col-md-6">
                    <label for="">Name</label><small class="text-danger">*</small>
                    <input type="text" name="name" class="form-control border-primary" required value="">
                  </div>
                  <div class="col-md-6">
                    <label for="">Email</label><small class="text-danger">*</small>
                    <input type="email" name="email" class="form-control border-primary" required value="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label for="">Username</label><small class="text-danger">*</small>
                    <input type="text" name="username" class="form-control border-primary" required value="">
                  </div>
                  <div class="col-md-6">
                    <label for="">Phone</label><small class="text-danger">*</small>
                    <input type="text" name="phone" class="form-control border-primary" required value="">
                  </div>
                  <div class="col-md-6">
                    <label for="">Password</label><small class="text-danger">*</small>
                    <input type="password" name="password" class="form-control border-primary" required value="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label for="">Role</label><small class="text-danger">*</small>
                    <select name="role" id="" class="form-select" required>
                        @if ($roles)
                            @foreach ($roles as $item)
                                <option value="{{ $item->id }}">{{ $item->role_name }}</option>
                            @endforeach
                        @endif
                    </select>
                  </div>
                </div>
                
                <br>
                <div class="text-center">
                  <input type="submit" value="Add Admin" class="btn btn-primary">
                </div>
                
              </form>
            </div>
          </div>
    </div>
@endsection