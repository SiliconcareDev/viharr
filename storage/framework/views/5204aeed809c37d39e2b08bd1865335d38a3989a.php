<?php ($location_search_style = setting_item('hotel_location_search_style')); ?>

<div class="form-group">
    <i class="field-icon fa icofont-map"></i>
    <div class="form-content">
        <label style="text-align: left; display: block;"> <?php echo e($field['title']); ?> </label>

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
                    // Replace with your autocomplete options and logic
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
            <input type="text"
                class="smart-search-location parent_text form-control"
                placeholder="<?php echo e(__("Where are you going?")); ?>"
                data-onLoad="<?php echo e(__("")); ?>"
                data-default="<?php echo e(json_encode($list_json)); ?>"
                id="smart-search-input">

            <!-- Hidden field to store the location_id -->
            <input type="hidden" class="child_id" name="location_id" id="location-id-field" value="<?php echo e(Request::query('location_id')); ?>">

            <!-- Container where service_name field will be dynamically added or removed -->
            <div id="service-name-container"></div>
        </div>

        <!-- Place script here, before the closing </body> tag -->
        <script>
            (function() {
                console.log("Script loaded and running."); // Log when the script starts

                const input = document.getElementById('smart-search-input');
                const locationIdField = document.getElementById('location-id-field');
                const serviceNameContainer = document.getElementById('service-name-container');

                let matchFound = false; // Declare matchFound globally

                // Ensure suggestions JSON is properly parsed
                let suggestions = [];
                try {
                    suggestions = JSON.parse(input.getAttribute('data-default'));
                    console.log("Suggestions parsed successfully:", suggestions); // Log parsed suggestions
                } catch (error) {
                    console.error('Error parsing suggestions:', error);
                    return; // Exit if suggestions cannot be parsed
                }

                // Add input event listener to handle user typing
                input.addEventListener('input', function() {
                    console.log("Input event detected"); // Log when input event occurs
                    const inputValue = input.value.trim().toLowerCase();
                    matchFound = false; // Reset matchFound to false for each new input

                    console.log("User input:", inputValue); // Log the user input

                    // Check for matches (even partial match)
                    for (let i = 0; i < suggestions.length; i++) {
                        const suggestion = suggestions[i].title.trim().toLowerCase().replace(/^[-\s]+/, '');
                        console.log("Checking suggestion:", suggestion); // Log each suggestion being checked

                        // Log lengths for debugging
                        console.log(`Comparing "${inputValue}" with "${suggestion}"`);

                        // Check if inputValue is part of the suggestion
                        if (suggestion.includes(inputValue)) {
                            matchFound = true;
                            locationIdField.value = suggestions[i].id; // Set location_id using the original index
                            console.log("Partial match found:", suggestions[i]); // Log the matched suggestion
                            break; // Stop searching once a match is found
                        }
                    }

                    console.log("Match Found:", matchFound); // Log match status

                    // Update DOM based on whether a match was found
                    if (matchFound) {
                        serviceNameContainer.innerHTML = ''; // Clear service_name if a match is found
                    } else {
                        locationIdField.value = ''; // Clear location_id if no match
                        serviceNameContainer.innerHTML = `<input type="hidden" name="service_name" id="service-name-field" value="${inputValue}">`;
                    }
                });

                // Add an event listener for when a suggestion is selected (assuming you have a dropdown or similar)
                const suggestionList = document.getElementById('suggestion-list'); // Replace with your suggestion list element

                if (suggestionList) {
                    suggestionList.addEventListener('click', function(e) {
                        // Assuming you have list items in your suggestion list
                        if (e.target && e.target.matches('li.suggestion-item')) {
                            const selectedSuggestion = e.target.innerText.trim().toLowerCase(); // Get the selected suggestion text
                            const suggestionObj = suggestions.find(s => s.title.trim().toLowerCase() === selectedSuggestion); // Get the corresponding suggestion object

                            if (suggestionObj) {
                                matchFound = true; // Set matchFound to true when a suggestion is clicked
                                input.value = suggestionObj.title; // Set input value to the selected suggestion
                                locationIdField.value = suggestionObj.id; // Set location ID
                                serviceNameContainer.innerHTML = ''; // Clear any previous service name input
                                console.log("User selected suggestion:", suggestionObj.title); // Log the selected suggestion
                                console.log("Match Found Status:", matchFound); // Log match status
                            }
                        }
                    });
                }
            })(); // Immediately invoke the function
        </script>














        <?php endif; ?>
    </div>
</div><?php /**PATH /home/u603013329/domains/viharr.com/public_html/themes/BC/Hotel/Views/frontend/layouts/search/fields/location.blade.php ENDPATH**/ ?>