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
        <div class="row justify-content-between align-items-start no-gutters">
            <div class="d-flex flex-column font-weight-bold">
                <img src="{{ asset('template/images/mw.png')}}" height="108" width="190" alt="">
                <div>
                    <span>MW PROPERTIES</span>
                    <span style="font-size: 12px;">(JM0936446-H)</span>
                </div>
                <div class="d-flex flex-column">
                    <span>
                        REGISTERED ESTATE AGENCY
                    </span>
                    <span>
                        20-01, JALAN MOLEK 1/9, TAMAN MOLEK, 81100 JOHOR BAHRU.
                    </span>
                    <div>
                        <span class="mr-2">
                            Email: mwpropertyconsultancy@gmail.com
                        </span>
                        <span>
                            Tel: +607-3507797
                        </span>
                    </div>

                </div>
            </div>

                <div class="mt-3 mt-md-0  mb-2 mb-md-0 d-flex flex-column justify-content-center align-content-center">
                    <div class="text-center">
                        <img src="{{ asset('template/images/ejen.png') }}" height="79" width="87" alt="">
                    </div>
                    <div class="font-weight-bold text-uppercase">
                        <span class="text-nowrap">ejen harta tanah</span>
                    </div>
                </div>
         
        </div>
        <div class="mt-2 d-flex justify-content-end no-gutters">
            <div class="col-12 col-md-5 col-lg-3 d-flex flex-column">
                <div class="d-flex no-gutters">
                    <span class="col-6 col-md-6">
                        VOUCHER NO
                    </span>
                    <span class="mr-1">:</span>
                    <span>
                        {{$voucherno}}
                    </span>
                </div>
                <div class="d-flex no-gutters">
                    <span class="col-6 col-md-6">
                        DATE
                    </span>
                    <span class="mr-1">:</span>
                    <span>
                        {{$formatdate}}
                    </span>
                </div>
            </div>
        </div>
        <div class="mt-3 d-flex text-uppercase">
            <span class="">Address : {{$detailsrental->address}}</span>
        </div>
        <div class="mt-5 d-flex no-gutters">
            <div class="col-6 text-uppercase">
                <span>Pay to : {{$agentinfo->name}}</span>
            </div>
            <div class="col-6 text-uppercase">
                <span>
                    nric : {{$agentinfo->ic}}
                </span>
            </div>
        </div>
        <div class="mt-2 mb-3 d-flex text-uppercase">
            <span>Bank details : {{$agentinfo->bankname}} {{$agentinfo->bankaccnumber}}</span>
        </div>
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
                            Total Amount
                        </td>
                        <td class="doubleborder">
                            {{$totalcomm}}
                        </td>
                 
                    </tr>
                </tfoot>
            </table>


        </div>
        <div style="margin-top: 120px;" class="row justify-content-center">
            <div class="col-4 col-md-4 d-flex flex-column">
                <div class="border-top border-dark">
                </div>
                <span class="text-center">Issued By</span>

            </div>
            <div class="mt-md-0 col-4 col-md-4 d-flex flex-column">
                <div class="border-top border-dark">
                </div>
                <span class="text-center">Approved By</span>

            </div>
            <div class="mt-md-0 col-4 col-md-4 d-flex flex-column">
                <div class="border-top border-dark">
                </div>
                <span class="text-center">Received By</span>

            </div>
        </div>
    </div>
</body>
<script src="bootstrap/js/jquery-3.5.1.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</html>