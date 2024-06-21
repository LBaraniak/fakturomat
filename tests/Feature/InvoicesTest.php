<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InvoicesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_invoices_page_not_accessible_for_unautenticated_user(): void
    {
        $response = $this->get('/faktury');

        $response->assertStatus(302);
    }
}
