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
 * @version		1.1.0
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
	 * @param mixed $paths either an array or a string of css filenames.
	 * @return string the complete path
	 */
	public function css($paths)
	{
		$return = '<link type="text/css" rel="stylesheet" href="';
		$return .= $this->_create_url($paths);
		$return .= '" />';
		return $return;
	}
	
	// --------------------------------------------------------------------------
	
	/**
	 * assemble js url.
	 * 
	 * @access public
	 * @param mixed $paths either an array or a string of js filenames.
	 * @return string the complete path
	 */
	public function js($paths)
	{
		$return = '<script type="text/javascript" src="';
		$return .= $this->_create_url($paths);
		$return .= '"></script>';
		return $return;
	}
	
	// --------------------------------------------------------------------------
	
	/**
	 * return a finished google minify url.
	 * 
	 * @access private
	 * @param mixed $paths can be an array or string
	 * @return string
	 */
	private function _create_url($paths)
	{
		$this->_ci->load->helper('url');
		
		// convert string to array, check for empty array
		if (gettype($paths) == 'string')
		{
			$paths = array($paths);
		}
		
		if (empty($paths))
		{
			return false;
		}
		
		// set base url
		$return .= base_url() . $this->_ci->config->item('min_path') . '?f=';
		
		// loop through paths
		foreach ($paths as $item)
		{	
			// assemble return
			$return .= $item . ',';
		}
		
		// trim last comma
		$return = substr($return, 0, -1);
		
		return $return;
	}
	
	// --------------------------------------------------------------------------
}
/* End of file create_min_url.php */
/* Location: create_min_url/libraries/create_min_url.php */