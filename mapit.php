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
 * $Id: mapit.php,v 1.53 2007-02-01 17:32:14 francis Exp $
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

if (defined('OPTION_MAPIT_URL'))
    $mapit_client = new RABX_Client(OPTION_MAPIT_URL, 
        defined('OPTION_MAPIT_USERPWD') ? OPTION_MAPIT_USERPWD : null);

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

    the ID of the area itself

  * generation_low, generation_high, generation

    the range of generations of the area database for which this area is to
    be used and the current active generation. */
function mapit_get_voting_area_info($area) {
    global $mapit_client;
    $params = func_get_args();
    $result = $mapit_client->call('MaPit.get_voting_area_info', $params);
    return $result;
}

/* mapit_get_voting_areas_info ARY

  As get_voting_area_info, only takes an array of ids, and returns an array
  of hashes. */
function mapit_get_voting_areas_info($ary) {
    global $mapit_client;
    $params = func_get_args();
    $result = $mapit_client->call('MaPit.get_voting_areas_info', $params);
    return $result;
}

/* mapit_get_voting_area_geometry AREA [POLYGON_TYPE]

  Return geometry information about the given voting area. Return value is
  a reference to a hash containing elements. Coordinates with names ending
  _e and _n are UK National Grid eastings and northings. Coordinates ending
  _lat and _lon are WGS84 latitude and longitude.

  centre_e, centre_n, centre_lat, centre_lon - centre of bounding rectangle
  min_e, min_n, min_lat, min_lon - south-west corner of bounding rectangle
  max_e, max_n, max_lat, max_lon - north-east corner of bounding rectangle
  area - approximate surface area of the constituency, in metres squared
  (this is taken from the OS data, but roughly agrees with the polygon's
  area) parts - number of parts the polygon of the boundary has

  If POLYGON_TYPE is present, then the hash also contains a member
  'polygon'. This is an array of parts. Each part is a hash of the
  following values:

  sense - a positive value to include the part, negative to exclude (a
  hole) points - an array of pairs of (eastings, northings) if POLYGON_TYPE
  is 'ng", or (latitude, longitude) if POLYGON_TYPE is 'wgs84'.

  If for some reason any of the values above are not known, they will not
  be present in the array. For example, we currently only have data for
  Westminster constituencies in Great Britain. Northern Ireland has a
  separate Ordnance Survey, from whom we do not have the data. So for
  Northern Ireland constituencies an empty hash will be returned. */
function mapit_get_voting_area_geometry($area, $polygon_type = null) {
    global $mapit_client;
    $params = func_get_args();
    $result = $mapit_client->call('MaPit.get_voting_area_geometry', $params);
    return $result;
}

/* mapit_get_voting_areas_geometry ARY [POLYGON_TYPE]

  As get_voting_area_geometry, only takes an array of ids, and returns an
  array of hashes. */
function mapit_get_voting_areas_geometry($ary, $polygon_type = null) {
    global $mapit_client;
    $params = func_get_args();
    $result = $mapit_client->call('MaPit.get_voting_areas_geometry', $params);
    return $result;
}

/* mapit_get_voting_area_by_location LAT LON METHOD [TYPE]

  Returns an array of voting areas which the given coordinate is in. This
  only works for areas which have geometry information associated with
  them. i.e. That get_voting_area_geometry will return data for.

  METHOD can be 'box' to just use a bounding box test, or 'polygon' to also
  do an exact point in polygon test. 'box' is quicker, but will return too
  many results. 'polygon' should return at most one result for a type.

  If TYPE is present, restricts to areas of that type, such as WMC for
  Westminster Constituencies only. */
function mapit_get_voting_area_by_location($lat, $lon, $method, $type = null) {
    global $mapit_client;
    $params = func_get_args();
    $result = $mapit_client->call('MaPit.get_voting_area_by_location', $params);
    return $result;
}

/* mapit_get_voting_area_by_location_en EASTING NORTHING METHOD [TYPE(S)]

  As get_voting_area_by_location only takes coordinates in EASTINGs and
  NORTHINGs rather than latitude and longitude. */
function mapit_get_voting_area_by_location_en($easting, $northing, $method, $type(s) = null) {
    global $mapit_client;
    $params = func_get_args();
    $result = $mapit_client->call('MaPit.get_voting_area_by_location_en', $params);
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

/* mapit_get_voting_area_children ID

  Return array of ids of areas whose parent areas are ID. */
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

  Returns a hash of statistics about the database. (Bit slow as count of
  postcodes is very slow). */
function mapit_admin_get_stats() {
    global $mapit_client;
    $params = func_get_args();
    $result = $mapit_client->call('MaPit.admin_get_stats', $params);
    return $result;
}


?>
