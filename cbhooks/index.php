<?php

define('SITE_URL', 'https://www.rebeccacrosdalebooks.com');
define('TOKEN', 'afWEy3pIiXaBj0KFhZASJD');
define('EVENT', 'Push Hook');

$headers     = getallheaders();
$headerEvent = isset($headers['X-Gitlab-Event']) ? $headers['X-Gitlab-Event'] : null;
$headerToken = isset($headers['X-Gitlab-Token']) ? $headers['X-Gitlab-Token'] : null;

$input   = json_decode(file_get_contents('php://input'), true);
$project = isset($input['project']['name']) ? $input['project']['name'] : null;

if (is_null($project)) {
    consoleLog('Missing project name');
    die;
}

if ($headerEvent != EVENT && $headerToken != TOKEN) {
    consoleLog('Not allowed');
    die;
}

putenv('PROJECT=' . $project);
putenv('SITE_URL=' . SITE_URL);
exec('./cbhooks.sh 2>&1', $output, $result);

if (count($output) > 0) {
    foreach ($output as $key) {
        consoleLog($key);
    }
}

function consoleLog($string)
{
    $timestamp = date('[Y-m-d H:i:s]');
    echo "{$timestamp} {$string}" . PHP_EOL;
}

echo 'DONE';
