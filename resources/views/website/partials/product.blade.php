<section class="latest-product spad">
    <div class="container">
        <div class="row">
            @foreach ($category_lasted as $category => $products)
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>{{$category}}</h4>
                    <div class="latest-product__slider owl-carousel">
                        
                        @foreach ($products as $product)
                        <div class="latest-prdouct__slider__item">
                            
                            @foreach ($product as $item)
                            <a href="" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{ asset('images/' . $item->image) }}" alt=" {{ $item->name }}">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{ $item->name }}</h6>
                                    <span>{{ number_format($item->price, 0, '', '.') }} VND</span>
                                </div>
                            </a>
                            @endforeach
                            
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>