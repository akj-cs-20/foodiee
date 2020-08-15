@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('food.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">Add Food Section</div>

                        <div class="card-body">
                            <div class="form-group">
                                <!--Name-->
                                <label for="name">Food Name:</label>
                                <input type="text" name="name" id="name" placeholder="Enter food name"
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <br>
                                <!--Description-->
                                <label for="description">Description:</label>
                                <input class="form-control  @error('description') is-invalid @enderror" name="description"
                                    placeholder="Enter about food" id="description" cols="2" rows="6"></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <br>
                                <!--Category-->
                                <div class="form-group">
                                    <label for="description">Category:</label>
                                    <select name="category" id="category"
                                        class="form-control @error('category') is-invalid @enderror">
                                        <option value="">Select Category</option>
                                        @foreach (App\Category::all() as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <br>
                                <div class="row">
                                    <!--Price-->
                                    <div class="col"><label for="name">Price:</label>
                                        <input type="text" placeholder="enter price of food" name="price" id="price"
                                            class="form-control @error('price') is-invalid @enderror">
                                        @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <!--Image-->
                                    <div class="col"><label for="image">Upload Image:</label>
                                        <div class="input-group mb-2">
                                            <div class="custom-file @error('image') is-invalid @enderror">
                                                <input type="file" name="image" class="custom-file-input"
                                                    id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
                                            </div>
                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <button class="btn btn-outline-primary ">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
