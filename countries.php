<?
/*
 * countries.php:
 * Data on countries and (in some cases) named divisions within them.
 * 
 * Copyright (c) 2005 UK Citizens Online Democracy. All rights reserved.
 * Email: francis@mysociety.org. WWW: http://www.mysociety.org
 *
 * $Id: countries.php,v 1.10 2005-09-08 16:47:24 francis Exp $
 * 
 */

/* $countries_name_to_code
 * ISO 3166-1 alpha-2 country names and two letter codes, taken from
 * http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2. */
$countries_name_to_code = array(
    _("Afghanistan") => "AF",
    _("Åland Islands") => "AX",
    _("Albania") => "AL",
    _("Algeria") => "DZ",
    _("American Samoa") => "AS",
    _("Andorra") => "AD",
    _("Angola") => "AO",
    _("Anguilla") => "AI",
    _("Antarctica") => "AQ",
    _("Antigua and Barbuda") => "AG",
    _("Argentina") => "AR",
    _("Armenia") => "AM",
    _("Aruba") => "AW",
    _("Australia") => "AU",
    _("Austria") => "AT",
    _("Azerbaijan") => "AZ",
    _("Bahamas") => "BS",
    _("Bahrain") => "BH",
    _("Bangladesh") => "BD",
    _("Barbados") => "BB",
    _("Belarus") => "BY",
    _("Belgium") => "BE",
    _("Belize") => "BZ",
    _("Benin") => "BJ",
    _("Bermuda") => "BM",
    _("Bhutan") => "BT",
    _("Bolivia") => "BO",
    _("Bosnia and Herzegovina") => "BA",
    _("Botswana") => "BW",
    _("Bouvet Island") => "BV",
    _("Brazil") => "BR",
    _("British Indian Ocean Territory") => "IO",
    _("British Virgin Islands") => "VG",
    _("Brunei") => "BN",
    _("Bulgaria") => "BG",
    _("Burkina Faso") => "BF",
    _("Burundi") => "BI",
    _("Cambodia") => "KH",
    _("Cameroon") => "CM",
    _("Canada") => "CA",
    _("Cape Verde") => "CV",
    _("Cayman Islands") => "KY",
    _("Central African Republic") => "CF",
    _("Chad") => "TD",
    _("Chile") => "CL",
    _("China") => "CN",
    _("Christmas Island") => "CX",
    _("Cocos (Keeling) Islands") => "CC",
    _("Colombia") => "CO",
    _("Comoros") => "KM",
    _("Congo") => "CG",
    _("Cook Islands") => "CK",
    _("Costa Rica") => "CR",
    _("Côte d'Ivoire") => "CI",
    _("Croatia") => "HR",
    _("Cuba") => "CU",
    _("Cyprus") => "CY",
    _("Czech Republic") => "CZ",
    _("Democratic Republic of the Congo") => "CD",
    _("Denmark") => "DK",
    _("Djibouti") => "DJ",
    _("Dominica") => "DM",
    _("Dominican Republic") => "DO",
    _("East Timor") => "TL",
    _("Ecuador") => "EC",
    _("Egypt") => "EG",
    _("El Salvador") => "SV",
    _("Equatorial Guinea") => "GQ",
    _("Eritrea") => "ER",
    _("Estonia") => "EE",
    _("Ethiopia") => "ET",
    _("Falkland Islands") => "FK",
    _("Faroe Islands") => "FO",
    _("Federated States of Micronesia") => "FM",
    _("Fiji") => "FJ",
    _("Finland") => "FI",
    _("France") => "FR",
    _("French Guiana") => "GF",
    _("French Polynesia") => "PF",
    _("French Southern Territories") => "TF",
    _("Gabon") => "GA",
    _("Gambia") => "GM",
    _("Georgia") => "GE",
    _("Germany") => "DE",
    _("Ghana") => "GH",
    _("Gibraltar") => "GI",
    _("Greece") => "GR",
    _("Greenland") => "GL",
    _("Grenada") => "GD",
    _("Guadeloupe") => "GP",
    _("Guam") => "GU",
    _("Guatemala") => "GT",
    _("Guinea-Bissau") => "GW",
    _("Guinea") => "GN",
    _("Guyana") => "GY",
    _("Haiti") => "HT",
    _("Heard Island and McDonald Islands") => "HM",
    _("Honduras") => "HN",
    _("Hong Kong") => "HK",
    _("Hungary") => "HU",
    _("Iceland") => "IS",
    _("India") => "IN",
    _("Indonesia") => "ID",
    _("Iran") => "IR",
    _("Iraq") => "IQ",
    _("Ireland") => "IE",
    _("Israel") => "IL",
    _("Italy") => "IT",
    _("Jamaica") => "JM",
    _("Japan") => "JP",
    _("Jordan") => "JO",
    _("Kazakhstan") => "KZ",
    _("Kenya") => "KE",
    _("Kiribati") => "KI",
    _("Kuwait") => "KW",
    _("Kyrgyzstan") => "KG",
    _("Laos") => "LA",
    _("Latvia") => "LV",
    _("Lebanon") => "LB",
    _("Lesotho") => "LS",
    _("Liberia") => "LR",
    _("Libya") => "LY",
    _("Liechtenstein") => "LI",
    _("Lithuania") => "LT",
    _("Luxembourg") => "LU",
    _("Macao") => "MO",
    _("Madagascar") => "MG",
    _("Malawi") => "MW",
    _("Malaysia") => "MY",
    _("Maldives") => "MV",
    _("Mali") => "ML",
    _("Malta") => "MT",
    _("Marshall Islands") => "MH",
    _("Martinique") => "MQ",
    _("Mauritania") => "MR",
    _("Mauritius") => "MU",
    _("Mayotte") => "YT",
    _("Mexico") => "MX",
    _("Moldova") => "MD",
    _("Monaco") => "MC",
    _("Mongolia") => "MN",
    _("Montserrat") => "MS",
    _("Morocco") => "MA",
    _("Mozambique") => "MZ",
    _("Myanmar") => "MM",
    _("Namibia") => "NA",
    _("Nauru") => "NR",
    _("Nepal") => "NP",
    _("Netherlands Antilles") => "AN",
    _("Netherlands") => "NL",
    _("New Caledonia") => "NC",
    _("New Zealand") => "NZ",
    _("Nicaragua") => "NI",
    _("Nigeria") => "NG",
    _("Niger") => "NE",
    _("Niue") => "NU",
    _("Norfolk Island") => "NF",
    _("North Korea") => "KP",
    _("Northern Mariana Islands") => "MP",
    _("Norway") => "NO",
    _("Oman") => "OM",
    _("Pakistan") => "PK",
    _("Palau") => "PW",
    _("Palestinian Territories") => "PS",
    _("Panama") => "PA",
    _("Papua New Guinea") => "PG",
    _("Paraguay") => "PY",
    _("Peru") => "PE",
    _("Philippines") => "PH",
    _("Pitcairn Islands") => "PN",
    _("Poland") => "PL",
    _("Portugal") => "PT",
    _("Puerto Rico") => "PR",
    _("Qatar") => "QA",
    _("Réunion") => "RE",
    _("Republic of Macedonia") => "MK",
    _("Romania") => "RO",
    _("Russia") => "RU",
    _("Rwanda") => "RW",
    _("Saint Helena") => "SH",
    _("Saint Kitts and Nevis") => "KN",
    _("Saint Lucia") => "LC",
    _("Saint-Pierre and Miquelon") => "PM",
    _("Saint Vincent and the Grenadines") => "VC",
    _("Samoa") => "WS",
    _("San Marino") => "SM",
    _("São Tomé and Príncipe") => "ST",
    _("Saudi Arabia") => "SA",
    _("Senegal") => "SN",
    _("Serbia and Montenegro") => "CS",
    _("Seychelles") => "SC",
    _("Sierra Leone") => "SL",
    _("Singapore") => "SG",
    _("Slovakia") => "SK",
    _("Slovenia") => "SI",
    _("Solomon Islands") => "SB",
    _("Somalia") => "SO",
    _("South Africa") => "ZA",
    _("South Georgia and the South Sandwich Islands") => "GS",
    _("South Korea") => "KR",
    _("Spain") => "ES",
    _("Sri Lanka") => "LK",
    _("Sudan") => "SD",
    _("Suriname") => "SR",
    _("Svalbard") => "SJ",
    _("Swaziland") => "SZ",
    _("Sweden") => "SE",
    _("Switzerland") => "CH",
    _("Syria") => "SY",
    _("Taiwan") => "TW",
    _("Tajikistan") => "TJ",
    _("Tanzania") => "TZ",
    _("Thailand") => "TH",
    _("Togo") => "TG",
    _("Tokelau") => "TK",
    _("Tonga") => "TO",
    _("Trinidad and Tobago") => "TT",
    _("Tunisia") => "TN",
    _("Turkey") => "TR",
    _("Turkmenistan") => "TM",
    _("Turks and Caicos Islands") => "TC",
    _("Tuvalu") => "TV",
    _("Uganda") => "UG",
    _("Ukraine") => "UA",
    _("United Arab Emirates") => "AE",
    _("United Kingdom") => "GB",
    _("United States") => "US",
    _("United States Minor Outlying Islands") => "UM",
    _("Uruguay") => "UY",
    _("U.S. Virgin Islands") => "VI",
    _("Uzbekistan") => "UZ",
    _("Vanuatu") => "VU",
    _("Vatican City") => "VA",
    _("Venezuela") => "VE",
    _("Vietnam") => "VN",
    _("Wallis and Futuna") => "WF",
    _("Western Sahara") => "EH",
    _("Yemen") => "YE",
    _("Zambia") => "ZM",
    _("Zimbabwe") => "ZW",
);

