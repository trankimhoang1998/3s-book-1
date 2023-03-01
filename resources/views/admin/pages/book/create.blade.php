@extends('admin.layouts.master')
@push('css')
    <link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css" />
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('books.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Create New Book</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Create New Book</h2>
            <p class="section-lead">
                On this page you can create a new Book and fill in all fields.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Write Your Book</h4>
                        </div>
                        <div class="card-body">

                            <form method="post" action="{{ route('books.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Title</label>
                                    <div>
                                        <input name="name" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <div>
                                        <input name="image" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Thumb_1</label>
                                    <div>
                                        <input name="thumb_1" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Thumb_2</label>
                                    <div>
                                        <input name="thumb_1" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Thumb_3</label>
                                    <div>
                                        <input name="thumb_3" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Thumb_4</label>
                                    <div>
                                        <input name="thumb_4" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <div>
                                        <input name="slug" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Code</label>
                                    <div>
                                        <input name="code" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Size</label>
                                    <div>
                                        <input name="size" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <div>
                                        <input name="price" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Number Of Pages</label>
                                    <div>
                                        <input name="number_of_pages" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label>Status</label>
                                    <select class="form-control selectric" name="status">
                                        <option value="1">Stocking</option>
                                        <option value="2">Out of stock</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Categories</label>
                                    <select class="form-control selectric" name="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tags</label>
                                    <div class="selectgroup selectgroup-pills">
                                        @foreach ($tags as $tag)
                                            <label class="selectgroup-item">
                                                <input type="checkbox" name="tag[]" value="{{ $tag->id }}"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">{{ $tag->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label></label>
                                    <div>
                                        <button class="btn btn-primary">Create Book</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
