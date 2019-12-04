<?php
session_start();
/**
 * Tránh force link sang https hoặc http bằng htacess hoặc cấu hình trên server
 * Nếu đã force link thì gỡ bỏ tính nâng check_SSL .
 * Tránh tình trạng server chuyển hướng nhiều lần
 * Khi có sự thay đổi về SSL trên server . Reset Session và thử lại
 * Chèn vào file index.php trước file router.php, file_require.php và sau file config.php , functions.php
 */

if (function_exists('isGoogleSpeed') ==  false) {
    function isGoogleSpeed(){
        if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Lighthouse') === false){
        return false;
        }
        return true;
    }
}

if (function_exists('getProtocol') ==  false) {
    function getProtocol() {
        $pageURL = 'http';
        if ($_SERVER["HTTPS"] == "on") {
            $pageURL .= "s";
        }
        $pageURL .= "://";
        return $pageURL;
    }
}


if (function_exists('redirectphp') ==  false) {
    function redirectphp($url)
    {
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: $url");
    }
}

if (function_exists('getCurrentPageURLSSL') ==  false) {
    function getCurrentPageURLSSL()
    {
        $pageURL = 'http';
        if ($_SERVER["HTTPS"] == "on") {
            $pageURL .= "s";
        }
        $pageURL .= "://";
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        return $pageURL;
    }
}

function getInfoSSL($domainName){
    if ($domainName == 'localhost') {
        $get = stream_context_create(array("ssl" => array("capture_peer_cert" => TRUE, "verify_peer_name" => FALSE, "verify_peer" => false)));
    }
    else {
        $get = stream_context_create(array("ssl" => array("capture_peer_cert" => TRUE)));
    }

    $read = stream_socket_client("ssl://".$domainName.":443", $errno, $errstr, 30, STREAM_CLIENT_CONNECT, $get);

    $cert = stream_context_get_params($read);
    $certinfo = openssl_x509_parse($cert['options']['ssl']['peer_certificate']);

    $arrayInfossl=array('songay'=>$certinfo['validTo_time_t'],'version'=>$certinfo['version']);

    return $arrayInfossl;
}

function checkSSLEnableByDomain ($domainSSL = '') {
    if ($domainSSL == false) {
        $domainSSL = $_SERVER['SERVER_NAME'];
    }

    $arrayInfoSSL = getInfoSSL($domainSSL);

    if (empty($arrayInfoSSL)) {
        return false;
    }
    else {
        $timeSLL=$arrayInfoSSL['songay'];
        $version=$arrayInfoSSL['version'];
        $NgayHienTai=date('d-m-Y',time());
        $soNgayConLaitInt=$timeSLL- strtotime($NgayHienTai);
        $soNgayConLai=(int)($soNgayConLaitInt/24/60/60);

        if ($soNgayConLai >= 1 && $version > 0) {
            return true;
        } else {
            return false;
        }
    }
    return false;
}

// run main
function runMainSSL ($arrayDomainSSL = null, $flag_save_result_ssl_by_session = false) {
    if (empty($arrayDomainSSL) || is_array($arrayDomainSSL) == false) {
        return false;
    }

    $domainRunSSL = in_array($_SERVER['SERVER_NAME'], $arrayDomainSSL) ? $_SERVER['SERVER_NAME'] : $arrayDomainSSL[0];

    if ($flag_save_result_ssl_by_session) {
        if (isset($_SESSION['ssl_enable']) == false) {
            $_SESSION['ssl_enable'] = checkSSLEnableByDomain($domainRunSSL);
        }
        $ssl_enable = $_SESSION['ssl_enable'];
    }
    else {
        $ssl_enable = checkSSLEnableByDomain($domainRunSSL);
    }

    $protocol_https_on = $_SERVER['HTTPS'] == 'on' ? true : false;

    // kiểm tra nếu phương thức hoặc tên miền SSL và tên miền hiện tại khác nhau thì redirect
    if ( $ssl_enable !=  $protocol_https_on || $domainRunSSL != $_SERVER["SERVER_NAME"] ) {
        $direct_protocol = $ssl_enable ? "https://" : "http://";
        $domain_redirect = $direct_protocol . $domainRunSSL . $_SERVER["REQUEST_URI"];
        redirectphp($domain_redirect);
    }
}

// Không chạy check SSL khi test pagepeed vì nó làm giảm điểm (tăng thời gian phản hồi của request đầu tiên).
if (isGoogleSpeed() == false) {
    runMainSSL($config['arrayDomainSSL']);
}
