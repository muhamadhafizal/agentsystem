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
                <a href="{{ route('adminlistotl') }}"><button class="btn btn-primary"> back</button></a>
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
                            <div class="col-5"> <u> <b style="font-size:15px">OPTION OFFER TO LEASE</b> </u> </div>
                            <div class="col-3">  </div>
                    </div>
                    <div class="row">
                            <div class="col-8"></div>
                            <div class="col-2" style="font-size:11px; padding-left : 35px"> OTL NO : <b>{{$details->otl_no}}</b> </div>
                            <div class="col-2"> </div>
                    </div>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> Date of this agreement  : <b>{{$details->date_of_agreement}} </b> </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> RE: Property known as : <b>{{$details->property_address}} </b> </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> Tenant(s) name :<b> {{$details->tenant_name}} </b> </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> NRIC no : <b>{{$details->tenant_ic}}</b> </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> Between </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> Vendor (s) name :<b>{{$details->vendor_name}}</b> </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> NRIC no :<b> {{$details->vendor_ic}}</b> </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> I / we agreed  to rent / to lease the above property on the following terms and conditions : </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> a)Date of Commencement :<b>{{$startdatecommencement}} - {{$enddatecommencement}} </b> </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> b)Tenancy Period :<b>{{$details->tenancy_period}}</b> </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> c)Renewal Term :<b>{{$details->renewal_term}} </b> </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> d)Deposit and Payment as below : </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> 1) Monthly Rental as agreed &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : <b>RM{{$details->monthly_rental}}</b> </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> 2) Advance Rental of the month &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :<b> RM{{$details->advance_rental}}</b> </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> 3) Security Deposit &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : <b>RM{{$details->security_deposit}}</b> </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> 4) Utility Deposit &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : <b>RM{{$details->utility_deposit}}</b> </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> 5)Tenancy Agreement fee &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : <b>RM{{$details->agreement_fee}}</b> </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> 6)Stamp Duty + Runner fee &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : <b>RM{{$details->stamp_duty}}</b> </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> TOTAL &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : <b>RM{{$totalotl}}</b> </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp (-)Deduct Earnest Deposit Paid : <b>RM{{$details->deduct_deposit}}</b> </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp (-)Deduct  Agreement and Stamping Fee : <b>RM{{$details->deduct_agreement}}</b> </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Balance To Paid to vendor : <b>RM{{$details->balance_to_paid}}</b> </div>
                        <div class="col-2"></div> 
                    </div> 
                    @if($details->type == 'cash')
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> I/ We attach here with the sum of  <b>RM{{$details->monthly_rental}}</b> Cash payable to vendor or MW PROPERTIES as stakeholder being earnest deposit. </div>
                        <div class="col-2"></div> 
                    </div> 
                    @else
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> I/ We attach here with the sum of  <b>RM{{$details->monthly_rental}}</b> Cheque No <b>{{$details->cheque_no}}</b> payable to vendor or MW PROPERTIES as stakeholder being earnest deposit. </div>
                        <div class="col-2"></div> 
                    </div> 
                    @endif
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> In the event  the tenant do not execute the tenancy agreement or pay balance mentioned above on or before <b>{{$details->pay_before}}</b>. </div>
                        <div class="col-2"></div> 
                    </div>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> I/ We understand and  agree that the forfeiture of the deposit paid without any claim or liabilities against you. </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> In the event the vendor(s) rejects this offer, the said deposit is to be refunded to the said tenant(s) free of interest. </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> In the event  the said tenant  abort this transaction after accepting this offer  and  the earnest deposit  will be as liquidated damages to the said vendor and the portion of liquidated damaged shall share equally with Agency. </div>
                        <div class="col-2"></div> 
                    </div>  
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> In the event  the said vendor abort this transaction after accepting this offer ,the said vendor should pay back the earnest deposit and another sum same as Earnest deposit  as liquidated damages to the said tenant and the portion of liquidated damaged shall share equally with Agency. </div>
                        <div class="col-2"></div> 
                    </div> 
                    <br>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-6" style="font-size:11px; text-align:justify; padding-left : 60px"> <b> Signed By Landlor  </b></div>
                        <div class="col-3" style="font-size:11px; text-align:justify; padding-left : 15px"> <b> Signed By Tenant  </b></div>
                        <div class="col-2"></div> 
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-6" style="font-size:11px; text-align:justify; padding-left : 60px"> -------------------------- </div>
                        <div class="col-3" style="font-size:11px; text-align:justify; padding-left : 15px"> -------------------------- </div>
                        <div class="col-2"></div> 
                    </div>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-6" style="font-size:11px; padding-left : 60px"> Name : {{$details->vendor_name}} </div>
                        <div class="col-3" style="font-size:11px; padding-left : 15px"> Name : {{$details->tenant_name}} </div>
                        <div class="col-2"></div> 
                    </div>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-6" style="font-size:11px; padding-left : 60px"> NRIC : {{$details->vendor_ic}}</div>
                        <div class="col-3" style="font-size:11px; padding-left : 15px"> NRIC : {{$details->tenant_name}}</div>
                        <div class="col-2"></div> 
                    </div>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-6" style="font-size:11px; text-align:justify; padding-left : 60px"> <b> Witness BY :  </b></div>
                        <div class="col-3" style="font-size:11px; text-align:justify; padding-left : 15px"> <b> Witness BY :  </b></div>
                        <div class="col-2"></div> 
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-6" style="font-size:11px; text-align:justify; padding-left : 60px"> -------------------------- </div>
                        <div class="col-3" style="font-size:11px; text-align:justify; padding-left : 15px"> -------------------------- </div>
                        <div class="col-2"></div> 
                    </div>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-6" style="font-size:11px; padding-left : 60px"> Name : {{$vendorname}} </div>
                        <div class="col-3" style="font-size:11px; padding-left : 15px"> Name : {{$tenantname}} </div>
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
