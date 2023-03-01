@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Book</h1>
            <div class="section-header-button">
                <a href="{{ route('books.create') }}" class="btn btn-primary">Add New</a>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">List Book</h2>
            <p class="section-lead">
                You can manage all Book
            </p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Tag</th>
                                        <th>Published</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($books as $book)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img width="100" src="{{ $book->image }}" alt="">
                                            </td>
                                            <td>{{ $book->name }}</td>
                                            <td>{{ $book->category->name }}</td>
                                            <th>
                                                @foreach ($book->tags as $tag)
                                                    <span class="badge badge-success">{{ $tag->name }}</span>
                                                @endforeach
                                            </th>

                                            @if ($book->status === 1)
                                                <td>
                                                    <div class="badge badge-primary">Stocking</div>
                                                </td>
                                            @endif

                                            @if ($book->status === 2)
                                                <td>
                                                    <div class="badge badge-warning">Out of stock</div>
                                                </td>
                                            @endif

                                            <td>
                                                <a href="" class="btn btn-icon btn-primary"><i
                                                        class="far fa-edit"></i></a>
                                                <button class="btn btn-icon btn-danger js-delete-tag" data-id="">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    {{ $books->links('admin.common.pagination') }}
                </div>
            </div>
        </div>
    </section>
@endsection
