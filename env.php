<?php
$EMAIL_PASSWORD = getenv('GNATOC_EMAIL_PASSWORD');
$SENDER = getenv('GNATOC_SENDER');

$output_folder = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'output' . DIRECTORY_SEPARATOR;
$codePath = $output_folder . 'AUTHENTICATION_CODES.pdf';








