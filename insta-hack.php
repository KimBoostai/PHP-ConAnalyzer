<?php
/* Copyright 2010-2014 Kim Olsen <kim@pizslacker.org>

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at
       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.

   ------------------------------------------------------------------------

   Gets a visitors nationality, hostname, ip and user-agent info (UA).

   Creator:     Kim Olsen <kim@pizslacker.org>
   Opprettet	20100514-02:25-GMT+1
   Modifisert	20141118-00:03-GMT+1

   GeoIP Apache module (c) MaxMind - http://www.maxmind.com/app/mod_geoip
   All code in this file is copyright (c) 2014 - http://www.pizslacker.org
*/

// Gets the visitor IP-address through a global Apache2-variable.
$ip = $_SERVER['REMOTE_ADDR'];

// Gets visitors canonical hostname via
// the PHP-function 'gethostbyaddr'.
if (empty($hostname))
{
    // Gets hostname based on IP-address.
    $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
}

// Visitor geolocatioon (nationality).
if (empty($country_name))
{
    // Gets nationality via 'mod_geoip's note-variable from the Apache-server.
    $country_name = apache_note("GEOIP_COUNTRY_NAME");
}

// Writes nationality in XHTML.
print "<p>You are visiting from: <b>" . $country_name . "</b><br/><br/>\n";

// Writes hostname in XHTML.
print "Your computer/gateway hostname is:<br/><b>" . $hostname . "</b><br/><br/>\n";

// The variable "dnp_ip" is a manual flag to prevent writing the IP-address in XHTML.
if ( $dnp_ip != true )
{
    // Writes visitors IP-address in XHTML.
    print "Hostname was retrieved for the ip-address: <b>" . $ip . "</b><br/><br/>\n";
}

// User-Agent information.
$user_agent = $_SERVER['HTTP_USER_AGENT'];
if (isset($user_agent))
{
print "Your browser supplied this user-agent information:<br />\n<b>" . $user_agent . "</b></p>";
}

// Line-return.
echo "\r\n";

?>
