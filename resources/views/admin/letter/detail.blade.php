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
                <a href="{{ route('adminlistletter') }}"><button class="btn btn-primary"> back</button></a>
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
                            <div class="col-3"></div>
                            <div class="col-6"> <u> <b style="font-size:15px">LETTER OFFER EXCLUSIVE REAL ESTATE AGENCY</b> </u> </div>
                            <div class="col-3"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> I/We : <u>{{$letter->name}} </u> NRIC: <u> {{$letter->ic}} </u> being registered vendor / vendor authorized of the said  property <u> {{$letter->authorized}} </u> hereby grant you an irrevocable right and authority to act on my/our behalf to assist us secure any potential purchaser(s) to purchase the said property subject to the following terms and conditions :-  </div>
                        <div class="col-2"></div> 
                    </div> 
                    <br>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> 1) The selling price of the said property shall be Ringgit Malaysia <b>RM{{$letter->sellingprice}}</b> Or such sum may be subsequently agreed by me/ us.  </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> 2) I / We hereby confirm and agreed  to pay you an agency fee of a total sum <b>RM {{$letter->agencyfee}} </b>including 6% Sales and Service Tax  ( SST ) when the Sales and Purchase Agreement signed. </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> 3) This letter of exclusive authority shall be valid from <b>{{$letter->startdate}}</b> to <b>{{$letter->enddate}}</b> and shall be deemed renewed automatically in accordance with the above term unless either party gives such written notice of termination. </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> 4)I / We hereby confirm and agreed  to appoint you as my /our Sole and Full Exclusive Agent /Agency to act for my/our behalf to assist me /us to secure any potential purchaser(s) for the said property . In the  event  that,I /We sell the said property  or appoint  third party to sell the said property , i/we understand, confirm and undertake to pay to you the agency fee as stipulated under paragraph 2 above. </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> 5)In the event that Earnest Deposit has been paid but the sale transaction above was terminated by the said purchaser before executive of the Sales and Purchase Agreement ( SPA), the said vendor agree to pay you a professional fee equivalent to 50% of the earnest deposit of forfeitable. </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> 6) In the event that you should abort this transaction after accepting the above terms and receiving the earnest deposit, you understand and agreed the terms to refund the earnest deposit together with an equal amount as liquidated damages to the prospective purchaser. </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> 7) In the event that after execution of the Sales and Purchase Agreement, the sale transaction above terminated by the said vendor or the said purchaser, your professional fee already earned shall not be affected and will no be required to be refunded. </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> 8) I /We further confirm that the agency shall be at their liberty to commence legal proceedings against me /us in the event we default or fail to perform any above of the terms and conditions. </div>
                        <div class="col-2"></div> 
                    </div> 
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-9" style="font-size:11px; text-align:justify; padding-left : 60px"> 9) I /We shall no hold the agent / agency responsible for any losses ,damages or expenses incurred as a result of complying with my / our instruction and authorization hereof. Further , I /we shall keep the Agent/ agency indemnified against any claim arising here form. </div>
                        <div class="col-2"></div> 
                    </div> 
                    <br>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-6" style="font-size:11px; text-align:justify; padding-left : 60px"> <b> Signed By Vendor,  </b></div>
                        <div class="col-3" style="font-size:11px; text-align:justify; padding-left : 15px"> <b> Signed By Wtness,  </b></div>
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
                        <div class="col-6" style="font-size:11px; padding-left : 60px"> Name : {{$letter->name}} </div>
                        <div class="col-3" style="font-size:11px; padding-left : 15px"> Name : {{$userinfo->nickname}} </div>
                        <div class="col-2"></div> 
                    </div>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-6" style="font-size:11px; padding-left : 60px"> NRIC : {{$letter->ic}} </div>
                        <div class="col-3" style="font-size:11px; padding-left : 15px"> NRIC : {{$userinfo->ic}}</div>
                        <div class="col-2"></div> 
                    </div>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-6" style="font-size:11px; padding-left : 60px"> Date : {{$letter->created_at}} </div>
                        <div class="col-3" style="font-size:11px; padding-left : 15px"> Date : {{$letter->created_at}} </div>
                        <div class="col-2"></div> 
                    </div>
                    <div class="row">
                        <div class="col-1"></div>        
                        <div class="col-6" style="font-size:11px; padding-left : 60px"> Contact : {{$letter->contact}}</div>
                        <div class="col-3" style="font-size:11px; padding-left : 15px"> Contact : {{$userinfo->contact}} </div>
                        <div class="col-2"></div> 
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
