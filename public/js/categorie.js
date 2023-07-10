/****************************'add category by jqAjax'****************************/
$(document).ready(function () {
    $('#ctg_Form').on('submit', function (e) {
      $.ajaxSetup({
        headers: {
            'X-XSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      e.preventDefault();
      
      var formData = new FormData($('#ctg_Form')[0]);
  
       $.ajax({
         type: 'POST',
         url:'/newCategory',
         //dataType: 'json',
         data:formData,
         contentType: false,
         processData:false,
         success: function (response) {
          if(response.status == 400){
            swal("All fields are required!", {
              icon: "warning",
            });
          }
          else if(response.status == 200){
            swal(response.message, {
              icon: "success",
            });
            $('#ctg_Form')[0].reset();
            //this function will empty all your input fields after inserting the data
            $("#ctg_Modal").modal('toggle');
            var url = 'ContactUs/'+ response.data.categoryName;
            var src ='/uploads/Categories/'+response.data.picture;
            $('#carte').prepend('<input type="hidden" id="ctgName" value="'+response.data.categoryName+'"><div class=" col-lg-3 col-sm-10 mx-auto mb-2 delete_'+response.data.id+'bg-muted"><div class="card shadow-lg"><img src='+src+' class="card-img-top rounded-circle shadow-lg"><div class="card-body"><div class="card-title pb-3"><h2 class="text-dark text-center fw-bold"><a class="text-dark" data-id = "'+response.data.categoryName+'" href= '+url+'>'+response.data.categoryName+' Contact</a></h2></div><div class="card-subtitle d-grid gap-2 d-lg-flex"><button class="btn rounded-pill btn-outline-info text-hover-white col-6" type="button"><span class="bi bi-pencil-square h4"></span></button><button class="btn rounded-pill btn-outline-danger col-6" id = "delete_ctg" data-id="'+response.data.id+'"type="button"><span class="bi bi-trash h4"></span></button></div></div></div></div></div>');
          }
         }
       });
  });
});  
/****************************'delete category' by jquery-confirm****************************/
  $(document).on('click','#delete_ctg',function (e) { 
      e.preventDefault();
      var checkthis = $(this) ;
      var delete_id = $(checkthis).data('id');
      $.confirm({
        title: 'Delete Category ?',
        content: 'This dialog will automatically trigger \'cancel\' in 6 seconds if you don\'t respond.',
        autoClose: 'cancelAction|8000',
        buttons: {
            deleteUser: {
              text: 'delete Category',
                action: function () {
                  var data = {
                    "_token" : $('input[name=_token]').val(),
                    "id" : delete_id,
                  }
  
                $.ajax({
                  type: "DELETE",
                  url: '/delCategory/'+delete_id,
                  data: data,
                  success: function (response){
                    $(".delete_all").remove();
                    $.confirm({ 
                      title : '',
                      content: response.status,
                      buttons: {
                      }           
                    });
                    $.ajax({
                      type: "GET",
                      url: "/category",
                      data: "data",
                      dataType: "Json",
                      success: function (TypeOfTeam) {
                          $.each(TypeOfTeam.category, function(indexInTeam , valueOfTeam) {
                              var url = 'ContactUs/'+ TypeOfTeam.category[indexInTeam].categoryName;
                              var src ='/uploads/Categories/'+TypeOfTeam.category[indexInTeam].picture;
                              //url = url.replace('/typeTeam', TypeOfTeam.category[indexInTeam].categoryName);
                              $('#carte').prepend('<input type="hidden" id="ctgName" value="'+TypeOfTeam.category[indexInTeam].categoryName+'" class="delete_all"><div class="delete_all col-lg-3 col-sm-10 mx-auto mb-2 delete_'+TypeOfTeam.category[indexInTeam].id+'"><div class="card shadow-lg  border-4 border border-light"><img src='+src+' class="card-img-top rounded-circle shadow-lg"><div class="card-body"><div id="nam_ctg" class="card-title pb-3"><h2 class="text-dark text-center fw-bold"><a class="text-dark" data-id = "'+TypeOfTeam.category[indexInTeam].categoryName+'" href= '+url+'>'+TypeOfTeam.category[indexInTeam].categoryName+' Contact</a></h2></div><div class="card-subtitle d-grid gap-2 d-lg-flex"><button class="btn rounded-pill btn-outline-info text-hover-white col-6" id = "update_ctg" data-bs-toggle="modal" data-bs-target="#ctg_Modal_update" data-id="'+TypeOfTeam.category[indexInTeam].id+'" type="button"><span class="bi bi-pencil-square h4"></span></button><button class="btn rounded-pill btn-outline-danger col-6" id = "delete_ctg" data-id="'+TypeOfTeam.category[indexInTeam].id+'" type="button" value="'+TypeOfTeam.category[indexInTeam].id+'"><span class="bi bi-trash h4"></span></button></div></div></div></div></div>');
                              
                          });   
                      }
                    });
                  }  
                });
              }
            },
            cancelAction: function () {
                $.alert('action is canceled');
            }
        }
      });
});
/****************************'Edit category'****************************/   
$(document).on('click', "#update_ctg",function() {
  var edit_id = $(this).data("id");
  $(".id_Edit").attr('value',edit_id);      
  //$('#ctg_Modal_update').modal('show');
  $.ajax({
    type: "GET",
    url: "/newCategory/"+edit_id+"/edit",
    data: "data",
    dataType: "Json",
    success: function (response) {
      if(response.status == 404)
      {
        $('.alert').append(response.message);
        $('#ctg_Modal_update').modal('hide');
      }
      else if(response.status == 200)
      {
      $('#ctg_up_name').val(response.editCategory.categoryName);
      } 
    },
    error : function(error){
      console.log(error);
    }
  });
});

/****************************'Update category'****************************/ 
$(document).ready(function () {
  $('#ctg_Form_update').on('submit', function (e) {
    e.preventDefault();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var id = $('.id_Edit').val();

    let EditformData = new FormData($('#ctg_Form_update')[0]);


    //all the input or a file whatever data come over here will support it.
    //send all the data from 'EditformData' to your ajax request and update the data
    console.log(EditformData);
    console.log(EditformData.get('ctg_up_name'));
    $.ajax({
      type: "POST",
      url: "/update/"+id,
      data: EditformData,
      contentType:false,
      processData:false,
      success: function (response) {
        if(response.status==400)
        {
          alert(response.request);
        }
        else if(response.status==200)
        {
          swal(response.message, {
            icon: "success",
          });
         $("#ctg_Modal_update").modal('toggle');
         $('.delete_'+id).remove();
         var url = 'ContactUs/'+ response.data.categoryName;
         var src ='/uploads/Categories/'+response.data.picture;
         $('#carte').prepend('<input type="hidden" id="ctgName" value="'+response.data.categoryName+'"><div class=" col-lg-3 col-sm-10 mx-auto mb-2 delete_'+response.data.id+'"><div class="card shadow-lg  border-4 border border-light"><img src='+src+' class="card-img-top rounded-circle shadow-lg"><div class="card-body"><div id="nam_ctg" class="card-title pb-3"><h2 class="text-dark text-center fw-bold"><a class="text-dark" data-id = "'+response.data.categoryName+'" href= '+url+'>'+response.data.categoryName+' Contact</a></h2></div><div class="card-subtitle d-grid gap-2 d-lg-flex"><button class="btn rounded-pill btn-outline-info text-hover-white col-6" id = "update_ctg" data-bs-toggle="modal" data-bs-target="#ctg_Modal_update" data-id="'+response.data.id+'" type="button"><span class="bi bi-pencil-square h4"></span></button><button class="btn rounded-pill btn-outline-danger col-6" id = "delete_ctg" data-id="'+response.data.id+'" type="button" value="'+response.data.id+'"><span class="bi bi-trash h4"></span></button></div></div></div></div></div>');
        
       }
       else if(response.status==200)
       {
        alert(response.message);
       }
      },
      error : function(error){
        console.log(error);
      }
    });
  });  
});
