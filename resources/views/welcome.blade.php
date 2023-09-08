@extends('user.layout.app')
@section('content')
    <!-- Hero Section - Home Page -->
    <section id="hero" class="hero">

        <img src="{{ asset('user/assets/img/hero-bg.jpg') }}" alt="" data-aos="fade-in">

        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <h2 data-aos="fade-up" data-aos-delay="100">Abhiram B S</h2>
                    <p data-aos="fade-up" data-aos-delay="200">Javalli Tudoor Thirthahalli Shimoga Karnataka 577226</p>
                </div>
                <div class="col-lg-5">
                    <form action="{{ route('enquery-store') }}" method="post" class="sign-up-form d-flex"
                        data-aos="fade-up" data-aos-delay="300">
                        @csrf
                        <input type="text" class="form-control" placeholder="Enter email address" name="email">
                        <input type="submit" class="btn btn-primary" value="Enquiry">
                    </form>
                </div>
            </div>
        </div>

    </section><!-- End Hero Section -->

    <!-- Clients Section - Home Page -->
    <section id="clients" class="clients">

        <div class="container-fluid" data-aos="fade-up">

            <div class="row gy-4">
                @foreach ($clients as $item)
                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="{{ asset($item->image) }}" class="img-fluid" alt="">
                    </div>
                @endforeach




            </div>

        </div>

    </section><!-- End Clients Section -->

    <!-- About Section - Home Page -->
    <section id="about" class="about">

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row align-items-xl-center gy-5">

                <div class="col-xl-5 content">
                    <h3>About Us</h3>
                    <h2>{{ $about->title }}</h2>
                    <p>{!! $about->content !!}</p>
                    {{-- <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a> --}}
                </div>

                <div class="col-xl-7">
                    <div class="row gy-4 icon-boxes">
                        @foreach ($aboutusdatas as $item)
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="icon-box">
                                    <i class="{{ $item->icon }}"></i>
                                    <h3>{{ $item->title }}</h3>
                                    <p>{!! $item->content !!}</p>
                                </div>
                            </div> <!-- End Icon Box -->
                        @endforeach


                    </div>
                </div>

            </div>
        </div>

    </section><!-- End About Section -->



    <!-- Services Section - Home Page -->
    <section id="services" class="services">

        <!--  Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Services</h2>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">
                @foreach ($servicedatas as $item)
                    <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0"><i class="{{ $item->icon }}"></i></div>
                            <div>
                                <h4 class="title"><a href="" class="stretched-link">{{ $item->title }}</a></h4>
                                <p class="description">{!! $item->content !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach




            </div>

        </div>

    </section><!-- End Services Section -->

    <!-- Features Section - Home Page -->
    <section id="features" class="features">

        <!--  Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Features</h2>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4 align-items-center features-item">
                <div class="col-lg-5 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                    <h3>{{ $featuredcontent->title }}</h3>
                    <p>
                        {!! $featuredcontent->content !!}
                    </p>
                    {{-- <a href="#" class="btn btn-get-started">Get Started</a> --}}
                </div>
                <div class="col-lg-7 order-1 order-lg-2 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
                    <div class="image-stack">
                        <img src="{{ asset($featuredcontent->imageone) }}" alt="" class="stack-front">
                        <img src="{{ asset($featuredcontent->imagetwo) }}" alt="" class="stack-back">
                    </div>
                </div>
            </div><!-- Features Item -->



        </div>

    </section><!-- End Features Section -->

    @php
        $portfoliodatas = App\Models\Portfolio::where('status', 1)->get();
        $categories = App\Models\Category::orderBy('name', 'ASC')->get();
        
    @endphp
    <!-- Portfolio Section - Home Page -->
    <section id="portfolio" class="portfolio">

        <!--  Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Portfolio</h2>
            {{-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> --}}
        </div><!-- End Section Title -->

        <div class="container">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="#all" class="filter-active">All</li>
                    @foreach ($categories as $category)
                        <li data-filter="#category{{ $category->id }}">{{ $category->name }}</li>
                    @endforeach

                </ul><!-- End Portfolio Filters -->

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($portfoliodatas as $item)
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item" id="all">
                            <img src="{{ asset($item->image) }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>{{ $item->name }}</h4>

                                <a href="{{ asset($item->image) }}" title="{{ $item->name }}"
                                    data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="{{ $item->url }}" target="_blank" title="More Details"
                                    class="details-link"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    @endforeach
                    @foreach ($categories as $category)
                        @php
                            $catwisePortfolio = App\Models\Portfolio::where('category_id', $category->id)->get();
                        @endphp
                        @foreach ($catwisePortfolio as $item)
                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item" id="category{{ $category->id }}">

                                <img src="{{ asset($item->image) }}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>{{ $item->name }}</h4>

                                    <a href="{{ asset($item->image) }}" title="{{ $item->name }}"
                                        data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                            class="bi bi-zoom-in"></i></a>
                                    <a href="{{ $item->url }}" target="_blank" title="More Details"
                                        class="details-link"><i class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        @endforeach
                    @endforeach


                </div>

            </div>

        </div>

    </section><!-- End Portfolio Section -->

    <!-- Pricing Section - Home Page -->
    <section id="pricing" class="pricing">

        <!--  Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Pricing</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="zoom-in" data-aos-delay="100">

            <div class="row g-4">

                <div class="col-lg-4">
                    <div class="pricing-item">
                        <h3>Free Plan</h3>
                        <div class="icon">
                            <i class="bi bi-box"></i>
                        </div>
                        <h4><sup>$</sup>0<span> / month</span></h4>
                        <ul>
                            <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
                            <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
                            <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
                            <li class="na"><i class="bi bi-x"></i> <span>Pharetra massa massa ultricies</span>
                            </li>
                            <li class="na"><i class="bi bi-x"></i> <span>Massa ultricies mi quis
                                    hendrerit</span></li>
                        </ul>
                        <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
                    </div>
                </div><!-- End Pricing Item -->

                <div class="col-lg-4">
                    <div class="pricing-item featured">
                        <h3>Business Plan</h3>
                        <div class="icon">
                            <i class="bi bi-rocket"></i>
                        </div>

                        <h4><sup>$</sup>29<span> / month</span></h4>
                        <ul>
                            <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
                            <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
                            <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
                            <li><i class="bi bi-check"></i> <span>Pharetra massa massa ultricies</span></li>
                            <li><i class="bi bi-check"></i> <span>Massa ultricies mi quis hendrerit</span></li>
                        </ul>
                        <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
                    </div>
                </div><!-- End Pricing Item -->

                <div class="col-lg-4">
                    <div class="pricing-item">
                        <h3>Developer Plan</h3>
                        <div class="icon">
                            <i class="bi bi-send"></i>
                        </div>
                        <h4><sup>$</sup>49<span> / month</span></h4>
                        <ul>
                            <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
                            <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
                            <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
                            <li><i class="bi bi-check"></i> <span>Pharetra massa massa ultricies</span></li>
                            <li><i class="bi bi-check"></i> <span>Massa ultricies mi quis hendrerit</span></li>
                        </ul>
                        <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
                    </div>
                </div><!-- End Pricing Item -->

            </div>

        </div>

    </section><!-- End Pricing Section -->

    <!-- Faq Section - Home Page -->
    <section id="faq" class="faq">

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="content px-xl-5">
                        <h3><span>Frequently Asked </span><strong>Questions</strong></h3>
                        {{-- <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                        </p> --}}
                    </div>
                </div>

                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

                    <div class="faq-container">
                        @foreach ($faqdatas as $key => $item)
                            <div class="faq-item">
                                <h3><span class="num">{{ $key + 1 }}.</span> <span>{{ $item->question }}</span>
                                </h3>
                                <div class="faq-content">
                                    {!! $item->answer !!}
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div>
                        @endforeach





                    </div>

                </div>
            </div>

        </div>

    </section><!-- End Faq Section -->

    <!-- Team Section - Home Page -->
    <section id="team" class="team">

        <!--  Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Team</h2>
            {{-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> --}}
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-5">
                @foreach ($teamdatas as $item)
                    <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-img">
                            <img src="{{ asset($item->image) }}" class="img-fluid" alt="">
                            <div class="social">
                                @foreach ($item->socialmedia as $media)
                                    <a href="{{ $media->url }}" target="_blank"><i
                                            class="{{ $media->icon }}"></i></a>
                                @endforeach
                            </div>
                        </div>
                        <div class="member-info text-center">
                            <h4>{{ $item->name }}</h4>
                            <span>{{ $item->designation }}</span>
                            <p>{!! $item->content !!}</p>
                        </div>
                    </div>
                @endforeach




            </div>

        </div>

    </section><!-- End Team Section -->



    <!-- Testimonials Section - Home Page -->
    <section id="testimonials" class="testimonials">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-5 info" data-aos="fade-up" data-aos-delay="100">
                    <h3>Testimonials</h3>

                </div>

                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">

                    <div class="swiper">
                        <template class="swiper-config">
                            {
                            "loop": true,
                            "speed" : 600,
                            "autoplay": {
                            "delay": 5000
                            },
                            "slidesPerView": "auto",
                            "pagination": {
                            "el": ".swiper-pagination",
                            "type": "bullets",
                            "clickable": true
                            }
                            }
                        </template>
                        <div class="swiper-wrapper">
                            @foreach ($testimonialdatas as $item)
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="d-flex">
                                            <img src="{{ asset($item->image) }}" class="testimonial-img flex-shrink-0"
                                                alt="">
                                            <div>
                                                <h3>{{ $item->name }}</h3>
                                                <h4>{{ $item->designation }}</h4>
                                                <div class="stars">
                                                    @for ($i = 0; $i < 5; $i++)
                                                        @if ($i < $item->rating)
                                                            <i class="bi bi-star-fill"></i>
                                                        @endif
                                                    @endfor

                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            <span>{!! $item->content !!}</span>
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                    </div>
                                </div>
                            @endforeach




                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                </div>

            </div>

        </div>

    </section><!-- End Testimonials Section -->

    <!-- Recent-posts Section - Home Page -->
    <section id="recent-posts" class="recent-posts">

        <!--  Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Recent Project</h2>
            {{-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> --}}
        </div><!-- End Section Title -->


        @php
            $admindata = \App\Models\Admin::first();
        @endphp
        <div class="container">

            <div class="row gy-4">
                @foreach ($projectdatas as $item)
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <article>

                            <div class="post-img">
                                <img src="{{ asset($item->image) }}" alt="" class="img-fluid">
                            </div>


                            <h2 class="title">
                                <a href="{{ $item->url }}" target="_blank">{{ $item->name }}</a>
                            </h2>

                            <div class="d-flex align-items-center">
                                <img src="{{ !empty($admindata->image) ? url('storage/admin/' . $admindata->image) : url('no_image.jpg') }}"
                                    alt="" class="img-fluid post-author-img flex-shrink-0">
                                <div class="post-meta">
                                    <p class="post-author">{{ $admindata->name }}</p>
                                    <p class="post-date">
                                        <time>{{ \Carbon\Carbon::parse($item->date)->format('d F Y') }}</time>
                                    </p>
                                </div>
                            </div>

                        </article>
                    </div>
                @endforeach




            </div><!-- End recent posts list -->

        </div>

    </section><!-- End Recent-posts Section -->

    <!-- Contact Section - Home Page -->
    <section id="contact" class="contact">

        <!--  Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-6">

                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="info-item" data-aos="fade" data-aos-delay="200">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Address</h3>
                                <p>A108 Adam Street</p>
                                <p>New York, NY 535022</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item" data-aos="fade" data-aos-delay="300">
                                <i class="bi bi-telephone"></i>
                                <h3>Call Us</h3>
                                <p>+1 5589 55488 55</p>
                                <p>+1 6678 254445 41</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item" data-aos="fade" data-aos-delay="400">
                                <i class="bi bi-envelope"></i>
                                <h3>Email Us</h3>
                                <p>info@example.com</p>
                                <p>contact@example.com</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item" data-aos="fade" data-aos-delay="500">
                                <i class="bi bi-clock"></i>
                                <h3>Open Hours</h3>
                                <p>Monday - Friday</p>
                                <p>9:00AM - 05:00PM</p>
                            </div>
                        </div><!-- End Info Item -->

                    </div>

                </div>

                <div class="col-lg-6">
                    <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name"
                                    required>
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Your Email"
                                    required>
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject"
                                    required>
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>

                                <button type="submit">Send Message</button>
                            </div>

                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- End Contact Section -->
@endsection
