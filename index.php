<?php
/**
 * User: Eric Wallmander
 * Date: 2012-10-09
 * Time: 15:14
 */

require_once 'sys/start.php';
$t = $c['template'];

// Get page

$inputPage = '';
if(!ISCLI)
    $inputPage = (!empty($_GET['p'])) ? $_GET['p'] : '';
else // Terminalen
    list($inputPage) = getopt('a:');

$page = (preg_match('/[a-zA-Z0-9_-]+/', $inputPage) AND file_exists('pages/'.$inputPage.'.php')) ? $inputPage : 'index';

// Set body classes
$body_classes = (array_key_exists($page, $t['bodyClasses'])) ? implode(' ', $t['bodyClasses'][$page]) : '' ;

// Rock 'n' roll!
require_once 'layout/header.php';
require_once "pages/$page.php";
require_once 'layout/footer.php';