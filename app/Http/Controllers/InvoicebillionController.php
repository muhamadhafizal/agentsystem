<?php

namespace App\Http\Controllers;
use App\Invoicebillion;
use Redirect;
use Illuminate\Http\Request;

class InvoicebillionController extends Controller
{
    public function index(){

        $invoices = Invoicebillion::orderby('created_at','DESC')->get();
        $i = 1;

        return view('admin/billion/invoice/index', compact('invoices','i'));
    }

    public function add(){

        return view('admin/billion/invoice/add');
    }

    public function store(Request $request){

        $bill_to = $request->input('bill_to');
        $date = $request->input('date');
        $invoicenum = $request->input('invoicenum');
        $two_month_security = $request->input('two_month_security');
        $half_month_utility = $request->input('half_month_utility');
        $one_month_advance = $request->input('one_month_advance');
        $half_month_agent = $request->input('half_month_agent');
        $agreement_stamping = $request->input('agreement_stamping');
        $sst = $request->input('sst');
        
        if($sst == null){
            $sst = 0;
        }

        $invoice = new Invoicebillion;
        $invoice->bill_to = $bill_to;
        $invoice->date = $date;
        $invoice->invoicenum = $invoicenum;
        $invoice->two_month_security = $two_month_security;
        $invoice->half_month_utility = $half_month_utility;
        $invoice->one_month_advance = $one_month_advance;
        $invoice->half_month_agent = $half_month_agent;
        $invoice->agreement_stemping = $agreement_stamping;
        $invoice->sst = $sst;
        $invoice->save();

         \Session::flash('flash_message', 'successfully save invoice');
        return Redirect::route('listinvoicebillion');
    }

    public function destroy($id){
        
        $invoice = Invoicebillion::find($id);
        $invoice->delete($invoice->id);
        \Session::flash('flash_message_delete','success deleted invoice');

        return Redirect::route('listinvoicebillion');

    }

    public function edit($id){

        $invoice = Invoicebillion::find($id);

        return view('admin/billion/invoice/edit', compact('invoice'));

    }

    public function update(Request $request){
        
        $invoice_id = $request->input('invoice_id');

        $bill_to = $request->input('bill_to');
        $date = $request->input('date');
        $invoicenum = $request->input('invoicenum');
        $two_month_security = $request->input('two_month_security');
        $half_month_utility = $request->input('half_month_utility');
        $one_month_advance = $request->input('one_month_advance');
        $half_month_agent = $request->input('half_month_agent');
        $agreement_stamping = $request->input('agreement_stamping');
        $sst = $request->input('sst');

        if($sst == null){
            $sst = 0;
        }

        $invoice = Invoicebillion::find($invoice_id);
        $invoice->bill_to = $bill_to;
        $invoice->date = $date;
        $invoice->invoicenum = $invoicenum;
        $invoice->two_month_security = $two_month_security;
        $invoice->half_month_utility = $half_month_utility;
        $invoice->one_month_advance = $one_month_advance;
        $invoice->half_month_agent = $half_month_agent;
        $invoice->agreement_stemping = $agreement_stamping;
        $invoice->sst = $sst;
        $invoice->save();

        $id = $invoice_id;

        \Session::flash('flash_message', 'successfully update invoice');
        return Redirect::route('editinvoicebillion', compact('id'));

    }

    public function details($id){
        

        $details = Invoicebillion::find($id);
        $dateform = date("d M Y", strtotime($details->date));

        $subtotal = $details->two_month_security + $details->half_month_utility + $details->one_month_advance + $details->half_month_agent + $details->agreement_stemping;
       
        if($details->sst != null){
            $sst = $subtotal * ($details->sst/100);
        } else {
            $sst = 0;
        }
        
        $totalamount = $subtotal - $sst;

        $invoicearray = [
            'id' => $details->id,
            'bill_to' => $details->bill_to,
            'date' => $dateform,
            'invoicenum' => $details->invoicenum,
            'two_month_security' => $details->two_month_security,
            'half_month_utility' => $details->half_month_utility,
            'one_month_advance' => $details->one_month_advance,
            'half_month_agent' => $details->half_month_agent,
            'agreement_stemping' => $details->agreement_stemping,
            'sub_total' => $subtotal,
            'sst' => $sst,
            'total_amount' => $totalamount,
        ];

        //dd($invoicearray);
        return view('admin/billion/invoice/details', compact('invoicearray'));

    }
}
