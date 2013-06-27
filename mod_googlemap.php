<?php
/*
 * Google Maps module
 * (C) 2013 e-motion design
 */

// no direct access
defined('_JEXEC') or die;

// Output stuff
$map_width = $params->get('map_width', "100%");
$map_height = $params->get('map_height', "400px");
$moduleclass_sfx = $params->get('moduleclass_sfx', "");

// Location Options
$map_zoom = $params->get('map_zoom', "15");
$centre_lat = $params->get('centre_lat', "-34.423431");
$centre_lng = $params->get('centre_lng', "150.894291");
$use_pin = $params->get('use_pin', 1);
$pin_lat = $params->get('pin_lat', "-34.423431");
$pin_lng = $params->get('pin_lng', "150.894291");

// Map Features
$map_type = $params->get('map_type', "ROADMAP");
$draggable = $params->get('draggable', 1);
$scrollwheel = $params->get('scrollwheel', 1);
$pan_control = $params->get('pan_control', 1);
$pan_control_position = $params->get('pan_control_position', "TOP_LEFT");
$zoom_control = $params->get('zoom_control', 1);
$zoom_control_position = $params->get('zoom_control_position', "TOP_LEFT");
$zoom_control_style = $params->get('zoom_control_style', "DEFAULT");
$streetview_control = $params->get('streetview_control', 1);
$streetview_control_position = $params->get('streetview_control_position') == "UNDEFINED" ? "" : $params->get('streetview_control_position', "");
$maptype_control = $params->get('maptype_control', 1);
$maptype_control_position = $params->get('maptype_control_position', "TOP_RIGHT");
$maptype_control_style = $params->get('maptype_control_style', "DEFAULT");
$use_styles = $params->get('use_styles', 0);
$styles = $params->get('styles', "");


require JModuleHelper::getLayoutPath('mod_google_map', $params->get('layout', 'default'));

?>