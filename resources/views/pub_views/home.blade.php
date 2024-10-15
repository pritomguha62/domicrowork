@extends('pub_views.layout.app')

@section('title')
home
@endsection

@section('og_title')
home
@endsection

@section('twitter_title')
home
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


@if (session()->has('error'))
<p class="mb-0 alert alert-danger text-center">{{ session()->get('error') }}</p>
@endif
@if (session()->has('success'))
<p class="mb-0 alert alert-success text-center">{{ session()->get('success') }}</p>
@endif

<!-- About Start -->
<div class="container-fluid about py-5">
    <div class="container py-5" id="about_us">
        <div class="row g-5 align-items-center">
            <div class="col-xl-7 wow fadeInLeft" data-wow-delay="0.2s">
                <div>
                    <h4 class="text-primary">আমাদের সম্পর্কে</h4>
                    <h2 class="display-5 mb-4">আমাদের মূল লক্ষ্য হলো, বেকারত্ব দূর করা...</h2>
                    <p class="mb-4">এখনই রেজিস্ট্রেশন করুন এবং আপনার ভাগ্য পরিবর্তন করুন।
                    </p>
                    <div class="row g-4">
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="d-flex">
                                <div><i class="fas fa-lightbulb fa-3x text-primary"></i></div>
                                <div class="ms-4">
                                    <h4>স্বপরামর্শ গ্রহণ</h4>
                                    <p>পরামর্শ গ্রহণ করতে আমাদের সাথে যোগাযোগ করুন.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="d-flex">
                                <div><i class="bi bi-bookmark-heart-fill fa-3x text-primary"></i></div>
                                <div class="ms-4">
                                    <h4>দক্ষতার চাবিকাঠি</h4>
                                    <p>অধ্যবসায় হচ্ছে দক্ষতা ও অভিজ্ঞতার চাবিকাঠি.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            {{-- <a href="#" class="btn btn-primary rounded-pill py-3 px-5 flex-shrink-0">Discover Now</a> --}}
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex">
                                <i class="fas fa-phone-alt fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>মেইল করুন</h4>
                                    <p class="mb-0 fs-5" style="letter-spacing: 1px;"><a href="mailto:domicrowork@gmail.com">domicrowork@gmail.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 wow fadeInRight" data-wow-delay="0.2s">
                <div class="bg-primary rounded position-relative overflow-hidden">
                    <img src="{{ asset('pub_assets/img/about-2.png') }}" class="img-fluid rounded w-100" alt="">

                    <div class="" style="position: absolute; top: -15px; right: -15px;">
                        <img src="{{ asset('pub_assets/img/about-3.png') }}" class="img-fluid" style="width: 150px; height: 150px; opacity: 0.7;" alt="">
                    </div>
                    <div class="" style="position: absolute; top: -20px; left: 10px; transform: rotate(90deg);">
                        <img src="{{ asset('pub_assets/img/about-4.png') }}" class="img-fluid" style="width: 100px; height: 150px; opacity: 0.9;" alt="">
                    </div>
                    <div class="rounded-bottom">
                        <img src="{{ asset('pub_assets/img/about-5.jpg') }}" class="img-fluid rounded-bottom w-100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Services Start -->
