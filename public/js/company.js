

function validate() {
    if($("#serial_code").val() == ''){
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'el serial es oligatorio!',
        })
        return false
    
      }
      if($("#employees").val().length == 0){
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'el empleado es oligatorio!',
        })
        return false
      }
    
    
      if($("#refernece").val()==''){
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'la  referencia  es oligatorio!',
        })
        return false
      }
      if($("#description").val()==''){
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'la descripcion es obligatoria !',
        })
        return false
    
      }
      if($("#trademark").val()==''){
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'la marca comercial es obligatorio !',
        })
    }
        return true
}

function restAsset(){
    $('#serial_code').val('')
    $('#trademark').val('')
    $('#refernece').val('')
    $('#description').val('')
    $('.employees').val('');
    $('.employees').trigger('change');

  }
  
function data() {
    const data={
        'serial_code':$('#serial_code').val(),
        'trademark':$('#trademark').val(),
        'refernece':$('#refernece').val(),
        'description':$('#description').val(),
        'employees':$('#employees').val(),
        'id':$('#id').val()
      };
      return data;
}  

  function editAsest(id){
    restAsset()  
    $.ajax({
        type:'POST',
        url:'/campany/edit',
        data:{'serial_code':id},
        success:function(data){

            $('#id').val(data.data.id);
            $('#serial_code').val(data.data.serial_code);
            $('#trademark').val(data.data.trademark);
            $('#refernece').val(data.data.refernece);
            $('#description').val(data.data.description);
            $('#serial_code2').val(data.data.serial_code);


            
            const a = data.employees
            const select =[];
            a.forEach(element => {
                select.push(element.employees_id)
            });
            $('.employees').val(select);
            $('.employees').trigger('change');

    
            var myModal = new bootstrap.Modal(document.getElementById('myModalAsset'))
            var modalToggle = document.getElementById('toggleMyModal') 
            myModal.show(modalToggle)

          $("#staticBackdropLabe3").css("display", "none");
          $("#UpdateAsset").css("display", "block");
          $("#staticBackdropLabe4").css("display", "block");
          $("#createAsset").css("display", "none");
          $("#update_serial_code").css("display", "block");
          $("#create_serial_code").css("display", "none");
     


        },
        error:function(data){
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'servidor sin conexion !',
          })
        }
     });
   
   }

   $(".CreatesAseet").click(function(e){
    e.preventDefault();
    restAsset()
  
    
     $("#staticBackdropLabe3").css("display", "block");
     $("#UpdateAsset").css("display", "none");
     $("#staticBackdropLabe4").css("display", "none");
     $("#createAsset").css("display", "block");
     $("#update_serial_code").css("display", "none");
     $("#create_serial_code").css("display", "block");

     

    var myModal = new bootstrap.Modal(document.getElementById('myModalAsset'))
    var modalToggle = document.getElementById('toggleMyModal') 
    myModal.show(modalToggle)
   })



   $(".UpdateAsset").click(function(e){
    e.preventDefault();
    
    if(validate()){}
    const dato= data();
    $.ajax({
        type:'POST',
        url:'/campany/update',
        data:dato,
        success:function(data){
          Swal.fire({
            icon: 'success',
            title: 'OK',
            text: 'Registro Actualizado',
          }) 
          location.reload();
        },
        error:function(data){
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'servidor sin conexion !',
          })
        }
     });
   });

   $(".createAsset").click(function(e){
    e.preventDefault();
    
    if(validate()){
      

        $.ajax({
            type:'POST',
            url:'/campany/save',
            data:data(),
            success:function(data){
              Swal.fire({
                icon: 'success',
                title: 'OK',
                text: 'Registro Creado',
              }) 
              location.reload();
            },
            error:function(data){
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'servidor sin conexion !',
              })
            }
         });
    }

})