<?php
/**
 * Open Source Social Network
 *
 * @package   Open Source Social Network
 * @author    Open Social Website Core Team <info@informatikon.com>
 * @copyright 2014 iNFORMATIKON TECHNOLOGIES
 * @license   General Public Licence http://www.opensource-socialnetwork.org/licence
 * @link      http://www.opensource-socialnetwork.org/licence
 */
/**
 * Register a language in system;
 * @params: $code = code of language;
 * @params: $file = file which contain languages;
 * @last edit: $arsalanshah
 * @Reason: Initial;
 *
 */
function ossn_register_language($code = '', $file) {
    if (isset($code) && isset($file)) {
        global $Ossn;
        return $Ossn->locale[$code][] = $file;
    }
}

/**
 * Get a languages strings;
 * @params: $code = code of language;
 * @params: $params = strings;
 * @last edit: $arsalanshah
 * @Reason: Initial;
 *
 */
function ossn_register_languages($code, $params = array()) {
    global $Ossn;
    if (isset($Ossn->localestr[$code], $code)) {
        $params = array_merge($Ossn->localestr[$code], $params);
    }
    return $Ossn->localestr[$code] = $params;
}

/**
 * Get registered language codes;
 * @last edit: $arsalanshah
 * @Reason: Initial;
 *
 */
function ossn_locales() {
    global $Ossn;
    if (!isset($Ossn->locale)) {
        return false;
    }
    foreach ($Ossn->locale as $key => $val) {
        $keys[] = $key;
    }
    if (!empty($keys)) {
        return $keys;
    } else {
        return array();

    }
}

/**
 * Print a locale;
 * @params $id = id of locale;
 * @last edit: $arsalanshah
 * @Reason: Initial;
 *
 */
function ossn_print($id = '', $args = array()) {
    global $Ossn;
    $id = strtolower($id);
    $code = ossn_site_settings('language');
    if (!empty($Ossn->localestr[$code][$id])) {
        $string = $Ossn->localestr[$code][$id];
        if ($args) {
            $string = vsprintf($string, $args);
        }
        return $string;
    } else {
        return $id;
    }

}

/**
 * Load system locales
 *
 * @return void
 */
function ossn_load_locales() {
    global $Ossn;
    $active = ossn_site_settings('language');
    if (isset($Ossn->locale[$active])) {
        foreach ($Ossn->locale[$active] as $locales) {
            if (is_file($locales)) {
                include_once($locales);
            }
        }
    }
}
/**
 * Load json locales.
 *
 * @return json or false
 */
function ossn_load_json_locales(){
	global $Ossn;
	$code = ossn_site_settings('language');
	$json = json_encode($Ossn->localestr[$code]);
	if($json){
		return $json;
	}
	return false;
}