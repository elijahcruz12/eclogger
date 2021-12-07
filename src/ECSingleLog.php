<?php


namespace elijahcruz12\eclogger;


class ECSingleLog
{
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