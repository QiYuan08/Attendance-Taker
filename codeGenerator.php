<?php
require './header.php';
require './script/config.php';

function generatorCode(){
    global $code;
    global $db;

    $sql = "SELECT code FROM teacher";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);

    if (isset($_GET['codeBtn'])){
        $alphaNumeric = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $len = strlen($alphaNumeric);
        for($i=0; $i <5; $i++){
            $code .= $alphaNumeric[rand(0, $len-1)];
        }

        // update db
        $sql = "UPDATE teacher SET code='$code' WHERE Username='Kung'";
        $result = mysqli_query($db, $sql);
        if (!$result){
            echo 'Update failed';
        }

    } else {
        $code = $row['code'];

    }
}

generatorCode();

?>
<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
        <!-- Title -->
        <span class="mdl-layout-title">Attendence App</span>
        <!-- Add spacer, to align navigation to the right -->
        <div class="mdl-layout-spacer"></div>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Content</span>
        <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="./index.php">Attendence</a>
        </nav>
    </div>
    <main class="mdl-layout__content">
        <div class="page-content">
            </br>
            <div class="ui container">   
                <form action='./codeGenerator.php' type='get' class="ui form"> 
                    <button name='codeBtn' class='ui button'>Generate class code</button>
                </form>
            </div>
            </br>
            <div class="ui container">
                <?php
                    if($code != ''){
                        echo "<h2 style='color:green; margin-top:5%; text-align:center'>". $code ."</h2>";
                    }   
                ?>
            </div>
        </div>
    </main>
</div>



