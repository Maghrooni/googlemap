<?php

/**
 * GoogleMap - Show Google Map On Your Page ASAP !
 *
 * @category   HTML/UI
 * @package    GoogleMap
 * @author     Mahdi Maghrooni - <maghrooni@gmail.com>
 * @Website    <http://Maghrooni.ir>
 * @license    MIT License <http://www.opensource.org/licenses/mit>
 *
 */
class googlemap {

    protected static $config;

    protected static function load_configs($input) {
        static::$config = \Config::get('googlemap::config');

        foreach (static::$config as $key => $value) {
            if (isset($input[$key])) {
                //user sets the option ! 
            } else {
                //use default values
                $input[$key] = $value;
            }
        }
        return $input;
    }

    public static function show($input = array('lat' => '1', 'lng' => '1')) {
        $options = static::load_configs($input);
        echo <<<THIS
            <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key={$options['key']}&amp;sensor={$options['sensor']}"></script>
			<script>
var myCenter=new google.maps.LatLng({$options['lat']},{$options['lng']});

function initialize()
{
var mapProp = {
  center: myCenter,
  zoom:{$options['zoom']},
  mapTypeId: google.maps.MapTypeId.ROADMAP
  };

var map = new google.maps.Map(document.getElementById("{$options['id']}"),mapProp);

var marker = new google.maps.Marker({
  position: myCenter,
  animation:google.maps.Animation.BOUNCE
  });

marker.setMap(map);
var infowindow = new google.maps.InfoWindow({
  content:"{$options['content']}"
  });

infowindow.open(map,marker);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div id="{$options['id']}" class="{$options['class']}" style="width: {$options['width']};height: {$options['height']};"></div>

THIS;
    }

}

?>