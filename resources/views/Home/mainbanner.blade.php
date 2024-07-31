<div id="top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="left-content">
                    <div class="inner-content">
                        <h4>The Foodie Files</h4>
                        <h6>THE BEST EXPERIENCE</h6>
                        <div class="main-white-button scroll-to-section">
                            <a href="#reservation">Make A Reservation</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="main-banner header-text">
                    <div class="Modern-Slider">
                        @foreach ($post as $posts)
                        <!-- Item -->
                        <div class="item">
                            <div class="img-fill">
                                <img src="{{ asset('image/' . $posts->image) }}" alt="" style="width: 600px; height: 600px;">
                                <div class="overlay">
                                    <h2 class="text-white">{{ Str::limit($posts->title, 20) }}</h2>
                                    <p class="text-white" >{!! Str::limit($posts->description, 60) !!}</p>
                                </div>
                            </div>
                        </div>
                        <!-- // Item -->
                        @endforeach
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
