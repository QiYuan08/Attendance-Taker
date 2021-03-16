<?php
// conn to db
require '../header.php';
require 'config.php';
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
        <a class="mdl-navigation__link" href="../index.php">Attendence</a>
        <a class="mdl-navigation__link" href="../codeGenerator.php">Generate code</a>
        </nav>
    </div>
    <main class="mdl-layout__content">
        <div class="page-content">
            <div class='ui container'>
                </br>
                <div class="ui two column grid">
                    <form class="ui form" action="./tableContent.php" method="post">
                        <div class="row">
                            <div class="field" class="column">
                                <input type="text" name="code" placeholder="class code"/>
                            </div>
                            <div class="column">
                                <button class='ui button'>Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>



    <?php

        //when first enter
        if(isset($_POST['loginBtn'])){

            // check login
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            if (empty($username) || empty($password)){
                header('Location: ./login.php?error="empty"');
                exit();
            }

            // query sql for the correct login
            $sql = "SELECT * FROM teacher WHERE Password='$password' AND Username='$username'";
            $result = mysqli_query($db, $sql);

            // if not such login found
            if (mysqli_num_rows($result) != 1){
                header("Location: ./login.php?error=login");
                exit();
            }
        }
    ?>
</div>