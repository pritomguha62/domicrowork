@extends('member_views.layout.client_app')


@section('title')
submit social task
@endsection

@section('content')

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<div class="col-12 col-md-12 col-lg-12">
    <div class="bg-light rounded h-100 p-4">
        <div class="bg-light p-5 rounded h-100 wow fadeInUp" data-wow-delay="0.2s">
            <h4 class="text-primary">Create Task</h4>
            <p class="mb-4 text-warning">Provide the task information..</p>
            <form action="{{ route('worker_panel.submit_social_task_info') }}" method="POST" enctype="multipart/form-data" id="paymentForm">

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
                            <input type="text" name="title" disabled class="form-control border-0" id="title" placeholder="Title" value="{{ $submit_social_task->title }}" >
                            <label for="title">Title</label>
                        </div>
                        @error('title')
                            <p class="mb-0 alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating">
                        {{-- <textarea name="description" class="form-control" placeholder="Description" id="floatingTextarea" style="height: 150px;"></textarea> --}}
                        <p>{{ $submit_social_task->description }}</p>
                        <label for="floatingTextarea">Description</label>
                        @error('description')
                            <p class="mb-0 alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            {{-- <input type="text" name="work_link" class="form-control border-0" id="work_link" placeholder="Content Link" > --}}
                            <a href="{{ $submit_social_task->work_link }}" target="_blank" rel="noopener noreferrer" class="btn btn-warning">Content Link</a>
                            {{-- <label for="work_link">Content Link</label> --}}
                        </div>
                        @error('work_link')
                            <p class="mb-0 alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating">
                        {{-- <textarea name="required_proof" class="form-control" placeholder="Required Proof" id="floatingTextarea" style="height: 150px;"></textarea> --}}
                        <p>{{ $submit_social_task->required_proof }}</p>
                        <label for="floatingTextarea">Required Proof</label>
                        @error('required_proof')
                            <p class="mb-0 alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="file" name="first_ss" class="form-control" placeholder="First Screen Shot" id="first_ss">
                        <label for="first_ss">First Screen Shot</label>
                        @error('first_ss')
                            <p class="mb-0 alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="file" name="second_ss" class="form-control" placeholder="Second Screen Shot" id="second_ss">
                        <label for="second_ss">Second Screen Shot</label>
                        @error('second_ss')
                            <p class="mb-0 alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <textarea name="comment" class="form-control" placeholder="Comment" id="floatingTextarea3" style="height: 150px;"></textarea>
                        <label for="floatingTextarea">Comment</label>
                        @error('comment')
                            <p class="mb-0 alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12">
                        <input type="hidden" hidden name="task_id" id="task_id" value="{{ $submit_social_task->task_id }}">
                        {{-- <input type="hidden" hidden name="member_payment_id" id="member_payment_id" value="{{ uniqid() }}"> --}}
                        <input type="submit" id="payButton" class="btn btn-primary py-3" value="Submit">
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

