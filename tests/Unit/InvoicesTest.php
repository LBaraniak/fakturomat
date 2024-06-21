<?php

namespace Tests\Unit;

use App\Models\Invoice;
use PHPUnit\Framework\TestCase;

class InvoicesTest extends TestCase
{
    public function test_net_value_calc(): void
    {
        $total = 1230;
        $net = 1000;

        $invoice = new Invoice();
        $invoice->total = $total;
        $this->assertEquals($invoice->calculateNetValue(), $net, 'Wartsci sie nie zgadzaja');
    }

    public function test_vat_value_calc(): void
    {
        $total = 1230;
        $vat = 230;

        $invoice = new Invoice();
        $invoice->total = $total;
        $this->assertEquals($invoice->calculateVat(), $vat, 'Wartsci sie nie zgadzaja');
    }
}
