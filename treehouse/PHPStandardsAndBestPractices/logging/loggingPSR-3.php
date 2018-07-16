<?php
//using monolog to log files - PSR-3

include "./vendor/autoload.php";//including composer autoload - load monolog code

use Monolog\Logger;//referencing the monlog logger in a user statement - make logger available in the global space
use Monolog\Handler\BrowserConsoleHandler;//bringing another class into the global space - BrowserConsoleHandler. handler - a class which decides how logs should be sent to various locations

// create a log channel
$log = new Logger('my_app');//instantiate Logger class. Pass string as an argument - name of our logger

$log->pushHandler(new BrowserConsoleHandler(Logger::CRITICAL));//set up handlers - use pushHandler(), add instances of handler in this instance BrowserConsoleHandler (can add multiple handlers)

foreach (range(1, 10) as $foo) {
    $log->debug('Something is happening.', ['foo' => $foo]);
}

$log->warning('Maybe bad.');

$log->error('Bad.');

$log->critical('Super Bad.');

echo "Check the logs to see whats happening in here...";

?>