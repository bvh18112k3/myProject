<form action="" method="post">
    <input type="checkbox" name="check1" value="1"> 1 <br>
    <input type="checkbox" name="check2" value="2"> 2 <br>
    <input type="submit" value="Gửi">
</form>
<?php
$arr = [];
for ($i = 0; $i<2; $i++){
    if(isset($_POST['check'.$i+1])){
        $arr[$i] = $_POST['check'.$i+1];
    }
}
if(isset($arr)){
    for($i = 0; $i<count($arr); $i++){
        echo $arr[$i] . "<br>";
    }
}
?>
<script type='text/javascript'>
<!--    --><?php
    $php_array = array('abc','def','ghi');
//    $js_array = json_encode($php_array);
//    echo "var javascript_array = ". $js_array . ";\n";
//    ?>

</script>
<script>
    var arr = [{
        name: "Bùi Văn Huy",
        age: 19,
        phone: "0967124922"
    },
        {
            name: "Bùi Văn Hug",
            age: 20,
            phone: "0967124921"
        }
    ];

    for(let ds of arr){
       if(ds.age == 19){
           alert("huhu");
       }
    }
</script>
