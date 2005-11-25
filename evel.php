<?php
/* 
 * THIS FILE WAS AUTOMATICALLY GENERATED BY ./rabxtophp.pl, DO NOT EDIT DIRECTLY
 * 
 * evel.php:
 * Generic email sending and mailing list functionality, with bounce detection
etc.
 *
 * Copyright (c) 2005 UK Citizens Online Democracy. All rights reserved.
 * WWW: http://www.mysociety.org
 *
 * $Id: evel.php,v 1.18 2005-11-25 16:27:14 francis Exp $
 *
 */

require_once('rabx.php');

/* evel_get_error R
 * Return FALSE if R indicates success, or an error string otherwise. */
function evel_get_error($e) {
    if (!rabx_is_error($e))
        return FALSE;
    else
        return $e->text;
}

/* evel_check_error R
 * If R indicates failure, displays error message and stops procesing. */
function evel_check_error($data) {
    if ($error_message = evel_get_error($data))
        err($error_message);
}

$evel_client = new RABX_Client(OPTION_EVEL_URL);

/* evel_construct_email SPEC

  Construct a wire-format (RFC2822) email message according to SPEC, which
  is an associative array containing elements as follows:

  * _body_

    Text of the message to send, as a UTF-8 string with "\n" line-endings.

  * _unwrapped_body_

    Text of the message to send, as a UTF-8 string with "\n" line-endings.
    It will be word-wrapped before sending.

  * _template_, _parameters_

    Templated body text and an associative array of template parameters.
    _template contains optional substititutions <?=$values['name']?>, each
    of which is replaced by the value of the corresponding named value in
    _parameters_. It is an error to use a substitution when the
    corresponding parameter is not present or undefined. The first line of
    the template will be interpreted as contents of the Subject: header of
    the mail if it begins with the literal string 'Subject: ' followed by a
    blank line. The templated text will be word-wrapped to produce lines of
    appropriate length.

  * To

    Contents of the To: header, as a literal UTF-8 string or an array of
    addresses or [address, name] pairs.

  * From

    Contents of the From: header, as an email address or an [address, name]
    pair.

  * Cc

    Contents of the Cc: header, as for To.

  * Subject

    Contents of the Subject: header, as a UTF-8 string.

  * Message-ID

    Contents of the Message-ID: header, as a US-ASCII string.

  * _any other element_

    interpreted as the literal value of a header with the same name.

  If no Message-ID is given, one is generated. If no To is given, then the
  string "Undisclosed-Recipients: ;" is used. If no From is given, a
  generic no-reply address is used. It is an error to fail to give a body,
  unwrapped body or a templated body; or a Subject. */
function evel_construct_email($spec) {
    global $evel_client;
    $params = func_get_args();
    $result = $evel_client->call('EvEl.construct_email', $params);
    return $result;
}

/* evel_send MESSAGE RECIPIENTS

  Send a MESSAGE to the given RECIPIENTS. MESSAGE is either the full text
  of a message (in its RFC2822, on-the-wire format) or an associative array
  as passed to construct_email. RECIPIENTS is either one email address
  string, or an array of them for multiple recipients. */
function evel_send($message, $recipients) {
    global $evel_client;
    $params = func_get_args();
    $result = $evel_client->call('EvEl.send', $params);
    return $result;
}

/* evel_is_address_bouncing ADDRESS

  Return true if we have received bounces for the ADDRESS. */
function evel_is_address_bouncing($address) {
    global $evel_client;
    $params = func_get_args();
    $result = $evel_client->call('EvEl.is_address_bouncing', $params);
    return $result;
}

/* evel_list_create SCOPE TAG NAME MODE [LOCALPART DOMAIN]

  Create a new mailing list for the given SCOPE (e.g. "pledgebank") and TAG
  (a unique reference for this list within SCOPE). NAME is the
  human-readable name of the list and MODE the posting-mode. Possible MODES
  are:

  * any

    anyone may post;

  * subscribers

    only subscribers may post;

  * admins

    only administrators may post; or

  * none

    nobody may post, so messages can only be submitted through the EvEl
    API.

  If MODE is anything other than "none", then LOCALPART and DOMAIN must be
  specified. These indicate the address for submissions to the list; if
  specified, LOCALPART "@" DOMAIN must form a valid mail address. */
function evel_list_create($scope, $tag, $name, $mode, $localpart = null, $domain = null) {
    global $evel_client;
    $params = func_get_args();
    $result = $evel_client->call('EvEl.list_create', $params);
    return $result;
}

/* evel_list_destroy SCOPE TAG

  Delete the list identified by the given SCOPE and TAG. */
function evel_list_destroy($scope, $tag) {
    global $evel_client;
    $params = func_get_args();
    $result = $evel_client->call('EvEl.list_destroy', $params);
    return $result;
}

/* evel_list_subscribe SCOPE TAG ADDRESS [ISADMIN]

  Subscribe ADDRESS to the list identified by SCOPE and TAG. Make the user
  an administrator if ISADMIN is true. If the ADDRESS is already on the
  list, then set their administrator status according to ISADMIN. */
function evel_list_subscribe($scope, $tag, $address, $isadmin = null) {
    global $evel_client;
    $params = func_get_args();
    $result = $evel_client->call('EvEl.list_subscribe', $params);
    return $result;
}

/* evel_list_unsubscribe SCOPE TAG ADDRESS

  Remove ADDRESS from the list identified by SCOPE and TAG. */
function evel_list_unsubscribe($scope, $tag, $address) {
    global $evel_client;
    $params = func_get_args();
    $result = $evel_client->call('EvEl.list_unsubscribe', $params);
    return $result;
}

/* evel_list_attribute */
function evel_list_attribute() {
    global $evel_client;
    $params = func_get_args();
    $result = $evel_client->call('EvEl.list_attribute', $params);
    return $result;
}

/* evel_list_send SCOPE TAG MESSAGE

  Send MESSAGE (on-the-wire message data, including all headers) to the
  list identified by SCOPE and TAG. */
function evel_list_send($scope, $tag, $message) {
    global $evel_client;
    $params = func_get_args();
    $result = $evel_client->call('EvEl.list_send', $params);
    return $result;
}

/* evel_list_members */
function evel_list_members() {
    global $evel_client;
    $params = func_get_args();
    $result = $evel_client->call('EvEl.list_members', $params);
    return $result;
}


?>
