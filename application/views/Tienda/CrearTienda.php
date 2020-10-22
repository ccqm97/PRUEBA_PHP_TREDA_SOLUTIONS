<div class="row">
    <div class="col-lg-12">
        <div class="card mb-3 ">
            <div class="card-header">
            <i class="fas fa-plus-circle"></i>
                Crear Tienda               
            </div>
            
            <div class="card-body">
                <form id="formAddEstacion">                                                    
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Nombre de la Tienda</label>
                                    <input type="text" id="NOMBRE_TIENDA" class="form-control" placeholder="Escriba el nombre de la tienda" required="required" autofocus="autofocus">                            
                                </div>
                            </div> 
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Fecha de apertura</label>
                                    <input type="date" id="fecha" class="form-control" placeholder="Escriba el nombre de la estación" required="required" autofocus="autofocus">                            
                                </div>
                            </div>                          
                        </div>
                    </div>                            
                    
                    <button class="btn btn-success btn-block" id="bntSave" type="submit" href="#"><i class="fas fa-save"></i> Guardar Tienda</button>
                </form>
            </div>
        </div>
    </div>    
</div>

<div  class="row">
    <div class="col-lg-12">
        <div class="card mb-3 ">
            <div class="card-header">
                <i class="fas fa-list"></i>
                Tiendas Registradas                
            </div>
            <div class="card-body">

                <table class="table table-bordered" id="TableEstaciones" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre Tienda</th>
                            <th>Fecha Apertura</th>                            
                            <th>Accion</th>                            
                        </tr>
                    </thead>
                </table>
            </div>            
        </div>
    </div>
</div>

