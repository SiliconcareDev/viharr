@if(count($hotel_related) > 0)
    <div class="bravo-list-hotel-related-widget container py-4">
        <h3 class="heading text-center mb-4">{{__("Related Hotels")}}</h3>

        <div id="hotelCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($hotel_related->chunk(3) as $key => $chunk)
                    <div class="carousel-item @if($key == 0) active @endif">
                        <div class="row">
                            @foreach($chunk as $item)
                                @php
                                    $translation_item = $item->translate();
                                @endphp
                                <div class="col-md-4">
                                    <div class="card mb-3" style="min-height: 100%;">
                                        <a href="{{$item->getDetailUrl(false)}}">
                                            @if($item->image_url)
                                                <img src="{{$item->image_url}}" class="card-img-top" alt="{{$translation_item->title}}" style="height: 200px; object-fit: cover;">
                                            @endif
                                        </a>
                                        <div class="card-body d-flex flex-column">
                                            @if($item->star_rate)
                                                <div class="star-rate mb-2">
                                                    @for ($star = 1 ;$star <= $item->star_rate ; $star++)
                                                        <i class="fa fa-star text-warning"></i>
                                                    @endfor
                                                </div>
                                            @endif
                                            <h5 class="card-title">
                                                <a href="{{$item->getDetailUrl(false)}}" class="text-dark">
                                                    {{$translation_item->title}}
                                                </a>
                                            </h5>
                                            <div class="price-wrapper mt-auto">
                                                {{__("From")}}
                                                <span class="text-success font-weight-bold">{{ $item->display_price }}</span>
                                                <span>{{__("/night")}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Carousel controls -->
            <a class="carousel-control-prev" href="#hotelCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#hotelCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
@endif
