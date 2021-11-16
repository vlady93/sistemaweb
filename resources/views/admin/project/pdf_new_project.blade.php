<!DOCTYPE>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td {
            border: 1px solid #dddddd;
            text-align: left;
            font-size: 11px;
            padding: 8px;
        }

        th {
            border: 1px solid #dddddd;
            text-align: left;
            font-size: 11px;
            padding: 8px;
        }

        tr {}

        thead {
            border: 2px solid #dddddd;
            background: #cde3f7;

        }

        h3 {
            color: #f7f1f1;
            font-weight: normal;
            font-size: 20px;
            font-family: sans-serif;
            background-color: #416f99;
        }

    </style>
</head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Reporte de Proyecto</title>

<body>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title font-weight-bold p-3 mb-2 bg-dark text-white text-center" align="center">
                        DETALLES DE PROYECTO</h3>
                    <table border="1" id="" class="ml-4 " align="center">
                        <thead>
                            <tr id="" class="">
                                <th> Nombre del Proyecto</th>
                                <th> Cliente</th>
                                <th> Dirección</th>
                                <th>Teléfono</th>
                                <th> Proyecto N°</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->client->name }} {{ $project->client->ap_paterno }}
                                    {{ $project->client->ap_materno }}</td>
                                <td>{{ $project->client->address }}</td>
                                <td>{{ $project->client->phone }}</td>
                                <td>{{ $project->id }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <h3 class="card-title font-weight-bold p-3 mb-2 bg-dark text-white text-center" align="center">
                        PERSONAL ASIGNADO</h3>
                    <div class="form-group col-md-12 ">

                        <div class="table-responsive col-md-12">
                            <table id="projectDetails" class="table" border="1" align="center">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Cargo</th>

                                    </tr>
                                </thead>
                                <tfoot>


                                </tfoot>
                                <tbody>
                                    @foreach ($resultado as $user)

                                        <tr>

                                            <td>
                                                {{ $user->name }}
                                            </td>
                                            <td>
                                                {{ $user->cargo }}
                                            </td>


                                        </tr>

                                    @endforeach




                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="form-group">
                        <h3 class="card-title font-weight-bold p-3 mb-2 bg-dark text-white text-center" align="center">
                            MATERIAL A UTILIZAR</h3>
                        <div class="table-responsive col-md-12">
                            <table id="saleDetails" class="table" border="1" align="center">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th >Material</th>
                                        <th>Cantidad</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <tr>
                                            <td width="18">{{$i}}</td><td ></td><td></td>
                                        </tr>
                                       
                                    @endfor
                                </tbody>
                                <br>
                                <tfoot><tr style="background-color: #416f99;color: white"><th colspan="3"><h2>OBSERVACIONES</h2></th></tr>
                                    <tr>
                                        <td height="80" colspan="3"></td>
                                    </tr>

                                </tfoot>
                            </table>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
</body>

</html>
