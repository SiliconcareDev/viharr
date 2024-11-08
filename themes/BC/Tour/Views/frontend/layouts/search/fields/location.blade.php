@php($location_search_style = setting_item('tour_location_search_style'))

<div class="form-group">
    <i class="field-icon fa icofont-map"></i>
    <div class="form-content">
        <label>{{ $field['title'] ?? "" }}</label>
        @if($location_search_style == 'autocompletePlace')
        <div class="g-map-place">
            <input type="text" name="map_place" placeholder="{{ __("Where are you going?") }}" value="{{ request()->input('map_place') }}" class="form-control border-0" id="autocomplete-input">
            <div class="map d-none" id="map-{{ \Illuminate\Support\Str::random(10) }}"></div>
            <input type="hidden" name="map_lat" value="{{ request()->input('map_lat') }}">
            <input type="hidden" name="map_lgn" value="{{ request()->input('map_lgn') }}">
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const input = document.getElementById('autocomplete-input');

                // Initialize autocomplete functionality
                new Autocomplete(input, {
                    fetch: function(text) {
                        // Fetch suggestions from your server or local data source
                        return fetch(`/api/suggestions?query=${text}`)
                            .then(response => response.json())
                            .then(data => data.suggestions);
                    },
                    onSelect: function(suggestion) {
                        // Handle the selection (if needed)
                    }
                });
            });
        </script>

        @else
        <?php
        $location_name = "";
        $list_json = [];
        $traverse = function ($locations, $prefix = '') use (&$traverse, &$list_json, &$location_name) {
            foreach ($locations as $location) {
                $translate = $location->translate();
                if (Request::query('location_id') == $location->id) {
                    $location_name = $translate->name;
                }
                $list_json[] = [
                    'id'    => $location->id,
                    'title' => $prefix . ' ' . $translate->name,
                ];
                $traverse($location->children, $prefix . '-');
            }
        };
        $traverse($tour_location);
        ?>
        <div class="smart-search">
            <input type="text" class="smart-search-location parent_text form-control" placeholder="{{ __("Where are you going?") }}" value="{{ $location_name }}" data-onLoad="{{ __("Loading...") }}" data-default="{{ json_encode($list_json) }}" id="smart-search-input">
            <input type="hidden" class="child_id" name="location_id" value="{{ Request::query('location_id') }}">
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const input = document.getElementById('smart-search-input');

                // Initialize smart search or autocomplete functionality
                new SmartSearch(input, {
                    // Use the default JSON data for suggestions
                    data: JSON.parse(input.getAttribute('data-default')),
                    onSelect: function(selectedItem) {
                        // Handle the selection (if needed)
                    }
                });
            });
        </script>
        @endif
    </div>
</div>