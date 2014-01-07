<?php

/**
 * GoogleMap
 *
 * @category   HTML/UI
 * @package    GoogleMap
 * @author     Mahdi Maghrooni - <maghrooni@gmail.com>
 * @Website    <http://Maghrooni.ir>
 * @license    MIT License <http://www.opensource.org/licenses/mit>
 *
 */
// Autoload GoogleMap Bundle
Autoloader::map(
        array('googlemap' => Bundle::path('googlemap') . 'src' . DS . 'googlemap.php')
);