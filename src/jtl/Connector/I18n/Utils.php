<?php

/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\I18n
 */
namespace jtl\Connector\I18n;

/**
 * Description of Utils
 *
 * @access public
 * @author Christian Spoo <christian.spoo@jtl-software.de>
 */
class Utils
{
    public static function getAcceptedLanguages()
    {
        $parsed_langs = array();

        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            // break up string into pieces (languages and q factors)
            preg_match_all('/([a-z]{1,8}(-[a-z]{1,8})?)\s*(;\s*q\s*=\s*(1|0\.[0-9]+))?/i', $_SERVER['HTTP_ACCEPT_LANGUAGE'], $lang_parse);

            if (count($lang_parse[1])) {
                // create a list like "en" => 0.8
                $parsed_langs = array_combine($lang_parse[1], $lang_parse[4]);
                
                // set default to 1 for any without q factor
                // and convert languages to ISO-639 compliant values
                $langs = array();
                foreach ($parsed_langs as $lang => $val) {
                    $lang = strtr($lang, '-', '_');
                    
                    if ($val === '')
                        $langs[$lang] = 1;
                    else
                        $langs[$lang] = $val;
                }

                // sort list based on value	
                arsort($langs, SORT_NUMERIC);
            }
            
            
        }
        
        return $langs;
    }
}
