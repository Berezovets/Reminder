<?php

require_once($_SERVER[DOCUMENT_ROOT]."/class_db.php");

$db = new DB("localhost", "root", "123456", "my_test");

$q = $_GET['q'];

$data = $db->query("SELECT * FROM remind WHERE category = '". $q ."'");



echo "<table class='table'>
    <thead>
        <th>title</th>
        <th>text</th>
        <th>date_sign</th>
       </thead>
    <tbody>";

  $i=1;
        foreach ($data as $v)
        {
        echo "<tr>";
            echo "<td>". $v['title'] ."</td>";
            echo "<td>". $v['text'] ."</td>";
            echo "<td>". $v['date_sign'] ."</td>";
        echo "</tr>";
        $i++;
	    }
echo " </tbody>
</table>";
?>
