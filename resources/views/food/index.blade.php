@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col">
                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">All Food Items
                        <span class="float-right">
                            <a href="{{ route('food.create') }}">
                                <button class="btn btn-outline-primary">Add Food</button>
                            </a>
                        </span>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>

                                    <th scope="col">Images</th>
                                    <th scope="col">Food Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">price</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($foods) > 0)
                                    @foreach ($foods as $key => $food)
                                        <tr>
                                            <td><img src="{{ asset('images/' . $food->image) }}" width="100">
                                            </td>

                                            <td>{{ $food->name }}</td>
                                            <td class="text-justify">{{ $food->description }}</td>
                                            <td class="text-justify">{{ $food->category->name }}</td>
                                            <td class="text-justify">Rs{{ $food->price }}</td>


                                            <td>
                                                <a href="{{ route('food.edit', [$food->id]) }}">
                                                    <button class="btn btn-outline-success">Edit</button>
                                                </a>
                                            </td>
                                            <td>

                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                                    data-target="#exampleModalCenter{{ $food->id }}">
                                                    Delete
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModalCenter{{ $food->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="exampleModalLongTitle{{ $food->id }}">Foodie
                                                                    Delete </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <form action="{{ route('food.destroy', [$food->id]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    {{ method_field('DELETE') }}
                                                                    <button class="btn btn-outline-danger">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <td>No Category to display</td>
                                @endif

                            </tbody>
                        </table>

                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                {{ $foods->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
