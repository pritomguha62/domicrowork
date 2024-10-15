@extends('admin_views.layout.app')

@section('title')
Update Category
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
                        <h5 class="card-title">Update Category</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin_panel.update_category_info') }}" method="POST">

                            @if (session()->has('error'))
                                <p class="mb-0 alert alert-danger">{{ session()->get('error') }}</p>
                            @endif
                            @if (session()->has('success'))
                                <p class="mb-0 alert alert-success">{{ session()->get('success') }}</p>
                            @endif

                            @csrf

                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Title</label>
                                <div class="col-md-10">
                                    <input type="text" name="title" class="form-control" value="{{ $update_category->title }}" />
                                </div>
                            </div>
                            @error('title')
                                <p class="mb-0 alert alert-danger">{{ $message }}</p>
                            @enderror

                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Status</label>
                                <div class="col-md-10">
                                    {{-- <p>Use select2() function on select element to convert it to Select 2.</p> --}}
                                    <select name="status" class="js-example-basic-single select2 form-control">
                                        @if ($update_category->status == 1)
                                            <option value="1">Active</option>
                                            <option value="0">Deactive</option>
                                        @else
                                            <option value="0">Deactive</option>
                                            <option value="1">Active</option>
                                        @endif
                                    </select>
                                </div>
                                @error('status')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group row text-center">
                                <div class="col-md-10 mx-auto">
                                    <input type="hidden" name="category_id" hidden value="{{ $update_category->category_id }}">
                                    <input type="submit" class="btn btn-warning" value="Update">
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

