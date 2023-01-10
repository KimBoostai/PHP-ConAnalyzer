<?php
/* Copyright 2010-2017 Kim Olsen <kim@pizslacker.org>

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
   Created:	    20100514-02:25-GMT+1
   Lastchange:	20150624-15:31-GMT+1

   GeoIP Apache module (c) MaxMind - http://www.maxmind.com/app/mod_geoip
   All code in this file is copyright (c) 2015 - http://www.pizslacker.org
*/

// Retrieve IP address of visiting client.
function getIP()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check IFNOT EMPTY client IP.
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) //check IP for proxy forwarding.
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else //use standard REMOTE_ADDR.
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
$ip = getIP();
$gi_ip = $ip;

// Include GeoIP.
include_once("geoip.inc");

// read GeoIP database
$gi = geoip_open("GeoIP.dat", GEOIP_STANDARD);

// map IP to country
$gi_country_name = geoip_country_name_by_addr($gi, $gi_ip);
$gi_country_code = geoip_country_code_by_addr($gi, $gi_ip);
return $gi_country_name;
return $gi_country_code;
return $gi_ip;

// close database handler
geoip_close($gi);
?>
