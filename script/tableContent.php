<?php
require 'config.php';
require '../header.php';

// of not empty create the table
if (isset($_POST['code'])){

    $output = '';
    $code = $_POST['code'];
    $totalStudent = 0;

    $output .= ' <table class="ui unstackable table" class="content-table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Class</th>
                        <th>Date</th>
                        <th>Code</th>
                    </tr>
                    </thead>
                    <tbody>';
    
    $sql = "SELECT * FROM attendence WHERE code='$code' ORDER BY Name ASC";
    $result = mysqli_query($db, $sql);

    while($row = mysqli_fetch_assoc($result)){
        $output .= '<tr>
                    <td>'.$row['Name'].'</td>
                    <td>'. $row['class'] .'</td>
                    <td>'. $row['Date'] .'</td>
                    <td>'. $row['code'] .'</td>
                </tr>';
        
                $totalStudent += 1;
    }

    $output .= '  </tbody>
                </table>';
}

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
            <div class='ui-container'>
                <?php 
                    if (isset($output)){
                        echo $output;
                        echo '<h3>Total student: '. $totalStudent . '</h3>';
                    }
                ?>
            </div>
            </br>
                <div class="ui four column grid">
                    <div class="row">
                        <form class="ui form" action="./tableContent.php" method="post">
                            <div class="field" class="column">
                                <input type="text" name="code" placeholder="class code"/>
                            </div>
                            <div class="column">
                                <button class='ui button'>Search</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </main>
</div>
