<?php
/**
 * Copyright 2012 by Gosign media. GmbH
 *
 * This file is part of golib_log4php.
 *
 * golib_log4php is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * golib_log4php is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with golib_log4php.  If not, see <http://www.gnu.org/licenses/>.
 */
require dirname(__FILE__) . '/../vendor/Logger.php';


class tx_goliblog4php extends Logger {
    public static $logDirectory = '/uploads/log4php';

    // This class has no funcionality. It is necessary because, through the TYPO3
    // autoloader mechanism, one can only load classes prefixed "tx_", i.e. loading
    // the "Logger" class directly is not possible.
}


// Make sure the log directory exists
if(!is_dir(PATH_site . tx_goliblog4php::$logDirectory)) {
    mkdir(PATH_site . tx_goliblog4php::$logDirectory);
}

// Protect the log directory using .htaccess
if(!is_file(PATH_site . tx_goliblog4php::$logDirectory . '/.htaccess')) {
    touch(PATH_site . tx_goliblog4php::$logDirectory . '/.htaccess');
    file_put_contents(PATH_site . tx_goliblog4php::$logDirectory . '/.htaccess', 'deny from all');
}

// Load configuration file from "typo3conf/" or the default file in the extension's root
// directory if no custom configuration was found.
if(is_file(PATH_site . '/typo3conf/log4php.xml')) {
    tx_goliblog4php::configure(PATH_site . '/typo3conf/log4php.xml');
} else {
    tx_goliblog4php::configure(t3lib_extMgm::extPath('golib_log4php') . '/default_config.xml');
}
