@extends('member_views.layout.client_app')


@section('title')
add social task
@endsection

@section('content')

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<div class="col-12 col-md-12 col-lg-12">
    <div class="bg-light rounded h-100 p-4">
        <div class="bg-light p-5 rounded h-100 wow fadeInUp" data-wow-delay="0.2s">
            <h4 class="text-primary">Create Task</h4>
            <p class="mb-4 text-warning">Provide the task information..</p>
            <form action="{{ route('client_panel.add_client_social_task_info') }}" method="POST" enctype="multipart/form-data" id="paymentForm">

                @if (session()->has('error'))
                    <p class="mb-0 alert alert-danger">{{ session()->get('error') }}</p>
                @endif

                @if (session()->has('success'))
                    <p class="mb-0 alert alert-success">{{ session()->get('success') }}</p>
                @endif

                @csrf

                <div class="row g-4">
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" name="title" class="form-control border-0" id="title" placeholder="Title" >
                            <label for="title">Title</label>
                        </div>
                        @error('title')
                            <p class="mb-0 alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <select name="category_id" id="category" class="form-select mb-3" id="">
                                <option value="">Select</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->category_id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                            <label for="category">--Select Category--</label>
                        </div>
                        @error('category_id')
                            <p class="mb-0 alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <select name="sub_category_id" id="sub_category" class="form-select mb-3" id="">
                                <option value="">Select</option>
                            </select>
                            <label for="sub_category">--Select Subcategory--</label>
                        </div>
                        @error('sub_category_id')
                            <p class="mb-0 alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <textarea name="description" class="form-control" placeholder="Description" id="floatingTextarea" style="height: 150px;"></textarea>
                        <label for="floatingTextarea">Description</label>
                        @error('description')
                            <p class="mb-0 alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" name="work_link" class="form-control border-0" id="work_link" placeholder="Content Link" >
                            <label for="work_link">Content Link</label>
                        </div>
                        @error('work_link')
                            <p class="mb-0 alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="ss_thumbnail" class="form-label">Screen Shot Of Thumbnail</label>
                        <input name="ss_thumbnail" class="form-control" type="file" id="ss_thumbnail">
                        @error('ss_thumbnail')
                            <p class="mb-0 alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <textarea name="required_proof" class="form-control" placeholder="Required Proof" id="floatingTextarea1" style="height: 150px;"></textarea>
                        <label for="floatingTextarea1">Required Proof</label>
                        @error('required_proof')
                            <p class="mb-0 alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- <div class="col-12">
                        <div class="form-floating">
                            <textarea name="required_proof" id="required_proof" cols="30" rows="10"></textarea>
                            <label for="required_proof">Required Proof</label>
                        </div>
                        @error('required_proof')
                            <p class="mb-0 alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div> --}}
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" name="task_price_rate" class="form-control border-0" id="task_price_rate" placeholder="Price Per Work" >
                            <label for="task_price_rate">Price Per Work</label>
                        </div>
                        @error('task_price_rate')
                            <p class="mb-0 alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="number" name="work_amount" id="work_amount" class="form-control border-0" id="work_amount" placeholder="Number Of Works" >
                            <label for="work_amount">Number Of Works</label>
                        </div>
                        @error('work_amount')
                            <p class="mb-0 alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" disabled name="price" class="form-control border-0" id="price" placeholder="Price" >
                            <label for="price">Price</label>
                        </div>
                        @error('price')
                            <p class="mb-0 alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12">
                        {{-- <input type="hidden" hidden name="package_id" id="package_id" value="{{ $package->package_id }}"> --}}
                        {{-- <input type="hidden" hidden name="member_id" id="member_id" value="{{ session()->get('member_id') }}"> --}}
                        <input type="hidden" hidden name="member_payment_id" id="member_payment_id" value="{{ uniqid() }}">
                        <input type="submit" id="payButton" class="btn btn-primary w-100 py-3" value="Create">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    function copyClipboardFunction() {
        // Get the text field
        var copyText = document.getElementById("account_number");

        // Select the text field
        copyText.select();
        copyText.setSelectionRange(0, 999999999999999); // For mobile devices

        // Copy the text inside the text field
        navigator.clipboard.writeText(copyText.value);

        // Alert the copied text
        alert("Copied the text: " + copyText.value);
    }

    document.getElementById('paymentForm').onsubmit = function() {
        document.getElementById('payButton').disabled = true;
    };


</script>

<script type="text/javascript">

    $(document).ready(function() {
        $('#category').on('change', function() {
            var categoryId = $(this).val();

            if (categoryId) {
                $.ajax({
                    url: '/client_panel/get-subcategories/' + categoryId,
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


    $(document).ready(function() {
        $('#work_amount').on('keyup', function() {
            var work_amount = $(this).val();
            var subcategorie_id = $('#sub_category').val();
            var task_price_rate = $('#task_price_rate').val();

            var task_price = task_price_rate*work_amount;

            $('#price').val(task_price);

        });
    });

</script>


@endsection

