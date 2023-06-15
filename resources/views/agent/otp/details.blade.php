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
                <a href="{{ route('agentlistotp') }}"><button class="btn btn-primary"> back</button></a>
            </div>
            <div class="col-md-6 text-right mb-3">
        	    <button class="btn btn-primary" id="download"> download pdf</button>
            </div>
            <div class="col-md-12">
                <div id="invoice">
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-11">
                            <img src="{{ asset('letter-head.png') }}" width="87%">
                        </div>
                    </div>

                    <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4"> <b style="font-size:14px">LETTER OFFER TO PURCHASE</b> </div>
                            <div class="col-4"><b style="font-size:11px; padding-left : 35px"> OTP NO :{{$details->otp_num}}</b></div>
                    </div>
                    <div class="row"> 
                        <div class="col-1"></div>
                        <div class="col-11" style="font-size:11px; padding-left : 60px"><b>Date Of This Offer : </b><span style="text-decoration: font-size:12px" > {{$details->date_offer}}</span></div>
                    </div>
                    <div class="row"> 
                        <div class="col-1"></div>
                        <div class="col-11" style="font-size:11px; padding-left : 60px"><b>Sales Of Property:: </b><span style="text-decoration: font-size:12px" > {{$details->sales_property}}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> In consideration of the sum of <b>RM {{number_format($details->deposit,2)}}</b>  (hereinafter called “the earnest deposit”) paid to the vendor or stakeholder by <b>{{$details->stakeholder}}</b>,  hereby both parties agreed to  give this letter offer  to purchase for the abovementioned property at the total purchase price of <b>RM{{number_format($details->purchase_price,2)}}</b>. </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> The purchaser shall within <b>30 working days</b> from the date both parties accepted this option. (here inafter called “the said period ”) apply for loan to part finance the purchase of the property .  </div>
                        <div class="col-2"></div> 
                    </div>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> In the event the loan is approved within the said period , both parties shall sign a sales and purchaser agreement (S&P) within <b>14 days</b> from the loan approval date .if failing to do this which the earnest deposit shall be forfeited to the vendor and thereafter neither party shall have any claims against *the other or at all. </div>
                        <div class="col-2"></div> 
                    </div>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> In the event, the loan application is rejected by the bank within the said period , the purchaser or the purchaser’s solicitors shall forward to the vendor or vendor’s solicitors <b>TWO (2) Letter of Rejection</b> issued by the bank where in the earnest deposit shall be refunded to the purchaser free of interest and neither party shall have any claims against the other at all. </div>
                        <div class="col-2"></div> 
                    </div>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> In the event the said purchaser fail to produce the said letter of rejection or canceled this option to purchase before or after loan approved, the earnest deposit shall be forfeited to the vendor and neither party shall have any claims against the other at all. </div>
                        <div class="col-2"></div> 
                    </div>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> In the event that <b>the said vendor</b> should abort this transaction after accepting the above terms, you understand andagreed the terms to refund the earnest deposit together with an equal amount as liquidated damages to the <b>prospective purchaser.</b> </div>
                        <div class="col-2"></div> 
                    </div>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> All the 50% of the sum forfeited or liquidated damaged should paid to the MW Properties as their agency fee. </div>
                        <div class="col-2"></div> 
                    </div>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> If the option is exercised within the stipulated time than :- </div>
                        <div class="col-2"></div> 
                    </div>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> (a)Upon the execution of the Sales and Purchase Agreement ,a total sum <b>RM{{number_format($details->amount_paid,2)}}</b>  including earnest deposit shall be paid by the purchaser to the vendor; </div>
                        <div class="col-2"></div> 
                    </div>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> (b)The balance purchase price shall be paid within <b>FOUR(4)</b> months from the date of execution of the S&P or the date of obtaining the state consent / requisite governmental approval (if applicable) with an extension of <b>one(1)</b> month with late payment interest at 8 % p.a on the outstanding balance. </div>
                        <div class="col-2"></div> 
                    </div>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> The sales of the said property is sold on an <b>“as is where is”</b>basic and with  <b>Vacant Position  / without Vacant</b> <b>Position </b>(subject to existing tenancy agreement). </div>
                        <div class="col-2"></div> 
                    </div>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> <b>Others Condition</b>: {{$details->condition_one}} </div>
                        <div class="col-2"></div> 
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-6" style="font-size:11px; text-align:justify; padding-left : 60px"> <b> Signed By The Vendor </b> </div>
                        <div class="col-3" style="font-size:11px; text-align:justify; padding-left : 15px"> <b> Signed By The Purchaser </b> </div>
                        <div class="col-2"></div> 
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-6" style="font-size:11px; padding-left : 60px"> -------------------------- </div>
                        <div class="col-3" style="font-size:11px; padding-left : 15px"> -------------------------- </div>
                        <div class="col-2"></div> 
                    </div>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-6" style="font-size:11px; padding-left : 60px"> Name :{{$details->vendor_name}}  </div>
                        <div class="col-3" style="font-size:11px; padding-left : 15px"> Name :{{$details->purchaser_name}} </div>
                        <div class="col-2"></div> 
                    </div>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-6" style="font-size:11px; padding-left : 60px"> NRIC : {{$details->vendor_ic}}  </div>
                        <div class="col-3" style="font-size:11px; padding-left : 15px"> NRIC : {{$details->purchaser_ic}} </div>
                        <div class="col-2"></div> 
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-6" style="font-size:11px; text-align:justify; padding-left : 60px"> <b> WITNESS BY :  </b></div>
                        <div class="col-3" style="font-size:11px; text-align:justify; padding-left : 15px"> <b> WITNESS BY :  </b></div>
                        <div class="col-2"></div> 
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-6" style="font-size:11px; text-align:justify; padding-left : 60px"> -------------------------- </div>
                        <div class="col-3" style="font-size:11px; text-align:justify; padding-left : 15px"> -------------------------- </div>
                        <div class="col-2"></div> 
                    </div>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-6" style="font-size:11px; padding-left : 60px"> Name :{{$vendorname}} </div>
                        <div class="col-3" style="font-size:11px; padding-left : 15px"> Name :{{$tenantname}} </div>
                        <div class="col-2"></div> 
                    </div>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-6" style="font-size:11px; padding-left : 60px"> NRIC : {{$vendoric}} </div>
                        <div class="col-3" style="font-size:11px; padding-left : 15px"> NRIC : {{$tenantic}} </div>
                        <div class="col-2"></div> 
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
