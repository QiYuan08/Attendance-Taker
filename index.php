<?php
	// link the header of the html file
    require './header.php';
?>

<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
        <!-- Title -->
        <span class="mdl-layout-title">Attedence App</span>
        <!-- Add spacer, to align navigation to the right -->
        <div class="mdl-layout-spacer"></div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Content</span>
        <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="./script/login.php">Login</a>
        </nav>
    </div>
    <main class="mdl-layout__content">
        <div class="page-content">
        <br>
            <div class="ui container">
                <?php
                            if(isset($_GET['error'])){
                                $error = $_GET['error'];

                                if($error == 'emptyname'){
                                    echo "<p style='color:red;'>*Fill in your name</p>";
                                } 
                                if($error == 'emptyclass'){
                                    echo "<p style='color:red;'>*Fill in your class</p>";
                                } 
                                if($error == 'emptycode'){
                                    echo "<p style='color:red;'>*Enter your class code</p>";
                                }
                                if($error == 'server'){
                                    echo "<p style='color:red;'>*Server error</p>";
                                }
                                if ($error == 'code'){
                                    echo "<p style='color:red;'>*Wrong code</p>";
                                }
                            }
                ?>
                <form action="./script/updateAttendence.php" method="post" class="ui form">
                    <div class="field">
                        <label>Name</label>
                        <input type="text" name="name" maxlength="50"placeholder="Name">
                    </div>
                    <div class="field">
                        <label>Class</label>
                        <input type="text" name="class" maxlength="3" placeholder="Class">
                    </div>
                    <div class="field">
                        <label>Attendence code</label>
                        <input type="text" name="code" maxlength="6" placeholder="Attendence code">
                    </div>
                    <button name="submitBtn" class="ui button">Submit</button>
                </form>
            </div>
        </div>
    </main>
</div>

<?php
    require "footer.php";
?>