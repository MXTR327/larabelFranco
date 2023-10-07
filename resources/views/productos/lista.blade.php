@extends("principal")

@section("estilos")
<link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
@endsection
@section("contenido")
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
            <a class="btn btn-primary mb-2" href="{{route('productos.create')}}">Agregar</a>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Foto</th>
                                    <th>Agregado</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $p)
                                <tr>
                                    <td>{{$p->id}}</td>
                                    <td>{{$p->nombre}}</td>
                                    <td>S/{{number_format($p->precio,2)}}</td>
                                    <td>
                                        <a href="{{'imagenes'.json_decode($p->ruta_imagen)->full}}">
                                            <img src="{{'imagenes'.json_decode($p->ruta_imagen)->thumb}}" style="width: 40px; border-radius:50%;">
                                        </a>
                                        
                                    </td>
                                    <td>{{date("d/m/Y",strtotime($p->created_at))}}</td>
                                    <td><a class = 'btn btn-success'><i class="fa fa-pencil"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->

@endsection
@section("scripts")
    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable();
    } );
    </script>
@endsection


