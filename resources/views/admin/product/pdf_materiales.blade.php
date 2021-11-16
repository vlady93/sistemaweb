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
           <h3 align="center">LISTA DE MATERIALES</h3>
        </div>
        <br><br>
    </header>
    <section>
        <div>
            <table id="saleDetails" class="table">
                <thead>
                    <tr class="bg-dark text-white text-center">
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Proveedor</th>
                        <th>Stock</th>
                        <th>Código RFID</th>
                
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($kardex as $product)
                    <tr>
                        <td>{{$product->name}} - {{$product->caract}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->provider->name}}</td>
                        <td>{{$product->stock}}</td>
                        <td>{{$product->rfid}}</td>
                    
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
