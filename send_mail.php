<?php

function escape($string)
{
    return htmlentities($string, ENT_QUOTES, "UTF-8");
}

$values["name"] = escape($_POST["name"]);
$values["phone"] = escape($_POST["phone"]);
$values["date"] = escape($_POST["date"]);

$page["mail1"] = "lidor@laba.co.il";
$page["mail2"] = "manulan.online.il@gmail.com";

if (!empty($values["name"]) && !empty($values["phone"])) {
    $values["subject"] = "פנייה מדף נחיתה: אליבא קמפיין חורף 21-22";
    $td_style_1 = "background-color: rgb(235, 235, 235); width: 173px; text-align: center;text-direction:rtl;
          font-family:Arial, Helvetica, sans-serif;font-weight:normal;font-size: 12px;";

    $td_style_2 = "background-color: rgb(213, 213, 213); width: 173px; text-align: center;text-direction:rtl;
          font-family:Arial, Helvetica, sans-serif;font-weight:normal;font-size: 12px;";
    $values["body"] = "
<div style='text-align: center;text-direction:rtl; font-family:Arial, Helvetica, sans-serif;font-weight:normal;font-size: 12px;'>
<br/><br/>


<table align='center' dir='LTR'; border='0' cellpadding='5' cellspacing='2' style='width: 346px;'>
<tbody>


    <tr>
        <td style='{$td_style_1}'>
            <span style='color:black;'>{$values["name"]}</span>
        </td>

        <td style='{$td_style_2}'>
            <span style='color:black;'>שם פרטי ומשפחה</span>
        </td>
    </tr>

    <tr>
        <td style='{$td_style_1}'>
            <span style='color:black;'>{$values["phone"]}</span>
        </td>

        <td style='{$td_style_2}'>
            <span style='color:black;'>טלפון נייד</span>
        </td>
    </tr>
    

    <tr>
        <td style='{$td_style_1}'>
            <span style='color:black;'>{$values["date"]}</span>
        </td>

        <td style='{$td_style_2}'>
            <span style='color:black;'>תאריך</span>
        </td>
    </tr>

  

</tbody></table><br/><br/>
<a href='http://laba.co.il'><img src='http://laba.co.il/laba.png' border='0'></a>
</div>";

    $headers = "MIME-Version: 1.0\n";
    $headers .= "Content-Type: text/html; charset=utf-8\n";

    $headers .= "From: פנייה מדף נחיתה: אליבא קמפיין חורף 21-22";

    $email1 = $page["mail1"];
    if (!empty($email1)) {
        $success = mail($email1, $values["subject"], $values["body"], $headers);
    }

    $email2 = $page["mail2"];
    if (!empty($email2)) {
        $success = mail($email2, $values["subject"], $values["body"], $headers);
    }
    header("Location: thanks.html");
} else {
    echo "error";
}
