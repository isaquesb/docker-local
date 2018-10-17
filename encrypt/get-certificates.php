<?php
ini_set('max_execution_time', 120);

$email = array('isaque.barbosa@bsy.com.br');

if (!file_exists(__DIR__ . '/../vendor/autoload.php')) {
    return;
}

require_once __DIR__ . '/../vendor/autoload.php';

define('APPS_PATH', realpath(__DIR__ . '/../apps'));

if (!is_dir(__DIR__ . '/maps')) {
    mkdir(__DIR__ . '/maps', 0777);
}
$directory = new \DirectoryIterator(__DIR__ . '/maps');

if (!is_writable(__DIR__ . '/keys')) {
    echo 'Certificate Keys Directory is not Writable';
    return;
}

foreach ($directory as $fileInfo) {
    if ($fileInfo->isDot() || strpos($fileInfo->getFilename(), '.map.php') === false) continue;
    /**
     * @var array $config
     */
    $config = include $directory->getPath() . '/' . $fileInfo->getFilename();
    foreach ($config as $basename => $map) {

        $domains = array_keys($map);
        $client = new \LEClient\LEClient($email, false, LEClient\LEClient::LOG_STATUS);

        $order = $client->getOrCreateOrder($basename, $domains);

        if (!$order->allAuthorizationsValid()) {
            $pending = $order->getPendingAuthorizations(\LEClient\LEOrder::CHALLENGE_TYPE_HTTP);
            if (!empty($pending)) {
                foreach ($pending as $challenge) {
                    $folder = $map[$challenge['identifier']] . '/.well-known/acme-challenge/';
                    if(!file_exists($folder)) mkdir($folder, 0777, true);
                    file_put_contents($folder . $challenge['filename'], $challenge['content']);
                    $order->verifyPendingOrderAuthorization($challenge['identifier'], \LEClient\LEOrder::CHALLENGE_TYPE_HTTP);
                }
            }
        }

        if ($order->allAuthorizationsValid()) {
            if (!$order->isFinalized()) {
                $order->finalizeOrder();
            }
            if ($order->isFinalized()) {
                $order->getCertificate();
            }
        }
    }
}
