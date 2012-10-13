# golib_log4php

This extension is a wrapper around the [Apache log4php library](http://logging.apache.org/log4php/) which provides advanced logging facilities for PHP.



# Usage

Usage of `golib_log4php` is almost identical to the standard `log4php`, which is very well documented [here](http://logging.apache.org/log4php/). The current differences are:

* Instead of using `Logger::getLogger(...)` you have to use `tx_goliblog4php::getLogger(...)` (and for every other method you might want to call on `Logger`). This is necessary because the TYPO3 autoloade mechanism only supports classes prefixed with `tx_`.

* By default, `tx_goliblog4php` will load the `default_config.xml` configuration file in the extension's root directory. This configures the logger to write the logs into `uploads/log4php/default.log`. If you want to modify the configuration, you can do so by creating a `log4php.xml` file in `typo3conf/`. Note that if such a file exists, `default_config.xml` will not be loaded anymore.

* An `.htaccess` file denying all webserver access to the `uploads/log4php/` will be created automatically. Nonetheless you should make sure that it is not user accessible.



# LICENSE

Copyright 2012 by Gosign media. GmbH

golib_log4php is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.
golib_log4php is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with golib_log4php.  If not, see <http://www.gnu.org/licenses>
