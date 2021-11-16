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
            background: #cde3f7;
        }

        tr {}

        thead {
            border: 2px solid #dddddd;
            background: #cde3f7;

        }

        h3 {
            color: #31218a;
            font-weight: normal;
            font-size: 25px;
            font-family: Arial;
            background-color: #f4f6f8;
            
            margin-bottom: 5px;
            border: 2px solid #416f99;
            border-radius: 5px;
            margin-right: 150px;
            margin-left: 150px;
        }
        footer{
            text-align: center;
        }

    </style>
</head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Reporte de salida de Material</title>


<body>

    <header>

        <div class="bg-dark text-center text-white">
           <h3 align="center">KARDEX DE MATERIAL</h3>
        </div>
    </header>
    <br>
    <section>
        <div>
            <table id="" class="ml-4 ">
                <thead>
                    
                </thead>
                <tbody>
                    <tr>
                        <th> MATERIAL : </th>
                        <td> {{ $product->name}} - {{$product->caract}}</td>
                    </tr>
                    <tr>
                        <th>CATEGORÍA :</th>
                        <td>{{$product->category->name}}</td>
                    </tr>
                    <tr>
                        <th>PROVEEDOR :</th>
                        <td>{{$product->provider->name}}</td>
                    </tr>
                </tbody>
            </table>
            
        </div>
    </section>
    <br>
    <section>
        <div>
            <table id="saleDetails" class="table">
                <thead>
                    <tr class="bg-dark text-white text-center">
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Material</th>
                        <th>Descripción</th>
                        <th>Inicial</th>
                        <th>Entrada</th>
                        <th>Salida</th>
                        <th>Saldo</th>
                    </tr>
                </thead>
                <tfoot>

                <div hidden style="display: none;">{{$saldo=0}}</div>
                <tbody>
                    <tr>
                        <td>{{\Carbon\Carbon::parse($product->created_at)->format('d M y')}}</td>
                        <td>{{\Carbon\Carbon::parse($product->created_at)->format('h i a')}}</td>
                        <td>{{$product->name}}</td>
                        <td>Inicial</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                   
                    @foreach ($kardex as $karde)
                    
                    <tr>
                        <td>{{\Carbon\Carbon::parse($karde->date_sale)->format('d M y')}}</td>
                        <td>{{\Carbon\Carbon::parse($karde->date_sale)->format('h i a')}}</td>
                        <td>{{$karde->name}}</td>
                        <td>
                            @if ($karde->tipo == 1)
                                 Ingreso
                                 <td>{{$saldo}}</td>
                                 <td>{{ $karde->quantity}}</td>
                                 <td>-</td>
                                 <td>{{$saldo=$saldo + $karde->quantity}}</td>
                            @else 
                                 Salida  
                                 <td>{{$saldo}}</td>
                                 <td>-</td>
                                 <td>{{$karde->quantity}}</td>
                                 <td>{{$saldo=$saldo - $karde->quantity}} </td>
                                    
                            @endif
                        </td>
                        

                    </tr>
                    
                   
                        
                    @endforeach
                   
                </tbody>
            </table>
        </div>
    </section>
    <br>
    <br>
    
    <footer style="position: fixed;bottom: 50px" align="center">
        <!--puedes poner un mensaje aqui-->
            <hr>
                <Small align="center"> Calle Antezana N° 743 - Zona Central entre La Paz y Chuquisaca - Teléfono: (591) (2) 2720259 - Celular: (591) 73023212</Small><br>
                <Small align="center"> La Paz - Bolivia</Small>
                {{-- <b>{{$company->name}}</b><br>{{$company->description}}<br>Telefono:{{$company->telephone}}<br>Email:{{$company->email}} --}}
        
    </footer>
</body>

</html>
