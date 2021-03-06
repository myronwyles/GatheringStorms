<?php

// main section
$output = new BuildOutput("Main");

// id
$output->add("id", $pkid, 0, 0);

// name
$output->addRead("<h6 class=\"statBlockTitle\">");
if($view->locationMain[name]) {
	$output->add("name", $view->locationMain[name], "", 0, 0);
}
else {
	$output->add("name", $id, "", 0, 0);
}
$output->add("name", $view->locationMain[name], 0, "Name", "200");
$output->addRead(" &nbsp; &nbsp; ");
// cr
$output->add("cr", $view->locationMain[cr], "CR", "CR", "70");
$output->addRead("</h6>");
$output->addEdit("<br>");

// alignment
$output->add("alignment", $view->locationMain[alignment], "", "Alignment", "50");
// type
$output->add("", $view->locationMain[type], "", 0, 0);
$output->br();

// corruption
$output->add("", sign_format($view->locationMain[modifiers][corruption]), "<span title=\"Corruption measures how open a settlement's officials are to bribes, how honest its citizens are, and how likely anyone in town is to report a crime. Low corruption indicates a high level of civic honesty. A settlement's corruption modifies all Bluff checks made against city officials or guards and all Stealth checks made outside.\">Cor</span>", 0, 0);
// crime
$output->add("", sign_format($view->locationMain[modifiers][crime]), "; <span title=\"Crime is a measure of a settlement's lawlessness. A settlement with a low crime modifier is relatively safe, with violent crimes being rare or even unknown, while a settlement with a high crime modifier is likely to have a powerful thieves' guild and a significant problem with violence. The atmosphere generated by a settlement's crime level applies as a modifier on Sense Motive checks to avoid being bluffed and to Sleight of Hand checks made to pick pockets.\">Crime</span>", 0, 0);
// economy
$output->add("", sign_format($view->locationMain[modifiers][economy]), "; <span title=\"A settlement's economy modifier indicates the health of its trade and the wealth of its successful citizens. A low economy modifier doesn't automatically mean the town is beset with poverty - it could merely indicate a town with little trade or one that is relatively self-sufficient. Towns with high economy modifiers always have large markets and many shops. A settlement's economy helps its citizens make money, and thus it applies as a modifier on all Craft, Perform, and Profession checks made to generate income.\">Econ</span>", 0, 0);
// law
$output->add("", sign_format($view->locationMain[modifiers][law]), "; <span title=\"Law measures how strict a settlement's laws and edicts are. A settlement with a low law modifier isn't necessarily crime-ridden - in fact, a low law modifier usually indicates that the town simply has little need for protection since crime is so rare. A high law modifier means the settlement's guards are particularly alert, vigilant, and well-organized. The more lawful a town is, the more timidly its citizens tend to respond to shows of force. A settlement's law modifier applies on Intimidate checks made to force an opponent to act friendly, Diplomacy checks against government officials, or Diplomacy checks made to call on the city guard.\">Law</span>", 0, 0);
// lore
$output->add("", sign_format($view->locationMain[modifiers][lore]), "; <span title=\"A settlement's lore modifier measures not only how willing the citizens are to chat and talk with visitors, but also how available and accessible its libraries and sages are. A low lore modifier doesn't mean the settlement's citizens are idiots, just that they're close-mouthed or simply lack knowledge resources. A settlement's lore modifier applies on Diplomacy checks made to gather information and Knowledge checks made using the city's resources to do research when using a library.\">Lore</span>", 0, 0);
// society
$output->add("", sign_format($view->locationMain[modifiers][society]), "; <span title=\"Society measures how open-minded and civilized a settlement's citizens are. A low society modifier might mean many of the citizens harbor prejudices or are overly suspicious of out-of-towners. A high society modifier means that citizens are used to diversity and unusual visitors and that they respond better to well-spoken attempts at conversation. A settlement's society modifier applies on all Disguise checks, as well as on Diplomacy checks made to alter the attitude of any non-government official.\">Soc</span>", 0, 0);
$output->addRead("<br>");

// qualities
$output->add("qualities", $view->locationMain[qualities], "Qualities ({$view->locationMain[qualities_count]})", "Qualities", "100");
	$output->add("disadvantages", $view->locationMain[disadvantages], 0, "Disadv.", "130");
$output->br();

// danger
$output->add("", sign_format($view->locationMain[danger]), "Danger", 0, 0);
// disadvantages
if($view->locationMain[disadvantages][value][0]) {
	$output->add("", $view->locationMain[disadvantages], ", Disadvantages", 0, 0);
}
$output->br();

// demographics subsection
$output->add("", "<h6 class=\"statBlockSection\">Demographics</h6>", "", "", "");

// government
$output->add("government", $view->locationMain[government], "Government", "Government", "100");
$output->addRead("<br>");

// population
$output->add("", number_format($view->locationMain[population]), "Population", 0, 0);
$output->add("population", $view->locationMain[population], 0, "Population", "100");
$output->br();

// market place subsection
$output->add("", "<h6 class=\"statBlockSection\">Market Place</h6>", "", "", "");

// base value
$output->add("", number_format($view->locationMain[base_value]) . " gp", "Base Value", 0, 0);
// purchase limit
$output->add("", number_format($view->locationMain[purchase_limit]) . " gp", "; Purchase Limit", 0, 0);
$output->addRead("<br>");

// spellcasting
$output->add("", ordinal_format($view->locationMain[spellcasting]), "Spellcasting", 0, 0);
// minor magic
$output->add("", $view->locationMain[minor_magic] . ' minor, ' . $view->locationMain[medium_magic] . ' medium, ' . $view->locationMain[major_magic] . ' major', "; Magic Items", 0, 0);
$output->addRead("<br>");

// description subsection
$output->add("", "<h6 class=\"statBlockSection\">Description</h6>", "", "", "");

// description
$output->add("description", $view->locationMain[description], "", "Description", "textarea");

echo $output->dump(1);

?>
