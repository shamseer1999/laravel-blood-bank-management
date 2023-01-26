<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</head>
<body>
    <section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5">

            <h3 class="mb-5 text-center">Register Admin</h3>
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
            @endif
            <form action="{{route('register_data')}}" method="post">
                @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="typeEmailX-2">Name</label>
                      <input type="text" id="typeEmailX-2" name="name" class="form-control form-control-lg border-primary" value="{{old('name')}}" />
                      
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="typeEmailX-2">Email</label>
                      <input type="email" id="typeEmailX-2" name="email" class="form-control form-control-lg border-primary" value="{{old('email')}}" />
                      
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="typeEmailX-2">phone</label>
                      <input type="text" id="typeEmailX-2" name="phone" class="form-control form-control-lg border-primary" value="{{old('phone')}}" />
                      
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="typeEmailX-2">Username</label>
                      <input type="text" id="typeEmailX-2" name="username" class="form-control form-control-lg border-primary" value="{{old('username')}}" />
                      
                    </div>
        
                    
                </div>
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="typePasswordX-2">Password</label>
              <input type="password" id="typePasswordX-2" name="password" class="form-control form-control-lg border-primary" />
              
            </div>
            
            

            <!-- Checkbox -->
            

            <center><button class="btn btn-primary btn-lg btn-block" type="submit">Register</button></center>
        </form>
            

            

            

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>