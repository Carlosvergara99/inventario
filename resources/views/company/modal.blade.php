
<div class="modal fade" id="myModalAsset" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabe3">Crear Activo </h5>
          <h5 class="modal-title" id="staticBackdropLabe4">Actualizar Activo </h5>
  
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
  
          <div class="mb-3">
             <label class="form-label">Serial  </label>
              
             <div id="update_serial_code" >
                <input type="text" class="form-control" id="serial_code2" placeholder="Serial" disabled>
                <input type="hidden" class="form-control" id="serial_code" placeholder="Serial">
             </div>
             <div id="create_serial_code" >
                <input type="text" class="form-control" id="serial_code" placeholder="Serial">
             </div>
             

          </div>
  
          <div class="mb-3">
             <label class="form-label">Empleados  </label>
             <select class="employees form-select" id='employees' name="employees[]" multiple style="width: 100%">
                <option value="" >Seleccione</option>
                @foreach ($employees as $items)
                  <option value="{{ $items->id }}">{{ $items->name }}</option>
                @endforeach
             </select>
          </div>
  
  
          <div class="mb-3">
             <label class="form-label"> Referencia </label>
             <input type="number" class="form-control" id="refernece" placeholder="Referencia">
          </div>
  
  
          <div class="mb-3">
             <label class="form-label"> marca comercial </label>
             <input type="text" class="form-control" id="trademark" placeholder="marca comercial">
          </div>
          
          <div class="mb-3">
            <input type="hidden" class="form-control" id="id" >
           </div>

 
         <div class="mb-3">
           <label class="form-label">descripcion  </label>
           <textarea class="form-control" id="description" rows="3"></textarea>
 
        </div>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary createAsset" id="createAsset">Crear</button>
          <button type="button" class="btn btn-primary UpdateAsset" id="UpdateAsset">Actualizar</button>
        </div>
      </div>
    </div>
  </div>