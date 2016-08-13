<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter URL Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/helpers/url_helper.html
 */

// ------------------------------------------------------------------------

if ( ! function_exists('site_url'))
{
	/**
	 * Site URL
	 *
	 * Create a local URL based on your basepath. Segments can be passed via the
	 * first parameter either as a string or an array.
	 *
	 * @param	string	$uri
	 * @param	string	$protocol
	 * @return	string
	 */
	function site_url($uri = '', $protocol = NULL)
	{
		return get_instance()->config->site_url($uri, $protocol);
	}
}



if ( ! function_exists('get_url_info'))
{
	function get_url_info($url = '')
	{
		$info = array('title' => '', 'icon' => '');

		$url = prep_url($url);

		$parse_info = parse_url($url);

		$ctx = stream_context_create(array(
				'http' => array(
					'timeout' => 1
				)
			)
		);
		$html = @file_get_contents($url, 0, $ctx);

		if (!empty($html)) {
			$doc = new DOMDocument();
			$doc->strictErrorChecking = FALSE;
			@$doc->loadHTML('<?xml encoding="utf-8" ?>' . $html);
			$xml = simplexml_import_dom($doc);
			$titles = $xml->xpath('//title');
			$icons = $xml->xpath('//link[@rel="shortcut icon"]');

			if ($titles) {
				$info['title'] = strval($titles[0]);
			}
			if ($icons) {
				$info['icon'] = strval($icons[0]['href']);
			}

//			var_dump($titles);
//			var_dump($icons);
		}

		if (empty($info['title'])) {
			$info['title'] = $parse_info['host'];
		}

		if (empty($info['icon'])) {
			$info['icon'] = $parse_info['scheme'] . '://' . $parse_info['host'] . '/favicon.ico';
		}

		return $info;
	}
}
