<?php
/**
 * File module.php
 *
 * @package google
 * @version //autogentag//
 * @copyright Copyright (C) 2007 xrow. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl.txt GPL License
 */
$Module = array( 'name' => 'Google',
                 'variable_params' => true );

$ViewList = array();
$ViewList['search'] = array(
    'functions' => array( ),
    'default_navigation_part' => 'ezcontentnavigationpart',
    'script' => 'search.php',
    'params' => array( 'ViewMode' ),
    'unordered_params' => array( 'offset' => 'Offset' ) );

$ClassID = array(
    'name'=> 'Class',
    'values'=> array(),
    'path' => 'classes/',
    'file' => 'ezcontentclass.php',
    'class' => 'eZContentClass',
    'function' => 'fetchList',
    'parameter' => array( 0, false, false, array( 'name' => 'asc' ) )
    );

$ParentClassID = array(
    'name'=> 'ParentClass',
    'values'=> array(),
    'path' => 'classes/',
    'file' => 'ezcontentclass.php',
    'class' => 'eZContentClass',
    'function' => 'fetchList',
    'parameter' => array( 0, false, false, array( 'name' => 'asc' ) )
    );

$SectionID = array(
    'name'=> 'Section',
    'values'=> array(),
    'path' => 'classes/',
    'file' => 'ezsection.php',
    'class' => 'eZSection',
    'function' => 'fetchList',
    'parameter' => array( false )
    );

$VersionStatusRead = array(
    'name'=> 'Status',
    'values'=> array(),
    'path' => 'classes/',
    'file' => 'ezcontentobjectversion.php',
    'class' => 'eZContentObjectVersion',
    'function' => 'statusList',
    'parameter' => array( 'read' )
    );

$VersionStatusRemove = array(
    'name'=> 'Status',
    'values'=> array(),
    'path' => 'classes/',
    'file' => 'ezcontentobjectversion.php',
    'class' => 'eZContentObjectVersion',
    'function' => 'statusList',
    'parameter' => array( 'remove' )
    );

$Language = array(
    'name'=> 'Language',
    'values'=> array(),
    'path' => 'classes/',
    'file' => 'ezcontentlanguage.php',
    'class' => 'eZContentLanguage',
    'function' => 'fetchLimitationList',
    'parameter' => array( false )
    );

$Assigned = array(
    'name'=> 'Owner',
    'values'=> array(
        array(
            'Name' => 'Self',
            'value' => '1')
        )
    );

$AssignedEdit = array(
    'name'=> 'Owner',
    'single_select' => true,
    'values'=> array(
        array( 'Name' => 'Self',
               'value' => '1'),
        array( 'Name' => 'Self or anonymous users per HTTP session',
               'value' => '2' ) ) );

$ParentDepth = array(
    'name' => 'ParentDepth',
    'values' => array(),
    'path' => 'classes/',
    'file' => 'ezcontentobjecttreenode.php',
    'class' => 'eZContentObjectTreeNode',
    'function' => 'parentDepthLimitationList',
    'parameter' => array( false )
    );

$Node = array(
    'name'=> 'Node',
    'values'=> array()
    );

$Subtree = array(
    'name'=> 'Subtree',
    'values'=> array()
    );


// Module definition





?>
