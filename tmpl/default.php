<?php
/*
 * Google Maps module - layout
 * © 2013 e-motion design
 * dev@e-motion.com.au
 * www.e-motion.com.au
 */

// No direct access.
defined('_JEXEC') or die;

$doc = JFactory::getDocument();
$doc->addScript('http://maps.google.com/maps/api/js?sensor=false');

?>
<div id="map_canvas" class="<?=$moduleclass_sfx?>" style="height: <?=$map_height?>; width: <?=$map_width?>;"></div>

<script type="text/javascript">

// Map variables
var centre = new google.maps.LatLng(<?=$centre_lat?>, <?=$centre_lng?>);
var pin = new google.maps.LatLng(<?=$pin_lat?>, <?=$pin_lng?>);
var map;

function initialize() {
	var mapOptions = {
		zoom: <?=$map_zoom?>,
		center: centre,
		mapTypeId: google.maps.MapTypeId.<?=$map_type?>,
		draggable: <?=$draggable?>,
		scrollwheel: <?=$scrollwheel?>,
		panControl: <?=$pan_control?>,
		<?php if ($pan_control) : ?>
		panControlOptions: {
            position: google.maps.ControlPosition.<?=$pan_control_position?>
        },
		<?php endif; ?>
		zoomControl: <?=$zoom_control?>,
		<?php if ($zoom_control) : ?>
		zoomControlOptions: {
			position: google.maps.ControlPosition.<?=$zoom_control_position?>,
			style: google.maps.ZoomControlStyle.<?=$zoom_control_style?>
        },
		<?php endif; ?>
		streetViewControl: <?=$streetview_control?>,
		<?php if ($streetview_control && $streetview_control_position != "") : ?>
		streetViewControlOptions: {
            position: google.maps.ControlPosition.<?=$streetview_control_position?>
        },
		<?php endif; ?>
		mapTypeControl: <?=$maptype_control?>,
		<?php if ($maptype_control) : ?>
		mapTypeControlOptions: {
			position: google.maps.ControlPosition.<?=$maptype_control_position?>,
			style: google.maps.MapTypeControlStyle.<?=$maptype_control_style?>
        },
		<?php endif; ?>
		<?php if ($use_styles) : ?>
		styles: <?=$styles?>
		<?php endif; ?>
	}

	map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
	map.setTilt(0);
	
	<?php if ($use_pin) : ?>
	var marker = new google.maps.Marker({
		position: pin,
		map: map,
		zIndex: 99
	});
	<?php endif; ?>
}

initialize();

// handle browser resizing nicely
function calculateCentre() {
	centre = map.getCenter();
}
google.maps.event.addDomListener(map, 'idle', function() {
	calculateCentre();
});
google.maps.event.addDomListener(window, 'resize', function() {
	map.setCenter(centre);
});
</script>
