<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js" dafer></script>
    
    <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js" defer></script>
    <script src="{{ url('js/bootstrap.bundle.min.js')}}" defer></script>
  
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      .bn{
        border-width: 3px;
      }
      .mdl{
        background-color: #84A6D3;
      }
      .mdlg{
        background-color: #E9F3FB;
      }
      .modal-title{
        color: #84A6D3;
      }
    </style>
</head>
<body class="bg-white">
    <main class="container-fluid">

<!-- Start Modal insert and update -->
      <div class="modal fade mdl" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
          <div class="modal-content mdlg">
            <div class="modal-header">
              <h2 class="modal-title hid" id="exampleModalLabel " >Create New Contact</h2>
              <h2 class="modal-title sho" id="exampleModalLabel " >Update Contact</h2>

              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <form action="{{route("contactUs.store")}}" id="addForm" method="POST">
              {{ csrf_field() }}

                <input class="pt" type="hidden" name="_method" value=" ">
    
            

              <div class="modal-body">

                  <div class="form-group">
                    <label class="form-label text-left fw-bolder">Full name</label>
                    <input type="text" name ="fname" class="form-control name" placeholder="Please insert the full name" >
                  </div>

                  <div class="form-group">
                    <label class="form-label text-left fw-bolder">Phone number</label>
                    <input type="tel" name ="phone" class="form-control tele" placeholder="Please insert the phone number" >
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
<!-- end Modal insert and update-->
 <section class="">
            <h1 class="display-3 lead text-dark fw-bold text-center mt-4 py-4 ">
                Contact 
            </h1>       
</section>
<section class="mx-5 justify-center">
            @if(count($errors) > 0)

            <div class="alert alert-danger col mx-5" role="alert">
              <button type="button" aria-label="Close" class="btn-close float-end clos"></button>
              <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
              </ul>
            </div>
            @endif
            @if(\Session::has('Success'))
            <div class="alert alert-success col mx-5" role="alert">
              <h4>
                {{\Session::get('Success')}}
                <button type="button" aria-label="Close" class="btn-close float-end clos"></button>
              </h4>
              
            </div>
            @endif     
</section>
<section class=" mx-5 px-5">
            <table id="datatable" class="col text-center align-self-center table table-fluid table-bordered text-white ">
                <thead class="">
                    <tr class="table-info text-info">
                        <th scope="col" class="cont_id">id</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Phone number</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody class="text-dark" >
                @if(count($contacts->toArray()) > 0)
                    @foreach($contacts as $contact)
                    <tr>
                      <input type="hidden" class="cont_id" value="{{$contact->id}}">
                      <td class="cont_id">{{$contact->id}}</td>
                      <td>{{$contact->Lname}}</td>
                      <td>{{$contact->number}}</td>
                      <td>
                        {{--button for update --}}
                          <button class="edit btn rounded-pill btn-outline-info btn-md text-hover-white "
                          data-bs-toggle="modal"  data-bs-target="#editmodal" id ="edit" name="edit">
                              <span class="bi bi-pencil-square h4"></span>
                          </button>
                      </td>
                      <td>
                        {{--button for delete --}}
                          <button class="btn rounded-pill btn-outline-danger btn-md delete" value="{{$contact->id}}">
                              <span class="bi bi-trash h4 "></span>
                          </button>
                      </td>
                    </tr>
                    @endforeach
                @else
                    <p>vous n'avez pas ajouter aucun contact.Cliquer <a href = "contacts/create" >ici</a> pour ajouter un contact.</p>
                @endif  
                
            </table>
              {{--button for insert data --}}
                <button type="button" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-outline-success d-grid  justify-contentent-center col-4 pt-3 mx-auto rounded-pill d-inline btn-lg bn ajout"><span class="bi bi-plus-circle-fill h4"> Create new Contact</span></button>
</section>
</main>
<script type="text/javascript">
    
$(document).ready(function(){

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  
  $('.delete').click(function (e) { 
    e.preventDefault();

    var delete_id = $(this).closest("tr").find('.cont_id').val();

    //alert(delete_id);

    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this Contact!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {

        var data = {
          "_token" : $('input[name=_token]').val(),
          "id" : delete_id,
        }

        $.ajax({
          type: "DELETE",
          url: 'contactUs/'+delete_id,
          data: data,
          success: function (response) {
            swal(response.status, {
              icon: "success",
            })
            .then((result) =>{
              location.reload();
            });
          }
        });
       
      } 
    });
    
  });
  });     
    </script>


<!-- Sweet alert -->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!------------------->

<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" defer></scrip>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" defer></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>    
</body>
</html>