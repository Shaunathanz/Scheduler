<?php
function display_errors($errors=array()) {
    $output = '';
    if(!empty($errors)) {
        $output .= "<div class=\"errors\">";
        $output .= "Please fix the following errors:";
        $output .= "<ul>";
        foreach($errors as $error) {
            $output .= "<li>" . h($error) . "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    return $output;
}

//	An item entry from the DB might have multiple URLs sepearated by ';' characters
// Returns a string array of string items
function handlemultipleitems($item) {
	$urlarray = explode(';',$item);
			
	return $urlarray;
}

//	An item entry from the DB might have multiple URLs sepearated by ';' characters
//	This function counts how many items are in that long string
function countitems($item) {
	$urlarray = explode(';',$item);
	$ctr = 0;
			
	foreach ($urlarray as $subitem) {
		if (trim($subitem) != '') {
			$ctr += 1;
		}
	}
		
	return $ctr;
}
?>
