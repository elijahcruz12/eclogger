# ECLogger  
ECLogger is a Composer Package that allows you to create log files for you to use in your project.  
  
## Installation  
The easiest way to install is using **Composer**
Composer Globally installed:
`composer require elijahcruz12/eclogger`
Composer.phar file:
`php composer.phar require elijahcruz12/eclogger`

## Usage
There are two ways you can use ECLogger, Either using a single file, or by using multiple files. Both ways work differently than the other (as of now). There are also different log types you can use.
### The Different Log Types There Are
There are *8* different types of logs you can use. These are the [RFC 3339](https://tools.ietf.org/html/rfc3339) Standards. They are:
````
DEBUG 100
INFO 200
NOTICE 250
WARNING 300
ERROR 400
CRITICAL 500
ALERT 550
EMERGENGY 600
````

### Log Format
The Log Format is Fairly Simple. Is works like this:
`DATE_ATOM . LOG_TYPE . LOG_MESSAGE`
This causes each log entry to look like this:
`2013-04-12T15:52:01+00:00 ERROR: This is an error.`
### Single File Usage
If you are using one file to store all your log files, you can choose the file using the `ecSingleLog` class:
````
<?php  
require 'index.php';  
  
use elijahcruz12\eclogger;  
  
$log = new eclogger\ecSingleLog();  
  
$log->file('single.log');
  
$log->error('This is an error message');
?>
````
Let's break this down for you so you can understand what is going on here:
`$log->file('single.log');` = This function selects the file you want to use. You can use any file. This also allows you to use a file in a subdirectory.
`$log->error('This is an error message');` = With this function, you can log an error into the file. Each of the log types has a different function based on their own name (eg. `debug()`, `alert()`, or `notice`).

### Multi File Usage
If you need or want to use a different file for each log type, you can do so using the `ecMultiLog` class.

````
<?php  
require 'index.php';  
  
use elijahcruz12\eclogger;  
  
$log = new eclogger\ecMultiLog();  
  
// My Fallback Log  
$log->newFallbackLog('fallback.log');  
  
// My Error Log  
$log->newLogFile('error.log', 'error');  
  
// My Notice Log  
$log->newLogFile('notice.log', 'notice');  
  
$log->newLog('error', 'This is an error');  
  
$log->newLog('notice', 'This is a notice.');
?>
````
Let's break this down to make this easier.
`$log->newFallbackLog('fallback.log');` = This log allows you to have a log file to use for any log types that haven't been initialized. In the case of the script used above, if you were to add the line `$log->newLog('debug', 'This is a debug log.');` before the closing php tag, it would result in that debug log going into the fallback log file.

## Functions Reference
*The function reference is a work in progress*
### Single File
| Function | Description                                                             |
|----------|-------------------------------------------------------------------------|
| file()   | Opens file to use as the single log, creates file if it does not exist. |
| debug()  | Adds a debug log to the single log file.                                |
| info()   | Adds an info log to the single log file.                                                                        |
