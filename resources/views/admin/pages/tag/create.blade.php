@extends('admin.layouts.master')
@push('css')
    <link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css" />
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('tags.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Create New Tag</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Create New Tag</h2>
            <p class="section-lead">
                On this page you can create a new Tag and fill in all fields.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Write Your Tag</h4>
                        </div>
                        <div class="card-body">

                            <form method="post" action="{{ route('tags.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Title</label>
                                    <div>
                                        <input name="title" type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label></label>
                                    <div>
                                        <button class="btn btn-primary">Create Tag</button>
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
