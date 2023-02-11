
$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

function rest(){
  $("#name").val(''),
  $("#document_type").val(''),
  $("#document_number").val(''),
  $("#position").val(''),
  $("#department").val('')
}

$(".CreatesEmployees").click(function(e){
  e.preventDefault();
   rest()

   $("#staticBackdropLabe2").css("display", "none");
   $("#UpdateEmployees").css("display", "none");
   $("#staticBackdropLabe1").css("display", "block");
   $("#createEmployees").css("display", "block");
  

  var myModal = new bootstrap.Modal(document.getElementById('myModal'))
  var modalToggle = document.getElementById('toggleMyModal') 
  myModal.show(modalToggle)
 })

 $(".UpdateEmployees").click(function(e){
  e.preventDefault();
  
  if(validate()){
    
    const data={
      'id': $("#id").val(),
      'name': $("#name").val(),
      'document_type': $("#document_type").val(),
      'document_number':$("#document_number").val(),
      'position':$("#position").val(),
      'department':$("#department").val()
    };
      $.ajax({
          type:'POST',
          url:'employees/update',
          data:data,
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



});


  function editEmployess(id){

    $.ajax({
      type:'POST',
      url:'employees/edit',
      data:{'id':id},
      success:function(data){
        $("#id").val(data.data.id),
        $("#name").val(data.data.name),
        $("#document_type").val(data.data.document_type),
        $("#document_number").val(data.data.document_number),
        $("#position").val(data.data.position),
        $("#department").val(data.data.department)
        $("#staticBackdropLabe2").css("display", "block");
        $("#UpdateEmployees").css("display", "block");
        $("#staticBackdropLabel").css("display", "none");
        $("#createEmployees").css("display", "none");
       
        var myModal = new bootstrap.Modal(document.getElementById('myModal'))
        var modalToggle = document.getElementById('toggleMyModal') 
        myModal.show(modalToggle)


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

function validate(){

  if($("#name").val() == ''){
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'el nombre es oligatorio!',
    })
    return false

  }
  if($("#document_type").val()==''){

    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'el tipo de documento es oligatorio!',
    })
    return false
  }


  if($("#document_number").val()==''){
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'el numero de identificacion es oligatorio!',
    })
    return false
  }
  if($("#position").val()==''){
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'la cuidad es obligatorio!',
    })
    return false

  }
  if($("#department").val()==''){
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'el departamento es obligatorio !',
    })
    return false
  }


  return true;
}

$(".createEmployees").click(function(e){
    e.preventDefault();
    
    if(validate()){
      
      const data={
        'name': $("#name").val(),
        'document_type': $("#document_type").val(),
        'document_number':$("#document_number").val(),
        'position':$("#position").val(),
        'department':$("#department").val()
      };
        $.ajax({
            type:'POST',
            url:'employees/save',
            data:data,
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



});