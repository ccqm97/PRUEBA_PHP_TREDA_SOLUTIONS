<div id ="createProducto" class="row">
    <div class="col-lg-12">
        <div class="card mb-3 ">
            <div class="card-header">
            <i class="fas fa-plus-circle"></i>
                Crear Producto               
            </div>
            
            <div class="card-body">
                <form id="formCrearProducto">                                                    
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Nombre del producto</label>
                                    <input type="text" id="Nombre" name="Nombre" class="form-control" placeholder="Escriba el nombre de la tienda" required="required" autofocus="autofocus">                            
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>SKU del producto</label>
                                    <input type="text" id="SKU" name="SKU" class="form-control" placeholder="Escriba el nombre de la tienda" required="required" autofocus="autofocus">                            
                                </div>
                            </div>  
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Descripción del producto</label>
                                    <input type="text" id="Descripcion" name="Descripcion" class="form-control" placeholder="Escriba el nombre de la tienda" required="required" autofocus="autofocus">                            
                                </div>
                            </div> 
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Valor del producto <small>(Solo caracteres numéricos)</small> </label>
                                    <input type="text" id="Valor" name="Valor" class="form-control" srequired="required" autofocus="autofocus" onkeypress="return validarSoloNumeros(event)">                            
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tienda</label>
                                    <select  class="form-control" name="Id_Tienda" id="Id_Tienda"  required="required">
                                        <option value="">Elija una tienda</option>
                                    </select>
                                    
                                </div>
                            </div> 
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Imagen del producto</label>
                                    <input type="file" id="imagen" name="imagen" class="form-control" srequired="required" autofocus="autofocus">                            
                                </div>
                            </div>                          
                        </div>
                    </div>                            
                    
                    <button class="btn btn-success btn-block" id="bntSave" type="submit" href="#"><i class="fas fa-save"></i> Guardar Producto</button>
                </form>
            </div>
        </div>
    </div>    
</div>

<div id ="editProducto" class="row">
    <div class="col-lg-12">
        <div class="card mb-3 ">
            <div class="card-header">
            <i class="far fa-edit"></i>
                Editar Producto
            </div>            
            <div class="card-body">
                <form id="formEditProducto">                                                    
                    <div class="form-group">
                        <div class="form-row">
                        <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Nombre del producto</label>
                                    <input type="text" id="Nombre_e" name="Nombre_e" class="form-control" placeholder="Escriba el nombre de la tienda" required="required" autofocus="autofocus">                            
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>SKU del producto</label>
                                    <input type="text" id="SKU_e" name="SKU_e" class="form-control" placeholder="Escriba el nombre de la tienda" required="required" autofocus="autofocus">
                                    <input type="hidden" id="SKU_OLD" name="SKU_OLD" >                            
                                </div>
                            </div>  
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Descripción del producto</label>
                                    <input type="text" id="Descripcion_e" name="Descripcion_e" class="form-control" placeholder="Escriba el nombre de la tienda" required="required" autofocus="autofocus">                            
                                </div>
                            </div> 
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Valor del producto <small>(Solo caracteres numéricos)</small> </label>
                                    <input type="text" id="Valor_e" name="Valor_e" class="form-control" srequired="required" autofocus="autofocus" onkeypress="return validarSoloNumeros(event)">                            
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tienda</label>
                                    <select  class="form-control" name="Id_Tienda_e" id="Id_Tienda_e"  required="required">
                                        <option value="">Elija una tienda</option>
                                    </select>
                                    
                                </div>
                            </div> 
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Imagen del producto</label>
                                    <input type="file" id="imagen_e" name="imagen_e" class="form-control" required="required" autofocus="autofocus">                            
                                </div>
                            </div>      
                        </div>
                    </div>                                                
                    <button class="btn btn-success btn-block" id="bntSave" type="submit" href="#"><i class="fas fa-save"></i> Guardar Cambios</button>
                    <button class="btn btn-danger btn-block" id="bntCancel" type="button" href="#"><i class="fas fa-undo"></i> Cancelar</button>
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
                Productos Registrados                
            </div>
            <div class="card-body">           
                <table class="table table-bordered" id="TableProductos" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SKU</th> 
                            <th>Nombre Producto</th>                                                       
                            <th>Descripción</th> 
                            <th>Valor</th> 
                            <th>Tienda</th>
                            <th>Imagen del producto</th> 
                            <th>Acción</th>                        
                        </tr>
                    </thead>
                </table>
            </div>            
        </div>
    </div>
</div>




