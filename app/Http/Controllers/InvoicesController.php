<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceStoreRequest;
use App\Jobs\AddAttachment;
use App\Models\Attachment;
use App\Models\Invoice;
use App\Services\NbpService;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

class InvoicesController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('customer', 'attachments')->where('user_id', auth()->id())->get();
        return view('invoices.index', ['invoices' => $invoices]);
    }

    public function create(NbpService $nbpService)
    {
        $usd = $nbpService->getUsdRate();
        return view('invoices.create', compact('usd'));
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

        if($request->attachment) {
            $path = $request->attachment->store('public/attachments');
            dispatch(new AddAttachment($path, $invoice->id));
        }

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
            Attachment::where('invoice_id', $id)->delete();
            Invoice::destroy($id);
            return redirect()->route('invoices.index')->with('message', 'Faktura zostałą usunięta');
        } else {
            abort(403);
            return;
        }
    }

    public function saveAsPdf($id)
    {
        $invoice = Invoice::with('customer')->where('id', $id)->where('user_id', auth()->id())->first();
        if(!$invoice) {
            abort(403);
        }

        $pdf = Pdf::loadView('invoices.pdf', ['invoice' => $invoice]);
        return $pdf->download('invoice.pdf');
    }
}
