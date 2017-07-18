<ul class="breadcrumb">
    <li><a href="{{url('')}}">Inicio</a></li>
    <li class="active">Paises</li>
</ul>
<div class="page-title">
    <h2><a href="{{url('dashboard')}}"><span class="fa fa-arrow-circle-o-left"></span></a> Menú principal</h2>
</div>
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Paises</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-actions">
                            <thead>
                            <tr>
                                <th>País</th>
                                <th>Abreviatura</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            {% for values in allcountry %}
                            <tr id="{{values.getCoid()}}">
                                <td>{{values.getCountry()}}</td>
                                <td>{{values.getAbbreviation()}}</td>
                                <td>
                                    <a href="{{url('dashboard/system/edit?coid=')}}{{values.getCoid()}}" class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"></span></a>
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