<?php
/**
 * Copyright (c) 2013 Klaas Freitag <freitag@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

// Init owncloud
OCP\JSON::checkLoggedIn();
OCP\JSON::checkAppEnabled('kraft');

$path = array('doc_path' => 'foobar');

OCP\JSON::encodedPrint($path);