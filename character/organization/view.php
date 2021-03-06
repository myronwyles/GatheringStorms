<?php

// abilities section
$output = new BuildOutput("Organization");

// id
$output->add("id", $pkid, 0, 0);

if(!$view->characterOrganization[organization]['list'][0]) {
	$output->addEdit("No organizations available at this location.");
}
else {
	// organizations, with title and master
	$output->add("organization", $view->characterOrganization[organization], 0, "", "130", 
		array("DELETE", "; ", "BREAK",
			array("title", "0", "Title", "80"), 
			array("master_id", 0, "Master", "40"), // $view->characterOrganization[organization][#][master][name]
			array("is_deleted", 0, 0, 0)
		)
	);
}

echo $output->dump(1);

unset($view->characterOrganization[organization]['list']);

// display all members of each organization
for($i = 0; $i < count($view->characterOrganization[organization]); $i++) {
	echo("<div><b>{$view->characterOrganization[organization][$i][name]}</b><br>");
	echo("<table class=\"orgTable\"><tr class=\"orgTR\">");
	for($j = 0; $j < count($view->characterOrganization[organization][$i][master][0]); $j++) { // repeat for each master (master_ID = 0)
		echo("<td class=\"orgTD\">");
		build_org($i, $view->characterOrganization[organization][$i][master][0][$j], $view->characterOrganization);
		echo("</td>");
	}
	echo("</tr></table></div>");
}

?>
