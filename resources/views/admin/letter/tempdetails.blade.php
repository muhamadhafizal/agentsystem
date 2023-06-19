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
                    <br>
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
                        <div class="col-2 pull-right" style="font-size:12px">
                           EJEN HARTA TANAH
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9"></div>
                        <div class="col-2 pull-right" style="font-size:12px">
                           A0053 & E0141
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
                    <br>
                    <div class="row" style="height:25px">
                        <div class="col-3"></div>
                        <div class="col-6">
                            <h6 style="-webkit-text-decoration-line: underline; text-decoration-line: underline;">LETTER OFFER EXCLUSIVE REAL ESTATE AGENCY</h6>
                        </div>
                    </div>
                    
                    <div class="row" style="height:25px">
                        <div class="col-1"></div>
                        <div class="col-2">
                            <p style="font-size:12px">I/We : {{$letter->name}} </p>
                        </div>
                        <div class="col-2">
                            <p style="font-size:12px; -webkit-text-decoration-line: underline; text-decoration-line: underline;"> </p>
                        </div>
                        <div class="col-2">
                            <p style="font-size:12px">NRIC: {{$letter->ic}}</p>
                        </div>
                        <div class="col-2">
                            <p style="font-size:12px; -webkit-text-decoration-line: underline; text-decoration-line: underline;"> </p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">being registered vendor / vendor authorized of the said  property </p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                        <p style="font-size:12px; -webkit-text-decoration-line: underline; text-decoration-line: underline;"> {{$letter->authorized}}</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">hereby grant you an irrevocable right and authority to act on my/our behalf to assist us secure any  </p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px"> potential purchaser(s) to purchase the said property subject to the following terms and conditions :-</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:45%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">1) The selling price of the said property shall be Ringgit Malaysia <b>RM{{$letter->sellingprice}}</b> Or such sum may be </p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">subsequently agreed by me/ us .</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">2) I / We hereby confirm and agreed  to pay you an agency fee of a total sum <b>RM {{$letter->agencyfee}} </b>including 6%</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">Sales and Service Tax  ( SST ) when the Sales and Purchase Agreement signed.</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">3) This letter of exclusive authority shall be valid from <b>{{$letter->startdate}}</b> to <b>{{$letter->enddate}}</b> and shall be</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">deemed renewed automatically in accordance with the above term unless either party gives such </p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">written notice of termination.</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">4)I / We hereby confirm and agreed  to appoint you as my /our Sole and Full Exclusive Agent</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">/Agency to act for my/our behalf to assist me /us to secure any potential purchaser(s) for the </p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">said property . In the  event  that,I /We sell the said property  or appoint  third party to sell </p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">the said property , i/we understand, confirm and undertake to pay to you the agency fee as </p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">stipulated under paragraph 2 above.</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">5)In the event that Earnest Deposit has been paid but the sale transaction above was terminated</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">by the said purchaser before executive of the Sales and Purchase Agreement ( SPA), the said vendor </p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">agree to pay you a professional fee equivalent to 50% of the earnest deposit of forfeitable.</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">6) In the event that you should abort this transaction after accepting the above terms and receiving</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">the earnest deposit, you understand and agreed the terms to refund the earnest deposit together</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px"> with an equal amount as liquidated damages to the prospective purchaser.</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">7) In the event that after execution of the Sales and Purchase Agreement, the sale transaction above</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">terminated by the said vendor or the said purchaser, your professional fee already earned shall not be</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">affected and will no be required to be refunded.</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">8) I /We further confirm that the agency shall be at their liberty to commence legal proceedings against</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">me /us in the event we default or fail to perform any above of the terms and conditions</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">9) I /We shall no hold the agent / agency responsible for any losses ,damages or expenses incurred as a</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">result of complying with my / our instruction and authorization hereof. Further , I /we shall keep</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <p style="font-size:12px">the Agent/ agency indemnified against any claim arising here form.</p>
                        </div>
                    </div> 
                    <br>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-5">
                            <p style="font-size:12px">Signed By Vendor,</p>
                        </div>
                        <div class="col-5">
                            <p style="font-size:12px">Signed By Witness</p>
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
                            <p style="font-size:12px">Name : {{$letter->name}} </p>
                        </div>
                        <div class="col-5">
                            <p style="font-size:12px">Name : {{$userinfo->nickname}}</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-5">
                            <p style="font-size:12px">NRIC : {{$letter->ic}}</p>
                        </div>
                        <div class="col-5">
                            <p style="font-size:12px">NRIC : {{$userinfo->ic}}</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-5">
                            <p style="font-size:12px">Date : {{$letter->created_at}}</p>
                        </div>
                        <div class="col-5">
                            <p style="font-size:12px">Date : {{$letter->created_at}}</p>
                        </div>
                    </div>
                    <div class="row" style="line-height:10%">
                        <div class="col-1"></div>
                        <div class="col-5">
                            <p style="font-size:12px">Contact : {{$letter->contact}}</p>
                        </div>
                        <div class="col-5">
                            <p style="font-size:12px">Contact : {{$userinfo->contact}}</p>
                        </div>
                    </div>
                    <br>
                    
                    

                </div>
            </div>
        </div>
    </div>
    </body>
</html>
