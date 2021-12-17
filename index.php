<?php

$messages = array();
$file_message = fopen('messages.txt', 'r');
$i = 0;
while(($messages[$i]=fgets($file_message))!==false) { $i = $i +1; }

if (isset($_POST["question"]))
{
  $question = $_POST["question"];
} 
else 
{
    $msg = 'سوال خود را بپرس!';
    $question = null;
}

$rand_person = rand(0,15);




$string = file_get_contents('people.json');
$names = json_decode($string,true);
$answers = array(file_get_contents('messages.txt'));


$en_name = english_name_rand($rand_person);
$fa_name = $names[$en_name];


if (isset($_POST['person'])) {
    $en_name = $_POST['person'];
    $fa_name = $names[$en_name];
}

$length = (strlen($question) + strlen($en_name))%16;

if (isset($_POST["question"]))
{
    if (strlen($question) !== 0) {
        $msg = $messages[$length];
    }
    else
    {
        $msg = 'سوال خود را بپرس!';
    }
} 
else  
{
    $msg = 'سوال خود را بپرس!';
}

function english_name_rand($rand)
{
    if($rand == 0)
    {
        $en_name = 'abooreyhan';
    }
    else if($rand == 1)
    {
        $en_name = 'amirkabir';
    }
    else if($rand == 2)
    {
        $en_name = 'ebne-sina';
    }
    else if($rand == 3)
    {
        $en_name = 'ebtehaj';
    }
    else if($rand == 4)
    {
        $en_name = 'etesami';
    }
    else if($rand == 5)
    {
        $en_name = 'ferdowsi';
    }
    else if($rand == 6)
    {
        $en_name = 'hafez';
    }
    else if($rand == 7)
    {
        $en_name = 'hesabi';
    }
    else if($rand == 8)
    {
        $en_name = 'kadekani';
    }
    else if($rand == 9)
    {
        $en_name = 'molana';
    }
    else if($rand == 10)
    {
        $en_name = 'panahi';
    }
    else if($rand == 11)
    {
        $en_name = 'saadi';
    }
    else if($rand == 12)
    {
        $en_name = 'sepehri';
    }
    else if($rand == 13)
    {
        $en_name = 'shajarian';
    }
    else if($rand == 14)
    {
        $en_name = 'shariati';
    }
    else if($rand == 15)
    {
        $en_name = 'takhti';
    }

    return $en_name;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/default.css">
    <link rel="icon" href="images/509a613c0d267d9a3b8c3a5233068150.jpg">
    
    <title>مشاوره بزرگان</title>
</head>
<body>
<p id="copyright">تهیه شده برای درس کارگاه کامپیوتر،دانشکده کامییوتر، دانشگاه صنعتی شریف</p>
<div id="wrapper">
    <div id="title">
        <?php
             if (isset($question)) {
                if (strlen($question) !== 0) {
                    echo "<span id=" . "label" . ">پرسش:  &nbsp;</span>";
                    echo "<span id=" . "question" . ">" . $question . "</span>";
                }
             }
        ?>
    </div>
    <div id="container">
        <div id="message">
            <p id="P1"><?php echo $msg ?></p>
        </div>
        <div id="person">
            <div id="person">
                <img src="images/people/<?php echo "$en_name.jpg" ?>"/>
                <p id="person-name"><?php echo $fa_name ?></p>
            </div>
        </div>
    </div>
    <div id="new-q">
        <form method="post" action= "index.php">
            سوال &nbsp;
            <input type="text" name="question" maxlength="150" placeholder="سوال خود را بپرس!"
            value="<?php echo $question ?>" />
            &nbsp;را از &nbsp;
            <select name="person">
                <?php
                    foreach ($names as $en => $fa) {
                        if ($en_name == $en) {
                            echo ("<option value= ".$en ." selected>" . $fa ."</option>");
                        }
                        else{
                            echo ("<option value= ".$en ." >" . $fa ."</option>");
                        }
                    }
                 ?>
            </select>
            <input type="submit" value="بپرس"  />
        </form>
    </div>
</div>

<script type="text/javascript">





</script>
</body>
</html>