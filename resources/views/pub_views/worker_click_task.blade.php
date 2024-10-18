@extends('pub_views.layout.app')

@section('title')
worker click task
@endsection

@section('og_title')
worker click task
@endsection

@section('twitter_title')
worker click task
@endsection

@section('description')
ডেইলি ৫০০-২০০০ টাকা ইনকাম করার সহজ উপায় - Daily 500-2000 Taka Income · Article, like, comment, share  করে অনলাইনে ইনকাম বাংলাদেশি সাইট ।
@endsection

@section('og_description')
ডেইলি ৫০০-২০০০ টাকা ইনকাম করার সহজ উপায় - Daily 500-2000 Taka Income · Article, like, comment, share  করে অনলাইনে ইনকাম বাংলাদেশি সাইট ।
@endsection

@section('twitter_descrtiption')
ডেইলি ৫০০-২০০০ টাকা ইনকাম করার সহজ উপায় - Daily 500-2000 Taka Income · Article, like, comment, share  করে অনলাইনে ইনকাম বাংলাদেশি সাইট ।
@endsection

@section('content')

<style>
    /* path{
        display: none;
    }

    .w-5,.h-5{
        display: none;
    }

    .hidden{
        display: none;
    } */

    
</style>

@if (!empty($_GET['worker_id']))
    
    <style>
        
        .header-carousel, .owl-carousel, .owl-loaded, .owl-drag{
            display: none!important;
        }
        
        
        .navbar, .navbar-expand-lg, .navbar-light{
            background-color: #121212;
        }
        
    </style>

@endif

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $("a:contains('Previous')").hide();
        $("span:contains('Previous')").hide();
        // $("a:contains('Next')").hide();
        $("span:contains('Next')").hide();
        $("#next_button1").hide();
        $("#next_button2").hide();
        $("#next_button3").hide();
        $("#countdown").hide();
        $("#countdown1").hide();
        $('#countdown2').hide();
        $('#countdown3').hide();
    });
</script>
@if (!empty($_GET['worker_id']))
    
<script>
    $(document).ready(function() {
        $("a:contains('Previous')").hide();
        $("span:contains('Previous')").hide();
        $("a:contains('Next')").hide();
        $("span:contains('Next')").hide();
        $("#next_button1").hide();
        $("#next_button2").hide();
        $("#next_button3").hide();
        $("#countdown1").hide();
        $('#countdown2').hide();
        $('#countdown3').hide();
        $("#countdown").show();

        // Initial countdown value
        let countdownValue = 1;
        let countdownElement = $('#countdown');
        let nextButton = $('#next_button1');

        // Countdown interval
        let countdownInterval = setInterval(function() {
            countdownValue--;
            countdownElement.text(countdownValue); // Update the countdown

            // When countdown reaches 0
            if (countdownValue === 0) {
                clearInterval(countdownInterval); // Stop the countdown
                countdownElement.hide(); // Hide the countdown
                nextButton.show(); // Show the "Next" button
            }
        }, 1000); // Update every second


        $('#next_button1').on('click', function() {
            let countdownValue = 5;
            $('#countdown2').show();
            $('#next_button1').hide();
            let countdownInterval = setInterval(function() {
                countdownValue--;
                $('#countdown2').text(countdownValue);
                if (countdownValue <= 0) {
                    clearInterval(countdownInterval);
                    $('#countdown2').hide();
                    $('#next_button2').show();
                }
            }, 1000);
        });
    

        $('#next_button2').on('click', function() {
            let countdownValue = 5;
            $('#countdown3').show();
            $('#next_button2').hide();
            let countdownInterval = setInterval(function() {
                countdownValue--;
                $('#countdown3').text(countdownValue);
                if (countdownValue <= 0) {
                    clearInterval(countdownInterval);
                    $('#countdown3').hide();
                    $("a:contains('Next')").show();
                    let task_number_1 = $("#task_number_1").val();
                    let task_number_2 = $("#task_number_2").val();
                    let task_number_3 = $("#task_number_3").val();

                    $.ajax({
                        url: '{{ route('worker_panel.worker_click_task_info') }}', // Laravel route
                        type: 'POST',
                        data: {
                            task_number_1: task_number_1,
                            task_number_2: task_number_2,
                            task_number_3: task_number_3,
                            _token: '{{ csrf_token() }}' // Laravel CSRF token
                        },
                        success: function(response) {
                            // if (response.status === 'success') {
                                // $('#message').html('<p>' + response.message + '</p>');
                                alert(response.message);
                            // }
                        },
                        error: function(xhr) {
                            let error = xhr.responseJSON.message;
                            $('#message').html('<p>Error: ' + error + '</p>');
                        }
                    });
                    
                }
            }, 1000);
        });
    


        
    });
</script>


@endif

<!-- Contact Start -->
<div class="container-fluid contact py-5">
    <div class="container py-5">
        <div class="row g-5" id="active_package">
            <div class="col-xl-6 mx-auto text-center">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($posts as $click_task)
                        
                        <h2 id="countdown{{ $i }}">5</h2>

                        <div class="bg-light p-5 rounded h-100 wow fadeInUp mb-4" data-wow-delay="0.2s">
                            {{-- <h2 class="text-primary">Task {{ $i }}</h2> --}}
                            <input type="hidden" hidden id="task_number_{{ $i }}" value="{{ $click_task->task_id }}">
                            <h3 class="text-primary">{{ $click_task->title }}</h3>
                            <p class="mb-4">{{ $click_task->description }}</p>
                        </div>

                        <h2 id="countdown"></h2>
                        <button class="mx-auto btn btn-warning" id="next_button{{ $i }}">{{ $i }}</button>

                        @php
                        $i++
                    @endphp
                    @endforeach

                    {{-- @if (empty($_GET['worker_id']))

                        <div>
                            {{ $posts->links() }}
                        </div>

                    @endif --}}

                    @if (!empty($_GET['worker_id']))
                        <!-- Pagination Controls -->
                        <div class="pagination">
                            @if ($page > 1)
                                <!-- Previous Button (Decrement Page) -->
                                <a href="{{ route('posts', ['page' => $page - 1]) }}">Previous</a>
                            @endif

                            @if (($page * $limit) < $totalPosts)
                                <!-- Next Button (Increment Page) -->
                                <a href="{{ route('posts', ['worker_id' => session()->get('member_id'), 'page' => $page + 1]) }}">Next</a>
                            @endif
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

@endsection


