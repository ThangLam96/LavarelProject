<div class="banner">
    <div class="container">
        <div class="row">
            @for ($i = 1; $i <= 2; $i++)
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="{{ asset('website/img/banner/banner-1.jpg') }}  " alt="">
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>