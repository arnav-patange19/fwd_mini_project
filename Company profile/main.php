<?php
require_once "profile_model_inc.php";
?>

<!Doctype html>
<html>
    <head>
        <link href = "main.css" rel = "stylesheet">
    </head>
    <body>
        <div class = "main_div">
            <div class = "first_div">
                <div class = "section1">
                    <div class = "cmp_cover">
                        <img class ="cmp_cover_img" src = '<?php echo $cover; ?>'>
                    </div>
                    <div class = "cmp_logo">
                        <img class = "cmp_logo_img" src = '<?php echo $logo; ?>'>
                    </div>
                    <div class = "cmp_first_intro">
                        <h2> <?php echo $results["cmp_name"];?> </h2>
                        <p><?php echo $results["industry"];?> &middot; <?php echo $results["headquarters"];?> &middot;</p>
                    </div>
                </div> 
                <div class = "section2">
                    <h2>Overview</h2>
                    <p>
                        <?php echo $results["overview"];?> 
                    </p>
                    <h3>Website</h3>
                    <p><a href = <?php echo $results["website"];?> ><?php echo $results["website"];?></a></p>
                    <h3>Specialties</h3>
                    <p><?php echo $results["special"];?></p>
                    <h3>Achievements</h3>
                    <p>
                        <?php
                        $achieve = explode (".",$results["achieve"]);
                        foreach($achieve as $ach){
                            echo $ach."<br>";
                        }
                        ?>
                    </p>
                </div>
            </div>

            <div class = "second_div">
                <form action = "profile_edit.php">
                     <center><button class = "section3" class = "edit_profile"><h2>Edit Profile</h2></button></center>
                </form>
               
                <div class = "section2">
                    <h2>Company stats</h2>
                    <h3>Industry</h3>
                    <p><?php echo $results["industry"];?></p>
                    <h3>Company Size</h3>
                    <p><?php echo $results["cmp_size"];?></p>
                    <h3>Headquarters</h3>
                    <p><?php echo $results["headquarters"];?></p>
                </div>
            </div>
        </div>

    </body>
</html>