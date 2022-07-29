<section class="latest-product spad">
    <div class="container">
        <div class="row">
            @for ($i = 1; $i <= 3; $i++)
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Latest Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        
                        @for ($k = 1; $k <= 2; $k++)
                        <div class="latest-prdouct__slider__item">
                            
                            @for ($t = 1; $t <= 3; $t++)
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{ asset('website/img/latest-product/lp-1.jpg') }}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            @endfor
                            
                        </div>
                        @endfor

                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>