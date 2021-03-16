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
        </nav>
    </div>
    <main class="mdl-layout__content">
        <div class="page-content">
            </br>
            <div class="ui container">
                <form action="./table.php" method="post" class="ui form">
                    <div class="field">
                        <label>Username</label>
                        <input type="text" name="username" placeholder="Username">
                    </div>
                    <div class="field">
                        <label>Password</label>
                        <input type="text" name="password" placeholder="Password">
                    </div>
                    <button name="loginBtn" class="ui button">Login</button>
                </form>
            </div>
        </div>
    </main>
</div>

<?php
    require "../footer.php";
?>