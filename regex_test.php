<?php
    $raw_content = file_get_contents("./results_raw.txt");
//    $people_id = "19373";
//    $pattern = "/<TR>(.+)<A (.+)PeopleID=" . $people_id . "(.)+>(.+)<\/A>(.)+<\/TD>\R<TD nowrap valign=top>(((.)+)\&nbsp\;)<\/TD>\R<TD valign=top><A HREF=Results\.asp\?Institution=/";
    $pattern = "/<TR>(.+)<A (.+)PeopleID=((\d)+) onclick=(.)+>(.+)<\/A>(.)+<\/TD>\R<TD nowrap valign=top>(((.)+)\&nbsp\;)<\/TD>\R<TD valign=top><A HREF=Results\.asp\?Institution=/";
    preg_match_all($pattern, $raw_content, $matches, PREG_OFFSET_CAPTURE);
    print_r($matches);
//    echo 'peopleID: ';
//    echo 'lastname: ' . $matches[6][0][0];
//    echo 'fist and middle name: ' . $matches[9][0][0];

    $output_file = fopen('result.csv', 'w');
    fputcsv($output_file, array('peopleID', 'first/middle name', 'lastname'));
    
    for ($i = 0; $i <= count($matches[3]); $i++) {
        fputcsv($output_file, array($matches[3][$i][0], $matches[9][$i][0], $matches[6][$i][0]));
    }
    
//    fputcsv($output_file, array($people_id, $matches[9][0][0], $matches[6][0][0]));
    fclose($output_file);
?>
