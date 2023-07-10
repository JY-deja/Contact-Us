<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous" defer></script>
      
    <title>Login</title>
</head>
<body class="bg-dark">

    <section class="Form m-5 p-5">
        <div class="container">
            <div class="row bg-white no-gutters">
                    <div class="col-4 offset-2 gx-0"><!--col-md-5-->
                        <img class="img-fluid" src=" {{ url('img/login.png')}}" alt="">
                    </div>
            
                <div class="col-4"><!--col-md-5-->
                    <form action=" " method="POST" class="justify py-4 m-3 px-4">
                        <div class="bg-white">
                            <p class="text-dark display-6 d-inline">Sign In</p>
                            <button class="float-end ri-facebook-fill btn-sm m-1 text-muted border border-black-50  rounded-pill bg-transparent d-inline"></button>
                            <button class="float-end ri-twitter-fill btn-sm m-1 text-muted border border-black-50  rounded-pill bg-transparent"></button>   
                        </div>
                        <div class="form-row">
                            <div class="">
                                <label for="exampleInputEmail1" class="form-label fw-bold">USERNAME</label>
                                <input type="email" name="user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="">
                                <label for="exampleInputPassword1" class="form-label fw-bold">PASSWORD</label>
                                <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="**********">
                            </div>
                        </div>
                          
                        <div class="form-row">
                            <div class="">
                                <button type="submit" class="btn1 btn-warning">Sign In</button>
                            </div>
                        </div>
                        <input type="checkbox" class="form-check-input check bg-warning" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                        <a href="#" class="float-end text-secondary fw-bold text-decoration-none">Forgot Password</a>
                        <p class="text-center text-dark">Not a member? <a href="#" class="text-warning text-decoration-none">Sign Up</a></p>  
                    </form>     
                </div>
            </div>
        </div>
                
           
        
    </section>  
        
    </body>
</html>

