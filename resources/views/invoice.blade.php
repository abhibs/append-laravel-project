<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invoice</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }

        .font {
            font-size: 15px;
        }

        .authority {
            /*text-align: center;*/
            float: right
        }

        .authority h5 {
            margin-top: -10px;
            color: green;
            /*text-align: center;*/
            margin-left: 35px;
        }

        .thanks p {
            color: green;
            ;
            font-size: 16px;
            font-weight: normal;
            font-family: serif;
            margin-top: 20px;
        }
    </style>

</head>

<body>

    <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
        <tr>
            <td valign="top">
                <!-- {{-- <img src="" alt="" width="150"/> --}} -->
                <h2 style="color: green; font-size: 26px;"><strong>Abhiram</strong></h2>
            </td>
            <td align="right">
                <pre class="font">
               Abhiram B S
               Email:abhirambs97@gamil.com <br>
               Mob: 9481187122 <br>
               Javalli Tudoor Thirthahalli Shimoga Karnataka 577226 <br>

            </pre>
            </td>
        </tr>

    </table>


    <table width="100%" style="background:white; padding:2px;""></table>

    <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
        <tr>
            <td>
                <p class="font" style="margin-left: 20px;">
                    <strong>Name: {{ $data->name }}</strong> <br>
                    <strong>Email: {{ $data->email }}</strong> <br>
                    <strong>Phone: {{ $data->phone }}</strong> <br>


                </p>
            </td>
            <td>
                <p class="font">
                <h3><span style="color: green;">Invoice:</span> {{ $data->order_id }}</h3>
                Order Date: {{ \Carbon\Carbon::parse($data->updated_at)->format('d F Y') }}<br>
                Order Status: {{ $data->status }}<br>
                Payment Type : {{ $data->payment_type }}</span>
                </p>
            </td>
        </tr>
    </table>
    <br />
    <h3>Package</h3>


    <table width="100%">
        <thead style="background-color: green; color:#FFFFFF;">
            <tr class="font">
                <th>Package Name</th>
                <th>Price</th>
                <th>Total </th>
            </tr>
        </thead>
        <tbody>


            <tr class="font">
                <td align="center"> {{ $data->package->name }} </td>
                <td align="center"> {{ $data->payable_price }} Rs. </td>
                <td align="center"> {{ $data->payable_price }} Rs. </td>
            </tr>


        </tbody>
    </table>
    <br>
    <table width="100%" style=" padding:0 10px 0 10px;">
        <tr>
            <td align="right">
                <h2><span style="color: green;">Total: {{ $data->payable_price }} Rs.</span> </h2>
            </td>
        </tr>
    </table>
    <div class="thanks mt-3">
        <p>Thanks For Buying Package..!!</p>
    </div>
    <div class="authority float-right mt-5">
        <p>-----------------------------------</p>
        <h5>Authority Signature: Abhiram B S</h5>
    </div>
</body>

</html>
