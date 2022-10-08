<?php
$fakeVerbs = array (
    array("infinitive1","past1","pastparticiple1","translation1"),
    array("infinitive2","past2","pastparticiple2","translation2"),
    array("infinitive3","past3","pastparticiple3","translation3"),
    array("infinitive4","past4","pastparticiple4","translation4"),
    array("infinitive5","past5","pastparticiple5","translation5"),
    array("infinitive6","past6","pastparticiple6","translation6"),
    array("infinitive7","past7","pastparticiple7","translation7"),
    array("infinitive8","past8","pastparticiple8","translation8"),
    array("infinitive9","past9","pastparticiple9","translation9"),
    array("infinitive10","past10","pastparticiple10","translation10"),
);

function createVerbsList($level, $verbsNum, $list)
{
    $result = array();
    $indexesList = array();


    //Add verbs to the array
    while (count($indexesList) < $verbsNum) {
        $index = rand(0, (count($list)-1));

        //Check non repeated indexes
        if (!in_array($index, $indexesList)) {
            array_push($indexesList, $index);
            //Add verb to the new array
            array_push($result, $list[$index]);
        }
    }

    return $result;
}


echo('<pre>');
var_dump(createVerbsList('Alta', 9, $fakeVerbs));
echo('</pre>');
?>