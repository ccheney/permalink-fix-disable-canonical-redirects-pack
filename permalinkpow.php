<?php
/*
Copyright (C) 2010  Chris Cheney

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

/*
Plugin Name: Permalink Fix & Disable Canonical Redirects Pack
Plugin Author: Nick Schalk & Chris Cheney
Plugin URI: http://www.g0tweb.com/request_uri
Version: 1.0
Description: For WordPress installations residing on Concentric/XO Communications shared hosting platform only. This plugin enables WordPress' Permalink functionality & disables the canonical redirect feature. Remember to select your custom permalink setting in the dashboard. Disable canonical redirect snippet by Mark Jaquith. This plugin also appears to resolve an issue with the recent release of WordPress 3.1 and IIS servers.

Your .htaccess file should look like this (Add a hard return after the last directive. End of line conversion needs to be in UNIX format.):

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ index.php?q=$1 [L,QSA]

*/
add_action('init', 'requesturipow_init');
function requesturipow_init() {
		{
		if(isset($_REQUEST['q'])) {
		$_SERVER['REQUEST_URI'] = "/" . $_REQUEST["q"];
		}else{
		if (empty($_SERVER['QUERY_STRING'])) {
		$_SERVER['REQUEST_URI'] = $_SERVER['SCRIPT_NAME'];
			   } else {
		$_SERVER['REQUEST_URI'] = $_SERVER['SCRIPT_NAME'] . "?" .
		$_SERVER['QUERY_STRING'];
			   }
			 }
		}
}
	remove_filter('template_redirect', 'redirect_canonical');
?>
