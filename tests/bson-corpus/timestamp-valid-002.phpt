--TEST--
Timestamp type: Timestamp: (123456789, 42) (keys reversed)
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$canonicalBson = hex2bin('100000001161002A00000015CD5B0700');
$canonicalExtJson = '{"a" : {"$timestamp" : {"t" : 123456789, "i" : 42} } }';
$degenerateExtJson = '{"a" : {"$timestamp" : {"i" : 42, "t" : 123456789} } }';

// Canonical BSON -> Native -> Canonical BSON 
echo bin2hex(fromPHP(toPHP($canonicalBson))), "\n";

// Canonical BSON -> Canonical extJSON 
echo json_canonicalize(toCanonicalExtendedJSON($canonicalBson)), "\n";

// Canonical extJSON -> Canonical BSON 
echo bin2hex(fromJSON($canonicalExtJson)), "\n";

// Degenerate extJSON -> Canonical BSON 
echo bin2hex(fromJSON($degenerateExtJson)), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
100000001161002a00000015cd5b0700
{"a":{"$timestamp":{"t":123456789,"i":42}}}
100000001161002a00000015cd5b0700
100000001161002a00000015cd5b0700
===DONE===