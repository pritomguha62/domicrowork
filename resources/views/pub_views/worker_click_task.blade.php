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
    path{
        display: none;
    }

    .w-5,.h-5{
        display: none;
    }

    .hidden{
        display: none;
    }

    
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $("a:contains('Previous')").hide();
        $("span:contains('Previous')").hide();
        $("a:contains('Next')").hide();
        $("span:contains('Next')").hide();
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

        // Initial countdown value
        let countdownValue = 5;
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
                let countdownInterval = setInterval(function() {
                    countdownValue--;
                    $('#countdown3').text(countdownValue);
                    if (countdownValue <= 0) {
                        clearInterval(countdownInterval);
                        $('#countdown3').hide();
                        $("a:contains('Next')").show();
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
                    <h2 id="countdown"></h2>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($click_tasks as $click_task)
                        
                        <div id="countdown{{ $i }}">5</div>

                        <div class="bg-light p-5 rounded h-100 wow fadeInUp mb-4" data-wow-delay="0.2s">
                            <h2 class="text-primary">{{ $click_task->title }}</h2>
                            <p class="mb-4">{{ $click_task->description }}</p>
                        </div>

                        <button class="mx-auto btn btn-warning" id="next_button{{ $i }}">Next</button>

                        @php
                        $i++
                    @endphp
                    @endforeach

                    <div>
                        {{ $click_tasks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

@endsection


