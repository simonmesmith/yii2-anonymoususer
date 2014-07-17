Yii2 Anonymous User
==============
A Yii2 extension for tracking anonymous users.

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

1. Run /data/anonymoususer.sql to set up the required table. Note that it currently creates the table with a tbl_ prefix. Also note that I've yet to experiment with Yii2 migrations for setting up database objects, hence why this just uses a .sql file. 
2. Add the following to your main.php configuration file:
```
    'components' => [
		...
	    'anonymousUser' => [
	        'class' => 'simonmesmith\anonymoususer\AnonymousUserComponent',
	    ],
		...
```
3. Use the component when you need to track an anonymous user as follows:
``` 
    Yii::$app->anonymousUser->id
```