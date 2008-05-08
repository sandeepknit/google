<?php
/**
 * File containing the Google class.
 *
 * @package google
 * @version //autogentag//
 * @copyright Copyright (C) 2007 xrow. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl.txt GPL License
 */
class Google
{
    function Google()
    {
        
    }
    function search( $searchText, $params, $searchTypes )
    {
        include_once("lib/ezxml/classes/ezxml.php");
        include_once("extension/ezpowerlib/ezpowerlib.php");
        include_once("HTTP/Client.php");
        $ini = eZINI::instance( "google.ini" );
        $data = array();
        $data['q'] = $searchText;
        $data['client'] = $ini->variable( "GoogleSettings", "DefaultFrontend" );
        $data['output'] = 'xml_no_dtd';
        $data['start'] = $params['SearchOffset'];
        $data['num'] = $params['SearchLimit'];
        $data['ie'] = 'utf8';
        $data['oe'] = 'utf8';
        if ( $ini->hasVariable( 'GoogleSettings', 'Collections' ) and is_array( $ini->variable( 'GoogleSettings', 'Collections' ) ) )
        {
            $data['site'] = join( '|', $ini->variable( 'GoogleSettings', 'Collections' ) );
        }

        $client = new HTTP_Client();
        if ( $client->get( $ini->variable( "GoogleSettings", "URL" ), $data ) == 200 )
        {
            $xml = new eZXML;
            $dom = $xml->domTree( $client->_responses[0]['body'] );
            //eZDebug::writeDebug( $client->_responses[0]['body'] );
            $root = $dom->get_root();
            if ( $root->Name == 'GSP' )
            {
                $resultset = $root->elementByName( 'RES' );
                if ( !is_object( $resultset ) )
                {
                    $searchResult['SearchResult'] = array();
                    $searchResult['SearchCount'] = 0;
                    return $searchResult;
                }
                $count = $resultset->elementByName( 'M' );
                $result = $resultset->elementsByName( 'R' );
                $result2 = array();
                foreach ( $result as $item )
                {
                    $result3= array();
                    $result3['number'] = $item->Attributes[0]->content;
                    $url = $item->elementByName( 'U' );
                    if ( $url )
                    $result3['url'] = $url->Children[0]->content;
                    $name = $item->elementByName( 'T' );
                    if ( $name )
                        $result3['name'] = strip_tags( $name->Children[0]->content );
                    $date = $item->elementByName( 'CRAWLDATE' );
                    if ( $date )
                        $result3['date'] = strip_tags( $date->Children[0]->content );
                    $description = $item->elementByName( 'S' );
                    if ( $description )
                        $result3['description'] = strip_tags( $description->Children[0]->content );
                    $result2[] = $result3;
                }
                $searchResult['SearchResult'] = $result2;
                if ( is_object( $count ) )
                    $searchResult['SearchCount'] = $count->Children[0]->Content;
                else
                    $searchResult['SearchCount'] = 0;
                 return $searchResult;
            }    
            return false;
        }
        eZDebug::writeError( "Google did not answer correctly on " . $ini->variable( "GoogleSettings", "URL" ), "Google" );
        return false;
    }
}
?>