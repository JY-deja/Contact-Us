/************************************************'team card'******************************************/
$(document).ready(function(){
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
          $('#carte').prepend('<input type="hidden" id="ctgName" value="'+TypeOfTeam.category[indexInTeam].categoryName+'" class="delete_all"><div class="delete_all col-lg-3 col-sm-10 mx-auto mb-2 delete_'+TypeOfTeam.category[indexInTeam].id+'"><div class="card shadow-lg h-100 border-4 border border-light"><img src='+src+' class="card-img-top h-50 rounded-circle shadow-lg"><div class="card-body "><div id="nam_ctg" class="card-title h-50 pb-3"><h2 class="text-dark text-center fw-bold"><a class="text-dark" data-id = "'+TypeOfTeam.category[indexInTeam].categoryName+'" href= '+url+'>'+TypeOfTeam.category[indexInTeam].categoryName+' Contact</a></h2></div><div class="card-subtitle d-grid gap-2 d-lg-flex"><button class="btn rounded-pill btn-outline-info text-hover-white col-6" id = "update_ctg" data-bs-toggle="modal" data-bs-target="#ctg_Modal_update" data-id="'+TypeOfTeam.category[indexInTeam].id+'" type="button"><span class="bi bi-pencil-square h4"></span></button><button class="btn rounded-pill btn-outline-danger col-6" id = "delete_ctg" data-id="'+TypeOfTeam.category[indexInTeam].id+'" type="button" value="'+TypeOfTeam.category[indexInTeam].id+'"><span class="bi bi-trash h4"></span></button></div></div></div></div></div>');
          
      });   
  }
});
});
/************************************************'select team category'******************************************/
$(document).ready(function(){
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
      
      $.ajax({
        type: 'GET',
        url:'/category',
        dataType: 'json',
        //using serialize for sending the data it was inset by user from the form in url,
        data:"data",
        success: function (data) {
          // for (var x in data.category){ 
          //   console.log(x);
           
          // $('select').prepend(' <option value='+data.category[x].categoryName+'>Contact '+data.category[x].categoryName+'</option>');
          // }
          //var typeTeam = $("a").data("id");
            $.each(data.category, function(indexInArray , valueOfElement) {
              $('select').prepend('<option value="'+data.category[indexInArray].categoryName+'">Contact '+data.category[indexInArray].categoryName+'</option>');
            });
        },
        error : function(error){
          console.log(error);
        }
      });  
}); 
/************************************************ of 'DATATABLE'******************************************/
$(document).ready(function () {
  $('#datatable').DataTable({
        processing: true,
        //responsive: true,
        serverSide: true,
        //colReorder:  true,
        order: [[ 0 , "desc" ]],
        lengthMenu: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 60, 70, 80, 90, 100],//the casse show
        // order: [], //[ colIdx_1, orderingDirection_1 ], by default is Default [[0, 'asc']]
        pageLength: 5,//number of column in table sho it in table.
        ajax: 'ContactUs/',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'Lname' , name: 'Lname'},
            {data: 'number', name: 'number'},
            {data: 'Category', name: 'Category'},
            {data: 'action_1', name: 'action_1'},
            {data: 'action_2', name: 'action_2'},
        ],  
  });
});
/************************************************'DATATABLE team category'******************************************/
$(document).ready(function () {
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  }); 
      $("#datatableTeam").DataTable({
        processing: true,
        serverSide: true,
        order: [[ 0 , "desc" ]],
        lengthMenu: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 60, 70, 80, 90, 100],
        pageLength: 5,
        columns: [
            {data: 'id', name: 'id'},
            {data: 'Lname' , name: 'Lname'},
            {data: 'number', name: 'number'},
            {data: 'Category', name: 'Category'},
            {data: 'action_1', name: 'action_1'},
            {data: 'action_2', name: 'action_2'},
        ],
      });
}); 
/************************************************start of code 'delete contact' by jquery-confirm******************************************/
$(document).on('click','#delete',function (e) { 
    e.preventDefault();
    var checkthis = $(this) ;
    var delete_id = $(checkthis).data('id');
    $.confirm({
      title: 'Delete Contact ?',
      content: 'This dialog will automatically trigger \'cancel\' in 6 seconds if you don\'t respond.',
      autoClose: 'cancelAction|8000',
      buttons: {
          deleteUser: {
            text: 'delete Contact',
              action: function () {
                var data = {
                  "_token" : $('input[name=_token]').val(),
                  "id" : delete_id,
                }

              $.ajax({
                type: "DELETE",
                url: '/ContactUs/'+delete_id,
                data: data,
                success: function (response){
                  $('#datatable').DataTable().ajax.reload(null , false);
                  $('#datatableTeam').DataTable().ajax.reload(null , false);
                  $.confirm({ 
                    title : '',
                    content: response.status,
                    buttons: {
                    }           
                  })
                  /*
                  if(!alert("delete contact")){window.location.reload();}
                  //correct.but it's not correct for jquery alert  ok!
                  */
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
/************************************************'update contact'**********************************************************/   
$(document).on('click', "#edit",function() {
  var edit_id = $(this).data("id");
  $("#addModal").attr('id','editmodal');
  $(".pt").attr('value','PUT');
  $(".id_Edit").attr('value',edit_id);
  $("#addForm").attr('id','editForm');
  $(".hid").hide();
  $(".sho").show();
  $(".name").attr('id','fname');
  $(".name").attr('placeholder','Update the full name');
  $(".tele").attr('id','phone');
  $(".tele").attr('placeholder','Update the phone number');
  $(".ctg").attr('id','categ');       
  $('#editmodal').modal('show');
  var tr = $(this).closest('tr');
  var data = tr.children('td').map(function() {
    return $(this).text();
  }).get();
  console.log();
  $('#fname').val(data[1]);
  $('#phone').val(data[2]);
  $('#ctg').val(data[3]).attr("option","select");
  $('#editForm').attr('action','ContactUs/'+edit_id);
  $('#editmodal').modal('show');

});
/************************************************'update contact'**********************************************************/
$(".ajout").on('click',function() {
    $("#editmodal").attr('id','addModal');
    $("#editForm").attr('id','addForm');
    $(".pt").attr('value','');
    $(".sho").hide();
    $(".hid").show();
    $('.name').val('');
    $(".name").attr('placeholder','Insert the full name');
    $('.tele').val('');
    $(".tele").attr('placeholder','Insert the phone number');
    $('.ctg').val('');
});
/************************************************'Close button'**********************************************************/
$(".clos").on('click',function() {
          $('.alert').hide();
});
/************************************************'add data by jqAjax'**********************************************************/   
$(document).on('submit', '#addForm' , function (e) {
      e.preventDefault();
  
         var Data = $(this).serialize();
         $.ajax({
           type: 'POST',
           url:'/ContactUs',
           dataType: 'json',
           //using serialize for sending the data it was inset by user from the form in url,
           data:Data,
           success: function (response) {
            $("#addModal").modal('toggle');
               swal(response.status, {
                       icon: "success",
               });
              //  $("tbody").prepend('<tr><td>'+response.msg.id+'</td><td>'+response.msg.Lname+'</td><td>'+response.msg.number+'</td><td>'+response.msg.Category+'</td><td><button class="edit btn rounded-pill btn-outline-info btn-md text-hover-white " data-bs-toggle="modal" data-bs-target="#editmodal" data-id="'+response.msg.id+'" id ="edit" name="edit"><span class="bi bi-pencil-square h4"></span></button></td><td><button class="btn rounded-pill btn-outline-danger btn-md " data-id="'+response.msg.id+'" id = "delete"><span class="bi bi-trash h4"></span></button></td></tr>');
              $('#datatable').DataTable().ajax.reload(null , false);
              $('#datatableTeam').DataTable().ajax.reload(null , false);
            },
           error : function(error){
             swal("error", {
               icon: "warning",
             });
           }
         });
});     
/************************************************end of code 'add data by jqAjax'**********************************************************/
/************************************************start of code 'UPDATE data by jqAjax'**********************************************************/ 
$(document).on('submit','#editForm', function (e) {
      e.preventDefault();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
         var Data = $(this).serialize();
         var update_id = $('.id_Edit').val();
        console.log("id is "+update_id);
        //console.log(Data);
         $.ajax({
           type: 'PUT',
           url:'/ContactUs/'+update_id,
           dataType: 'json',
           //using serialize for sending the data it was inset by user from the form in url,
           data:Data,
           success: function (response) {
           $('#datatable').DataTable().ajax.reload(null , false);
             $("#editmodal").modal('toggle');
            
               swal(response.Status, {
                       icon: "success",
               });
               $('#datatableTeam').DataTable().ajax.reload(null , false); 
           },
           error : function(error){
             swal("Contact not saved !", {
               icon: "warning",
             });
             console.log(error);
           }
         });
});      
/************************************************end of code 'UPDATE data by jqAjax'**********************************************************/



