GoogleMap
=======

GoogleMap is a laravel bundle that helps you Show a Google Map with Given Options ASAP !


###Steps are simple ! 

- download and install it ! 
- set your API key and other default options on ``` Config ``` file
- use it ;)

## Installation

You can install this bundle by running the following CLI command:

```php
php artisan bundle:install googlemap
```
or 
You Can Download the files and put them in your Bundles Directory

Add the following line to application/bundles.php

```php
'googlemap' => array('auto' => true),
```

##Usage
in your View files , you can Show a Google Map with coordinates just like the examples below : 

###Quick Map : 

```php
googlemap::show(array(
            'lat' => '27.274161',
            'lng' => '51.698364',
        ));
```

###Map with Options : 
you can set any options you find in ``` Config ``` file !

```php
googlemap::show(array(
            'lat' => '27.274161',
            'lng' => '51.698364',
			      'key' => 'Your API KEY HERE',
			      'content'=>'Text you want to show on the Marker',
			      'zoom'=>'10',
        ));
```
[Visit My Website]
[Visit My Website]: http://www.maghrooni.ir
