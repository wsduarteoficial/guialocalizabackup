<?php

if (! function_exists('tools_set_locale_portuguese')) {
    function tools_set_locale_portuguese()
    {
        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    }
}

if (! function_exists('tools_issued_date')) {
    /**
     * Data de Emissão em Português
     * @return string
     */
    function tools_issued_date()
    {
        tools_set_locale_portuguese();
        return strftime('%d de %B de %Y às ', strtotime('today')) . date('H:i:s');
    }
}

if (! function_exists('tools_strlen')) {

    function tools_strlen($str, $encoding = 'UTF-8')
    {
        if (is_array($str))
            return false;
        $str = html_entity_decode($str, ENT_COMPAT, 'UTF-8');
        if (function_exists('mb_strlen'))
            return mb_strlen($str, $encoding);
        return strlen($str);
    }

}

if (! function_exists('tools_format_do_date')) {

    /**
     * Formata a datetime para Padrão BR
     * @return string
    */
    function tools_format_do_date($data)
    {
        return strftime('%d/%m/%Y', strtotime($data));
    }
}

if (! function_exists('tools_convert_to_decimal_br')) {

    /**
     * Converte valores float, double e decimal para padrão brasileiro
     * @param $value
     * @param int $casa total de casas apos a virgula
     * @return string
     */
    function tools_convert_to_decimal_br($value, $float=2)
    {
        return number_format($value, $float, ',', '.');
    }
}

if (! function_exists('tools_special_ucwords')) {
    /**
     * Deixa o primeiro carácter de cada palavra em letra maiúscula
     * @param $string
     * @return string
    */
    function tools_special_ucwords($string)
    {
        $words    = explode(' ', strtolower(trim(preg_replace("/\s+/", ' ', $string))));
        $return[] = ucfirst($words[0]);

        unset($words[0]);

        foreach ($words as $word) {
            if (!preg_match("/^([dn]?[aeiou][s]?|em)$/i", $word)) {
                $word = ucfirst($word);
            }
            $return[] = $word;
        }

        return implode(' ', $return);
    }
}

if (! function_exists('tools_sanitize_search')) {

   /**
     * Clean String Search
     * @param null $string
     * @return string
     */
    function tools_sanitize_search($string = null)
    {
        $array = [
            "\n\r", "  ",
            "\'", "  ",
        ];

        $string = filter_var($string, FILTER_SANITIZE_STRING);
        $string = strip_tags($string);
        $string = str_replace($array, '', $string);
        $string = preg_replace('/[^0-9a-z]/i', ' ', $string);
        return trim(html_entity_decode($string));

    }
}

if (! function_exists('tools_only_numbers')) {

    /**
     * Clean string per only numbers
     * @param $str
     * @return mixed
     */
    function tools_only_numbers($str) {
        return preg_replace("/[^0-9]/", "", $str);
    }

}

if (! function_exists('toots_calculate_start')) {

    function toots_calculate_start($start){
        if (is_numeric($start)) {
           return preg_replace("/[^0-9.]/", "", round(microtime() - $start,3));

        } else {
            return round(microtime(),3);
        }
    }

}

if (! function_exists('tools_mask')) {

    /**
     * @param $val
     * @param $mask
     * @return string
     */
    function tools_mask($val, $mask)
    {
        $maskared = '';
        $k = 0;
        for($i = 0; $i<=strlen($mask)-1; $i++)
        {
            if($mask[$i] == '#')
            {
                if(isset($val[$k]))
                    $maskared .= $val[$k++];
            }
            else
            {
                if(isset($mask[$i]))
                    $maskared .= $mask[$i];
            }
        }
        return $maskared;
    }

}

if (! function_exists('tools_replace_like')) {

    /**
     * @param $data
     * @return mixed
     */
    function tools_replace_like($data) {
        return str_replace(' ', '%', $data);
    }
}

if (! function_exists('tools_replace_like')) {

    /**
     * @param $data
     * @return mixed
     */
    function tools_replace_like($data) {
        return str_replace(' ', '%', $data);
    }
}

if (! function_exists('tools_slug_category_companies')) {

    function tools_slug_category_companies($abbr='', $city='', $city_id='', $category='', $category_id='') {
        return sprintf("/%s/%d/%s/%d/%s.html",
            str_slug( $abbr ),
            str_slug( $city_id ),
            str_slug( $city ),
            str_slug( $category_id ),
            str_slug( $category )
        );
    }
}

if (! function_exists('tools_slug_title_companies')) {

    function tools_slug_title_companies($abbr='', $city_id='', $city='', $district='', $company='', $company_id='') {

        if(!empty($district)) {

            return sprintf("/e/%s/%d/%s/%s/%d/%s.html",
                str_slug( $abbr ),
                str_slug( $city_id ),
                str_slug( $city ),
                str_slug( $district ),
                str_slug( $company_id ),
                str_slug( $company )
            );

        }

        return sprintf("/e/%s/%d/%s/%d/%s.html",
            str_slug( $abbr ),
            str_slug( $city_id ),
            str_slug( $city ),
            str_slug( $company_id ),
            str_slug( $company )
        );
    }
}

if (! function_exists('tools_slug_google_maps_companies')) {

    function tools_slug_google_maps_companies($address='', $number='', $district='', $city='', $abbr='', $cep='') {

        $url_maps = 'https://www.google.com.br/maps/place/';

        if(!empty($district)) {
            $address = sprintf( '%s, %s - %s, %s - %s, %s', $address, $number, $district, $city, $abbr, $cep);
        } else {
            $address = sprintf( '%s, %s, %s - %s, %s', $address, $number, $city, $abbr, $cep);
        }

        return $url_maps . urlencode( ltrim( $address, ', ') );
       
    }
}

