<?php

// This file contains common code needed by all CLI commands

// Shared options
$debug = false;
$api_mode = 'test';

/**
 * Return command line options common to all CLI scripts
 *
 * @return String
 */
function cli_common_options() {
	return '[--debug] [--live|--test]';
}

if (!file_exists(__DIR__.'/vendor/autoload.php')) {
	die('You must set up the project dependencies (do: composer install)');
}

require __DIR__.'/vendor/autoload.php';

// Parsing of shared options
if ($argc > 1) {
	foreach ($argv as $key => $value) {
		if ($key == 0):
		elseif ('-?' == $value || '--help' == $value): { print_usage(); exit; }
		elseif ('--debug' == $value): $debug = true;
		elseif ('--live' == $value): $api_mode = 'live';
		elseif ('--test' == $value): $api_mode = 'test';
		endif;
    }
}

// Loading from environment
if (file_exists(__DIR__.'/.env')) {
	$dotenv = new \Dotenv\Dotenv(__DIR__);
	$dotenv->load();
}

foreach (['CLIENT_ID', 'CLIENT_SECRET', 'SERVER_TOKEN'] as $required_env_var) {
	if (!isset($_ENV[$required_env_var])) {
		die("$required_env_var needs to be set in the environment. Aborting.");
	}
}



/**
 * Handle an API error response, and optionally die
 *
 * @param Hmrc	  $hmrc - objecting containing the error
 * @param Boolean $die	- whether to die() or not
 */
function report_api_error($hmrc, $die = true) {

	echo "API call failed with status code {$hmrc->statusCode}. The result and response body follow.\n";
	var_dump($hmrc->result);
	var_dump($hmrc->responseBody);

	if ($die) die();
	
}
