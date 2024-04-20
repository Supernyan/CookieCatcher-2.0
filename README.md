CookieCatcher 2.0
=================
CookieCatcher is an open source application which was created to assist in the exploitation of XSS (Cross Site Scripting) vulnerabilities within web applications to steal user session IDs (aka Session Hijacking). The use of this application is purely educational and should not be used without proper permission from the target application.

For more information on XSS visit the following link:
https://www.owasp.org/index.php/Cross-site_Scripting_(XSS)

For more information on Session Hijacking visit the following link:
https://www.owasp.org/index.php/Session_hijacking_attack

About This Version
------------------
This version of CookieCatcher represents an updated adaptation of the original codebase available at https://github.com/DisK0nn3cT/CookieCatcher. This updated version has been tailored to support newer PHP versions, ensuring compatibility and improved functionality for contemporary web environments.

Features
-------
* Prebuilt payloads to steal cookie data
* Just copy and paste payload into a XSS vulnerability
* Will send email notification when new cookies are stolen
* Will attempt to refresh cookies every 3 minutes to avoid inactivity timeouts
* Provides full HTTP requests to hijack sessions through a proxy (BuRP, etc)
* Will attempt to load a preview when viewing the cookie data
* PAYLOADS
* * Basic AJAX Attack
* * HTTPONLY evasion for Apache CVE-20120053
* * More to come

Requirements
------------

CookieCatcher is built for a LAMP stack running the following:

* PHP 8.X.X
* PHP-cURL
* MySQL
* Lynx & crontab

Installation
------------
* Download the source from github `git clone https://github.com/Supernyan/CookieCatcher-New-version` or use the ZIP file and extract it on your server. 
* Setup the directory as a virtualhost in Apache (I won't go over these details, however, you may ask me via email or you can use google.)
* Create a database for the application and load the SETUP.sql file.
* Setup a cron job as shown in the SETUP.cron file.

