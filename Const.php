<?php
/**
 * @licence GPL-v2
 * Summary :
 * « You may copy, distribute and modify the software as long as
 * you track changes/dates of in source files and keep all modifications under GPL.
 * You can distribute your application using a GPL library commercially,
 * but you must also disclose the source code. »
 *
 * @link https://www.tldrlegal.com/l/gpl2
 * @see LICENSE file
 */
/* Directories */
define('ROOT_DIR', __DIR__ . '/');
define('DATA_DIR', ROOT_DIR . 'App/Data/');
define('DATA_TEST_DIR', ROOT_DIR . 'Test/Unit/Data/');
/* Namespaces */
define('LIBRARY_NS', '\\App\Library\\');
define('FACTORY_NS', LIBRARY_NS . 'Factory\\');
define('DAO_NS', LIBRARY_NS . 'Dao\\');
define('FETCHER_NS', '\\App\Fetcher\\');
