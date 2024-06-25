@extends('layouts.app')

@section('content')

<!-- Contact Section-->
<section class="masthead page-section" id="contact">
    <div class="container">
        <!-- Contact Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Dodaj nową</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>

        <p>Aktualny kurs dolara to: {{ $usd ?? 'N/A' }}</p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Contact Section Form-->
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">

                <form enctype="multipart/form-data" action="{{ route('invoices.store') }}" method="POST" id="contactForm">
                    {{ csrf_field() }}
                    <div class="form-floating mb-3">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Wybierz klienta</label>
                            <select name="customer" class="form-select" id="inputGroupSelect01">
                                <option selected>wybierz...</option>

                                @foreach(\App\Models\Customer::where('user_id', auth()->id())->get() as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="number" name="number"  type="text" placeholder="Numer faktury"/>
                        <label for="number">Numer faktury</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="date" name="date" type="date" placeholder="Data wystawienia"/>
                        <label for="date">Data</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="total" name="total" type="text" placeholder="Wpisz kwotę"/>
                        <label for="total">Kwota</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="attachment" name="attachment" type="file" placeholder="Wybierz plik"/>
                        <label for="total">Załącznik</label>
                    </div>

                    <!-- Submit Button-->
                    <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Dodaj fakturę</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
