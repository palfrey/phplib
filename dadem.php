<?php
/* 
 * THIS FILE WAS AUTOMATICALLY GENERATED BY ./rabxtophp.pl, DO NOT EDIT DIRECTLY
 * 
 * dadem.php:
 * Client interface for DaDem.
 *
 * Copyright (c) 2005 UK Citizens Online Democracy. All rights reserved.
 * WWW: http://www.mysociety.org
 *
 * $Id: dadem.php,v 1.54 2007-02-01 18:15:45 francis Exp $
 *
 */

require_once('rabx.php');

/* dadem_get_error R
 * Return FALSE if R indicates success, or an error string otherwise. */
function dadem_get_error($e) {
    if (!rabx_is_error($e))
        return FALSE;
    else
        return $e->text;
}

/* dadem_check_error R
 * If R indicates failure, displays error message and stops procesing. */
function dadem_check_error($data) {
    if ($error_message = dadem_get_error($data))
        err($error_message);
}

if (defined('OPTION_DADEM_URL'))
    $dadem_client = new RABX_Client(OPTION_DADEM_URL, 
        defined('OPTION_DADEM_USERPWD') ? OPTION_DADEM_USERPWD : null);

define('DADEM_UNKNOWN_AREA', 3001);        /*    Area ID refers to a non-existent area.  */
define('DADEM_REP_NOT_FOUND', 3002);        /*    Representative ID refers to a non-existent representative.  */
define('DADEM_AREA_WITHOUT_REPS', 3003);        /*    Area ID refers to an area for which no representatives are returned.  */
define('DADEM_PERSON_NOT_FOUND', 3004);        /*    Preson ID refers to a non-existent person.  */
define('DADEM_CONTACT_FAX', 101);        /*    Means of contacting representative is fax.  */
define('DADEM_CONTACT_EMAIL', 102);        /*    Means of contacting representative is email.  */

/* dadem_get_representatives ID_or_ARRAY [ALL]

  Given the ID of an area (or an ARRAY of IDs of several areas), return a
  list of the representatives returned by that area, or, for an array, a
  hash mapping area ID to a list of representatives for each; or, on
  failure, an error code. The default is to return only current
  reprenatives. If ALL has value 1, then even deleted representatives are
  returned.  */
function dadem_get_representatives($id_or_array, $all = null) {
    global $dadem_client;
    $params = func_get_args();
    $result = $dadem_client->call('DaDem.get_representatives', $params);
    return $result;
}

/* dadem_get_area_status AREA_ID

  Get the electoral status of area AREA_ID. Can be any of these: none - no
  special status pending_election - representative data invalid due to
  forthcoming election recent_election - representative data invalid
  because we haven't updated since election */
function dadem_get_area_status($area_id) {
    global $dadem_client;
    $params = func_get_args();
    $result = $dadem_client->call('DaDem.get_area_status', $params);
    return $result;
}

/* dadem_get_area_statuses

  Get the current electoral statuses. Can be any of these: none - no
  special status pending_election - representative data invalid due to
  forthcoming election recent_election - representative data invalid
  because we haven't updated since election */
function dadem_get_area_statuses() {
    global $dadem_client;
    $params = func_get_args();
    $result = $dadem_client->call('DaDem.get_area_statuses', $params);
    return $result;
}

/* dadem_search_representatives QUERY

  Given search string, returns list of the representatives whose names,
  party, email or fax contain the string (case insensitive). Returns the id
  even if the string only appeared in the history of edited
  representatives, or in deleted representatives. */
function dadem_search_representatives($query) {
    global $dadem_client;
    $params = func_get_args();
    $result = $dadem_client->call('DaDem.search_representatives', $params);
    return $result;
}

/* dadem_get_user_corrections

  Returns list of user submitted corrections to democratic data. Each entry
  in the list is a hash of data about the user submitted correction. */
function dadem_get_user_corrections() {
    global $dadem_client;
    $params = func_get_args();
    $result = $dadem_client->call('DaDem.get_user_corrections', $params);
    return $result;
}

/* dadem_get_bad_contacts

  Returns list of representatives whose contact details are bad. That is,
  listed as 'unknown', listed as 'fax' or 'email' without appropriate
  details being present, or listed as 'either'. (There's a new policy to
  discourages 'eithers' at all, as they are confusing).

  TODO: Check 'via' type as well somehow. */
function dadem_get_bad_contacts() {
    global $dadem_client;
    $params = func_get_args();
    $result = $dadem_client->call('DaDem.get_bad_contacts', $params);
    return $result;
}

/* dadem_get_representative_info ID

  Given the ID of a representative, return a reference to a hash of
  information about that representative, including:

  * type

    Three-letter OS-style code for the type of voting area (for instance,
    CED or ward) for which the representative is returned.

  * name

    The representative's name.

  * method

    How to contact the representative.

  * email

    The representative's email address (only specified if method is
    'email').

  * fax

    The representative's fax number (only specified if method is 'fax').

  or, on failure, an error code. */
function dadem_get_representative_info($id) {
    global $dadem_client;
    $params = func_get_args();
    $result = $dadem_client->call('DaDem.get_representative_info', $params);
    return $result;
}

/* dadem_get_representatives_info ARRAY

  Return a reference to a hash of information on all of the representative
  IDs given in ARRAY. */
