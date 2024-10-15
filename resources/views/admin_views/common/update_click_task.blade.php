@extends('admin_views.layout.app')

@section('title')
Upadate Click Task
@endsection

@section('content')

    <!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                        <h5 class="card-title">Update Click Task</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin_panel.update_click_task_info') }}" method="POST" enctype="multipart/form-data">

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
                                    <input type="text" name="title" required class="form-control" value="{{ $task->title }}" />
                                </div>
                                @error('title')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- <div class="form-group row">
                                <label class="col-form-label col-md-2">Category</label>
                                <div class="col-md-8">
                                    <select name="category_id" required id="category" class="js-example-basic-single select2 form-control">
                                        <option value="{{ $task->category->category_id }}">{{ $task->category->title }}</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->category_id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Sub Category</label>
                                <div class="col-md-8">
                                    <select name="sub_category_id" required id="sub_category" class="js-example-basic-single select2 form-control">
                                        <option value="{{ $task->sub_category->sub_category_id }}">{{ $task->sub_category->title }}</option>
                                    </select>
                                </div>
                                @error('sub_category_id')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div> --}}

                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Description</label>
                                <div class="col-md-10">
                                    <textarea name="description" name="description" required id="" cols="30" rows="10">{{ $task->description }}</textarea>
                                </div>
                                @error('description')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- <div class="form-group row">
                                <label class="col-form-label col-md-2">Content Link</label>
                                <div class="col-md-10">
                                    <input type="text" name="work_link" required class="form-control" value="{{ $task->work_link }}" />
                                </div>
                                @error('work_link')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div> --}}

                            {{-- <div class="form-group row">
                                <label class="col-form-label col-md-2">Screen Shot Of Thumbnail</label>
                                <div class="col-md-10">
                                    <input type="file" name="ss_thumbnail" class="form-control" />
                                </div>
                                @error('ss_thumbnail')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div> --}}

                            {{-- <div class="form-group row">
                                <label class="col-form-label col-md-2">Required Proof</label>
                                <div class="col-md-10">
                                    <textarea name="required_proof" class="form-control" id="" cols="30" rows="10">{{ $task->required_proof }}</textarea>
                                </div>
                                @error('required_proof')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div> --}}

                            {{-- <div class="form-group row">
                                <label class="col-form-label col-md-2">Screen Shot 1</label>
                                <div class="col-md-10">
                                    <input type="text" name="code" class="form-control" />
                                </div>
                            </div> --}}

                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Price Per Work</label>
                                <div class="col-md-10">
                                    <input type="text" name="task_price_rate" class="form-control" value="{{ $task->task_price_rate }}" />
                                </div>
                                @error('task_price_rate')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- <div class="form-group row">
                                <label class="col-form-label col-md-2">Number Of Works</label>
                                <div class="col-md-10">
                                    <input type="number" name="work_amount" class="form-control" value="{{ $task->work_amount }}" />
                                </div>
                                @error('work_amount')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div> --}}

                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Status</label>
                                <div class="col-md-10">
                                    {{-- <p>Use select2() function on select element to convert it to Select 2.</p> --}}
                                    <select name="status" class="js-example-basic-single select2 form-control">
                                        @if ($task->status == 1)
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

                            {{-- <div class="form-group row">
                                <label class="col-form-label col-md-2">Upload Image</label>
                                <div class="col-md-10">
                                    <input type="datetime-local" name="client_file" class="form-control" />
                                </div>
                            </div> --}}

                            <div class="form-group row text-center">
                                <div class="col-md-10 mx-auto">
                                    <input type="hidden" name="task_id" required hidden value="{{ $task->task_id }}" />
                                    <input type="submit" class="btn btn-primary" value="Update">
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('#category').on('change', function() {
            var categoryId = $(this).val();

            if (categoryId) {
                $.ajax({
                    url: '/admin_panel/get-subcategories/' + categoryId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#sub_category').empty();
                        $('#sub_category').append('<option value="">--Select Subcategory--</option>');
                        $.each(data, function(key, value) {
                            $('#sub_category').append('<option value="' + value.sub_category_id + '">' + value.title + '</option>');
                        });
                    }
                });
            } else {
                $('#sub_category').empty();
                $('#sub_category').append('<option value="">--Select Subcategory--</option>');
            }
        });
    });
</script>


@endsection

