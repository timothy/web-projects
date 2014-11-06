<html><head><title>Execute SQL</title></head>
<body>
<?php


function connecter($Id,$var1) {// query, user input

include 'GetQuery.php';

//echo  "work!! (".$Id.$var1."): ";

    //echo "<script type='text/javascript'>alert('".$Id.$var1."');</script>";

   $SQL = GetQuery($Id,$var1); // query, user input


    //Open a connection

    $conn = odbc_connect("Driver={SQL Server};Server=CS1;Database=Natishi;Trusted_Connection=yes;", "", "")
	 or die("Failed to connect to DSN: ".odbc_error().": ".odbc_errormsg());
    
    $res = odbc_exec($conn, $SQL)
	 or die("Failed to execute SQL: ".odbc_error());

    if (odbc_num_rows($res) != 0) {
        echo "\n<TABLE BORDER=1>\n";                                          $outputstuff = "\n<TABLE BORDER=1>\n";// made this var so I could pass to other functions just in case
        echo "<TR>";                                                          $outputstuff .= "<TR>";
        $cfld=odbc_num_fields($res);
        $ifld = 1;
        while ($ifld <= $cfld) {
        	$fld = odbc_field_name($res, $ifld);                 
            echo "<TH>".$fld."</TH>";                                         $outputstuff .= "<TH>".$fld."</TH>";
            $ifld=$ifld+1;
       }
       echo "</TR>\n";                                                        $outputstuff .= "</TR>\n";

        while (odbc_fetch_row($res)) {
            echo "<TR>";                                                      $outputstuff .= "<TR>";
            for ($ifld=1;$ifld<=$cfld;$ifld++) {
  	           echo "<TD>".odbc_result($res, $ifld)."</TD>";                  $outputstuff .= "<TD>".odbc_result($res, $ifld)."</TD>";
            }
            echo "</TR>";                                                     $outputstuff .= "</TR>";
        }

        echo "</TABLE>\n";                                                    $outputstuff .= "</TABLE>\n";
    }

    echo "\n\n";                                                              $outputstuff .= "\ndone\n";
    odbc_close_all();
}

?>
</body></html>