function dadem_get_representatives_info($array) {
    global $dadem_client;
    $params = func_get_args();
    $result = $dadem_client->call('DaDem.get_representatives_info', $params);
    return $result;
}

/* dadem_get_same_person PERSON_ID

  Returns an array of representative identifiers which are known to be the
  same person as PERSON_ID. Currently, this information only covers MPs. */
function dadem_get_same_person($person_id) {
    global $dadem_client;
    $params = func_get_args();
    $result = $dadem_client->call('DaDem.get_same_person', $params);
    return $result;
}

/* dadem_store_user_correction VA_ID REP_ID CHANGE NAME PARTY NOTES EMAIL

  Records a correction to representative data made by a user on the
  website. CHANGE is either "add", "delete" or "modify". NAME and PARTY are
  new values. NOTES and EMAIL are fields the user can put extra info in. */
function dadem_store_user_correction($va_id, $rep_id, $change, $name, $party, $notes, $email) {
    global $dadem_client;
    $params = func_get_args();
    $result = $dadem_client->call('DaDem.store_user_correction', $params);
    return $result;
}

/* dadem_admin_get_stats

  Return a hash of information about the number of representatives in the
  database. The elements of the hash are,

  * representative_count

    Number of representatives in total (including deleted, out of
    generation)

  * area_count

    Number of areas for which representative information is stored. */
function dadem_admin_get_stats() {
    global $dadem_client;
    $params = func_get_args();
    $result = $dadem_client->call('DaDem.admin_get_stats', $params);
    return $result;
}

/* dadem_get_representative_history ID

  Given the ID of a representative, return an array of hashes of
  information about changes to that representative's contact info. */
function dadem_get_representative_history($id) {
    global $dadem_client;
    $params = func_get_args();
    $result = $dadem_client->call('DaDem.get_representative_history', $params);
    return $result;
}

/* dadem_get_representatives_history ID

  Given an array of ids of representatives, returns a hash from
  representative ids to an array of history of changes to that
  representative's contact info. */
function dadem_get_representatives_history($id) {
    global $dadem_client;
    $params = func_get_args();
    $result = $dadem_client->call('DaDem.get_representatives_history', $params);
    return $result;
}

/* dadem_admin_edit_representative ID DETAILS EDITOR NOTE

  Alters data for a representative, updating the override table
  representative_edited. ID contains the representative id, or undefined to
  make a new one (in which case DETAILS needs to contain area_id and
  area_type). DETAILS is a hash from name, party, method, email and fax to
  their new values, or DETAILS is not defined to delete the representative.
  Every value has to be present - or else values are reset to their initial
  ones when import first happened. Any modification counts as an
  undeletion. EDITOR is the name of the person who edited the data. NOTE is
  any explanation of why / where from. Returns ID, or if ID was undefined
  the new id. */
function dadem_admin_edit_representative($id, $details, $editor, $note) {
    global $dadem_client;
    $params = func_get_args();
    $result = $dadem_client->call('DaDem.admin_edit_representative', $params);
    return $result;
}

/* dadem_admin_done_user_correction ID

  Marks user correction ID as having been dealt with. */
function dadem_admin_done_user_correction($id) {
    global $dadem_client;
    $params = func_get_args();
    $result = $dadem_client->call('DaDem.admin_done_user_correction', $params);
    return $result;
}

/* dadem_admin_mark_failing_contact ID METHOD X EDITOR COMMENT

  Report that a delivery to representative ID by METHOD ('email' or 'fax')
  to the number or address X failed. Marks the representative as having
  unknown contact details if X is still the current contact method for that
  representative. EDITOR is the name of the entity making the correction
  (e.g. 'fyr-queue'), COMMENT is an extra comment to add to the change log
  of the representatives details. */
function dadem_admin_mark_failing_contact($id, $method, $x, $editor, $comment) {
    global $dadem_client;
    $params = func_get_args();
    $result = $dadem_client->call('DaDem.admin_mark_failing_contact', $params);
    return $result;
}

/* dadem_admin_set_area_status AREA_ID NEW_STATUS

  Set the electoral status of an area given by AREA_ID. NEW_STATUS can have
  any of the values described for get_area_status. */
function dadem_admin_set_area_status($area_id, $new_status) {
    global $dadem_client;
    $params = func_get_args();
    $result = $dadem_client->call('DaDem.admin_set_area_status', $params);
    return $result;
}

/* dadem_admin_get_raw_council_status

  Returns how many councils are not in the made-live state. */
function dadem_admin_get_raw_council_status() {
    global $dadem_client;
    $params = func_get_args();
    $result = $dadem_client->call('DaDem.admin_get_raw_council_status', $params);
    return $result;
}

/* dadem_admin_get_diligency_council TIME

  Returns how many edits each administrator has made to the raw council
  data since unix time TIME. Data is returned as an array of pairs of
  count, name with largest counts first. */
function dadem_admin_get_diligency_council($time) {
    global $dadem_client;
    $params = func_get_args();
    $result = $dadem_client->call('DaDem.admin_get_diligency_council', $params);
    return $result;
}

/* dadem_admin_get_diligency_reps TIME

  Returns how many edits each administrator has made to representatives
  since unix time TIME. Data is returned as an array of pairs of count,
  name with largest counts first. */
function dadem_admin_get_diligency_reps($time) {
    global $dadem_client;
    $params = func_get_args();
    $result = $dadem_client->call('DaDem.admin_get_diligency_reps', $params);
    return $result;
}


?>
