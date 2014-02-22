<?php

/**
 * 
 * An iterable class returning the accepted languages.
 * For a list of returning values see http://www.w3schools.com/tags/ref_language_codes.asp
 * @author jstar
 * @license GNU v3
 * @example
 * $languages = new BrowserLanguageDetector();
 * foreach ($languages as $language) // high priority first
 * {
 *    echo $language;
 * }
 *  
 */
class BrowserLanguageDetector implements Iterator
{
    private $langs = array();

    public function __construct($default = "en")
    {
        if (isset($_SERVER["HTTP_ACCEPT_LANGUAGE"]))
        {
            $languages = strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"]);
            $languages = str_replace(' ', '', $languages);
            $languages = explode(",", $languages);
            foreach ($languages as $language)
            {
                $this->langs[] = substr($language, 0, strcspn($language, ';'));
                if (strpos($language, '-') !== false)
                {
                    $this->langs[] = substr($language, 0, 2);
                }
            }
        }
        $this->langs[] = $default;

    }

    /* Iterator functions */

    public function rewind()
    {
        reset($this->langs);
    }

    public function current()
    {
        return current($this->langs);
    }

    public function key()
    {
        return key($this->langs);
    }

    public function next()
    {
        return next($this->langs);
    }

    public function valid()
    {
        return $this->current() !== false;
    }

}

?>