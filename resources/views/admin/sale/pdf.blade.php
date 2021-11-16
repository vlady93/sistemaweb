<!DOCTYPE>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Reporte de salida de Material</title>


<body>

    <header>

        <div class="bg-dark text-center text-white">
           <h3>Salida de Material</h3>
        </div>
    </header>
    <br>
    <section>
        <div>
            <table id="" class="ml-4 ">
                <thead>
                    <tr id="" class="">
                        <th> USUARIO : </th>
                        <td> {{ $sale->user->name }}</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>FECHA :</th>
                        <td>{{\Carbon\Carbon::parse($sale->created_at)->format('d M y')}}</td>
                    </tr>
                    <tr>
                        <th>HORA: </th>
                        <td>{{\Carbon\Carbon::parse($sale->created_at)->format('h:i a')}}</td>
                    </tr>
                    <tr>
                        <th> PROYECTO:</th>
                        <td>{{$sale->project->name}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <br>
    <section>
        <div>
            <table id="facproducto" class="table table_condensed table-bordered table-striped text-center">
                <thead class="bg-dark text-center text-white">
                    <tr id=""cla>
                        <th>CANTIDAD</th>
                        <th>MATERIAL</th>
                        <th>PRECIO DE SALIDA </th>
                        <th>SUBTOTAL </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($saleDetails as $saleDetail)
                        <tr>
                            <td>{{ $saleDetail->quantity }}</td>
                            <td> <small> {{ $saleDetail->product->name }} -
                                    {{ $saleDetail->product->caract }}</small></td>
                            <td>{{ $saleDetail->price }} Bs.-</td>
                            <td>{{ number_format($saleDetail->quantity * $saleDetail->price, 2) }} Bs.-</td>
                       
                        </tr>
                    @endforeach
                    
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">
                            <p align="right">TOTAL:</p>
                        </th>
                        <td>
                            <p align="right">{{ number_format($sale->total, 2) }} Bs.-
                            <p>
                        </td>
                    </tr>

                </tfoot>
            </table>
        </div>
    </section>
    <br>
    <br>
    
    <footer style="position: fixed;bottom: 50px" >
        <!--puedes poner un mensaje aqui-->
        
        <div id="datos" class="text-center mb-3" style="font-size: 14px">
            <hr>
                <Small > Calle Antezana N° 743 - Zona Central entre La Paz y Chuquisaca - Teléfono: (591) (2) 2720259 - Celular: (591) 73023212 - 71592564 </Small><br>
                <Small > La Paz - Bolivia</Small>
                {{-- <b>{{$company->name}}</b><br>{{$company->description}}<br>Telefono:{{$company->telephone}}<br>Email:{{$company->email}} --}}
        </div>
    </footer>
</body>

</html>
