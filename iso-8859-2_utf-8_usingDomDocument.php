<?php

/**
 * according to docs DOMDocument works only with utf-8 encoded string
 */

// $content = "..."

$contentUTF = iconv("ISO-8859-2", "UTF-8", $content);
$contentPackedWithUTF = mb_convert_encoding($contentUTF, 'HTML-ENTITIES', 'UTF-8');

$document = new DOMDocument();
$document->loadHTML($contentPackedWithUTF);

// do some work

$htmlContentUTF = $document->saveHTML($document->documentElement);
$htmlContentISO = mb_convert_encoding($htmlContentUTF, "ISO-8859-2", "UTF-8");

$content = $htmlContentISO;
