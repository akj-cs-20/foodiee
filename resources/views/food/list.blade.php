@extends('layouts.app')

@section('content')
    <div class="container mobile-card-container">
        <div class="row">
            <div class="col-10 mx-auto">
                @foreach ($categories as $category)
                    @if ($category->id != null)
                        <h3 class="text-info text-center">{{ $category->name }}</h3>
                        <div class="row jumbotron bg-white flex-nowrap flex-sm-wrap overflow-auto">
                            @foreach (App\Food::where('category_id', $category->id)->get() as $food)
                                <div class="col-12 ">
                                    <!-- Card Dark -->
                                    <div class="card h-100">
                                        <!-- Card image -->
                                        <div class="view overlay">
                                            <img class="card-img-top" src="{{ asset('images') }}/{{ $food->image }}"
                                                alt="Card image cap">
                                            <a>
                                                <div class="mask rgba-white-slight"></div>
                                            </a>
                                        </div>
                                        <!-- Card content -->
                                        <div class="card-body elegant-color white-text rounded-bottom ">
                                            <!-- Title -->
                                            <h4 class="card-title ">{{ $food->name }}</h4>
                                            <hr class="hr-light">
                                            <!-- Text -->
                                            <p class="card-text white-text mb-4 text">{{ $food->description }}</p>
                                            <!-- Link -->
                                            <a href="{{ route('food.view', [$food->id]) }}"
                                                class="white-text d-flex justify-content-end">
                                                <h5>View more <i class="fas fa-angle-double-right"></i></h5>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Card Dark -->
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

    </div>
@endsection
