<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceStoreRequest;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('customer')->where('user_id', auth()->id())->get();
        return view('invoices.index', ['invoices' => $invoices]);
    }

    public function create()
    {
        return view('invoices.create');
    }

    public function edit($id)
    {
        $invoice = Invoice::where('id', $id)->where('user_id', auth()->id())->first();
        if($invoice) {
            return view('invoices.edit', ['invoice' => $invoice]);
        } else {
            abort(403);
            return;
        }
    }

    public function store(InvoiceStoreRequest $request)
    {
        $invoice = new Invoice();

        $invoice->number = $request->number;
        $invoice->date = $request->date;
        $invoice->total = $request->total;
        $invoice->customer_id= $request->customer;
        $invoice->user_id = auth()->id();

        $invoice->save();

        return redirect()->route('invoices.index')->with('message', 'Faktura dodana poprawnie');
    }


    public function update(Request $request, $id)
    {
        $invoice = Invoice::where('id', $id)->where('user_id', auth()->id())->first();

        if(!$invoice) {
            abort(403);
            return;
        }

        $invoice->number = $request->number;
        $invoice->date = $request->date;
        $invoice->total = $request->total;

        $invoice->save();

        return redirect()->route('invoices.index')->with('message', 'Faktura zmieniona poprawnie');
    }

    public function delete(Request $request, $id)
    {
        if(Invoice::where('id', $id)->where('user_id', auth()->id())->first()) {
            Invoice::destroy($id);
            return redirect()->route('invoices.index')->with('message', 'Faktura zostałą usunięta');
        } else {
            abort(403);
            return;
        }
    }
}
