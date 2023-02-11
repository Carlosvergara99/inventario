<div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Crear Empeleado </h5>
        <h5 class="modal-title" id="staticBackdropLabe2">Actualizar Empeleado </h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">

        <div class="mb-3">
           <label class="form-label">Nombre  </label>
           <input type="text" class="form-control" id="name" placeholder="Nombre">
        </div>

        <div class="mb-3">
           <label class="form-label">Tipo de documento  </label>
           <select class="form-select" id='document_type'>
               <option selected value=''>Seleccione</option>
               <option value="1">cedula de ciudadania</option>
               <option value="2">tarjeta de identidad</option>
               <option value="3">Pasaporte</option>
           </select>
        </div>


        <div class="mb-3">
           <label class="form-label">Numero de indentiifcacion  </label>
           <input type="number" class="form-control" id="document_number" placeholder="numero">
        </div>


        <div class="mb-3">
           <label class="form-label"> Lugar </label>
           <input type="text" class="form-control" id="position" placeholder="Lugar">
        </div>

        <div class="mb-3">
           <label class="form-label">Departamento  </label>
           <input type="text" class="form-control" id="department" placeholder="Departamento">
        </div>

        <div class="mb-3">
          <input type="hidden" class="form-control" id="id" >
       </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary createEmployees" id="createEmployees">Crear</button>
        <button type="button" class="btn btn-primary UpdateEmployees" id="UpdateEmployees">Actualizar</button>
      </div>
    </div>
  </div>
</div>