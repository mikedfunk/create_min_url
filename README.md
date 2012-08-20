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

	<?=$this->create_min_url->css('path/to/file_name.css')?>
	<?=$this->create_min_url->js('path/to/file_name.js')?>

Echo a combined, minified, and cached group in the view.

	<?=$this->create_min_url->css(array('path/to/test.css', 'other/path/to/test2.css'))?>
	<?=$this->create_min_url->js(array('path/to/test.js', 'other/path/to/test2.js'))?>
    
Keep in mind:

* Be sure to include the full path to each file relative from the CodeIgniter project root.

----------------------------

Changelog
----------------------------

**1.1.1**

* Fixed tiny bug in return variable

**1.1.0**

* Simplified to require entire path to file relative to CI project root. This allows for all css or all js to be minified to one file, although it makes for longer URLs.
* Removed css path, js path config variables.

**1.0.1**

* Added ```rel="stylesheet"``` to css link.
* Changed &amp; in URL to &.

**1.0.0**

* Initial Release
