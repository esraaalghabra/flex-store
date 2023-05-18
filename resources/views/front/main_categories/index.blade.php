@extends('layouts.contents')

@section('content')
    <main id="main">
        {{--    Header    --}}
        <section class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{route('home')}}"><img src="{{asset('assets/products/products/logo.png')}}" alt=""></a></li>
                    <li ><a href="#"> {{$mainCategory->name}}</a></li>
                </ol>
                <h2>{{$mainCategory->name}}</h2>
            </div>
        </section>
        {{--    blog of MainCategory    --}}
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-8 entries">
                        <article class="entry">
                            <div class="entry-img">
                                <div class="portfolio-details-slider swiper">
                                    <div class="swiper-wrapper align-items-center">
                                        <div class="swiper-slide">
                                            <img src="{{$mainCategory->photo}}" style="height: 400px; width: 800px; margin-bottom:15px"  alt="">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{$mainCategory->photo_first}}" style="height: 400px; width: 800px; margin-bottom:15px" alt="">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{$mainCategory->photo_second}}" style="height: 400px; width: 800px; margin-bottom:15px" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h2 class="entry-title">
                                <a href="">{{$mainCategory->name}}</a>
                            </h2>
                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex ">{{$mainCategory->products->count()}} <a href="#discounts"><i class="bi bi-bag"></i></a></li>
                                    <li class="d-flex ">{{$mainCategory->subCategories->count()}} <a href="#subDepartment"><i class="bi-grid-1x2-fill"></i> </a></li>
                                    <li class="d-flex ">{{$mainCategory->vendors->count()}} <a href="#recent-blog-posts"> <i class="bi bi-shop"></i></a></li>
                                </ul>
                            </div>
                            <div class="entry-content">
                                <p> {{$mainCategory->details}} </p>
                                <br>
                                <div class="read-more">
                                    <a href="#discounts">عرض المنتجات</a>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar">
                            <h3 class="sidebar-title">بحث</h3>
                            <div class="sidebar-item search-form">
                                <form action="">
                                    <input type="text">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div>

                            <h3 class="sidebar-title">التصنيفات الفرعية:</h3>
                            <div class="sidebar-item categories">
                                <ul>
                                    @foreach($mainCategory->subCategories as $index=> $subCategory)
                                        <li><a href="{{route('subCategory.index',$subCategory->id)}}">{{$subCategory->name}} </a></li>
                                    @endforeach
                                </ul>
                            </div>

                            <h3 class="sidebar-title">المتاجر:</h3>
                            <div class="sidebar-item tags">
                                <ul>
                                    @foreach($mainCategory->vendors as $index=>$vendor)
                                        <li><a href="{{route('vendor.index',$vendor->id)}}">{{$vendor->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{--    List Products    --}}
        <section id="discounts" class="portfolio">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <p>المنتجات والعروض</p>
                </header>
                <div class="card mb-5 card-color">
                    <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                        @if(@isset($mainCategory->products) && $mainCategory->products->count()>0)
                            @foreach($mainCategory->products as $product )
                                <div class="col-lg-3 col-md-6 portfolio-item filter-app">
                                    <div class="portfolio-wrap">
                                        <img src="{{$product->photo}} " style="width: 400px; height: 350px;" class="img-fluid" alt="">
                                        <div class="portfolio-info">
                                            <h4>{{$product->name}}</h4>
                                            <p>{{$product->details}}</p>
                                            <p>{{$product->price}}$</p>
                                            <div class="portfolio-links">
                                                <a href="{{$product->photo}}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="{{$product->name}}"><i class="bi bi-plus"></i></a>
                                                <a href="{{route('product.index',$product->id)}}" title="More Details"><i class="bi bi-link"></i></a>
                                            </div>
                                            <p><i class="bi bi-shop-window"></i> {{$product->vendor->name}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

        </section>

        {{--    List subCategoies    --}}
        <section id="subDepartment" class="services portfolio recent-blog-posts">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <p>التصنيفات الفرعية </p>
                    <h3></h3>
                </header>

                @if(checkMainCategory($mainCategory))
                @if(checkData($mainCategory->subCategories))
                    @foreach($mainCategory->subCategories as $subCategory )
                    @if(checkSubCategory($subCategory))
                        <div class="card mb-5 card-color">
                            <div class=" row gy-4 ">
                                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                                    <div class="post-box">
                                        <div class="post-img">
                                            <div class="portfolio-details-slider swiper">
                                                <div class="swiper-wrapper align-items-center">
                                                    <div class="swiper-slide">
                                                        <img src="{{$subCategory->photo}}" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <img src="{{$subCategory->photo_first}}" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <img src="{{$subCategory->photo_second}}" class="img-fluid" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h3 class="post-title"> {{$subCategory->name}}</h3>
                                        <h3 class="post-details"> {{$subCategory -> details}}</h3>
                                        <a href="" class="readmore ">قراءة المزيد<i class="bi bi-arrow-left"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6" data-aos="fade-up" data-aos-delay="200">
                                    <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                                        @if(@isset($subCategory->products) && $subCategory->products->count()>0)
                                            @foreach($subCategory->products as $index=> $product )
                                                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                                    <div class="portfolio-wrap">
                                                        <img src="{{$product->photo}}"  class="img-fluid" alt="">
                                                        <div class="portfolio-info">
                                                            <h4>{{$product->name}}</h4>
                                                            <p>{{$product->details}}</p>
                                                            <p>{{$product->price}}$</p>
                                                            <div class="portfolio-links">
                                                                <a href="{{$product->photo}}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="{{$product->name}}"><i class="bi bi-plus"></i></a>
                                                                <a href="{{route('product.index',$product->id)}}" title="More Details"><i class="bi bi-link"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($index===5) @break @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @endforeach
                @endif
                @endif
            </div>
        </section>

        {{--    List Vendors    --}}
        <section id="recent-blog-posts" class="recent-blog-posts team">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <p>المتاجر</p>
                </header>
                <div class="card mb-5 card-color">
                    <div class="row gy-4">
                        @if(@isset($mainCategory->vendors) && $mainCategory->vendors->count()>0)
                            @foreach($mainCategory->vendors as $index=> $vendor )
                                <div class="col-lg-4">
                                    <div class="member">
                                        <div id="vendor{{$index}}" class="member-img">
                                            <div class="portfolio-details-slider swiper">
                                                <div class="swiper-wrapper align-items-center">
                                                    <div class="swiper-slide">
                                                        <img src="{{$vendor->photo}}"  alt="">
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <img src="{{$vendor->photo_second}}"  alt="">
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <img src="{{$vendor->photo_first}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="social">
                                                <a href=""><i class="bi bi-plus"></i></a>
                                                <a href=""><i class="bi bi-usb"></i></a>
                                                <a href=""><i class="bi bi-bag-fill"></i></a>
                                                <a href=""><i class="bi bi-1-square-fill"></i></a>
                                            </div>
                                        </div>
                                        <div class="member-info">
                                            <h2>{{$vendor->name}}</h2>
                                            <h4> {{$vendor->details}}</h4>
                                            <h3><i class="bi bi-geo-alt"></i> {{$vendor->address}}</h3>
                                                <a href="{{route('vendor.index',$vendor->id)}}" ><span>قراءة المزيد</span> <i class="bi bi-arrow-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @if($index===7) @break @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

