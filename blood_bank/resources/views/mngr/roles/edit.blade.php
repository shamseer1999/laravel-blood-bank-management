@extends('mngr.layout.template')
@section('content')
    <div class="row">
        <div class="card">
            <ul class="ul-inline">
              <li class="url-anchor">
                  <a href="{{route('dashbord')}}">Home<small>/</small></a>
                  <a href="{{route('roles')}}">Roles<small>/</small></a>
                  <a href="{{route('roles')}}"><small> &larr;</small> back</a>  
              </li>
            </ul>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="text-center">
                  <h3><u>EDIT ROLE</u></h3>
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
                    <label for="">Role Name</label><small class="text-danger">*</small>
                    <input type="text" name="role_name" class="form-control border-primary" required value="{{$edit_data->role_name}}">
                  </div>
                 
                </div>
                <br>
                <div class="">
                  <input type="submit" value="Update" class="btn btn-primary">
                </div>
                
              </form>
            </div>
          </div>
    </div>
@endsection