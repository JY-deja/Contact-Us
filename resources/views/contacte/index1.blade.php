<!-- Start Modal insert -->
      <div class="modal fade mdl" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
          <div class="modal-content mdlg">
            <div class="modal-header">
              <h2 class="modal-title" id="exampleModalLabel">Create New Contact</h2>

              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route("contactUs.store")}}" method="POST">
              {{ csrf_field() }}
              <div class="modal-body">

                  <div class="form-group">
                    <label class="form-label text-left fw-bolder">Full name</label>
                    <input type="text" name ="fname" class="form-control" placeholder="Please insert the full name" >
                  </div>

                  <div class="form-group">
                    <label class="form-label text-left fw-bolder">Phone number</label>
                    <input type="tel" name ="phone" class="form-control" placeholder="Please insert the phone number" >
                  </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg rounded-pill float-end" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-lg btn-success rounded-pill float-lg-end">Save</button>
              </div>
            </form>         
          </div>
        </div>
      </div>
<!-- end Modal insert-->

<!-- Start Modal update -->
      <div class="modal fade mdl" role="dialog" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
          <div class="modal-content mdlg">
            <div class="modal-header">
              <h2 class="modal-title" id="exampleModalLabel">Update Contact</h2>

              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="/contactUs" method="POST" id="editForm">

              {{ csrf_field() }}
              {{ method_field('PUT') }}

              <div class="modal-body">

                  <div class="form-group">
                    <label class="form-label text-left fw-bolder">Full name</label>
                    <input type="text" name ="up_fname" id ="fname" class="form-control" placeholder="Please update the full name" >
                  </div>

                  <div class="form-group">
                    <label class="form-label text-left fw-bolder">Phone number</label>
                    <input type="tel" name ="up_phone" id ="phone" class="form-control" placeholder="Please update the phone number" >
                  </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg rounded-pill float-end" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-lg btn-success rounded-pill float-lg-end">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
<!-- end Modal update-->


/*
    
        $(".delete").on('click',function() {
          $('#deletemodal').modal('show');
          $tr = $(this).closest('tr');
          var dat = $tr.children('td').map(function() {
            return $(this).text();
          }).get();
          console.log(dat);
          $('#id').val(dat[0]);
          var i = 'contactUs/'+dat[0] ;
          console.log(i);
          $('#deleteForm').attr('action',i);
          $('#deletemodal').modal('show');
      });
    //End delete record
*/
/*
var myInput = jQuery('#inputId');
myInput.val(""); // add empty string in place of valu
*/
/*

<body>
  <form method="" action="">
      <input type="text" name="email" class="input" />
      <input type="submit" value="Sign Up" class="button" />
  </form>
</body>
<script>
  $(document).ready(function() {
      $(".input").val("Email Address");
      $(".input").on("focus", function() {
          $(".input").val("");
      });
      $(".button").on("click", function(event) {
          $(".input").val("");
      });
  });
</script>







<script type="text/javascript">

  $(document).ready(function() {
    //Start update record


     
     //End update record 
/*
    
        $(".delete").on('click',function() {
          $('#deletemodal').modal('show');
          $tr = $(this).closest('tr');
          var dat = $tr.children('td').map(function() {
            return $(this).text();
          }).get();
          console.log(dat);
          $('#id').val(dat[0]);
          var i = 'contactUs/'+dat[0] ;
          console.log(i);
          $('#deleteForm').attr('action',i);
          $('#deletemodal').modal('show');
      });
    //End delete record
*/
   

  //End delete record
  
      
  });

</script>

*/



<script>
  
    /*swal({
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
    });*/
</script>

<script>
  /*

  @if(count($contacts->toArray()) > 0)
                      @foreach($contacts as $contact)
                      <tr class="tr">
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

  */


 /*fetchContact();

  function fetchContact(){
    $.ajax({
      type: "GET",
      url: "fetchContacts",
      dataType: "json",
      success: function (response) {
        /* console.log(response.contacts);*/
        /*$.each(response.contacts, function (key, cnt) { 
          $('tbody').append(
            '<tr class="tr">\
                      <input type="hidden" class="cont_id" value="'+cnt.id+'">\
                      <td class="cont_id">'+cnt.id+'</td>\
                      <td>'+cnt.Lname+'</td>\
                      <td>'+cnt.number+'</td>\
                      <td><button class="edit btn rounded-pill btn-outline-info btn-md text-hover-white" data-bs-toggle= "modal"  data-bs-target="#editmodal" id ="edit" name="edit"><span class="bi bi-pencil-square h4"></span></button></td>\
                      <td><button class="btn rounded-pill btn-outline-danger btn-md delete" value="'+cnt.id+'"><span class="bi bi-trash h4 "></span></button></td>\
                    </tr>');
        });
      }
    });
  }*/


/*******************************************************/

</script>
