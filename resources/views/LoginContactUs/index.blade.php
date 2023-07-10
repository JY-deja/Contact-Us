<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('css/style_login.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous" defer></script>
      
    <title>Login</title>
</head>
<body>
    <section class="ftco-section">
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-12 col-lg-10">
    <div class="wrap d-md-flex">
    <img class="img img-fluid" src=" {{ url('img/login.png')}}" alt="">
    <div class="login-wrap p-4 p-md-5">
    <div class="d-flex">
    <div class="w-100">
    <h3 class="mb-4">Sign In</h3>
    </div>
    <div class="w-100">
    <p class="social-media d-flex justify-content-end">
    <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
    <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
    </p>
    </div>
    </div>
    <form action="#" class="signin-form">
    <div class="form-group mb-3">
    <label class="label" for="name">Username</label>
    <input type="text" class="form-control" placeholder="Username" required>
    </div>
    <div class="form-group mb-3">
    <label class="label" for="password">Password</label>
    <input type="password" class="form-control" placeholder="Password" required>
    </div>
    <div class="form-group">
    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
    </div>
    <div class="form-group d-md-flex">
    <div class="w-50 text-left">
    <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
    <input type="checkbox" checked>
    <span class="checkmark"></span>
    </label>
    </div>
    <div class="w-50 text-md-right">
    <a href="#">Forgot Password</a>
    </div>
    </div>
    </form>
    <p class="text-center">Not a member? <a data-toggle="tab" href="#signup">Sign Up</a></p>
    </div>
    </img>
    </div>
    </div>
    </div>
    </section>    
</body>
</html>

