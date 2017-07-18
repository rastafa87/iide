<ul class="breadcrumb">
    <?php $coun = $country->getCountry() ?>
    <li><a href="{{url('dashboard')}}">Inicio</a></li>
    <li class="active">Leyes de {{coun}}</li>
</ul>
<div class="page-title">
    <h2><a href="{{url('dashboard')}}"><span class="fa fa-arrow-circle-o-left"></span></a> Menú principal</h2>
</div>
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Leyes de {{coun}}</h3>

                    <ul class="panel-controls">
                        <!--a class="panel-titlenew" href="">Nueva Ley</a-->
                        <li><a href="{{url('dashboard/system/new?coid='~country.getCoid())}}" class=""><span class="fa fa-plus"></span></a></li>
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-actions" id="tableLaw">
                            <thead>
                            <tr>
                                <th>Ley</th>
                                <th>Archivo</th>
                                <th>Categoría</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                {% for values in alllaw %}
                                <tr class="{{values.getLaid()}}">
                                    <td>{{values.getLaw()}}</td>
                                    <td>{{values.getFile()}}</td>
                                    <?php
                                    $category;
                                    $coun = $values->getClid();
                                        if ($coun == 1){
                                            $category="Constitución";
                                        }
                                        elseif ($coun==2){
                                            $category="Leyes Electorales";
                                        }
                                        elseif ($coun==3){
                                            $category="Jurisprudencia";
                                        }
                                    ?>
                                    <td>{{category}}</td>
                                    <td class="options" data-id="{{values.getLaid()}}">
                                        <a href="{{url('dashboard/system/editlaw?laid='~values.getLaid()~'&coid='~country.getCoid())}}" class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"></span></a>
                                        &nbsp;
                                        <span class="deleteElement cursor_pointer" data-toggle="tooltip" data-placement="top" title="" data-original-title="Eliminar Producto"><i class="fa fa-remove fa-2x"></i></span>&nbsp;
                                    </td>
                                </tr>
                                {% endfor %}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-times"></span> Eliminar <strong>Datos</strong> ?</div>
            <div class="mb-content">
                <p>¿Estas seguro de eliminar esta fila?</p>
                <p>Presione "Si" si esta seguro.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <button class="btn btn-success btn-lg mb-control-yes">Si</button>
                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>