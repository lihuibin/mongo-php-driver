--TEST--
MongoDB\BSON\Javascript unserialization does not allow code to contain null bytes
--SKIPIF--
<?php require __DIR__ . "/../utils/basic-skipif.inc"?>
--FILE--
<?php
require_once __DIR__ . "/../utils/basic.inc";

echo throws(function() {
    unserialize('O:23:"MongoDB\BSON\Javascript":1:{s:4:"code";s:30:"function foo() { return ' . "'\0'" . '; }";}');
}, 'MongoDB\Driver\Exception\InvalidArgumentException'), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
OK: Got MongoDB\Driver\Exception\InvalidArgumentException
Code cannot contain null bytes
===DONE===
