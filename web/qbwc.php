<?php

$s = empty($_SERVER['HTTPS']) ? '': 's';

$base = "http$s://" . $_SERVER['SERVER_NAME'] . ':' .$_SERVER['SERVER_PORT'];
$appUrl = $base . dirname($_SERVER['REQUEST_URI']) . '/server.php';
$supportUrl = $base . dirname($_SERVER['REQUEST_URI']) .'/index.php';

$xml = <<<XML
<?xml version="1.0"?>
<QBWCXML>
    <AppName>PHP Quickbooks Web Connector</AppName>
    <AppID>123123AAA</AppID>
    <AppURL>$appUrl</AppURL>
    <AppDescription>PHP Quickbooks Web Connector</AppDescription>
    <AppSupport>$supportUrl</AppSupport>
    <UserName>username</UserName>
    <OwnerID>{9AAA4FB7-33D9-4815-AC85-AC86A7E7D1EB}</OwnerID>
    <FileID>{57FZZB6-86F1-4FCC-B1FF-967DE1813D20}</FileID>
    <QBType>QBFS</QBType>
</QBWCXML>
XML;

header('Content-Type: text/xml');
header('Content-Disposition: attachment; filename="test.qwc"');
echo $xml;