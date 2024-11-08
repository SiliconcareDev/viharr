<?php ($location_search_style = setting_item('space_location_search_style')); ?>

<div class="form-group">
    <i class="field-icon fa icofont-map"></i>
    <div class="form-content">
        <label><?php echo e($field['title'] ?? ""); ?></label>
        <?php if($location_search_style == 'autocompletePlace'): ?>
        <div class="g-map-place">
            <input type="text" name="map_place" placeholder="<?php echo e(__("Where are you going?")); ?>" value="<?php echo e(request()->input('map_place')); ?>" class="form-control border-0" id="autocomplete-input">
            <div class="map d-none" id="map-<?php echo e(\Illuminate\Support\Str::random(10)); ?>"></div>
            <input type="hidden" name="map_lat" value="<?php echo e(request()->input('map_lat')); ?>">
            <input type="hidden" name="map_lgn" value="<?php echo e(request()->input('map_lgn')); ?>">
        </div>

        <script>
            // Example JavaScript for autocomplete functionality
            document.addEventListener('DOMContentLoaded', function() {
                const input = document.getElementById('autocomplete-input');

                // Initialize autocomplete here (this example uses a hypothetical library)
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

        <?php else: ?>
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
                    'id' => $location->id,
                    'title' => $prefix . ' ' . $translate->name,
                ];
                $traverse($location->children, $prefix . '-');
            }
        };
        $traverse($list_location);
        ?>
        <div class="smart-search">
            <input type="text" class="smart-search-location parent_text form-control" placeholder="<?php echo e(__("Where are you going?")); ?>" value="<?php echo e($location_name); ?>" data-onLoad="<?php echo e(__("Loading...")); ?>" data-default="<?php echo e(json_encode($list_json)); ?>" id="smart-search-input">
            <input type="hidden" class="child_id" name="location_id" value="<?php echo e(Request::query('location_id')); ?>">
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const input = document.getElementById('smart-search-input');

                // Initialize smart search or autocomplete functionality
                new SmartSearch(input, {
                    // Example: use the default JSON data for suggestions
                    data: JSON.parse(input.getAttribute('data-default')),
                    onSelect: function(selectedItem) {
                        // Handle the selection (if needed)
                    }
                });
            });
        </script>
        <?php endif; ?>
    </div>
</div><?php /**PATH /home/u603013329/domains/viharr.com/public_html/themes/BC/Space/Views/frontend/layouts/search/fields/location.blade.php ENDPATH**/ ?>