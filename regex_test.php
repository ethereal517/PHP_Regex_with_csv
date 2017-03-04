<?php
    $raw_content = file_get_contents("./results_raw.txt");
    $people_id = "19373";
    $pattern = "/<TR>(.+)<A (.+)PeopleID=" . $people_id . "(.)+>(.+)<\/A>(.)+<\/TD>\R<TD nowrap valign=top>(((.)+)\&nbsp\;)<\/TD>\R<TD valign=top><A HREF=Results\.asp\?Institution=/";
    preg_match_all($pattern, $raw_content, $matches, PREG_OFFSET_CAPTURE);
//    print_r($matches);
    echo 'lastname: ' . $matches[4][0][0];
    echo 'fist and middle name: ' . $matches[6][0][0];
    $output_file = fopen($people_id . '_result.csv', 'w');
    fputcsv($output_file, array('peopleID', 'first/middle name', 'lastname'));
    fputcsv($output_file, array($people_id, $matches[7][0][0], $matches[4][0][0]));
    fclose($output_file);
?>
