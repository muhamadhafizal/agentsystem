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
                        <p style="font-size:14px"><b>OPTION OFFER TO LEASE</b></p>
                        </div>
                    </div>                  
                    <div class="row" style="height:25px">
                        <div class="col-9"></div>
                        <div class="col-3">
                            <p style="font-size:11px">OTL NO:<b>{{$details->otl_no}}</b></p>
                        </div>
                    </div>  
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px;">Date of this agreement  : <b>{{$details->date_of_agreement}} </b> </p>
                        </div>
                    </div>  
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px;">RE: Property known as : <b>{{$details->property_address}} </b></p>
                        </div>
                    </div> 
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px;">Tenant(s) name :<b> {{$details->tenant_name}} </b></p>
                        </div>
                    </div> 
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px;">NRIC no : <b>{{$details->tenant_ic}}</b></p>
                        </div>
                    </div> 
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px;">Contact no : <b>{{$details->tenant_contact}}</b></p>
                        </div>
                    </div> 
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px;">Mailing address :<b>{{$details->tenant_email}} </b></p>
                        </div>
                    </div> 
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px;">Between </p>
                        </div>
                    </div> 
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px;">Vendor (s) name :<b>{{$details->vendor_name}}</b> </p>
                        </div>
                    </div> 
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px;">NRIC no :<b> {{$details->vendor_ic}}</b></p>
                        </div>
                    </div> 
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px;">Contact no  : <b>{{$details->vendor_contact}}</b></p>
                        </div>
                    </div> 
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px;">Mailing address  :<b>{{$details->vendor_email}} </b></p>
                        </div>
                    </div>
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px;">I / we agreed  to rent / to lease the above property on the following terms and conditions : </p>
                        </div>
                    </div> 
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px;">&nbsp&nbsp&nbsp a)Date of Commencement :<b>{{$startdatecommencement}} - {{$enddatecommencement}} </b></p>
                        </div>
                    </div> 
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px;">&nbsp&nbsp&nbsp b)Tenancy Period :<b>{{$details->tenancy_period}}</b></p>
                        </div>
                    </div> 
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px;">&nbsp&nbsp&nbsp c)Renewal Term :<b>{{$details->renewal_term}} </b></p>
                        </div>
                    </div> 
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px;">&nbsp&nbsp&nbsp d)Deposit and Payment as below : </p>
                        </div>
                    </div> 
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 1) Monthly Rental as agreed : <b>RM{{$details->monthly_rental}}</b></p>
                        </div>
                    </div> 
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 2) Advance Rental of the month :<b> RM{{$details->advance_rental}}</b></p>
                        </div>
                    </div> 
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 3) Security Deposit : <b>RM{{$details->security_deposit}}</b></p>
                        </div>
                    </div> 
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 4) Utility Deposit : <b>RM{{$details->utility_deposit}}</b></p>
                        </div>
                    </div> 
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 5)Tenancy Agreement fee &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : <b>RM{{$details->agreement_fee}}</b></p>
                        </div>
                    </div> 
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 6)Stamp Duty + Runner fee &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : <b>RM{{$details->stamp_duty}}</b></p>
                        </div>
                    </div> 
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px;">TOTAL &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : <b>RM{{$details->total}}</b></p>
                        </div>
                    </div> 
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp (-)Deduct Earnest Deposit Paid : <b>RM{{$details->deduct_deposit}}</b></p>
                        </div>
                    </div> 
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp (-)Deduct  Agreement and Stamping Fee : <b>RM{{$details->deduct_agreement}}</b></p>
                        </div>
                    </div> 
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Balance To Paid to vendor : <b>RM{{$details->balance_to_paid}}</b></p>
                        </div>
                    </div> 
                    <div class="row" style="height:3px"></div>
                    @if($details->type == 'cash')
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">I/ We attach here with the sum of  <b>RM{{$details->monthly_rental}}</b> Cash payable to vendor or MW PROPERTIES as stakeholder being</p>
                        </div>
                    </div>
                    @else
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">I/ We attach here with the sum of  <b>RM{{$details->monthly_rental}}</b> Cheque No <b>{{$details->cheque_no}}</b> payable to vendor or MW PROPERTIES as stakeholder being</p>
                        </div>
                    </div>
                    @endif
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">earnest deposit.</p>
                        </div>
                    </div>
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">In the event  the tenant do not execute the tenancy agreement or pay balance mentioned above on or</p>
                        </div>
                    </div>
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">before <b>{{$details->pay_before}}</b>. </p>
                        </div>
                    </div>
                    <div class="row" style="height:3px"></div>
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">I/ We understand and  agree that the forfeiture of the deposit paid without any claim or liabilities against you.</p>
                        </div>
                    </div>
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">In the event the vendor(s) rejects this offer, the said deposit is to be refunded to the said tenant(s) free of interest.</p>
                        </div>
                    </div>
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">In the event  the said tenant  abort this transaction after accepting this offer  and  the earnest deposit  will be as </p>
                        </div>
                    </div>
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">liquidated damages to the said vendor and the portion of liquidated damaged shall share equally with Agency .</p>
                        </div>
                    </div>
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">In the event  the said vendor abort this transaction after accepting this offer ,the said vendor should pay back the</p>
                        </div>
                    </div>
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">earnest deposit and another sum same as Earnest deposit  as liquidated damages to the said tenant</p>
                        </div>
                    </div>
                    <div class="row" style="height:15px">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:11px">and the portion of liquidated damaged shall share equally with Agency</p>
                        </div>
                    </div>
                    <div class="row" style="height:15px"></div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-5">
                            <p style="font-size:10px">Signed By The Landlord</p>
                        </div>
                        <div class="col-5">
                            <p style="font-size:10px">Signed By The Tenant</p>
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
                            <p style="font-size:10px">Name : {{$details->vendor_name}}  </p>
                        </div>
                        <div class="col-5">
                            <p style="font-size:10px">Name : {{$details->tenant_name}}</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:2%">
                        <div class="col-1"></div>
                        <div class="col-5">
                            <p style="font-size:10px">NRIC : {{$details->vendor_ic}} </p>
                        </div>
                        <div class="col-5">
                            <p style="font-size:10px">NRIC : {{$details->tenant_ic}}</p>
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
                            <p style="font-size:10px">Name : {{$vendorname}}  </p>
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
