@if(!empty($style) and $style == "carousel" and !empty($list_slider))
<div class="effect">
    <div class="owl-carousel">
        @foreach($list_slider as $item)
        @php $img = get_file_url($item['bg_image'],'full') @endphp
        <div class="item">
            <div class="item-bg" style="background-image: linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)),url('{{$img}}') !important"></div>
        </div>
        @endforeach
    </div>
</div>
@endif
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-heading text-center">{{$title}}</h1>
            <div class="sub-heading text-center">{{$sub_title}}</div>
            @if(empty($hide_form_search))
            <div class="g-form-control">
                <div class="card position-relative">
                    <div class="card-body">
                        <div class="d-md-none">
                            <!-- Mobile View (Vertical Tabs) -->
                            <div class="list-group" role="tablist">
                                @if(!empty($service_types))
                                @php $number = 0; @endphp
                                @foreach ($service_types as $service_type)
                                @php
                                $allServices = get_bookable_services();
                                if(empty($allServices[$service_type])) continue;
                                $module = new $allServices[$service_type];
                                @endphp
                                <a href="#bravo_{{$service_type}}" class="list-group-item list-group-item-action @if($number == 0) active @endif" aria-controls="bravo_{{$service_type}}" role="tab" data-toggle="tab">
                                    <i class="{{ $module->getServiceIconFeatured() }}"></i>
                                    {{
                                    $service_type == 'space' 
                                    ? 'Homestays & Villas' 
                                    : (!empty($modelBlock["title_for_".$service_type]) ? $modelBlock["title_for_".$service_type] : $module->getModelName()) 
                                }}
                                </a>
                                @php $number++; @endphp
                                @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="d-none d-md-block">
                            <!-- Desktop View (Horizontal Tabs) -->
                            <ul class="nav nav-tabs justify-content-center position-absolute w-100" role="tablist" style="top: -75px;">
                                @if(!empty($service_types))
                                @php $number = 0; @endphp
                                @foreach ($service_types as $service_type)
                                @php
                                $allServices = get_bookable_services();
                                if(empty($allServices[$service_type])) continue;
                                $module = new $allServices[$service_type];
                                @endphp
                                <li class="nav-item" role="presentation">
                                    <a href="#bravo_{{$service_type}}" class="nav-link @if($number == 0) active @endif border rounded-pill" aria-controls="bravo_{{$service_type}}" role="tab" data-toggle="tab" style="font-size: 0.75rem; padding: 1rem 2rem;">
                                        <i class="{{ $module->getServiceIconFeatured() }}"></i>
                                        {{
                                        $service_type == 'space' 
                                        ? 'Homestays & Villas' 
                                        : (!empty($modelBlock["title_for_".$service_type]) ? $modelBlock["title_for_".$service_type] : $module->getModelName()) 
                                    }}
                                    </a>
                                </li>
                                @php $number++; @endphp
                                @endforeach
                                @endif
                            </ul>
                        </div>

                        <div class="tab-content text-center mt-4">
                            @if(!empty($service_types))
                            @php $number = 0; @endphp
                            @foreach ($service_types as $service_type)
                            @php
                            $allServices = get_bookable_services();
                            if(empty($allServices[$service_type])) continue;
                            $module = new $allServices[$service_type];
                            @endphp
                            <div role="tabpanel" class="tab-pane fade @if($number == 0) show active @endif" id="bravo_{{$service_type}}">
                                @include(ucfirst($service_type).'::frontend.layouts.search.form-search')
                            </div>
                            @php $number++; @endphp
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
                $(document).ready(function() {
                    // Hide specific menu items by matching text
                    $('.nav-link:contains("Tour")').parent().hide(); // Hides 'Tours'
                    $('.nav-link:contains("Homestays & Villas")').parent().hide(); // Hides 'Homestays & Villas'
                    $('.nav-link:contains("Car")').parent().hide(); // Hides 'Car'

                    // Also hide in the mobile view
                    $('.list-group-item:contains("Tour")').hide();
                    $('.list-group-item:contains("Homestays & Villas")').hide();
                    $('.list-group-item:contains("Car")').hide();
                });
            </script>


            @endif
        </div>
    </div>
</div>