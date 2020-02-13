<?php
/**
 * ECLogger
 * @author Elijah Cruz
 * @version 0.0.1
 * @license MIT
 *
 * Minimum PHP Version: 5.1
 *
 * ECLogger is an error logger. Log all your errors, warnings, and more in one, or multiple files, at once.
 */

namespace elijahcruz12\eclogger;


//If you want to log to just one file
class ecSingleLog {
    public $file;

    function file($file){
        $this->file = fopen($file, 'a+');
    }


    //TODO: ADD EXTRA LOGGING LEVELS: DEBUG 100, INFO 200, NOTICE 250, WARNING 300, ERROR 400, CRITICAL 500, ALERT 550, EMERGENGY 600. SEE RFC 5424 FOR MORE.
    function debug($status){
        fwrite($this->file, date(DATE_ATOM) . ' DEBUG: ' . $status . PHP_EOL);
    }

    function info($status){
        fwrite($this->file, date(DATE_ATOM) . ' INFO: ' . $status . PHP_EOL);
    }

    function notice($status){
        fwrite($this->file, date(DATE_ATOM) . ' NOTICE: ' . $status . PHP_EOL);
    }


    function warning($status){
        fwrite($this->file, date(DATE_ATOM) . ' WARNING: ' . $status . PHP_EOL);
    }

    function error($status){
        fwrite($this->file, date(DATE_ATOM) . ' ERROR: ' . $status . PHP_EOL);
    }

    function critical($status){
        fwrite($this->file, date(DATE_ATOM) . ' CRITICAL: ' . $status . PHP_EOL);
    }


    function alert($status){
        fwrite($this->file, date(DATE_ATOM) . ' ALERT: ' . $status . PHP_EOL);
    }

    function emergency($status){
        fwrite($this->file, date(DATE_ATOM) . ' EMERGENCY: ' . $status . PHP_EOL);
    }
}

class ecMultiLog {
    //DEBUG 100, INFO 200, NOTICE 250, WARNING 300, ERROR 400, CRITICAL 500, ALERT 550, EMERGENGY 600
    public $fallbacklog;
    public $debuglog;
    public $infolog;
    public $noticelog;
    public $warninglog;
    public $errorlog;
    public $criticallog;
    public $alertlog;
    public $emergencylog;

    function newFallbackLog($file){
        $this->fallbacklog = fopen($filename, "a+");
    }
    function newLogFile($file, $logtype){
        if($logtype == 'debug'){
            $this->debuglog = fopen($file, 'w');
        }
        elseif($logtype == 'info'){
            $this->infolog = fopen($file, 'w');
        }
        elseif($logtype == 'notice'){
            $this->noticelog = fopen($file, 'w');
        }
        elseif($logtype == 'warning'){
            $this->warninglog = fopen($file, 'w');
        }
        elseif($logtype == 'error'){
            $this->errorlog = fopen($file, 'w');
        }
        elseif($logtype == 'critical'){
            $this->criticallog = fopen($file, 'w');
        }
        elseif($logtype == 'alert'){
            $this->alertlog = fopen($file, 'w');
        }
        elseif($logtype == 'emergency'){
            $this->emergencylog = fopen($file, 'w');
        }
        else {
            //TODO: Add different Errors for different reasons.
            echo "Error";
        }

    }
    //TODO: Make it possible to use the fallback file for select types.
    function newLog($type, $status) {
        if($type == 'debug'){
            fwrite($this->debuglog, date(DATE_ATOM) . ' DEBUG: ' . $status . PHP_EOL);
        }
        elseif($type == 'info'){
            fwrite($this->infolog, date(DATE_ATOM) . ' INFO: ' . $status . PHP_EOL);
        }
        elseif($type == 'notice'){
            fwrite($this->noticelog, date(DATE_ATOM) . ' NOTICE: ' . $status . PHP_EOL);
        }
        elseif($type == 'warning'){
            fwrite($this->warninglog, date(DATE_ATOM) . ' WARNING: ' . $status . PHP_EOL);
        }
        elseif($type == 'error'){
            fwrite($this->errorlog, date(DATE_ATOM) . ' ERROR: ' . $status . PHP_EOL);
        }
        elseif($type == 'critical'){
            fwrite($this->criticallog, date(DATE_ATOM) . ' CRITICAL: ' . $status . PHP_EOL);
        }
        elseif($type == 'alert'){
            fwrite($this->alertlog, date(DATE_ATOM) . ' ALERT: ' . $status . PHP_EOL);
        }
        elseif($type == 'emergency'){
            fwrite($this->emergencylog, date(DATE_ATOM) . ' EMERGENCY: ' . $status . PHP_EOL);
        }
        else {
            //TODO: Add different Errors for different reasons.
            echo "Error";
        }
    }
}