if (! function_exists('tools_selected')) {
    function tools_selected( $value, $selected ){
        return $value==$selected ? ' selected="selected"' : null;
    }
}

if (! function_exists('tools_address_google_maps')) {

    function tools_address_google_maps( $place_name='', $numeral='', $district_name='', $city_name='', $state_abbr='', $zip_code='' ){

        $address = '';

        if( !empty( $place_name ) ) {
            $address .= $place_name . ', ';
        }

        if( !empty( $numeral ) ) {
            $address .= $numeral . ', ';
        }

        if( !empty( $district_name ) ) {
            $address .= $district_name . ', ';
        }

        if( !empty( $city_name ) ) {
            $address .= $city_name . ', ';
        }

        if( !empty( $state_abbr ) ) {
            $address .= $state_abbr;
        }

        if( !empty( $zip_code ) ) {
            $address .= ' - CEP: ' .$zip_code;
        }

        return trim( str_replace("  ", " ", $address ) );

    }
}

if (! function_exists('tools_breadcrumbs')) {

    function tools_breadcrumbs( $url='', $data='', $extension = true ) {

        if( is_null( $url ) ) {
            return sprintf('<span class="type--fade">%s</span>', $data);
        }

        if ($extension) {
            $url = $url . '.html';
        }

        return sprintf('<span class="type--fade">
                <a href="%s" title="%s">%s</a>
            </span> <span class="type--fade"> 	&nbsp; &raquo; 	&nbsp; </span>', $url, $data, $data);

    }

}

if (! function_exists('tools_selected')) {

    function tools_selected($valueHtml, $valueDb) {

        if(!strcmp($valueHtml, $valueDb) ) {
            return 'selected="selected"';
        }

        return false;

    }

}

if (! function_exists('tools_htmlentities_decode_UTF8')) {

    function tools_htmlentities_decode_UTF8($string)
    {
        if (is_array($string))
        {
            $string = array_map(array('tools', 'tools_htmlentities_decode_UTF8'), $string);
            return (string)array_shift($string);
        }
        return html_entity_decode((string)$string, ENT_QUOTES, 'utf-8');
    }

}

if (! function_exists('tools_htmlentities_UTF8')) {

    function tools_htmlentities_UTF8($string, $type = ENT_QUOTES)
    {
        if (is_array($string))
            return array_map(array('tools', 'tools_htmlentities_UTF8'), $string);

        return htmlentities((string)$string, $type, 'utf-8');
    }

}

if (! function_exists('tools_sanitize_editor')) {
    /**
     * Higieniza editores swing
     * @access public
     * @param String $string
     * @return String
     */
    function tools_sanitize_editor($string)
    {

        $string = str_replace("follow", "nofollow", $string);
        $string = str_replace("_self", "_blank", $string);
        $string = str_replace("_parent", "_blank", $string);
        $string = str_replace("_top", "_blank", $string);
        $string = str_replace("framename", "_blank", $string);
        if (strpos($string, "<a href=") !== false) {
            $string = str_replace('<a href=', '<a target="_blank" rel="nofollow" href=', $string);
        }

        return tools_htmlentities_UTF8($string);

    }

}

if (! function_exists('_make_url_clickable_cb')) {

    function _make_url_clickable_cb($matches) {
        $ret = '';
        $url = $matches[2];

        if ( empty($url) )
            return $matches[0];
        // removed trailing [.,;:] from URL
        if ( in_array(substr($url, -1), array('.', ',', ';', ':')) === true ) {
            $ret = substr($url, -1);
            $url = substr($url, 0, strlen($url)-1);
        }
        return $matches[1] . "<a href=\"$url\" rel=\"nofollow\">$url</a>" . $ret;
    }

}

if (! function_exists('_make_web_ftp_clickable_cb')) {

    function _make_web_ftp_clickable_cb($matches) {
        $ret = '';
        $dest = $matches[2];
        $dest = 'http://' . $dest;

        if ( empty($dest) )
            return $matches[0];
        // removed trailing [,;:] from URL
        if ( in_array(substr($dest, -1), array('.', ',', ';', ':')) === true ) {
            $ret = substr($dest, -1);
            $dest = substr($dest, 0, strlen($dest)-1);
        }
        return $matches[1] . "<a href=\"$dest\" rel=\"nofollow\">$dest</a>" . $ret;
    }

}

if (! function_exists('_make_email_clickable_cb')) {

    function _make_email_clickable_cb($matches) {
        $email = $matches[2] . '@' . $matches[3];
        return $matches[1] . "<a href=\"mailto:$email\">$email</a>";
    }

}

if (! function_exists('tools_make_clickable')) {

    function tools_make_clickable($ret) {
        $ret = ' ' . $ret;
        // in testing, using arrays here was found to be faster
        $ret = preg_replace_callback('#([\s>])([\w]+?://[\w\\x80-\\xff\#$%&~/.\-;:=,?@\[\]+]*)#is', '_make_url_clickable_cb', $ret);
        $ret = preg_replace_callback('#([\s>])((www|ftp)\.[\w\\x80-\\xff\#$%&~/.\-;:=,?@\[\]+]*)#is', '_make_web_ftp_clickable_cb', $ret);
        $ret = preg_replace_callback('#([\s>])([.0-9a-z_+-]+)@(([0-9a-z-]+\.)+[0-9a-z]{2,})#i', '_make_email_clickable_cb', $ret);

        // this one is not in an array because we need it to run last, for cleanup of accidental links within links
        $ret = preg_replace("#(<a( [^>]+?>|>))<a [^>]+?>([^>]+?)</a></a>#i", "$1$3</a>", $ret);
        $ret = trim($ret);
        return $ret;
    }

}
