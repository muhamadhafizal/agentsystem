<html>
    <head>
    <script src="{{ asset('format/pdf.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <link href=" {{ asset('template/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    </head>
    <body>
    <div>
    <br><br><br>
    </div>
    <div class="container justify-content-center">
        <div class="row">
            <div class="col-md-6 text-left mb-3">
                <a href="{{ route('agentlistpayment') }}"><button class="btn btn-primary"> back</button></a>
            </div>
            <div class="col-md-6 text-right mb-3">
        	    <button class="btn btn-primary" id="download"> download pdf</button>
            </div>
            <div class="col-md-12">
                <div id="invoice">
                    <br>
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-8">
                            <img src="{{ asset('mwlogo.jpg') }}">
                        </div>
                        <div class="col-2 pull-right">
                            <img src="{{ asset('property.png') }}" width="50" height="50">
                            <p style="font-size:11px">  EJEN HARTA TANAH </p>
                            <p style="font-size:11px; margin:-15px -2px"> A0053 & E0141 </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <b>MW PROPERTIES</b> <p style="font-size:11px; display:inline">(AE(3)0024) REGISTERED ESTATE AGENT</p>
                        </div>
                    </div>
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-6">
                            <p style="font-size:12px">BLOCK A 04-10 PUSAT PERDAGANGAN EKOFLORA</p>
                        </div>
                    </div>
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-6">
                            <p style="font-size:12px">JALAN EKOFLORA 7/3 TAMAN EKOFLORA</p>
                        </div>
                    </div>
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-6">
                            <p style="font-size:12px">81100 JOHOR BAHRU JOHOR</p>
                        </div>
                    </div>
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-6">
                            <p style="font-size:11px">Email: mwproperty.jb@gmail.com &nbsp&nbsp Tel: +607-3611599 </p>
                        </div>
                    </div>
                    <div class="row" style="height:15px">
                        <div class="col-8"></div>
                        <div class="col-2 pull-right" style="font-size:12px">
                           CP NO : {{$payment->cp_num}}
                        </div>
                    </div>
                    <div class="row" style="height:25px">
                        <div class="col-1"></div>
                        <div class="col-6">
                            <p style="font-size:14px">Name : {{$payment->name}}</p>
                        </div>
                    </div>
                    <div class="row" style="height:25px">
                        <div class="col-1"></div>
                        <div class="col-6">
                            <p style="font-size:14px">NRIC No : {{$payment->ic}}</p>
                        </div>
                    </div>
                    <div class="row" style="height:25px">
                        <div class="col-1"></div>
                        <div class="col-6">
                            <p style="font-size:14px">Email : {{$payment->email}}</p>
                        </div>
                    </div>
                    <div class="row" style="height:25px">
                        <div class="col-1"></div>
                        <div class="col-6">
                            <p style="font-size:14px">Address : {{$payment->address}}</p>
                        </div>
                    </div>
                    <div class="row" style="height:25px">
                        <div class="col-1"></div>
                        <div class="col-6">
                            <p style="font-size:14px">To : MW Properties</p>
                        </div>
                    </div>
                    <div class="row" style="height:25px">
                        <div class="col-1"></div>
                        <div class="col-7">
                            <p style="font-size:12px">Office Address: BLOCK A 04-10 PUSAT PERDAGANGAN EKOFLORA, JALAN EKOFLORA 7/3 TAMAN EKOFLORA,81100, JOHOR BAHRU JOHOR</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:250%">
                        <div class="col-1"></div>
                        <div class="col-7">
                            <p style="font-size:12px;">Office Contact: (+6) 07-3611599</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-6">
                            <p style="font-size:14px">Dear Sir/Madam,</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:250%">
                        <div class="col-1"></div>
                        <div class="col-6">
                            <h6 style="-webkit-text-decoration-line: underline; text-decoration-line: underline;">RE : Irrevocable Letter on Confirmation of Payment</h6>
                        </div>
                    </div>
                    <div class="row" style="height:25px">
                        <div class="col-1"></div>
                        <div class="col-4">
                            <p style="font-size:12px">I/We : <u>{{$payment->name}} </u> </p>
                        </div>
                        <div class="col-4">
                            <p style="font-size:12px">NRIC: <u>{{$payment->ic}}</u> </p>
                        </div>
                    </div>
                    <div class="row" style="height:25px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">hereby undertake to pay you a sum of <b>RM {{$payment->amount}}</b> only (hereinafter know as "the said Payment") for your</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">professional services rendered in securing the said of purchase/ to lease for the property upon the</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">execution of the Sale and Purchase Agreement/ Tenancy Agreement.</p>
                        </div>
                    </div>
                    <br>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">I/We hereby agreed that in the event that before the execution of the Sale and Purchase Agreement/</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px"> Tenancy Agreement, the deal is aborted/ terminated due to me/ us or the Vendor/ Landlord, I / we</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px"> shall equally share with forfeited amount with agency as they had done part of their job.</p>
                        </div>
                    </div>
                    <br>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">I/We hereby agreed that in the event that after the execution of the Sale and Purchase Agreement/</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px"> Tenancy Agreement, the deal is aborted/ terminated due to me/ us or the Vendor/ Landlord, your</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px"> said Payment already earned shall not be affected and will not be required to be refunded.</p>
                        </div>
                    </div>
                    <br>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">I/We further confirm that the company shall be at their liberty to commence legal proceedings against</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px"> me/us in the event I/we default or fail to perform any of the terms and conditions hereof.</p>
                        </div>
                    </div>
                    <br>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">I/We shall not hold the Agent/ the Agency responsible for any losses, damages or expenses incurred as</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px"> a result of complying with my/our instruction and authorization hereof. Further, I/We shall keep the Agent</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">/ his Agency indemnified against any claim arising here from.</p>
                        </div>
                    </div>
                    <br>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-5">
                            <p style="font-size:12px">Yours faithfully,</p>
                        </div>
                        <div class="col-5">
                            <p style="font-size:12px">In the presence of (witness)</p>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-5">
                            <p style="font-size:12px">----------------------------</p>
                        </div>
                        <div class="col-5">
                            <p style="font-size:12px">----------------------------</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-5">
                            <p style="font-size:12px">Name : {{$payment->name}}</p>
                        </div>
                        <div class="col-5">
                            <p style="font-size:12px">Name : {{$agentdetails->nickname}}</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-5">
                            <p style="font-size:12px">NRIC : {{$payment->ic}}</p>
                        </div>
                        <div class="col-5">
                            <p style="font-size:12px">NRIC : {{$agentdetails->ic}}</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-5">
                            <p style="font-size:12px">Contact : {{$payment->contact}}</p>
                        </div>
                        <div class="col-5">
                            <p style="font-size:12px">Contact : {{$agentdetails->contact}}</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-5">
                            <p style="font-size:12px">Date : {{$payment->created_at}}</p>
                        </div>
                        <div class="col-5">
                            <p style="font-size:12px">Date : {{$payment->created_at}}</p>
                        </div>
                    </div>
                    <br>
                    
                    

                </div>
            </div>
        </div>
    </div>
    </body>
</html>
