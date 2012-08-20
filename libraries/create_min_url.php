<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Creates a google minify url.
 *
 * @license		http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @author		Mike Funk
 * @link		http://mikefunk.com
 * @email		mike@mikefunk.com
 *
 * @file		create_min_url.php
 * @version		1.0.0
 * @date		8/16/12
 */

// --------------------------------------------------------------------------

class create_min_url
{
	// --------------------------------------------------------------------------
	
	/**
	 * codeigniter superobject
	 * 
	 * @var object
	 * @access private
	 */
	private $_ci;
	
	// --------------------------------------------------------------------------
	
	/**
	 * holds the total return string.
	 * 
	 * (default value: '')
	 * 
	 * @var string
	 * @access private
	 */
	private $_return = '';
	
	// --------------------------------------------------------------------------
	
	/**
	 * load resources.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		$this->_ci =& get_instance();
		$this->_ci->config->load('create_min_url');
	}
	
	// --------------------------------------------------------------------------
	
	/**
	 * assemble css url.
	 * 
	 * @access public
	 * @param mixed $styles either an array or a string of css filenames.
	 * @param string $css_path (default: '') an optional full path to the css dir.
	 * @return string the complete path
	 */
	public function css($styles, $css_path = '')
	{
		$this->_ci->load->helper('url');
		
		// convert string to array, check for empty array
		if (gettype($styles) == 'string')
		{
			$styles = array($styles);
		}
		
		if (empty($styles))
		{
			return false;
		}
		
		$return = '<link type="text/css" rel="stylesheet" href="';
		
		// use config css path or passed one
		$css_path = ($css_path == '' ? $this->_ci->config->item('css_path') : $css_path);
		
		// set base url
		$return .= base_url() . $this->_ci->config->item('min_path');
		
		// set directory portion
		if (count($styles) > 1)
		{
			$return .= 'b=' . preg_replace('/\/$/', '', $css_path) . '&f=';
		}
		else
		{
			$return .= 'f=' . $css_path;
		}
		
		// loop through styles
		$i = 0;
		foreach ($styles as $item)
		{
			$i++;
			
			// comma separate multiples
			$post = ',';
			if ($i == count($styles) || count($styles) == 1)
			{
				$post = '';
			}
			
			// assemble return
			$return .= $item . $post;
		}
		
		$return .= '" />';
		
		return $return;
	}
	
	// --------------------------------------------------------------------------
	
	/**
	 * assemble js url.
	 * 
	 * @access public
	 * @param mixed $styles either an array or a string of js filenames.
	 * @param string $js_path (default: '') an optional full path to the js dir.
	 * @return string the complete path
	 */
	public function js($styles, $js_path = '')
	{
		$this->_ci->load->helper('url');
		
		// convert string to array, check for empty array
		if (gettype($styles) == 'string')
		{
			$styles = array($styles);
		}
		
		if (empty($styles))
		{
			return false;
		}
		
		$return = '<script type="text/javascript" src="';
		
		// use config js path or passed one
		$js_path = ($js_path == '' ? $this->_ci->config->item('js_path') : $js_path);
		
		// set base url
		$return .= base_url() . $this->_ci->config->item('min_path');
		
		// set directory portion
		if (count($styles) > 1)
		{
			$return .= 'b=' . preg_replace('/\/$/', '', $js_path) . '&f=';
		}
		else
		{
			$return .= 'f=' . $js_path;
		}
		
		// loop through styles
		$i = 0;
		foreach ($styles as $item)
		{
			$i++;
			
			// comma separate multiples
			$post = ',';
			if ($i == count($styles) || count($styles) == 1)
			{
				$post = '';
			}
			
			// assemble return
			$return .= $item . $post;
		}
		
		$return .= '"></script>';
		
		return $return;
	}
	
	// --------------------------------------------------------------------------
}
/* End of file create_min_url.php */
/* Location: create_min_url/libraries/create_min_url.php */