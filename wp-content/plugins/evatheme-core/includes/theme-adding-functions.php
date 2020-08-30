<?php
// Adding functions for theme


add_action('wp_head','evatheme_core_wp_head_custom_code',1000);
function evatheme_core_wp_head_custom_code() {
    // this code not only js or css / can insert any type of code
    
    if (function_exists('evatheme_core_option')) {
        $header_custom_code = evatheme_option('header_custom_js');
    }
    echo isset($header_custom_code) ? $header_custom_code : '';
}

add_action('wp_footer', 'evatheme_core_custom_footer_js',1000);
function evatheme_core_custom_footer_js() {
    if (function_exists('evatheme_option')) {
        $custom_js = evatheme_option('custom_js');
    }
    echo isset($custom_js) ? '<script type="text/javascript" id="evatheme_custom_footer_js">'.$custom_js.'</script>' : '';
}


/*
 *  Twitter API
 */
if( !function_exists( 'evatheme_core_buildBaseString' ) ) {
    function evatheme_core_buildBaseString($baseURI, $method, $params){
        $r = array();
        ksort($params);
        foreach($params as $key=>$value){
            $r[] = "$key=" . rawurlencode($value);
        }

        return $method."&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r)); //return complete base string
    }
}

if( !function_exists( 'evatheme_core_buildAuthorizationHeader' ) ) {
    function evatheme_core_buildAuthorizationHeader($oauth){
        $r = 'Authorization: OAuth ';
        $values = array();
        foreach($oauth as $key=>$value)
            $values[] = "$key=\"" . rawurlencode($value) . "\"";

        $r .= implode(', ', $values);
        return $r;
    }
}

if( !function_exists( 'evatheme_core_get_tweets' ) ) {
    function evatheme_core_get_tweets( $oauth_access_token, $oauth_access_token_secret, $consumer_key, $consumer_secret, $count){

        $url = "https://api.twitter.com/1.1/statuses/user_timeline.json";

        $oauth = array( 'oauth_consumer_key' => $consumer_key,
            'oauth_nonce' => time(),
            'oauth_signature_method' => 'HMAC-SHA1',
            'oauth_token' => $oauth_access_token,
            'oauth_timestamp' => time(),
            'count' => $count,
            'oauth_version' => '1.0');

        $base_info = evatheme_core_buildBaseString($url, 'GET', $oauth);
        $composite_key = rawurlencode($consumer_secret) . '&' . rawurlencode($oauth_access_token_secret);
        $oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
        $oauth['oauth_signature'] = $oauth_signature;


        $header = array(evatheme_core_buildAuthorizationHeader($oauth), 'Expect:');
        $options = array( CURLOPT_HTTPHEADER => $header,
            CURLOPT_HEADER => false,
            CURLOPT_URL => $url . '?count='.$count,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false);

        $feed = curl_init();

        curl_setopt_array($feed, $options);
        $json = curl_exec($feed);
        curl_close($feed);
        return json_decode($json);
    }
}
?>
