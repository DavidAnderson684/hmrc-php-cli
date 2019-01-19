<?php

use \EcoMtd\Hmrc;
use \EcoMtd\HmrcVat;

require_once __DIR__ . '/cli-common.php';

/**
 * Print out help on using this script
 */
function print_usage()
{
	echo "Creates an HMRC user for running tests with.

Usage: create-test-user.php ".cli_common_options()."\n";

}

$credentials = [
	'clientId' => $_ENV['CLIENT_ID'],
	'clientSecret' => $_ENV['CLIENT_SECRET'],
	'serverToken' => $_ENV['SERVER_TOKEN'],
];

$vat = new HmrcVat('', '', '', $api_mode, null, $credentials);

$create_test_user = $vat->createTestUser();

if (Hmrc::RETURN_SUCCESS !== $create_test_user) report_api_error($vat);

echo "Success.\n";

print_r($vat->responseBody);
