<!DOCTYPE html>
<html lang="en">
                          {{-- **************************************Header of page************************************** --}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Contact</title>

    <!--link css-->

    {{-- ************************************************************************************************************************************************ --}}
    
    <!--css-->
    <link rel="stylesheet" href="{{ url('css/contact.css')}}">
    <!--icons-bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!--datatable-css-->
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <!--css jquery-confirm-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!--link js-->

    {{-- ************************************************************************************************************************************************ --}}

    <!--declare jquery-->
     <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous" defer></script>
    {{-- file_js --}}
    <script src="{{ url('js/contact.js')}}" defer></script>
    <script src="{{ url('js/categorie.js')}}" defer></script>
    <script src="{{ url('js/login.js')}}" defer></script>
    {{-- script declare --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js" defer></script>
    <!--jquery-confirm-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js" defer></script>
    <!--datatable-->
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" defer></script>
    <!--sweetalert-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" defer></script>
    <!--bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous" defer></script>
   
    {{-- In worst case --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js" defer></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" type="text/javascript" ></script>  --}}
</head>
                          {{-- **************************************Body of page************************************** --}}
<body>
                          {{-- **************************************Navbar of page************************************** --}}
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-Info bg-muted shadow-lg">
        <div class="container">
            <a class="navbar-brand text-dark fw-bolder">
                <h1 class="fw-bold">{{ __('Contact') }}</h1> 
            </a>
        
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link link-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link link-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                    <li class="nav-item">
                        <a class="nav-link link-dark " href="{{ route('contactUs.team') }}">{{ __('Team') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark " href="{{ route('contactUs.index') }}">{{ __('All Contacts') }}</a>
                    </li>
                    <li class="nav-item">
                        {{-- <a class="nav-link " href="{{ route('contacts.index') }}">{{ __('Create New Contact') }}</a> --}}
                    {{-- </li>  --}}
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="login_name nav-link dropdown-toggle link-dark" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              <label for="" id="login_name">{{ Auth::user()->name}}</label>                                
                            </a>

                            <div class="dropdown-menu dropdown-menu-end bg-transparent" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item link-dark save" data-bs-toggle="modal" data-bs-target="#profil_Modal" >Profile</a>
                                <a class="dropdown-item link-dark" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                            
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
  </div>
                          {{-- **************************************Content of body************************************** --}}
    <main>
      @yield('main_content')
    </main>
</body>
    
      {{-- **************************************Modal of page************************************** --}}

{{-- **************************************SHOW AND UPDATE PROFILE MODAL************************************** --}}



<div class="modal fade mdl" id="profil_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content mdlg">
      <div class="modal-header">
        <h2 class="modal-title text-primary fw-bold" id="exampleModalLabel">My Profile  </h2>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
      </div>
      <div id="save_error" >
      </div>
      <form id="profil_Form" role="form" method="POST">
       @csrf


          <input class="pt" type="hidden" value=" ">
          <input class="id_Edit" type="hidden" value="{{ Auth::id()}}">

          <div class="modal-body">

            <div class="form-group">
              <label class="input_name form-label text-left text-primary fw-bolder">Name</label>
              <input type="text" id ="input_name" name ="name" placeholder="Please insert the Name of category" class="form-control" value="{{ Auth::user()->name }}" >
            </div>

            <div class="form-group">
                  <div class="mb-3">
                      <label for="formFile" class="form-label text-left text-primary fw-bolder">Email Address</label>
                      <input class="form-control " name ="email" type="type" value="{{ Auth::user()->email  }}" @readonly("email")>
                  </div>
            </div>

            {{-- <div class="form-group">
              <div class="mb-3">
                  <label for="formFile" class="form-label text-left fw-bolder">Password</label>
                  <input class="form-control ctg_img" name ="ctg_img" type="type" id="ctg_img" value="{{ Auth::user()->password }}">
              </div>
            </div> --}}

            {{-- <div class="form-group">
              <div class="mb-3">
                  <label for="formFile" class="form-label text-left fw-bolder">Confirm Password</label>
                  <input class="form-control ctg_img" name ="ctg_img" type="type" id="ctg_img">
              </div>
            </div> --}}

          </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-lg rounded-pill float-end" data-bs-dismiss="modal" >Close</button>
          <button type="submit" class="btn btn-lg btn-success rounded-pill float-lg-end">Update</button>
        </div>

      </form>
    </div>
  </div>
</div>


{{-- **************************************UPDATE CATEGORY MODAL************************************** --}}
<div class="modal fade mdl" id="ctg_Modal_update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content mdlg">
      <div class="modal-header">
        {{-- <h2 class="modal-title text-primary fw-bold sv" id="exampleModalLabel " >Create New Category</h2> --}}
        <h2 class="modal-title text-primary fw-bold up" type="text" id="exampleModalLabel " >Update Contact</h2>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
      </div>
      <form id="ctg_Form_update" role="form" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- @method('GET') --}}

          <input class="pt" type="hidden" value=" ">
          <input class="id_Edit" type="hidden" value=" ">

          <div class="modal-body">

              <ul class="alert alert-warning d-none" id="save_error">

              </ul>

            <div class="form-group">
              <label class="form-label text-left text-primary fw-bolder">Category Name</label>
              <input type="text" id="ctg_up_name" name ="ctg_up_name" placeholder="Please update the Name of category" class="form-control" >
            </div>

            <div class="form-group">
                  <div class="mb-3">
                      <label for="formFile" class="form-label text-left text-primary fw-bolder">Select Image Category</label>
                      <input class="form-control" id="ctg_up_img" name ="ctg_up_img" type="file">
                  </div>
            </div>

          </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-lg rounded-pill float-end" data-bs-dismiss="modal" >Close</button>
          {{-- <button type="submit" class="btn btn-lg btn-success rounded-pill float-lg-end sv">Save</button> --}}
          <button type="submit" class="btn btn-lg btn-success rounded-pill float-lg-end up">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- **************************************ADD CATEGORY MODAL************************************** --}}
<div class="modal fade mdl" id="ctg_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content mdlg">
      <div class="modal-header">
        <h2 class="modal-title text-primary fw-bold sv" id="exampleModalLabel " >Create New Category</h2>
        {{-- <h2 class="modal-title text-primary fw-bold up" type="text" id="exampleModalLabel " >Update Contact</h2> --}}

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
      </div>
      <form id="ctg_Form" role="form" enctype="multipart/form-data" >
        @csrf
          <input class="pt" type="hidden" value=" ">
          <input class="id_Edit" type="hidden" value=" ">

          <div class="modal-body">

              <ul class="alert alert-warning d-none" id="save_error">

              </ul>

            <div class="form-group">
              <label class="form-label text-left text-primary fw-bolder">Category Name</label>
              <input type="text" name ="ctg_name" placeholder="Please insert the Name of category" class="form-control ctg_name" id="ctg_name">
            </div>

            <div class="form-group">
                  <div class="mb-3">
                      <label for="formFile" class="form-label text-left text-primary fw-bolder">Select Image Category</label>
                      <input class="form-control ctg_img" name ="ctg_img" type="file" id="ctg_img">
                  </div>
            </div>

          </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-lg rounded-pill float-end" data-bs-dismiss="modal" >Close</button>
          <button type="submit" class="btn btn-lg btn-success rounded-pill float-lg-end sv">Save</button>
          {{-- <button type="submit" class="btn btn-lg btn-success rounded-pill float-lg-end up">Update</button> --}}
        </div>

      </form>
    </div>
  </div>
</div>

{{-- **************************************SHOW AND UPDATE PAGE 'ALL CONTACTS' MODAL************************************** --}}

<div class="modal fade mdl" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content mdlg">
      <div class="modal-header">
        <h2 class="modal-title text-primary fw-bold hid" id="exampleModalLabel " >Create New Contact</h2>
        <h2 class="modal-title text-primary fw-bold sho" id="exampleModalLabel " >Update Contact</h2>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
      </div>
      <form id="addForm" role="form" >
        {{ csrf_field() }}

          <input class="pt" type="hidden" name="_method" value=" ">
          <input class="id_Edit" type="hidden" name="_method" value=" ">

          <div class="modal-body">

            <div class="form-group">
              <label class="form-label text-left text-primary fw-bolder">Full name</label>
              <input type="text" name ="fname" class="form-control name" placeholder="Please insert the full name" >
            </div>

            <div class="form-group">
              <label class="form-label text-left text-primary fw-bolder">Phone number</label>
              <input type="tel" name ="phone" class="form-control tele" placeholder="Please insert the phone number" >
            </div>

            <div class="form-group">
              <label class="form-label text-left text-primary fw-bolder">Category</label>
              <select name="catg" class="form-control" id="ctg">

              </select>
              
            </div>

          </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-lg rounded-pill float-end" data-bs-dismiss="modal" >Close</button>
          <button type="submit" class="btn btn-lg btn-success rounded-pill float-lg-end hid">Save</button>
          <button type="submit" class="btn btn-lg btn-success rounded-pill float-lg-end sho">Update</button>
        </div>

      </form>
    </div>
  </div>
</div>

{{-- **************************************SHOW AND UPDATE PAGE 'ALL CONTACTS' MODAL************************************** --}}
</html>