<div class="container-fluid service pb-5">
    <div class="container pb-5" id="services">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">সেবাসমূহ</h4>
            <h2 class="display-5 mb-4">সেবা সমূহের বিবরণ দেখুন</h2>
            <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt sint dolorem autem obcaecati, ipsam mollitia hic.
            </p>
        </div>
        <div class="row g-4">

            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('pub_assets/img/service-1.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                    </div>
                    <div class="rounded-bottom p-4">
                        <a href="#" class="h4 d-inline-block mb-4"> Strategy Consulting</a>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, sint? Excepturi facilis neque nesciunt similique officiis veritatis,
                        </p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('pub_assets/img/service-2.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                    </div>
                    <div class="rounded-bottom p-4">
                        <a href="#" class="h4 d-inline-block mb-4">Financial Advisory</a>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, sint? Excepturi facilis neque nesciunt similique officiis veritatis,
                        </p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('pub_assets/img/service-3.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                    </div>
                    <div class="rounded-bottom p-4">
                        <a href="#" class="h4 d-inline-block mb-4">Managements</a>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, sint? Excepturi facilis neque nesciunt similique officiis veritatis,
                        </p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('pub_assets/img/service-4.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                    </div>
                    <div class="rounded-bottom p-4">
                        <a href="#" class="h4 d-inline-block mb-4">Supply Optimization</a>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, sint? Excepturi facilis neque nesciunt similique officiis veritatis,
                        </p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('pub_assets/img/service-5.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                    </div>
                    <div class="rounded-bottom p-4">
                        <a href="#" class="h4 d-inline-block mb-4">Hr Consulting</a>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, sint? Excepturi facilis neque nesciunt similique officiis veritatis,
                        </p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('pub_assets/img/service-6.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                    </div>
                    <div class="rounded-bottom p-4">
                        <a href="#" class="h4 d-inline-block mb-4">Marketing Consulting</a>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, sint? Excepturi facilis neque nesciunt similique officiis veritatis,
                        </p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- Services End -->

<!-- Contact Start -->
<div class="container-fluid contact py-5">
    <div class="container py-5">
        <div class="row g-5" id="contact_us">
            <div class="col-xl-6">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <div class="bg-light rounded p-5 mb-5">
                        <h4 class="text-primary mb-4">যোগাযোগ করুন</h4>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="contact-add-item">
                                    <div class="contact-icon text-primary mb-4">
                                        <i class="fas fa-map-marker-alt fa-2x"></i>
                                    </div>
                                    <div>
                                        <h4>ঠিকানা</h4>
                                        <p class="mb-0">মিরপুর, ঢাকা, বাংলাদেশ</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-add-item">
                                    <div class="contact-icon text-primary mb-4">
                                        <i class="fas fa-envelope fa-2x"></i>
                                    </div>
                                    <div>
                                        <h4>মেইল পাঠান</h4>
                                        <a href="mailto:domicrowork@gmail.com"><p class="mb-0">domicrowork@gmail.com</p></a>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="contact-add-item">
                                    <div class="contact-icon text-primary mb-4">
                                        <i class="fa fa-phone-alt fa-2x"></i>
                                    </div>
                                    <div>
                                        <h4>Telephone</h4>
                                        <p class="mb-0">(+012) 3456 7890</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-add-item">
                                    <div class="contact-icon text-primary mb-4">
                                        <i class="fab fa-firefox-browser fa-2x"></i>
                                    </div>
                                    <div>
                                        <h4>Yoursite@ex.com</h4>
                                        <p class="mb-0">(+012) 3456 7890</p>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="bg-light p-5 rounded h-100 wow fadeInUp" data-wow-delay="0.2s">
                        <h4 class="text-primary">আপনার বার্তা পাঠান</h4>
                        {{-- <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a class="text-primary fw-bold" href="https://htmlcodex.com/contact-form">Download Now</a>.</p> --}}
                        <form action="{{ route('contact_us') }}" method="POST">

                            @if (session()->has('error'))
                                <p class="mb-0 alert alert-danger">{{ session()->get('error') }}</p>
                            @endif
                            @if (session()->has('success'))
                                <p class="mb-0 alert alert-success">{{ session()->get('success') }}</p>
                            @endif

                            @csrf

                            <div class="row g-4">
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" name="name" class="form-control border-0" id="name" placeholder="Your Name">
                                        <label for="name">আপনার নাম</label>
                                    </div>
                                    @error('name')
                                        <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control border-0" id="email" placeholder="Your Email">
                                        <label for="email">ইমেইল</label>
                                    </div>
                                    @error('email')
                                        <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" name="phone" class="form-control border-0" id="phone" placeholder="Phone">
                                        <label for="phone">ফোন নাম্বার</label>
                                    </div>
                                    @error('phone')
                                        <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                {{-- <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="project" placeholder="Project">
                                        <label for="project">Your Project</label>
                                    </div>
                                </div> --}}
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" name="subject" class="form-control border-0" id="subject" placeholder="Subject">
                                        <label for="subject">বিষয়</label>
                                    </div>
                                    @error('subject')
                                        <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control border-0" name="message" placeholder="Leave a message here" id="message" style="height: 160px"></textarea>
                                        <label for="message">বার্তা</label>
                                    </div>
                                    @error('message')
                                        <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary w-100 py-3">বার্তা পাঠান</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                <div class="rounded h-100">
                    <iframe class="rounded h-100 w-100"
                    style="height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233668.0639686044!2d90.2548768342012!3d23.780753030883602!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1726905154877!5m2!1sen!2sbd"
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->



@endsection


