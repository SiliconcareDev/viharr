@php
    $terms_ids = $row->terms->pluck('term_id');
    $attributes = \Modules\Core\Models\Terms::getTermsById($terms_ids);
@endphp
@if(!empty($terms_ids) and !empty($attributes))
    @foreach($attributes as $key => $attribute )
        @php $translate_attribute = $attribute['parent']->translate() @endphp
        @if(empty($attribute['parent']['hide_in_single']))
            <div class="g-attributes {{$attribute['parent']->slug}} attr-{{$attribute['parent']->id}}">
                <h3>{{ $translate_attribute->name }}</h3>
                @php $terms = $attribute['child'] @endphp
                <div class="list-attributes">
                    @foreach($terms as $term )
                        @php $translate_term = $term->translate() @endphp
                        <div class="item {{$term->slug}} term-{{$term->id}}">
                            @if(!empty($term->image_id))
                                @php $image_url = get_file_url($term->image_id, 'full'); @endphp
                                <img src="{{$image_url}}" class="img-responsive" alt="{{$translate_term->name}}">
                            @else
                                <i class="{{ $term->icon ?? "icofont-check-circled icon-default" }}"></i>
                            @endif
                            {{$translate_term->name}}
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @endforeach
@endif
<div class="g-attributes">
    <h3>{{__("Rules")}}</h3>
    <div class="description">

        <div class="row">
            <div class="col-lg-4">
                <div class="key">{{__("Check In")}}</div>
            </div>
            <div class="col-lg-8">
                <div class="value"> {{$row->check_in_time}} </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-4">
                <div class="key">{{__("Check Out")}}</div>
            </div>
            <div class="col-lg-8">
                <div class="value"> {{$row->check_out_time}} </div>
            </div>
        </div>
        @if($translation->policy)
        <div class="row">
            <div class="col-lg-4">
                <div class="key">{{__("Hotel Policies")}}</div>
            </div>
            <div class="col-lg-8">
                @foreach($translation->policy as $key => $item)
                <div class="item @if($key > 1) d-none @endif">
                    <div class="strong">{{$item['title']}}</div>
                    <div class="context">{!! $item['content'] !!}</div>
                </div>
                @endforeach
                @if( count($translation->policy) > 2)
                <div class="btn-show-all">
                    <span class="text">{{__("Show All")}}</span>
                    <i class="fa fa-caret-down"></i>
                </div>
                @endif
            </div>
        </div>
        @endif
    </div>
</div>
