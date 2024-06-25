<?php

namespace App\Livewire;

use App\Models\Customer;
use App\Models\Invoice;
use Livewire\Component;

class InvoiceOverview extends Component
{
    public $customers;
    public $invoices;
    public $customerId;
    public $invoiceId;
    public $selectedInvoice;

    public function mount()
    {
        $this->customers = Customer::where('user_id', auth()->id())->get();
        $this->invoices = array();
    }

    public function updatedCustomerId($value)
    {
        $this->invoices = Invoice::where('customer_id', $value)->get();
        if(count($this->invoices) > 0) {
            $this->invoiceId = $this->invoices->first()->id;
            $this->selectedInvoice = Invoice::find($this->invoiceId);
        } else {
            $this->selectedInvoice = null;
        }
    }

    public function updatedInvoiceId($value)
    {
        $this->selectedInvoice = Invoice::find($value);
    }

    public function render()
    {
        return view('livewire.invoice-overview');
    }
}
