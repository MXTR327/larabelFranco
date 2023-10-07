@extends("principal")
@section("contenido")

    <div class="content">
            <div class="animated fadeIn">
                <div class="row">   
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>{{{isset($objeto)?'Editar' : 'Crear'}}}</strong> Producto
                            </div>
                            <div class="card-body card-block">
                                <form action="{{route('productos.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                   {{csrf_field()}}

                                    <input name='id' type="hidden" value="{{isset($objeto) ? $objeto->id : ''}}">

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nombre</label></div>
                                        <div class="col-12 col-md-9"><input value="{{isset($objeto) ? $objeto->nombre : ''}}" type="text" id="text-input" name="nombre" placeholder="Ingrese nombre" class="form-control"><small class="form-text text-muted"></small></div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Descripcion</label></div>
                                        <div class="col-12 col-md-9"><textarea name="descripcion" id="textarea-input" rows="9" placeholder="Ingrese descripcion del producto..." class="form-control">{{{isset($objeto) ? $objeto->descripcion : ''}}}</textarea></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Precio</label></div>
                                        <div class="col-12 col-md-9"><input value="{{isset($objeto) ? $objeto->precio : ''}}" type="number" id="text-input" name="precio" placeholder="Ingrese Precio..." class="form-control"><small class="form-text text-muted"></small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Categoria</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="categoria" id="select" class="form-control">
                                                <option value="">-Selecione-</option>
                                            </select>
                                        </div>
                                    </div>                   
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">Subir imagen</label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="file-input" name="foto" class="form-control-file"></div>
                                    </div>
                                    <div class="row form-group">
                                        
                                        <div><input  class="btn btn-success" type="submit" id="file-input"  value="{{isset($objeto)?'Editar' : 'Crear'}}"></div>
                                    </div>
                                </form>
                            </div>
                           
                        </div>
                        
                    </div>   
                </div>
            </div>


        </div><!-- .animated -->
    </div><!-- .content -->  

@endsection