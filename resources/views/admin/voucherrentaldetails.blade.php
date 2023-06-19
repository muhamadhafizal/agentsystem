<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{ asset('template/voucher/bootstrap/css/bootstrap.min.css') }}">

    <style>
        td,
        th {
            border: 1px solid black;

        }

        .noborder {
            border: none !important;
        }

        .doubleborder {
            border-bottom: 5px double black;

        }
    </style>
    <title>Vouncher</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-11">
                <img src="{{ asset('letter-head.png') }}" width="95%">
            </div>
        </div>
        <div class="row">
            <div class="col-8"></div>
            <div class="col-4"><p style="font-size:15px; text-align:justify; padding-left : 35px">  <b>VOUCHER NO</b>  : {{$voucherno}}</p></div>
        </div>
        <div class="row">
            <div class="col-8"></div>
            <div class="col-4"><p style="font-size:15px; text-align:justify; padding-left : 35px"> <b> DATE </b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: {{$formatdate}}</p></div>
        </div>
        <div class="row">
            <div class="col-1"></div>        
            <div class="col-9" style="font-size:15px; text-align:justify; padding-left : 60px"> <b>ADDRESS</b> : {{$detailsrental->address}} </div>
            <div class="col-2"></div> 
        </div> 
        <div class="row">
            <div class="col-1"></div>        
            <div class="col-5" style="font-size:15px; text-align:justify; padding-left : 60px"> <b>PAY TO </b> : {{$agentinfo->name}} </div>
            <div class="col-4" style="font-size:15px; text-align:justify; padding-left : 60px"> <b>NRIC</b> : {{$agentinfo->ic}} </div>
            <div class="col-2"></div> 
        </div> 
        <div class="row">
            <div class="col-1"></div>        
            <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px">  </div>
            <div class="col-2"></div> 
        </div> 

        <div class="row">
            <div class="col-1"></div>        
            <div class="col-9" style="font-size:15px; text-align:justify; padding-left : 60px"> <b> BANK DETAILS </b> : {{$agentinfo->bankname}} {{$agentinfo->bankaccnumber}} </div>
            <div class="col-2"></div> 
        </div> 
        <br>
        <div class="row">
            <div class="col-1"></div>        
            <div class="col-10" style="font-size:15px; text-align:justify; padding-left : 60px"> 
                <div class="table-responsive">
                    <table style="width:100%" class="text-center">
                        <thead>
                            <tr>
                                <th width="70%">DESCRIPTION</th>
                                <th colspan="2">AMOUNT (RM)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($commarray as $data)
                            <tr>
                                <td>
                                    {{$data['name']}}
                                </td>
                                <td>
                                    {{$data['amount']}}
                                </td>
                            
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="noborder text-right pr-2 text-uppercase">
                                    <b> Total Amount </b>
                                </td>
                                <td class="doubleborder">
                                    {{$totalcomm}}
                                </td>
                        
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="col-1"></div> 
        </div> 

        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <div style="margin-top: 120px;" class="row justify-content-center">
                    <div class="col-3 col-md-3 d-flex flex-column">
                        <div class="border-top border-dark">
                        </div>
                        <span class="text-center">Issued By</span>

                    </div>
                    <div class="mt-md-0 col-3 col-md-3 d-flex flex-column">
                        <div class="border-top border-dark">
                        </div>
                        <span class="text-center">Approved By</span>

                    </div>
                    <div class="mt-md-0 col-3 col-md-3 d-flex flex-column">
                        <div class="border-top border-dark">
                        </div>
                        <span class="text-center">Received By</span>

                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
</body>
<script src="bootstrap/js/jquery-3.5.1.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</html>