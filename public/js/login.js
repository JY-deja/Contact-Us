/****************************'update profile by jqAjax'****************************/
$('#profil_Form').on('submit', function(e){
    e.preventDefault();
        $.ajaxSetup({
            headers:{
                'K-CRSF-TOKEN':$('meta[name="crsf-token"]').attr('content')
            }
        });
        var id = $(".id_Edit").val();
        $.ajax({
            type: "POST",
              url:"/updateProfile/"+id,
              data:new FormData(this),
              processData:false,
              dataType:'json',
              contentType:false,
              success:function(data){
                console.log(data);
                console.log(data.status);
                
                  if(data.status == 400){
                    $('#save_error').append('<ul class="alert alert-warning save_error" ></ul>');
                      $.each(data.error, function(prefix, val){
                          $('.save_error').append('<li>'+val[0]+'</li>');
                      });

                    }
                    else if(data.status == 404){
                        $.each(data.error, function(prefix, val){
                            $('#save_error').append("<li>"+val[0]+"</li>");
                        });
                    }
                    else if(data.status == 200){
                        $('#profil_Form')[0].reset();
                        swal(data.message, {
                          icon: "success",
                        });
                        $("#login_name").remove($("#login_name").text());
                        $("#login_name").remove($("#login_name").text(data.name));
                        //$(".login_name").append('<label for="" id="login_name">'+data.name+'</label>');
                        $("#input_name").val();
                        $("#input_name").val(data.name);
                        $("#profil_Modal").modal('toggle');
                    }
                    
              }
          })
       });