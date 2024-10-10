@extends('member_views.layout.client_app')


@section('title')
apply social task
@endsection

@section('content')

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <div class="row g-4">
        <div class="col-sm-12 col-md-12 col-xl-8">
            <div class="h-100 bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h3 class="mb-0">{{ $apply_social_task->title }}</h3>
                    {{-- <a href="">Show All</a> --}}
                </div>

                <div class="d-flex align-items-center border-bottom py-3">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 justify-content-between">
                            <img width="100%" height="auto" class="flex-shrink-0" src="{{ asset('storage/uploads/image/dfgdgf_ss_thumbnail_2024_10_06_07_07_27am.png') }}" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        {{-- <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Description</h6>
                </div>
                <div id="">{{ $apply_social_task->description }}</div>
            </div>
        </div> --}}
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Job Details</h6>
                    {{-- <a href="">Show All</a> --}}
                </div>

                <div class="d-flex align-items-center border-bottom py-2">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <span>Reward : {{ $apply_social_task->task_price_rate }}</span>
                        </div>
                    </div>
                </div>

                {{-- <div class="d-flex align-items-center border-bottom py-2">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <span>Link : {{ $apply_social_task->work_link }}</span>
                        </div>
                    </div>
                </div> --}}

                <div class="d-flex align-items-center border-bottom py-2">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <span>Category : {{ $apply_social_task->category->title }}->{{ $apply_social_task->sub_category->title }}</span>
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center border-bottom py-2">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <span>Last Updated : {{ $apply_social_task->updated_at }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        {{-- <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Testimonial</h6>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item text-center">
                        <img class="img-fluid rounded-circle mx-auto mb-4" src="img/testimonial-1.jpg" style="width: 100px; height: 100px;">
                        <h5 class="mb-1">Client Name</h5>
                        <p>Profession</p>
                        <p class="mb-0">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                    </div>
                    <div class="testimonial-item text-center">
                        <img class="img-fluid rounded-circle mx-auto mb-4" src="img/testimonial-2.jpg" style="width: 100px; height: 100px;">
                        <h5 class="mb-1">Client Name</h5>
                        <p>Profession</p>
                        <p class="mb-0">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="col-sm-12 col-xl-10">
            <div class="bg-light rounded h-100 p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Description</h6>
                </div>
                <p>{{ $apply_social_task->description }}</p>
                {{-- <iframe class="position-relative rounded w-100 h-100"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                tabindex="0"></iframe> --}}
            </div>
        </div>

        <div class="col-sm-12 col-xl-12">
            <div class="bg-white rounded h-100 p-4">
                <a class="btn btn-success" href="{{ route('worker_panel.submit_social_task', ['task_id'=>$apply_social_task->task_id]) }}">Apply</a>
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

