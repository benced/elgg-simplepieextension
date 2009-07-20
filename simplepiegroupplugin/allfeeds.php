<?php

  // Load Elgg engine
  require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

// make sure only logged in users can see this page	
    gatekeeper();
    
    #$feedview = list_entities('object','groupfeed',0,10,false);
    $user_guid = $_GET["id"];
    $feedview = list_user_objects($user_guid,'groupfeed',10,false);

    $feedview = elgg_view_layout('one_column', $feedview);
     
    page_draw("List of feeds",$feedview);
?>