
Permalink Fix &amp; Disable Canonical Redirects
==============================================

Use: WordPress Plugin  
Contributors: Chris Cheney, Nick Schalk, Michael Szczepanski  
Plugin Name: XO Permalink Fix & Disable Canonical Redirects Pack  
Plugin URI: http://www.g0tweb.com/request_uri  
Tags: 500 server error parsing error, ashurbanipal, canonical redirection, cnchost, concentric, endless loop, endless redirection, home page loop, htaccess, permalinks, xo communications, xohost, concentric  
Author URI: http://www.g0tweb.com/request_uri  
Author: Chris Cheney  
Requires at least: 2.3  
Tested up to: 3.1  
Stable tag: 1.0.3  
Version: 1.0.3  
License: GPLv2  

This plugin makes WordPress' default permalinks behavior work on the Concentric/XO Communications shared hosting platform. It also disables the canonical redirection feature as it causes an endless redirection loop outside of wp-admin. This plugin also appears to resolve an issue with the recent release of WordPress 3.1 and IIS servers.

Description
-----------
This plugin ensures the REQUEST_URI variable is set during the initialization of WordPress, allowing permalinks to work correctly.


Installation
------------

The REQUEST_URI variable is not set correctly by the server platform.  
This plugin builds each variation of REQUEST_URI by peicing together other available variables.  

1. Upload the 'permalink-fix-disable-canonical-redirects-pack' folder to the 'wp-content/plugins/' directory.
2. Log into the WordPress dashboard http://example.com/wp-admin and activate the plugin.
3. Setup your .htaccess file as described below, this is the most important step.
4. _Make sure the .htaccess file is setup properly._ The server requires that you convert end of line characters to UNIX format (LF). Be sure to add a hard return after the last directive. See additional-instructions.rtf for a step-by-step.

    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^(.*)$ index.php?q=$1 [L,QSA]
    
5. If for some reason you're using this plugin _outside_ of the Concentric/XO shared hosting enviroment (assuming Apache) use the following .htaccess rules:

    `<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php?q=$1 [L,QSA]
    </IfModule>`

Changelog
---------

### 1.0.3
02/28/2011 Minor description & support URL tweaks.

### 1.0.2
02/17/2011 Fixed broken author support links. Added a description about canonical redirection.

### 1.0.1
01/07/2011 Added detailed instructions for users downloading the file directly instead of through the wp-admin interface. Added htaccess file example.

### 1.0
Final Release - 12/16/2010 Merging of the required disable canonical redirection plugin by Mark Jaquith

### 0.9b
Plugin Development - 12/06/2010 Script was wrapped into a WordPress Plugin for future proofing and ease of use contributed by Nick Schalk

### 0.5a
Internal Release - 03/20/2010 Initial REQUEST_URI script written