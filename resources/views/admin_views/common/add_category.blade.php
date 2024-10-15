@extends('admin_views.layout.app')

@section('title')
Add Category
@endsection

@section('content')


<div class="page-wrapper pagehead">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Data Tables</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin_panel.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Tables</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title">Add Category</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin_panel.add_category_info') }}" method="POST">

                            @if (session()->has('error'))
                                <p class="mb-0 alert alert-danger">{{ session()->get('error') }}</p>
                            @endif
                            @if (session()->has('success'))
                                <p class="mb-0 alert alert-success">{{ session()->get('success') }}</p>
                            @endif

                            @csrf

                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Title</label>
                                <div class="col-md-8">
                                    <input name="title" type="text" class="form-control" />
                                </div>
                                @error('title')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- <div class="form-group row">
                                <label class="col-form-label col-md-2">Price</label>
                                <div class="col-md-8">
                                    <input name="price" type="text" class="form-control" />
                                </div>
                                @error('price')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div> --}}
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Status</label>
                                <div class="col-md-8">
                                    <select name="status" class="js-example-basic-single select2 form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Deactive</option>
                                    </select>
                                </div>
                                @error('status')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group row text-center">
                                <div class="col-md-8 mx-auto">
                                    {{-- <input type="hidden" name="admin_id" hidden value="{{ $update_admin->admin_id }}"> --}}
                                    <input type="submit" class="btn btn-warning" value="Add">
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>



@endsection

