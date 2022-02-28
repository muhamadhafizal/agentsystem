<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="" xml:lang="">
<head>
<title></title>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
 <br/>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
 <script src="{{ asset('format/pdf.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<style type="text/css">
<!--
	p {margin: 0; padding: 0;}	.ft10{font-size:13px;font-family:Times;color:#000000;}
	.ft11{font-size:13px;font-family:Times;color:#000000;}
	.ft12{font-size:11px;font-family:Times;color:#000000;}
	.ft13{font-size:8px;font-family:Times;color:#000000;}
	.ft14{font-size:13px;line-height:19px;font-family:Times;color:#000000;}
-->
</style>
</head>
<div class="container d-flex justify-content-center mt-50 mb-50">
<div class="row">
<div class="col-md-6 text-left mb-3">
<a href="{{ route('listvoucher') }}"><button class="btn btn-primary"> back</button></a>
</div>
<div class="col-md-6 text-right mb-3">
<button class="btn btn-primary" id="download"> download pdf</button>
</div>
<div class="col-md-12">
<div id="invoice">
<body bgcolor="#A0A0A0" vlink="blue" link="blue">
<div id="page1-div" style="position:relative;width:918px;height:1188px;">
<img width="918" height="1188" src="{{ asset('voucher/target001.png') }}" alt="background image"/>

<p style="position:absolute;top:185px;left:289px;white-space:nowrap" class="ft10">&#160; &#160; &#160;</p>
<p style="position:absolute;top:330px;left:573px;white-space:nowrap" class="ft10">DATE:&#160;{{$details->created_at->format("d-M-Y")}}</p>
<p style="position:absolute;top:265px;left:121px;white-space:nowrap" class="ft11"><b>Email: mwpropertyconsultancy@gmail.com&#160;&#160;&#160;&#160;Tel:&#160;+607-3507797</b></p>
<p style="position:absolute;top:185px;left:625px;white-space:nowrap" class="ft12"><b>EJEN&#160;HARTA TANAH</b></p>
<p style="position:absolute;top:206px;left:121px;white-space:nowrap" class="ft11"><b>MW&#160;PROPERTIES&#160;</b></p>
<p style="position:absolute;top:210px;left:250px;white-space:nowrap" class="ft13"><b>(JM0936446-H)</b></p>
<p style="position:absolute;top:207px;left:626px;white-space:nowrap" class="ft12"><b>AE(3)0024&#160;&amp; E0141</b></p>
<p style="position:absolute;top:225px;left:121px;white-space:nowrap" class="ft14"><b>REGISTERED&#160;ESTATE&#160;AGENCY&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<br/>20-01,&#160;JALAN MOLEK 1/9,&#160;TAMAN MOLEK,&#160;81100&#160;JOHOR&#160;BAHRU.</b></p>
<p style="position:absolute;top:310px;left:521px;white-space:nowrap" class="ft10">VOUCHER&#160;NO:&#160;{{$details->vouchernum}}</p>
<p style="position:absolute;top:362px;left:121px;white-space:nowrap" class="ft10">ADDRESS:&#160;</p>
<p style="position:absolute;top:410px;left:121px;white-space:nowrap" class="ft10">PAY&#160;TO:&#160;</p>
<p style="position:absolute;top:410px;left:478px;white-space:nowrap" class="ft10">NRIC:</p>
<p style="position:absolute;top:450px;left:121px;white-space:nowrap" class="ft10">BANK&#160;DETAILS:</p>
<p style="position:absolute;top:522px;left:323px;white-space:nowrap" class="ft10">DESCRIPTION</p>
<p style="position:absolute;top:522px;left:637px;white-space:nowrap" class="ft10">AMOUNT&#160;(&#160;RM&#160;)</p>
<p style="position:absolute;top:1000px;left:195px;white-space:nowrap" class="ft10">Issued&#160;By</p>
<p style="position:absolute;top:1000px;left:398px;white-space:nowrap" class="ft10">Approved&#160;By</p>
<p style="position:absolute;top:1000px;left:614px;white-space:nowrap" class="ft10">Received&#160;By</p>
<p style="position:absolute;top:922px;left:499px;white-space:nowrap" class="ft10">TOTAL&#160;AMOUNT</p>
</div>
</body>
</div>
</div>
</div>
</div>
</html>
