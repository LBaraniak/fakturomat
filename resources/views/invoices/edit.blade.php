@extends('layouts.app')

@section('content')

<!-- Contact Section-->
<section class="masthead page-section" id="contact">
    <div class="container">
        <!-- Contact Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Edytujesz fakturę {{ $invoice->id }}</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Contact Section Form-->
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">

                <form action="{{ route('invoices.update', ['id' => $invoice->id]) }}" method="POST" id="contactForm">
                    {{ csrf_field() }}
                    @method('PUT');
                    <div class="form-floating mb-3">
                        <input value="{{ $invoice->number }}" class="form-control" id="number" name="number" type="text" placeholder="Numer faktury"/>
                        <label for="number">Numer faktury</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input value="{{ $invoice->date }}" class="form-control" id="date" name="date" type="text" placeholder="Data wystawienia"/>
                        <label for="date">Data</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input value="{{ $invoice->total }}" class="form-control" id="total" name="total" type="text" placeholder="Wpisz kwotę"/>
                        <label for="total">Kwota</label>
                    </div>

                    <!-- Submit Button-->
                    <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Zapisz fakturę</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
