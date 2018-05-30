@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="display-3">Електронна реєстратура</h1>
            <div class="col-md-8">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('img/doctors_1.jpg') }}" alt="First slide">
                        </div>

                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('img/doctors_2.jpg') }}" alt="Second slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <p class="lead text-center">
                    Дана система розроблена для автоматизації роботи регистратури поліклкініки та зменшнення паперового документообігу.
                </p>

            </div>
        </div>
    </div>
@endsection
