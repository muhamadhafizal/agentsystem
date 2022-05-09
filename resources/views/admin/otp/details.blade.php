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
                <a href="{{ route('adminlistotp') }}"><button class="btn btn-primary"> back</button></a>
            </div>
            <div class="col-md-6 text-right mb-3">
        	    <button class="btn btn-primary" id="download"> download pdf</button>
            </div>
            <div class="col-md-12">
                <div id="invoice">
                <div class="row" style="height:10px"></div>
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-8">
                            <img src="{{ asset('mwlogo.jpg') }}">
                        </div>
                        <div class="col-2 pull-right">
                            <img src="{{ asset('property.png') }}" width="60" height="60">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9"></div>
                        <div class="col-2 pull-right" style="font-size:11px">
                           EJEN HARTA TANAH
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9"></div>
                        <div class="col-2 pull-right" style="font-size:11px">
                           A0053 & E0141
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <b>MW PROPERTIES</b> <p style="font-size:10px; display:inline">(AE(3)0024) REGISTERED ESTATE AGENT</p>
                        </div>
                    </div>
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-6">
                            <p style="font-size:10px">BLOCK A 04-10 PUSAT PERDAGANGAN EKOFLORA</p>
                        </div>
                    </div>
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-6">
                            <p style="font-size:10px">JALAN EKOFLORA 7/3 TAMAN EKOFLORA</p>
                        </div>
                    </div>
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-6">
                            <p style="font-size:10px">81100 JOHOR BAHRU JOHOR</p>
                        </div>
                    </div>
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-6">
                            <p style="font-size:10px">Email: mwproperty.jb@gmail.com &nbsp&nbsp Tel: +607-3611599 </p>
                        </div>
                    </div>
                    <br>
                    <div class="row" style="height:25px">
                        <div class="col-3"></div>
                        <div class="col-6">
                        <p style="font-size:14px"><b>LETTER OFFER TO PURCHASE</b></p>
                        </div>
                    </div>                  
                    <div class="row" style="height:25px">
                        <div class="col-9"></div>
                        <div class="col-3">
                            <p style="font-size:11px">OTP NO:{{$details->otp_num}}</p>
                        </div>
                    </div>  
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px; font-weight:bold">Date Of This Offer : {{$details->date_offer}} </p>
                        </div>
                    </div> 
                    <div class="row" style="height:10px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px; font-weight:bold">Sales Of Property: {{$details->sales_property}}</p>
                        </div>
                    </div> 
                   <br>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">In consideration of the sum of <b>RM {{number_format($details->deposit,2)}}</b>  (hereinafter called “the earnest deposit”) paid to the vendor or </p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">stakeholder by <b>{{$details->stakeholder}}</b>,  hereby both parties agreed to  give this </p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">letter offer  to purchase for the abovementioned property at the total purchase price of <b>RM{{number_format($details->purchase_price,2)}}</b>.</p>
                        </div>
                    </div>
                    <div class="row" style="height:3px"></div>
                    <div class="row" style="line-height:10px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">The purchaser shall within <b>30 working days</b> from the date both parties accepted this option.</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">(here inafter called “the said period ”) apply for loan to part finance the purchase of the property . </p>
                        </div>
                    </div>
                    <div class="row" style="height:10px"></div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">In the event the loan is approved within the said period , both parties shall sign a sales and purchaser</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">agreement (S&P) within <b>14 days</b> from the loan approval date .if failing to do this which the earnest deposit</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">the vendor and thereafter neither party shall have any claims against the other or at all shall be forfeited to.</p>
                        </div>
                    </div>
                    <div class="row" style="height:3px"></div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">In the event, the loan application is rejected by the bank within the said period , the purchaser or the purchaser’s </p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">solicitors shall forward to the vendor or vendor’s solicitors <b>TWO (2) Letter of Rejection</b> issued by the bank</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">where in the earnest deposit shall be refunded to the purchaser free of interest and neither party shall have</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px"> any claims against the other at all. If the purchaser fail to produce the said letter of rejection or</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">cancelled this option to purchase after loan   approved, the earnest deposit shall be forfeited to</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">the vendor and neither party shall have any claims against the other at all.</p>
                        </div>
                    </div>
                    <div class="row" style="height:3px"></div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">In the event that <b>the said vendor</b> should abort this transaction after accepting the above terms,</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">you understand andagreed the terms to refund the earnest deposit together with an equal amount</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">as liquidated damages to the <b>prospective purchaser.</b> </p>
                        </div>
                    </div>
                    <div class="row" style="height:3px"></div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">If the option is exercised within the stipulated time than :-</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">&nbsp&nbsp&nbsp(a)Upon the execution of the Sales and Purchase Agreement ,a total sum <b>RM{{number_format($details->deposit,2)}}</b>  including </p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  earnest deposit shall be paid by the purchaser to the vendor;</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">&nbsp&nbsp&nbsp (b)The balance purchase price shall be paid within <b>FOUR(4)</b> months from the date of execution of the S&P or </p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp the date of obtaining the state consent / requisite governmental approval (if applicable) with an extension of </p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b>one(1)</b> month with late payment interest at 8 % p.a on the outstanding balance.</p>
                        </div>
                    </div>
                    <div class="row" style="height:10px"></div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">The sales of the said property is sold on an <b>“as is where is”</b>basic and with  <b>Vacant Position  / without Vacant</b> </p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px"><b>Position </b>(subject to existing tenancy agreement )</p>
                        </div>
                    </div>
                    <div class="row" style="height:10px"></div>
                    <div class="row" style="line-height:60%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:10px"><b>Others Condition:</b> {{$details->condition_one}}</p>
                        </div>
                    </div>
                    <div class="row" style="height:10px"></div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-5">
                            <p style="font-size:10px">Signed By The Vendor</p>
                        </div>
                        <div class="col-5">
                            <p style="font-size:10px">Signed By The Purchaser</p>
                        </div>
                    </div>
                    <br>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-5">
                            <p style="font-size:10px">----------------------------</p>
                        </div>
                        <div class="col-5">
                            <p style="font-size:10px">----------------------------</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:20%">
                        <div class="col-1"></div>
                        <div class="col-5">
                            <p style="font-size:10px">Name : {{$details->vendor_name}}  </p>
                        </div>
                        <div class="col-5">
                            <p style="font-size:10px">Name : {{$details->purchaser_name}}</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:2%">
                        <div class="col-1"></div>
                        <div class="col-5">
                            <p style="font-size:10px">NRIC : {{$details->vendor_ic}} </p>
                        </div>
                        <div class="col-5">
                            <p style="font-size:10px">NRIC : {{$details->purchaser_ic}}</p>
                        </div>
                    </div>
                    <div class="row" style="height:10px"></div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-5">
                            <p style="font-size:10px">WITNESS BY:</p>
                        </div>
                        <div class="col-5">
                            <p style="font-size:10px">WITNESS BY:</p>
                        </div>
                    </div>
                    <br>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-5">
                            <p style="font-size:10px">----------------------------</p>
                        </div>
                        <div class="col-5">
                            <p style="font-size:10px">----------------------------</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-5">
                            <p style="font-size:10px">Name : {{$vendorname}} </p>
                        </div>
                        <div class="col-5">
                            <p style="font-size:10px">Name : {{$tenantname}}</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:2%">
                        <div class="col-1"></div>
                        <div class="col-5">
                            <p style="font-size:10px">NRIC : {{$vendoric}}</p>
                        </div>
                        <div class="col-5">
                            <p style="font-size:10px">NRIC : {{$tenantic}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
