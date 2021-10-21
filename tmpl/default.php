<?php
/**
 * @package     mod_spgooglemap
 * 
 * @author      SymphonyTheme <info@symphonytheme.com>
 * @copyright   Copyright (C) 2021 SymphonyTheme. All rights reserved
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @link        www.symphonytheme.com
 */
//$app  = Factory::getApplication();
// No direct access to this file
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Language\Text;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Helper\ModuleHelper;

HTMLHelper::_('jquery.framework');
$doc = Factory::getDocument();
$modPath = Uri::root(true).'/modules/'.$module->module;
$doc->addStylesheet( $modPath.'/assets/css/odesign.css' );
$doc->addScript( $modPath.'/assets/js/odesign.js' );
echo 'Saikot2021';
?>

<!--====== Main Map Area =====-->
<div class="sp-map-area">

  <!--====== Map Inner =====-->
    <div class="sp-map-inner" style="width: <?php echo $params->get('map_width','100%'); ?>; height: <?php echo $params->get('map_height','100%'); ?>;">

    <?php /*
    <style type="text/css">
		#map {
			height: 100%;
		}
		#firstHeading {
			padding: 0;
			margin: 0 0 8px;
			font-size: 16px;
			line-height: 120%;
			text-align: center;
			font-weight: bold;
		}
		#bodyContent {
			text-align: center;
			font-size: 14px;
		}
		#bodyContent p {
			font-size: 14px;
      line-height: 140%;
			text-align: center;
		}
		#content {
    		padding: 6px 0px 6px 6px;
		}
    </style>

      <div id="map"></div>
      <script>
        function initMap() {
          var latlng = {lat: <?php echo $params->get('map_lat',25.306696); ?>, lng: <?php echo $params->get('map_lng',51.483189); ?>};
          var map = new google.maps.Map(document.getElementById('map'), {
            zoom: <?php echo $params->get('map_zoom',14); ?>,
            center: latlng,
            disableDefaultUI: <?php echo $params->get('map_control',0); ?>,
          });

          var contentString = '<div id="content"><div id="siteNotice"></div><h1 id="firstHeading" class="firstHeading"><?php echo $params->get('map_title','Google Map-Marker Address Title'); ?></h1><div id="bodyContent"><p><?php echo $params->get('map_content','Google map-marker address line 1 <br/>Google map-marker address line 2'); ?></p></div></div>';
          contentString = contentString.replace("'","");
          var infowindow = new google.maps.InfoWindow({
            content: contentString
          });
          var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            title: '<?php echo $params->get('map_title','Google Map-Marker Address Title'); ?>'
          });
          <?php if ($params->get('infowindow') == 1): ?>
            marker.addListener('click', function() {
              infowindow.open(map, marker);
            });
          <?php elseif ($params->get('infowindow') == 2): ?>
            marker.addListener('mouseover', function() {
              infowindow.open(map, marker);
            });
          <?php elseif ($params->get('infowindow') == 3): ?>
            infowindow.open(map, marker);
          <?php else: ?>
          <?php endif; ?>
        }
      </script>
    */ ?>



      <script>
      let map;

      function initMap() {
        // Create the map with no initial style specified.
        // It therefore has default styling.
        var centerLatng = { lat: 37.3778479, lng: -121.9830762 };
        var latlng1 = { lat: 37.3366743, lng: -121.8911703 };
        var latlng2 = { lat: 37.3878304, lng: -122.0729958 };
        map = new google.maps.Map(document.getElementById("map"), {
          center: centerLatng,
          zoom: 13,
          mapTypeControl: false,
        });

        var contentString1 = '<div id="content"><div id="siteNotice"></div><h1 id="firstHeading" class="firstHeading">San Jose</h1><div id="bodyContent"><p>San Jose Description</p><img src="https://www.liligo.es/magazine-viajes/wp-content/uploads/sites/43/2019/10/san-jose_california-600x400.jpg" width="200" alt="" /></div></div>';
        contentString1 = contentString1.replace("'","");
        var infowindow1 = new google.maps.InfoWindow({
          content: contentString1
        });
        var marker1 = new google.maps.Marker({
          position: latlng1,
          map: map,
          title: 'San Jose'
        });

        infowindow1.open(map, marker1);

        var contentString2 = '<div id="content"><div id="siteNotice"></div><h1 id="firstHeading" class="firstHeading">Silicon Valley</h1><div id="bodyContent"><p>Silicon Valley Description</p><iframe width="200" height="112" src="https://www.youtube.com/embed/r44RKWyfcFw?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="true"></iframe></div></div>';
        contentString2 = contentString2.replace("'","");
        var infowindow2 = new google.maps.InfoWindow({
          content: contentString2
        });
        var marker2 = new google.maps.Marker({
          position: latlng2,
          map: map,
          title: 'Silicon Valley'
        });

        infowindow2.open(map, marker2);

        // marker.addListener('click', function() {
        //   infowindow.open(map, marker);
        // });
        // marker.addListener('mouseover', function() {
        //   infowindow.open(map, marker);
        // });
        //infowindow.open(map, marker);


        // Add a style-selector control to the map.
        const styleControl = document.getElementById("style-selector-control");

        map.controls[google.maps.ControlPosition.TOP_LEFT].push(styleControl);

        // Set the map's style to the initial value of the selector.
        const styleSelector = document.getElementById("style-selector");

        map.setOptions({ styles: styles[styleSelector.value] });
        // Apply new JSON when the user selects a different style.
        styleSelector.addEventListener("change", () => {
          map.setOptions({ styles: styles[styleSelector.value] });
        });
      }

      const styles = {
        default: [],
        silver: [
          {
            elementType: "geometry",
            stylers: [{ color: "#f5f5f5" }],
          },
          {
            elementType: "labels.icon",
            stylers: [{ visibility: "off" }],
          },
          {
            elementType: "labels.text.fill",
            stylers: [{ color: "#616161" }],
          },
          {
            elementType: "labels.text.stroke",
            stylers: [{ color: "#f5f5f5" }],
          },
          {
            featureType: "administrative.land_parcel",
            elementType: "labels.text.fill",
            stylers: [{ color: "#bdbdbd" }],
          },
          {
            featureType: "poi",
            elementType: "geometry",
            stylers: [{ color: "#eeeeee" }],
          },
          {
            featureType: "poi",
            elementType: "labels.text.fill",
            stylers: [{ color: "#757575" }],
          },
          {
            featureType: "poi.park",
            elementType: "geometry",
            stylers: [{ color: "#e5e5e5" }],
          },
          {
            featureType: "poi.park",
            elementType: "labels.text.fill",
            stylers: [{ color: "#9e9e9e" }],
          },
          {
            featureType: "road",
            elementType: "geometry",
            stylers: [{ color: "#ffffff" }],
          },
          {
            featureType: "road.arterial",
            elementType: "labels.text.fill",
            stylers: [{ color: "#757575" }],
          },
          {
            featureType: "road.highway",
            elementType: "geometry",
            stylers: [{ color: "#dadada" }],
          },
          {
            featureType: "road.highway",
            elementType: "labels.text.fill",
            stylers: [{ color: "#616161" }],
          },
          {
            featureType: "road.local",
            elementType: "labels.text.fill",
            stylers: [{ color: "#9e9e9e" }],
          },
          {
            featureType: "transit.line",
            elementType: "geometry",
            stylers: [{ color: "#e5e5e5" }],
          },
          {
            featureType: "transit.station",
            elementType: "geometry",
            stylers: [{ color: "#eeeeee" }],
          },
          {
            featureType: "water",
            elementType: "geometry",
            stylers: [{ color: "#c9c9c9" }],
          },
          {
            featureType: "water",
            elementType: "labels.text.fill",
            stylers: [{ color: "#9e9e9e" }],
          },
        ],
        night: [
          { elementType: "geometry", stylers: [{ color: "#242f3e" }] },
          { elementType: "labels.text.stroke", stylers: [{ color: "#242f3e" }] },
          { elementType: "labels.text.fill", stylers: [{ color: "#746855" }] },
          {
            featureType: "administrative.locality",
            elementType: "labels.text.fill",
            stylers: [{ color: "#d59563" }],
          },
          {
            featureType: "poi",
            elementType: "labels.text.fill",
            stylers: [{ color: "#d59563" }],
          },
          {
            featureType: "poi.park",
            elementType: "geometry",
            stylers: [{ color: "#263c3f" }],
          },
          {
            featureType: "poi.park",
            elementType: "labels.text.fill",
            stylers: [{ color: "#6b9a76" }],
          },
          {
            featureType: "road",
            elementType: "geometry",
            stylers: [{ color: "#38414e" }],
          },
          {
            featureType: "road",
            elementType: "geometry.stroke",
            stylers: [{ color: "#212a37" }],
          },
          {
            featureType: "road",
            elementType: "labels.text.fill",
            stylers: [{ color: "#9ca5b3" }],
          },
          {
            featureType: "road.highway",
            elementType: "geometry",
            stylers: [{ color: "#746855" }],
          },
          {
            featureType: "road.highway",
            elementType: "geometry.stroke",
            stylers: [{ color: "#1f2835" }],
          },
          {
            featureType: "road.highway",
            elementType: "labels.text.fill",
            stylers: [{ color: "#f3d19c" }],
          },
          {
            featureType: "transit",
            elementType: "geometry",
            stylers: [{ color: "#2f3948" }],
          },
          {
            featureType: "transit.station",
            elementType: "labels.text.fill",
            stylers: [{ color: "#d59563" }],
          },
          {
            featureType: "water",
            elementType: "geometry",
            stylers: [{ color: "#17263c" }],
          },
          {
            featureType: "water",
            elementType: "labels.text.fill",
            stylers: [{ color: "#515c6d" }],
          },
          {
            featureType: "water",
            elementType: "labels.text.stroke",
            stylers: [{ color: "#17263c" }],
          },
        ],
        retro: [
          { elementType: "geometry", stylers: [{ color: "#ebe3cd" }] },
          { elementType: "labels.text.fill", stylers: [{ color: "#523735" }] },
          { elementType: "labels.text.stroke", stylers: [{ color: "#f5f1e6" }] },
          {
            featureType: "administrative",
            elementType: "geometry.stroke",
            stylers: [{ color: "#c9b2a6" }],
          },
          {
            featureType: "administrative.land_parcel",
            elementType: "geometry.stroke",
            stylers: [{ color: "#dcd2be" }],
          },
          {
            featureType: "administrative.land_parcel",
            elementType: "labels.text.fill",
            stylers: [{ color: "#ae9e90" }],
          },
          {
            featureType: "landscape.natural",
            elementType: "geometry",
            stylers: [{ color: "#dfd2ae" }],
          },
          {
            featureType: "poi",
            elementType: "geometry",
            stylers: [{ color: "#dfd2ae" }],
          },
          {
            featureType: "poi",
            elementType: "labels.text.fill",
            stylers: [{ color: "#93817c" }],
          },
          {
            featureType: "poi.park",
            elementType: "geometry.fill",
            stylers: [{ color: "#a5b076" }],
          },
          {
            featureType: "poi.park",
            elementType: "labels.text.fill",
            stylers: [{ color: "#447530" }],
          },
          {
            featureType: "road",
            elementType: "geometry",
            stylers: [{ color: "#f5f1e6" }],
          },
          {
            featureType: "road.arterial",
            elementType: "geometry",
            stylers: [{ color: "#fdfcf8" }],
          },
          {
            featureType: "road.highway",
            elementType: "geometry",
            stylers: [{ color: "#f8c967" }],
          },
          {
            featureType: "road.highway",
            elementType: "geometry.stroke",
            stylers: [{ color: "#e9bc62" }],
          },
          {
            featureType: "road.highway.controlled_access",
            elementType: "geometry",
            stylers: [{ color: "#e98d58" }],
          },
          {
            featureType: "road.highway.controlled_access",
            elementType: "geometry.stroke",
            stylers: [{ color: "#db8555" }],
          },
          {
            featureType: "road.local",
            elementType: "labels.text.fill",
            stylers: [{ color: "#806b63" }],
          },
          {
            featureType: "transit.line",
            elementType: "geometry",
            stylers: [{ color: "#dfd2ae" }],
          },
          {
            featureType: "transit.line",
            elementType: "labels.text.fill",
            stylers: [{ color: "#8f7d77" }],
          },
          {
            featureType: "transit.line",
            elementType: "labels.text.stroke",
            stylers: [{ color: "#ebe3cd" }],
          },
          {
            featureType: "transit.station",
            elementType: "geometry",
            stylers: [{ color: "#dfd2ae" }],
          },
          {
            featureType: "water",
            elementType: "geometry.fill",
            stylers: [{ color: "#b9d3c2" }],
          },
          {
            featureType: "water",
            elementType: "labels.text.fill",
            stylers: [{ color: "#92998d" }],
          },
        ],
        hiding: [
          {
            featureType: "poi.business",
            stylers: [{ visibility: "off" }],
          },
          {
            featureType: "transit",
            elementType: "labels.icon",
            stylers: [{ visibility: "off" }],
          },
        ],
      };
      </script>


      <div id="style-selector-control" class="map-control">
        <select id="style-selector" class="selector-control">
          <option value="default">Default</option>
          <option value="silver">Silver</option>
          <option value="night">Night mode</option>
          <option value="retro" selected="selected">Retro</option>
          <option value="hiding">Hide features</option>
        </select>
      </div>

      <div id="map"></div>


      <!-- Async script executes immediately and must be after any DOM elements used in callback. -->

      <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $params->get('map_api_key','AIzaSyD8zknQ6Em-uGyrCM42Zt8oc3_z-NFM3tg'); ?>&callback=initMap&v=weekly" async></script>



    </div>
    <!--====== End Map Inner =====-->

</div>
<!--====== End Main Map Area =====-->