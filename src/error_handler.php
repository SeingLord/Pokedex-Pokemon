<?php

function setInternarlServerError($errNo =null, $errStr=null, $errFile=null, $errLine=null){
    echo '<h1>Estamos em manutenção</h1>';
    echo '<h2>Tente mais tarde</h2>';
    http_response_code(500);
    if(!DEBUG){
        exit;
    }
    if(is_object($errNo)){
        $err = $errNo;
        $errNo = $err->getCode();
        $errStr = $err->getMessage();
        $errFile = $err->getFile();
        $errLine = $err->getLine();
    }
    echo '<span style="font-weight:bold; color:red;">';

    switch ($errNo){
        case E_USER_ERROR:
            echo '<strong>Error: </strong> ['. $errNo.']'. $errStr.'<br>/n';
            echo 'Fatal error on line'. $errLine.' no arquivo '. $errFile;
            break;
        case E_USER_WARNING:
            echo '<strong>Warning: </strong> ['. $errNo.']'. $errStr.'<br>/n';
            echo 'Fatal error on line'. $errLine.' no arquivo '. $errFile;
            break;
        case E_USER_NOTICE:
            echo '<strong>Notice: </strong> ['. $errNo.']'. $errStr.'<br>/n';
            echo 'Fatal error on line'. $errLine.' no arquivo '. $errFile;
            break;
        default :
            echo 'Unknow error type: ['.$errNo. '] '.$errStr.'<br>\n';
            echo 'Fatal erro on line'. $errLine.' no arquivo '.$errFile;        
    }
    echo '</span>';
    echo '<ul>';
    foreach(debug_backtrace() as $error){
        if(!empty($error['file'])){
            echo '<li>';
            echo $error['file'].':';
            echo $error['line'];
            echo '</li>';
        }
    }
    echo '</ul>';
    exit;
}

set_error_handler('setInternarlServerError');
set_exception_handler('setInternarlServerError');