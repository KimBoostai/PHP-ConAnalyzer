ConAnalyzer v1.3.1
==================

Gets a visitors nationality, hostname, IP and user-agent info (UA).

This script-version still works, but due to MaxMind changing their database-format (2014)
it should be considered abandonware. The legacy database currently used is going to be
deprecated in 2022.

Usage
=====

Just include the PHP-files "conanalyzer.php" and "getBrowser.php" in your HTML-code.

Requirements
============
PHP 5.x + Apache httpd 2.x + libapache2-mod-geoip.

And the GeoIP v2 database (obsolete). A free version can be found here:
[mailfud.org](https://mailfud.org/geoip-legacy/GeoIP.dat.gz)
