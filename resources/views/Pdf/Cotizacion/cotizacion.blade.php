<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        h1{
            text-align: center;
            text-transform: uppercase;
            font-size: 16px;
        }
        .contenido{
            font-size: 13px;
        }
        #primero{
            background-color: #ccc;
        }
        #segundo{
            color: #950903;
        }
        #tercero{
            text-decoration:line-through;
        }
        #normal{
            color: #3e3d3c;
        }
        #title-head{
            color: #3e3d3c;
            font-size: 10px;
        }
        #title-tabla{
            text-align: center;
            color: #ffffff;
            background: #575655;
        }
        footer {
            background-color: #575655;
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 20px;
            color: #fffefd;
            font-size: 10px;
        }
    </style>
</head>
<body>
<table WIDTH="90%">
    <tr WIDTH="100%" align="center">
        <td WIDTH="70%"><img src="" border="0" alt="Request" width="140" height="45"></td>
        <td WIDTH="30%">AL-FO-02 <br> Revision 09 | 11/12/2018</td>
    </tr>
    <tr>
        <td WIDTH="100%" align="center" colspan="2" id="title-head">
            <strong>--</strong><br>
            ---
        </td>
    </tr>
    <tr>
        <td WIDTH="100%" align="center" colspan="2"><strong><h1>DOXA Sistemas</h1></strong></td>
    </tr>
</table>
<hr>

<hr>
<div class="contenido">

    <table WIDTH="90%">
        <tr WIDTH="100%" align="left" >
            <td WIDTH="80%" id="title-tabla">Datos del cliente</td>
            <td WIDTH="20%" align="center" id="segundo"><strong>Cotizacion No. {{ $id }}</strong></td>
        </tr>
        <tr align="left">
            <td WIDTH="80%" id="normal">Nombre: {{ $quotationFirst->nameClient }}</td>
            <td WIDTH="20%"></td>
        </tr>
        <tr align="left">
            <td WIDTH="80%" id="normal">Email: {{ $quotationFirst->emailClient }}</td>
            <td WIDTH="20%"></td>
        </tr>
        <tr align="left">
            <td WIDTH="80%" id="normal">

            </td>
            <td WIDTH="20%"></td>
        </tr>
    </table>
    <hr>

    <div align="left">

        <table WIDTH="100%">
            <tr WIDTH="100%" align="left" >
                <th WIDTH="100%" id="title-tabla" align="center">PRODUCTOS COTIZADOS</th>
            </tr>
            <tr align="left">
                <td WIDTH="100%" id="normal"></td>
            </tr>

        </table>

    </div>
    <hr>
    <table WIDTH="100%">
        <tr WIDTH="100%" align="left" >
            <th WIDTH="10%" id="title-tabla" align="left">idPROD</th>
            <th WIDTH="50%" id="title-tabla" align="left">PRODUCTO</th>
            <th WIDTH="40%" id="title-tabla" align="center">CANTIDAD</th>
            <th WIDTH="40%" id="title-tabla" align="center">C.UNITARIO</th>
            <th WIDTH="40%" id="title-tabla" align="center">C.TOTAL</th>
        </tr>

        @foreach($quotationGet as $data)
        <tr align="center">
            <td WIDTH="10%" id="normal" align="center">{{ $data['product_id'] }}</td>
            <td WIDTH="30%">{{ $data['productName'] }}</td>
            <td WIDTH="20%">{{ $data['quantity'] }}</td>
            <td WIDTH="20%">{{ $data['productPrice'] }}</td>
            <td WIDTH="20%">{{ $data['productPrice']  * $data['quantity'] }}</td>
        </tr>
        @endforeach
    </table>
    <table WIDTH="100%">
            <tr align="right">
                <td WIDTH="10%" id="normal" align="center"></td>
                <td WIDTH="30%"></td>
                <td WIDTH="20%"></td>
                <td WIDTH="20%">Total:</td>
                <td WIDTH="20%">
        @foreach( $sumCostProduct as $data)
                       {{ $data['total_profit']  }}
            @endforeach
                </td>
            </tr>
    </table>
    <hr>
</div>
<div align="right">
    <footer>Print {{ $today }} | user_id {{ Auth()->id() }}</footer>
</div>
</body>
</html>
