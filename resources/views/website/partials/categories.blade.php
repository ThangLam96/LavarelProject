<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                @for ($i = 1; $i <= 5; $i++)
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="{{ asset('website/img/categories/cat-1.jpg') }}  ">
                        <h5><a href="#">Fresh Fruit</a></h5>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
</section>