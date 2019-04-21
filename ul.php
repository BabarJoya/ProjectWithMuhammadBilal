<?php 

$Key = $_GET["A25"];

if (!isset($Key)) {
   die("bError: N cName");
   }

$sSub1 = $_GET["A1"];
$sSub2 = $_GET["A2"];
$sSub3 = $_GET["A3"];
$sSub4 = $_GET["A4"];
$sSub5 = $_GET["A5"];
$sSub6 = $_GET["A6"];
$sSub7 = $_GET["A7"];

$tSub1 = $_GET["A8"];
$tSub2 = $_GET["A9"];
$tSub3 = $_GET["A10"];
$tSub4 = $_GET["A11"];
$tSub5 = $_GET["A12"];
$tSub6 = $_GET["A13"];
$tSub7 = $_GET["A14"];

$oName =  $_GET["A15"];
$oSub1 =  $_GET["A16"];
$oSub2 =  $_GET["A17"];
$oSub3 =  $_GET["A18"];
$oSub4 =  $_GET["A19"];
$oSub5 =  $_GET["A20"];
$oSub6 =  $_GET["A21"];
$oSub7 =  $_GET["A22"];
$oAttendance =  $_GET["A23"];
$oAdmission =   $_GET["A24"];
$oRoll =        $_GET["A25"];


$f = fopen("Data/$Key.txt", 'w') or die("bError:FNF");

$myObj->Stud->nam = $oName;
$myObj->Stud->rol = $oRoll;
$myObj->Stud->att = $oAttendance;
$myObj->Stud->rem = $oAdmission;

if (!$sSub1 == "") {
$myObj->fb->Sub1->nam = $sSub1;
$myObj->fb->Sub1->obt = $oSub1;
$myObj->fb->Sub1->tot = $tSub1;
if (!$tSub1==0) { $myObj->fb->Sub1->per = ceil(($oSub1/$tSub1)*100); } else { $myObj->fb->Sub1->per = 0;} 
}
if (!$sSub2 == "") {
$myObj->fb->Sub2->nam = $sSub2;
$myObj->fb->Sub2->obt = $oSub2;
$myObj->fb->Sub2->tot = $tSub2;
if (!$tSub2==0) { $myObj->fb->Sub2->per = ceil(($oSub2/$tSub2)*100); } else { $myObj->fb->Sub2->per = 0;} 
}
if (!$sSub3 == "") {
$myObj->fb->Sub3->nam = $sSub3;
$myObj->fb->Sub3->obt = $oSub3;
$myObj->fb->Sub3->tot = $tSub3;
if (!$tSub3==0) { $myObj->fb->Sub3->per = ceil(($oSub3/$tSub3)*100); } else { $myObj->fb->Sub3->per = 0;} 
}
if (!$sSub4 == "") {
$myObj->fb->Sub4->nam = $sSub4;
$myObj->fb->Sub4->obt = $oSub4;
$myObj->fb->Sub4->tot = $tSub4;
if (!$tSub4==0) { $myObj->fb->Sub4->per = ceil(($oSub4/$tSub4)*100); } else { $myObj->fb->Sub4->per = 0;} 
}
if (!$sSub5 == "") {
$myObj->fb->Sub5->nam = $sSub5;
$myObj->fb->Sub5->obt = $oSub5;
$myObj->fb->Sub5->tot = $tSub5;
if (!$tSub5==0) { $myObj->fb->Sub5->per = ceil(($oSub5/$tSub5)*100); } else { $myObj->fb->Sub5->per = 0;} 
}
if (!$sSub6 == "") {
$myObj->fb->Sub6->nam = $sSub6;
$myObj->fb->Sub6->obt = $oSub6;
$myObj->fb->Sub6->tot = $tSub6;
if (!$tSub6==0) { $myObj->fb->Sub6->per = ceil(($oSub6/$tSub6)*100); } else { $myObj->fb->Sub6->per = 0;} 
}
if (!$sSub7 == "") {
$myObj->fb->Sub7->nam = $sSub7;
$myObj->fb->Sub7->obt = $oSub7;
$myObj->fb->Sub7->tot = $tSub7;
if (!$tSub7==0) { $myObj->fb->Sub7->per = ceil(($oSub5/$tSub7)*100); } else { $myObj->fb->Sub7->per = 0;} 
}
$myObj->fb->Obtained = $oSub1 + $oSub2 + $oSub3  + $oSub4 + $oSub5 + $oSub6 + $oSub7;
$myObj->fb->Total    = $tSub1 + $tSub2 + $tSub3  + $tSub4 + $tSub5 + $tSub6 + $tSub7;

$myJSON = json_encode($myObj);




fwrite($f, $myJSON);
fclose($f);

echo "SENT";

?>

