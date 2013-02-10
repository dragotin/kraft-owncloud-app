<?php

/**
* ownCloud - Kraft Application
*
* @author Klaas Freitag
* @copyright 2013 Klaas Freitag <freitag@owncloud.com>
* 
* This library is free software; you can redistribute it and/or
* modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
* License as published by the Free Software Foundation; either 
* version 3 of the License, or any later version.
* 
* This library is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU AFFERO GENERAL PUBLIC LICENSE for more details.
*  
* You should have received a copy of the GNU Affero General Public 
* License along with this library.  If not, see <http://www.gnu.org/licenses/>.
* 
*/

// Check if we are a user
OCP\User::checkLoggedIn();

$somesetting = OCP\Config::getSystemValue( "somesetting", '' );
OCP\App::setActiveNavigationEntry( 'kraft' );

$kraft_doc_path = "/Kraft";

$tmpl = new OCP\Template( 'kraft', 'main', 'user' );

$files = \OC\Files\Filesystem::getDirectoryContent($kraft_doc_path);

$kraft_docs = array();
foreach( $files as $file ) {
    # $url = $cache->getId( $kraft_doc_path . '/' . $file['name'] );
    # $entry = array('url' => $url, 'name' => $file['name'] );
    $kraft_docs[] = $kraft_docs;
}
    
$tmpl->assign( 'kraft_doc_path', $kraft_doc_path);
$tmpl->assign( 'docs', $kraft_docs );

$tmpl->printPage();
