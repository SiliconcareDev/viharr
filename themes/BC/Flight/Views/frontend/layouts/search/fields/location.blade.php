<?php
if (empty($inputName)) {
	$inputName = 'location_id';
}
?>
<div class="form-group">
	<i class="field-icon icofont-paper-plane"></i>
	<div class="form-content">
		<label>{{ $field['title'] ?? "" }}</label>
		<?php
		$location_name = "";
		$list_json = [];
		$traverse = function ($locations, $prefix = '') use (&$traverse, &$list_json, &$location_name, $inputName) {
			foreach ($locations as $location) {
				$translate = $location->translate();
				if (Request::query($inputName) == $location->id) {
					$location_name = $translate->name;
				}
				$list_json[] = [
					'id'    => $location->id,
					'title' => $prefix . ' ' . $translate->name,
				];
				$traverse($location->children, $prefix . '-');
			}
		};
		$traverse($list_location);
		?>
		<div class="smart-search">
			<input type="text" class="smart-search-location parent_text form-control font-size-14" placeholder="{{ __("City or Airport") }}" value="{{ $location_name }}" data-onLoad="{{ __("Loading...") }}" data-default="{{ json_encode($list_json) }}" id="smart-search-input">
			<input type="hidden" class="child_id" name="{{ $inputName }}" value="{{ Request::query($inputName) }}">
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
						// Update the hidden input value
						document.querySelector('input[name="{{ $inputName }}"]').value = selectedItem.id;
					}
				});
			});
		</script>
	</div>
</div>