create_min_url
============================

A library and config to create a url for [google minify](http://code.google.com/p/minify/).


Setup
----------------------------

1. Install Sparks at [GetSparks.org](http://getsparks.org)
2. Edit **config/create_min_url.php** with the details of your Google Minify setup. *NOTE:* All paths are relative to the base url of your project.

Usage
----------------------------

Load Spark 

    $this->load->spark('create_min_url/x.x.x');

Echo a minify URL in the view

	<?=$this->create_min_url->css('file_name.css')?>
	<?=$this->create_min_url->js('file_name.js')?>

Echo a combined, minified, and cached group in the view.

	<?=$this->create_min_url->css(array('test.css', 'test2.css'))?>
	<?=$this->create_min_url->js(array('test.js', 'test2.js'))?>
    
Ignore the default path and use your own

    <?=$this->create_min_url->css('file_name.css', '/my/custom/path/to/file/')?>
    
Keep in mind:

* Don't include the full path to your file in the first parameter. Just the file name and extension. The path is determined by the config file or overridden by a custom file path in the second parameter.
* If you have files in different folders, echo a group for each folder. For instance if you have CSS in ```assets/js/cool_slider/css/cool_slider.css``` and the rest in ```assets/css```, echo separate groups for each.


----------------------------

Changelog
----------------------------

**1.0.1**

* Added ```rel="stylesheet"``` to css link
* Changed &amp; in URL to &

**1.0.0**

* Initial Release
