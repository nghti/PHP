<?php
    $value = "BẰNG CẤP - CHỨNG NHẬN";
    echo $value;
?>
<?php
$domain = "khai bao bien";
$email = "tu.th@neo-lab.vn";
$bien = 111;
echo $domain;
echo '<br>';
echo $email;
define('Name', 'Tu');
echo '<br>';
echo Name;
echo '<br>';
echo var_dump($email);
echo '<br>';
?>
<br/>
<?php
    $value = "ABC";
    function createBox($content, $width = 550, $height = 650) {
        $result = '<div style="width: '.$width.'px; height: '.$height.'px;">';
        $result .= '<p>'.$content.'</p>';
        $result .= '</div>';
        echo $GLOBALS["value"];
        return $result;
    }
    $boxTest = createBox("Box Test");
    echo $boxTest;
    echo $GLOBALS["value"];
    echo '<br>';
    echo createBox("Box new");
    $array = ['A', 'B', 'C'];
    $array_1 = ['Q', 'W', 'E'];
//     $array1 = {title:'A', title:'B', title:'C'};
    echo array_pop($array);
    echo print_r($array);
    array_push($array, 'D', 'E', 'A');
    echo '<br>';
    echo print_r($array);
    echo '<br>';
    $array2 = array_count_values($array);
    echo print_r($array2);
    $array_new = array_merge($array, $array_1);
    echo print_r($array_new);
    echo '<br>';
    echo array_search('D', $array);
    $array_5 = implode('-', $array_new);
    echo $array_5;
//     $array_6 = explode("-", $array_5);
//     echo $array_6;
?>
