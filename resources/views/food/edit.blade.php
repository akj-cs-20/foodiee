@extends('layouts.app') @section('content') <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('food.update', [$food->id]) }}" method="POST" enctype="multipart/form-data"> @csrf
                    {{ method_field('PUT') }}
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }} </div>
                    @endif
                    <div class="card">
                        <div class="card-header">Update Food Category</div>
                        <div class="card-body">

                            <!-- name -->
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ $food->name }}">
                                @error('name') <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div>

                            <!-- description -->
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                    rows="10" cols="2">{{ $food->description }}</textarea>
                                @error('description') <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror <br>
                            </div>

                            <!-- category select -->
                            <div class="form-group">
                                <label for="price">Select Category : </label>
                                <select name="category" id="category"
                                    class="form-control @error('category') is-invalid @enderror">
                                    @foreach (App\Category::all() as $category)
                                        <option value="{{ $category->id }}" @if ($category->id == $food->category_id)
                                            selected
                                    @endif> {{ $category->name }} </option>
                                    @endforeach
                                </select> @error('category') <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div>
                            <br>
                            <div class="row">
                                <!--Price-->
                                <div class="col"><label for="name">Price:</label>
                                    <input type="text" placeholder="enter price of food" value="{{ $food->price }}"
                                        name="price" id="price" class="form-control @error('price') is-invalid @enderror">
                                    @error('price') <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror </div>
                                <!--Image-->
                                <div class="col"><label for="image">Upload Image:</label>
                                    <div class="input-group mb-2">
                                        <div class="custom-file @error('image') is-invalid @enderror">
                                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
                                        </div> @error('image') <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-outline-primary ">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div> @endsection
