<?php


function CountColor($Color)  {
    // echo "This returns the stories in the $Color section <br>";

    $SQL = "SELECT S.Title, S.PageNum, C.Title, C.Color ";
    $SQL .= "FROM Story S, Section C ";
    $SQL .= "WHERE S.SectionNum = C.SectionId AND C.Color = '$Color' ";
   // $SQL .= "ORDER BY ;";

     return $SQL;
    }

function NeedStory ($num) {
   // echo "This outputs the writers who are assigned to less story than the specified number <br>";
    $SQL = "SELECT W.Name, COUNT(*) ";
    $SQL .= "FROM Story S, Writer W ";
    $SQL .= "WHERE W.IdNum = S.WriterID ";
    $SQL .= "GROUP BY W.Name ";
    $SQL .= "HAVING  COUNT(S.PageNum) < $num ";
    return $SQL;
}

function GetDeadline($Title) {
  //  echo "This returns which deadline a story has. <br>"
    $SQL  = "SELECT Title, Deadline ";
    $SQL .= "FROM Story ";
    $SQL .= "WHERE Title = '$Title' ";
    return $SQL;
}

function GetStoryDue($Deadline) {
   // echo "This returns all the stories due for a particular deadline";
    $SQL  = "SELECT Title, PageNum, WriterID ";
    $SQL .="FROM Story ";
    $SQL .= "WHERE Deadline = '$Deadline' ";
    return $SQL;
}

function GetEditorAssignment($EditorID) {
   // echo "This returns all the writers and their information, for writers who are edited by $EditorId ";
    $SQL  = "SELECT * ";
    $SQL .= "FROM Writer W, Story S ";
    $SQL .= "WHERE W.IdNum = S.WriterID AND W.EditorID = $EditorID ";
    return $SQL;
}

function GetEmail($Name) {
   // echo "This query returns the email for the specified writer";
    $SQL = "SELECT Email ";
    $SQL .= "FROM Writer ";
    $SQL .= "WHERE Name = '$Name' ";
    return $SQL;
}

function GetColor($Title) {
  //  echo "This returns the assigned color the the particular secion";
    $SQL = "SELECT Color ";
    $SQL .="FROM Section ";
    $SQL .= "WHERE Title = '$Title' ";
    return $SQL;
}
function ShowStories () {
// Grab the stories and find out who is writing them by using a RIGHT OUTER JOIN
    $SQL = "SELECT W.Name, S.WriterId, S.Deadline, S.SectionNum, S.PageNum, S.Title ";
    $SQL .= "FROM Writer W RIGHT OUTER JOIN Story S ON W.IdNum = S.WriterID ";
    $SQL .= "ORDER BY S.PageNum ASC ";
    return $SQL;
}


function GetQuery($query, $user_info) {

    switch ($query) {
        case CountColor:
            $SQL = CountColor($user_info);
            return $SQL;
        break;

        case NeedStory:
            $SQL = NeedStory($user_info);
            return $SQL;
        break;

        case GetDeadline:
            $SQL = GetDeadline($user_info);
            return $SQL;
        break;

        case GetEditorAssignment:
            $SQL = GetEditorAssignment($user_info);
            return $SQL;
        break;

        case GetEmail:
            $SQL = GetEmail($user_info);
            return $SQL;
        break;

        case GetStoryDue:
            $SQL = GetStoryDue($user_info);
            return $SQL;
        break;


        case GetColor:
            $SQL = GetColor($user_info);
            return $SQL;
        break;

        case ShowStories:
            $SQL = ShowStories($user_info);
            return $SQL;
        break;

      default:
        echo "<h1>Kelsey - Kaysee - Timothy</h1>";

        }

    }


?>