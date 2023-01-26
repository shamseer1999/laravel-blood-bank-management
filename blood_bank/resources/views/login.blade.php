<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
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

            <h3 class="mb-5 text-center">Sign in</h3>
            @if (session()->has('danger'))
                <div class="alert alert-danger alert-dismissable">
                  {{session('danger')}}
                </div>
            @endif
            <form action="" method="post">
              @csrf
            <div class="form-outline mb-4">
                <label class="form-label" for="typeEmailX-2">Username</label>
              <input type="text" name="username" id="typeEmailX-2" class="form-control form-control-lg border-primary" />
              
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="typePasswordX-2">Password</label>
              <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg border-primary" />
              
            </div>

            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-start mb-4">
              <input class="form-check-input border-primary" type="checkbox" value="" id="form1Example3" />
              <label class="form-check-label" name="remember" for="form1Example3"> Remember password </label>
            </div>

            <button class="btn btn-primary btn-lg btn-block" name="btn_login" type="submit">Login</button>
          </form>
            <br>
            <span>Do you have no account.<a href="{{route('register')}}">Register here</a></span>
            

            

            

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>