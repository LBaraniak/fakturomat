<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceStoreRequest;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('customer')->get();
        return view('invoices.index', ['invoices' => $invoices]);
    }

    public function create()
    {
        return view('invoices.create');
    }

    public function edit($id)
    {
        $invoice = Invoice::find($id);
        return view('invoices.edit', ['invoice' => $invoice]);
    }

    public function store(InvoiceStoreRequest $request)
    {
        $invoice = new Invoice();

        $invoice->number = $request->number;
        $invoice->date = $request->date;
        $invoice->total = $request->total;
        $invoice->customer_id= $request->customer;

        $invoice->save();

        return redirect()->route('invoices.index')->with('message', 'Faktura dodana poprawnie');
    }


    public function update(Request $request, $id)
    {
        $invoice = Invoice::find($id);

        $invoice->number = $request->number;
        $invoice->date = $request->date;
        $invoice->total = $request->total;

        $invoice->save();

        return redirect()->route('invoices.index')->with('message', 'Faktura zmieniona poprawnie');
    }

    public function delete(Request $request, $id)
    {
        Invoice::destroy($id);
        return redirect()->route('invoices.index')->with('message', 'Faktura zostałą usunięta');

    }

}
