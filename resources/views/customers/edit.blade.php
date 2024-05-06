@extends('layouts.app')

@section('content')

<!-- Contact Section-->
<section class="masthead page-section" id="contact">
    <div class="container">
        <!-- Contact Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Edytujesz Klienta {{ $customer->id }}</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Contact Section Form-->
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">

                <form action="{{ route('customers.update', ['klienci' => $customer->id]) }}" method="POST" id="contactForm">
                    {{ csrf_field() }}
                    @method('PUT');
                    <div class="form-floating mb-3">
                        <input value="{{ $customer->name }}" class="form-control" id="name" name="name" type="text" placeholder="Nazwa klienta"/>
                        <label for="name">Nazwa klienta</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input value="{{ $customer->address }}" class="form-control" id="address" name="address" type="text" placeholder="Adres"/>
                        <label for="address">Adres</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input value="{{ $customer->nip }}" class="form-control" id="nip" name="nip" type="text" placeholder="Nip"/>
                        <label for="nip">NIP</label>
                    </div>

                    <!-- Submit Button-->
                    <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Zapisz dane klienta</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
