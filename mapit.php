<?php
/* 
 * THIS FILE WAS AUTOMATICALLY GENERATED BY ./rabxtophp.pl, DO NOT EDIT DIRECTLY
 * 
 * mapit.php:
 * Client interface for MaPit
 *
 * Copyright (c) 2005 UK Citizens Online Democracy. All rights reserved.
 * WWW: http://www.mysociety.org
 *
 * $Id: mapit.php,v 1.38 2006-03-09 16:17:42 francis Exp $
 *
 */

require_once('rabx.php');

/* mapit_get_error R
 * Return FALSE if R indicates success, or an error string otherwise. */
function mapit_get_error($e) {
    if (!rabx_is_error($e))
        return FALSE;
    else
        return $e->text;
}

/* mapit_check_error R
 * If R indicates failure, displays error message and stops procesing. */
function mapit_check_error($data) {
    if ($error_message = mapit_get_error($data))
        err($error_message);
}

$mapit_client = new RABX_Client(OPTION_MAPIT_URL);

define('MAPIT_BAD_POSTCODE', 2001);        /*    String is not in the correct format for a postcode.  */
define('MAPIT_POSTCODE_NOT_FOUND', 2002);        /*    The postcode was not found in the database.  */
define('MAPIT_AREA_NOT_FOUND', 2003);        /*    The area ID refers to a non-existent area.  */

/* mapit_get_generation

  Return current MaPit data generation. */
function mapit_get_generation() {
    global $mapit_client;
    $params = func_get_args();
    $result = $mapit_client->call('MaPit.get_generation', $params);
    return $result;
}

/* mapit_get_voting_areas POSTCODE

  Return voting area IDs for POSTCODE. */
function mapit_get_voting_areas($postcode) {
    global $mapit_client;
    $params = func_get_args();
    $result = $mapit_client->call('MaPit.get_voting_areas', $params);
    return $result;
}

/* mapit_get_voting_area_info AREA

  Return information about the given voting area. Return value is a
  reference to a hash containing elements,

  * type

    OS-style 3-letter type code, e.g. "CED" for county electoral division;

  * name

    name of voting area;

  * parent_area_id

    (if present) the ID of the enclosing area.

  * area_id

    the ID of the area itself */
function mapit_get_voting_area_info($area) {
    global $mapit_client;
    $params = func_get_args();
    $result = $mapit_client->call('MaPit.get_voting_area_info', $params);
    return $result;
}

/* mapit_get_voting_areas_info ARY */
function mapit_get_voting_areas_info($ary) {
    global $mapit_client;
    $params = func_get_args();
    $result = $mapit_client->call('MaPit.get_voting_areas_info', $params);
    return $result;
}

/* mapit_get_areas_by_type TYPE [ALL]

  Returns an array of ids of all the voting areas of type TYPE. TYPE is the
  three letter code such as WMC. By default only gets active areas in
  current generation, if ALL is true then gets all areas for all
  generations. */
function mapit_get_areas_by_type($type, $all = null) {
    global $mapit_client;
    $params = func_get_args();
    $result = $mapit_client->call('MaPit.get_areas_by_type', $params);
    return $result;
}

/* mapit_get_example_postcode ID

  Given an area ID, returns one postcode that maps to it. */
function mapit_get_example_postcode($id) {
    global $mapit_client;
    $params = func_get_args();
    $result = $mapit_client->call('MaPit.get_example_postcode', $params);
    return $result;
}

/* mapit_get_voting_area_children ID */
function mapit_get_voting_area_children($id) {
    global $mapit_client;
    $params = func_get_args();
    $result = $mapit_client->call('MaPit.get_voting_area_children', $params);
    return $result;
}

/* mapit_get_location POSTCODE [PARTIAL]

  Return the location of the given POSTCODE. The return value is a
  reference to a hash containing elements. If PARTIAL is present set to 1,
  will use only the first part of the postcode, and generate the mean
  coordinate. If PARTIAL is set POSTCODE can optionally be just the first
  part of the postcode.

  * coordsyst

  * easting

  * northing

    Coordinates of the point in a UTM coordinate system. The coordinate
    system is identified by the coordsyst element, which is "G" for OSGB
    (the Ordnance Survey "National Grid" for Great Britain) or "I" for the
    Irish Grid (used in the island of Ireland).

  * wgs84_lat

  * wgs84_lon

    Latitude and longitude in the WGS84 coordinate system, expressed as
    decimal degrees, north- and east-positive. */
function mapit_get_location($postcode, $partial = null) {
    global $mapit_client;
    $params = func_get_args();
    $result = $mapit_client->call('MaPit.get_location', $params);
    return $result;
}

/* mapit_admin_get_stats

  Returns a hash of statistics about the database. */
function mapit_admin_get_stats() {
    global $mapit_client;
    $params = func_get_args();
    $result = $mapit_client->call('MaPit.admin_get_stats', $params);
    return $result;
}


?>