/* $countries_code_to_name
 * Map from ISO 3166 code to country name. */
$countries_code_to_name = array();
foreach ($countries_name_to_code as $countries_country => $countries_code) {
    $countries_code_to_name[$countries_code] = $countries_country;
}

/* $countries_statecode_to_name
 * Top-level administrative areas within countries and identifying codes for
 * them. */
$countries_statecode_to_name = array(
    'US' => array(
        'AK' => 'Alaska',
        'AL' => 'Alabama',
        'AR' => 'Arkansas',
        'AZ' => 'Arizona',
        'CA' => 'California',
        'CO' => 'Colorado',
        'CT' => 'Connecticut',
        'DE' => 'Delaware',
        'FL' => 'Florida',
        'GA' => 'Georgia',
        'HI' => 'Hawaii',
        'IA' => 'Iowa',
        'ID' => 'Idaho',
        'IL' => 'Illinois',
        'IN' => 'Indiana',
        'KS' => 'Kansas',
        'KY' => 'Kentucky',
        'LA' => 'Louisiana',
        'MA' => 'Massachusetts',
        'MD' => 'Maryland',
        'ME' => 'Maine',
        'MI' => 'Michigan',
        'MN' => 'Minnesota',
        'MO' => 'Missouri',
        'MS' => 'Mississippi',
        'MT' => 'Montana',
        'NC' => 'North Carolina',
        'ND' => 'North Dakota',
        'NE' => 'Nebraska',
        'NH' => 'New Hampshire',
        'NJ' => 'New Jersey',
        'NM' => 'New Mexico',
        'NV' => 'Nevada',
        'NY' => 'New York',
        'OH' => 'Ohio',
        'OK' => 'Oklahoma',
        'OR' => 'Oregon',
        'PA' => 'Pennsylvania',
        'RI' => 'Rhode Island',
        'SC' => 'South Carolina',
        'SD' => 'South Dakota',
        'TN' => 'Tennessee',
        'TX' => 'Texas',
        'UT' => 'Utah',
        'VT' => 'Vermont',
        'VA' => 'Virginia',
        'WA' => 'Washington',
        'WI' => 'Wisconsin',
        'WV' => 'West Virginia',
        'WY' => 'Wyoming'
    )
);

?>
