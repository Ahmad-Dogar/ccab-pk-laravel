<?php 

 $thirtyOneDays = true;

 $thirtyDays = false;

 $Feb29 = false;

 $Feb28 = false;

 

 if ($data[0]['day31'] != "") {

    $thirtyOneDays = true;

    $thirtyDays = false;

    $Feb29 = false;

    $Feb28 = false;

 }

 if  ($data[0]['day31'] == "") {

    $thirtyOneDays = false;

    $thirtyDays = true;

    $Feb29 = false;

    $Feb28 = false;

 }

 if ($data[0]['day31'] == "" && $data[0]['day30'] == "" ) {

    $thirtyOneDays = false;

    $thirtyDays = false;

    $Feb29 = true;

    $Feb28 = false;

 }

 if ($data[0]['day31'] == "" && $data[0]['day30'] == "" && $data[0]['day29'] == "") {

    $thirtyOneDays = false;

    $thirtyDays = false;

    $Feb29 = false;

    $Feb28 = true;

 }





?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>



<body>

    <div class="header">

        <p style="text-align: right;margin: 0;">

            {{date("Y-m-d")}} <span style="margin-left: 30px;">{{date("h:i:s")}}</span>

        </p>

        <h2 style="margin-top: 0;">

            {{$data[0]['company']['company_name']}}

        </h2>

        <h3>

           House # 431 (3rd Floor), Road No. 30 New DOHS, Mohakhali, Dhaka-1206

        </h3>

        <h5>
            @if(isset($data[0]['employee_attendance'][0]['attendance_date']))

            Monthly Summary Report From {{$data[0]['employee_attendance'][0]['attendance_date']}} to 



            {{$data[0]['employee_attendance'][count($data[0]['employee_attendance']) - 1]['attendance_date']}}
            
            
            @else
            Monthly Summary Report
            
            @endif
            
            

        </h5>

    </div>



    <div class="table">

        <table style="height: 28px; width: 100%;">

            <tbody>

                <tr>

                    

                    <td style="max-width: 12%;">Employee Name</td>

                    <td style="max-width: 12%;">Department Name</td>

                    <td style="max-width: 12%;">Designation Name</td>

                    @if ($thirtyOneDays)

                    @for ($i = 1; $i <= 31; $i++)

                      <td>{{$i}}</td>

                    @endfor



                    @endif

                    @if ($thirtyDays)

                    @for ($i = 1; $i <= 30; $i++)

                      <td>{{$i}}</td>

                    @endfor

                    @endif



                    @if ($Feb29)

                    @for ($i = 1; $i <= 29; $i++)

                      <td>{{$i}}</td>

                    @endfor

                    @endif



                    @if ($Feb28)

                    @for ($i = 1; $i <= 28; $i++)

                      <td>{{$i}}</td>

                    @endfor

                    @endif

                    

                </tr>

                @for ($i = 0; $i < count($data); $i++)



                <tr>

                    

                    <td>

                        {{$data[$i]['first_name'].' '.$data[$i]['last_name']}}

                    </td>

                    <td>

                        {{$data[$i]['department']}}

                    </td>

                    <td>

                        {{$data[$i]['designation']}}

                    </td>

                    @if ($thirtyOneDays)

                    @for ($j = 1; $j <= 31; $j++)

                    <td>{{$data[$i]['day'.$j]}}</td>

                    @endfor



                    @endif

                    @if ($thirtyDays)

                    @for ($j = 1; $j <= 30; $j++)

                    <td>{{$data[$i]['day'.$j]}}</td>

                    @endfor

                    @endif



                    @if ($Feb29)

                    @for ($j = 1; $j <= 29; $j++)

                    <td>{{$data[$i]['day'.$j]}}</td>

                    @endfor

                    @endif



                    @if ($Feb28)

                    @for ($j = 1; $j <= 28; $j++)

                    <td>{{$data[$i]['day'.$j]}}</td>

                    @endfor

                    @endif

                </tr>

                @endfor



            </tbody>

        </table>

    </div>

    <div class="total">

        <table style="height: 77px;" width="100%">

            <tbody>

                <tr>

                    <td style="width: 33%;">

                        <div>

                            <p>

                                Prepared By

                            </p>

                        </div>

                    </td>

                    <td style="width: 33%;">

                        <div>

                            <p>

                                Checked By

                            </p>

                        </div>

                    </td>

                    <td style="width: 33%;">

                        <div>

                            <p>

                                Approved By (MD)

                            </p>

                        </div>



                    </td>

                </tr>

            </tbody>

        </table>

    </div>

    <style>

        html,

        body {

            height: 100%;

            width: 100%;

            padding: 0;

            margin: 0;

        }



        .header {

            padding: 10px;

            margin-top: 10px;

            text-align: center;

        }



        .header h3 {

            margin: 10px;

        }



        .header h5 {

            margin: 10px;

        }







        .table {

            padding: 10px;

        }



        .total {

            margin-top: 20px;

            padding: 10px;

        }



        .total div p{

            margin: auto;

            width: 40%;

            text-align: center;

            padding-top: 10px;

            border-top: 3px solid black;

        }







        .eminfodiv p {

            margin: 0;

        }



        .table table,

        .table th,

        .table td {

            border: 1px solid black;

            border-collapse: collapse;

            text-align: center;

        }

    </style>



   

</body>



</html>