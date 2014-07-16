Google AdSense
==============
An extension for displaying Google AdSense ads.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist simonmesmith/yii2-googleadsense "*"
```

or add

```
"simonmesmith/yii2-googleadsense": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed :

1. Add the following parameter to your params.php file to specify your AdSense client ID: 'googleAdSenseClient' => '<your client ID>'
2. Optionally, disable ads in your development environment and show a placeholder instead by adding the following parameter to your params-local.php file: 'googleAdSenseEnable' => false
3. Use the widget where you want ads as follows: 

```php <?= \\simonmesmith\googleadsense\GoogleAdSense::widget([
	'slot' => '<the ID of the ad slot>',
	'style' => '<optional style information>',
	'responsive' => '<optional value specifying whether the ad unit is responsive; defaults to false>'
]); ?>```