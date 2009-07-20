<?php
  // only logged in users can add blog posts
  gatekeeper();
 
  // get the form input
  $title = get_input('title');
  $body = get_input('body');
  $tags = string_to_tag_array(get_input('tags'));
  $container_guid = get_input('container');
 
  // create a new blog object
  $groupfeed = new ElggObject();
  $groupfeed->title = $title;
  $groupfeed->description = $body;
  $groupfeed->subtype = "groupfeed";
 
  // for now make all blog posts public
  $groupfeed->access_id = ACCESS_PUBLIC;
 
  // owner is logged in user
  $groupfeed->owner_guid = get_loggedin_userid();
 
  // save tags as metadata
  $groupfeed->tags = $tags;
  
  // adds to group
  $groupfeed->container_guid = $container_guid;

 
  // save to database
  $groupfeed->save();
 
  // forward user to a page that displays the post
  forward($groupfeed->getURL());
?>