<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        @foreach ($category_featured as $cate)
                        <li data-filter=".{{ Str::of($cate->name)->slug('-') }}">{{$cate->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach ($products_random as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 mix {{ Str::of($product->name)->slug('-') }}">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{ asset('images/' .$product->image ) }}  ">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{route('website.detail', ['id' => $product->id]) }}">{{ $product->name }}</a></h6>
                        <h5>{{ number_format($product->price, 0, '', '.') }} VND</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>