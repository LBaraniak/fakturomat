@extends('layouts.app')


@section('content')
<!-- Portfolio Section-->
<section class="masthead page-section portfolio" id="portfolio">
    <div class="container">

        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Statystyki</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>

        @can ('see-statistics')
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Nazwa</th>
                <th scope="col">Ilość</th>
            </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>Użytkownicy</td>
                        <td>{{ \App\Models\User::count() }}</td>
                    </tr>
                    <tr>
                        <td>Faktury</td>
                        <td>{{ \App\Models\Invoice::count()  }}</td>
                    </tr>
                    <tr>
                        <td>Klienci</td>
                        <td>{{ \App\Models\Customer::count() }}</td>
                    </tr>
            </tbody>
        </table>
        @endcan
    </div>
</section>
@endsection
