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

                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-11">
                            <img src="{{ asset('letter-head.png') }}" width="87%">
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4"></div>
                            <div class="col-4">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b style="font-size:11px;"> CP NO : {{$payment->cp_num}} </b></div>
                    </div>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> <b>Name : </b> {{$payment->name}}</div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> <b>Nric No : </b> {{$payment->ic}}</div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> <b>Email : </b> {{$payment->email}}</div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> <b>Address : </b> {{$payment->address}}</div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> <b>To : </b>  MW Properties  </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> <b>Office Address : </b>  BLOCK A 04-10 PUSAT PERDAGANGAN EKOFLORA, JALAN EKOFLORA 7/3 TAMAN EKOFLORA,81100, JOHOR BAHRU JOHOR  </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> <b>Office Contact : </b>  (+6) 07-3611599  </div>
                        <div class="col-2"></div> 
                    </div> 
                    <br>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> <b> Dear Sir/Madam, </b>  </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> <u><b>RE : Irrevocable Letter on Confirmation of Payment</b></u> </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> I/We : <u>{{$payment->name}} </u> &nbsp&nbsp&nbsp&nbsp NRIC: <u>{{$payment->ic}}</u> </div>
                        <div class="col-2"></div> 
                    </div> 
                    <br>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> Hereby undertake to pay you a sum of <b>RM {{$payment->amount}}</b> only (hereinafter know as "the said Payment") for your professional services rendered in securing the said of purchase/ to lease for the property upon the execution of the Sale and Purchase Agreement/ Tenancy Agreement. </div>
                        <div class="col-2"></div> 
                    </div> 
                    <br>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> I/We hereby agreed that in the event that before the execution of the Sale and Purchase Agreement/ Tenancy Agreement, the deal is aborted/ terminated due to purchaser/ us or the Vendor/ Landlord, I / we shall equally share with forfeited amount with agency as they had done part of their job. </div>
                        <div class="col-2"></div> 
                    </div> 
                    <br>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> I/We hereby agreed that in the event that after the execution of the Sale and Purchase Agreement/ Tenancy Agreement, the deal is aborted/ terminated due to me/ us or the Vendor/ Landlord, your said Payment already earned shall not be affected and will not be required to be refunded. </div>
                        <div class="col-2"></div> 
                    </div> 
                    <br>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> I/We further confirm that the company shall be at their liberty to commence legal proceedings against me/us in the event I/we default or fail to perform any of the terms and conditions hereof. </div>
                        <div class="col-2"></div> 
                    </div> 
                    <br>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> I/We shall not hold the Agent/ the Agency responsible for any losses, damages or expenses incurred as a result of complying with my/our instruction and authorization hereof. Further, I/We shall keep the Agent / his Agency indemnified against any claim arising here from. </div>
                        <div class="col-2"></div> 
                    </div> 
                    <br>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-6" style="font-size:11px; text-align:justify; padding-left : 60px"> <b> Yours faithfully, </b> </div>
                        <div class="col-3" style="font-size:11px; text-align:justify; padding-left : 15px"> <b> In the presence of (witness) </b> </div>
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
                        <div class="col-6" style="font-size:11px; padding-left : 60px"> Name :{{$payment->name}}  </div>
                        <div class="col-3" style="font-size:11px; padding-left : 15px"> Name :{{$agentdetails->nickname}} </div>
                        <div class="col-2"></div> 
                    </div>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-6" style="font-size:11px; padding-left : 60px"> Nric : {{$payment->ic}}  </div>
                        <div class="col-3" style="font-size:11px; padding-left : 15px"> Nric : {{$agentdetails->ic}}</div>
                        <div class="col-2"></div> 
                    </div>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-6" style="font-size:11px; padding-left : 60px"> Contact : {{$payment->contact}}  </div>
                        <div class="col-3" style="font-size:11px; padding-left : 15px"> Contact : {{$agentdetails->contact}} </div>
                        <div class="col-2"></div> 
                    </div>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-6" style="font-size:11px; padding-left : 60px"> Date : {{$payment->created_at}}  </div>
                        <div class="col-3" style="font-size:11px; padding-left : 15px"> Date : {{$payment->created_at}} </div>
                        <div class="col-2"></div> 
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
