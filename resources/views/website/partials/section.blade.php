@php
$hero =  Route::currentRouteName() != 'website.index' ? 'hero-normal' : '';
@endphp

<section class="hero {{ $hero }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All departments</span>
                    </div>
                    <ul>

                        @php
                        $category_section = DB::table('categories')
                            ->where('parent_id', 2)
                            ->get();
                        @endphp
                        @foreach ($category_section as $category)
                        <li><a href="{{route ('website.category', ['id' => $category->id]) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>

                @if ( Route::currentRouteName() == 'website.index')
                <div class="hero__item set-bg" data-setbg="{{ asset('website/img/hero/banner.jpg') }}  ">
                    <div class="hero__text">
                        <span>FRUIT FRESH</span>
                        <h2>Vegetable <br />100% Organic</h2>
                        <p>Free Pickup and Delivery Available</p>
                        <a href="#" class="primary-btn">SHOP NOW</a>
                    </div>
                </div>
                @endif
                
            </div>
        </div>
    </div>
</section>