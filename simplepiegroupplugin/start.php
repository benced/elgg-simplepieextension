

<?php

    extend_view('groups/rightcolumn','simplepiegroupplugin/groupprofile_files');    

    function simplepiegroupplugin_submenus() {
	global $CONFIG;
    #Uncomment to add to user profile
	#extend_view('profile/menu/actions', 'simplepiegroupplugin/menu');
	if (get_context() == "groups") {
    $page_owner = page_owner_entity();
    # TODO Get Translation to work
	#add_submenu_item(elgg_echo('simplepiegroupplugin:addgroupfeed'), $CONFIG->wwwroot . "mod/simplepiegroupplugin/addfeed.php");
	add_submenu_item(elgg_echo('Add RSS Feed'), $CONFIG->wwwroot . "mod/simplepiegroupplugin/addfeed.php?id=" . $page_owner->getGUID());
	add_submenu_item(elgg_echo('View Feeds'), $CONFIG->wwwroot . "mod/simplepiegroupplugin/allfeeds.php?id=" . $page_owner->getGUID());
    }
    }
    #TODO create init function
	#register_elgg_event_handler('init','system','simplepiegroupplugin_init');
	register_elgg_event_handler('pagesetup','system','simplepiegroupplugin_submenus');
	
	register_action("simplepiegroupplugin/save", false, $CONFIG->pluginspath . "simplepiegroupplugin/actions/save.php");
	
	?>