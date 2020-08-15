@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- News jumbotron -->
                <div class="jumbotron text-center hoverable p-4">
                    <!-- Grid row -->
                    <div class="row">
                        <!-- Grid column -->
                        <div class="col-md-4 offset-md-1 mx-3 my-3">
                            <!-- Featured image -->
                            <div class="view overlay">
                                <img src="{{ asset('images') }}/{{ $food->image }}" class="img-fluid"
                                    alt="Sample image for first version of blog listing">
                                <a>
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                        </div>
                        <!-- Grid column -->
                        <!-- Grid column -->
                        <div class="col-md-7 text-md-left ml-3 mt-3">
                            <!-- Excerpt -->
                            <div class="green-text">
                                <h6 class="h6 pb-1"><i class="fas fa-utensils pr-1"></i> {{ $food->name }}</h6>
                            </div>
                            <h4 class="h4 mb-4">{{ $food->name }}</h4>
                            <p class="font-weight-normal text-justify">{{ $food->description }}</p>
                            <p class="font-weight-normal">Price : Rs <a><strong>{{ $food->price }}</strong></a>
                            </p>
                            <a class="btn btn-success">Order Now</a>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
                <!-- News jumbotron -->
            </div>
        </div>
    </div>
@endsection
