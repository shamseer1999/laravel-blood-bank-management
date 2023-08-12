@extends('mngr.layout.template')
@section('content')
    <div class="row">
        <div class="card">
            <ul class="ul-inline">
              <li class="url-anchor">
                  <a href="{{route('dashbord')}}">Home<small>/</small></a>
                  <a href="{{route('donners')}}">Donners</a>
                  <a href="{{route('donners')}}"><small> &larr;</small> back</a>
              </li>
            </ul>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="text-center">
                  <h3><u>ADD DONATTED DONNERS</u></h3>
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
                        <label for="">Donatted Date</label>
                        <input type="date" name="donnated_date" id="" class="form-control" required>
                    </div>
                  <div class="col-md-6">
                    <label for="">District</label>
                    <select name="district" class="form-select" id="district" required onchange="get_users(this)">
                        <option value="">--SELECT--</option>
                        @if ($districts)
                            @foreach ($districts as $item)
                                <option value="{{ $item->id }}">{{ $item->district_name }}</option>
                            @endforeach
                        @endif
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="">Donners</label>
                    <select name="donners" class="form-select" id="donners" required>

                    </select>
                  </div>
                </div>
                
                <br>
                <div class="">
                  <input type="submit" value="Submit" class="btn btn-primary">
                </div>
                
              </form>
            </div>
          </div>
    </div>
    <script>
        function get_users(vl){
            dist_id = vl.value

            $.ajax({
                url:'{{ route('get_users')}}',
                type:'GET',
                data:{
                    'dist_id':dist_id
                },
                success:function(response){
                    var donners = $("#donners")
                    donners.empty();
                    var htm='<option value="">--SELECT--</option>';
                    $.each(response,function(index,val){
                        htm+='<option value="'+val.id+'">'+val.first_name+' '+val.last_name+'</option>'
                    })

                    donners.append(htm)
                }
            })
        }
    </script>
@endsection