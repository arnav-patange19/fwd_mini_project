<?php
require_once "profile_model_inc.php";
?>

<!Doctype html>
<html>
    <head>
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#first_indus").blur(function(){
                    let val = document.getElementById('first_indus').value;
                    $("#second_indus").val(val);
                });
                $("#second_indus").blur(function(){
                    let val = document.getElementById('second_indus').value;
                    $("#first_indus").val(val);
                });
                $("#first_head").blur(function(){
                    let val = document.getElementById('first_head').value;
                    $("#second_head").val(val);
                });
                $("#second_head").blur(function(){
                    let val = document.getElementById('second_head').value;
                    $("#first_head").val(val);
                });
            }
            );
        </script>
        <link href = "profile_edit.css" type="text/css" rel = "stylesheet">
    </head>
    <body>
<<<<<<< HEAD
        <form action = "save_update.php" method = "POST">
=======
>>>>>>> ef7768321d3b2581b7129728829c6096b772e67b
        <div class = "main_div">
            <div class = "first_div">
                <div class = "section1">
                    <div class = "cmp_cover">
<<<<<<< HEAD
                        <form action = "cover_update.php" method = "POST" enctype = "multipart/form-data">
                            <input type = "file" name = "file" style = "
                            position:absolute;
                            right :90px;
                            bottom:15px;
                            ">
=======
                        <form action = "profile_edit_contri_inc.php" method = "POST" enctype = "multipart/form-data">
>>>>>>> ef7768321d3b2581b7129728829c6096b772e67b
                            <button style = "
                            position:absolute;
                            right :30px;
                            bottom:15px;
                            font-size :20px;
                            font-weight :bold;
                            background-color:lightblue;
                            border:none;
                            border-radius:20px;
                            padding:10px;
                            ">
                                Update Cover
                            </button>
                        </form>
<<<<<<< HEAD
                        <form action = "delete_cover.php" method = "POST">
                            <button type = "submit" style = "
                            position:absolute;
                            right :30px;
                            bottom:-80px;
                            font-size :20px;
                            font-weight :bold;
                            background-color:lightblue;
                            border:none;
                            border-radius:20px;
                            
                            "><h4>Delete Cover</h4></button>
                    </form>
                        <img class ="cmp_cover_img" src = '<?php echo $cover; ?>' style = "
                        width:100%;
                        height: 191px;
                        ">
                    </div>

                    <div class = "cmp_logo">
                        <img src = '<?php echo $logo; ?>' class = "cmp_logo_img" style = "
                        height: 208px;
                        width: 208px;
                        "
                         >
                        <form action = "logo_update.php" method = "POST" enctype = "multipart/form-data">
                            <input type = "file" name = "file" style = "
                            position:absolute;
                            right :-380px;
                            bottom:15px;
                            ">
                            <button style = "
                            position:absolute;
                            right :30px;
                            bottom:-10px;
                            font-size :20px;
                            font-weight :bold;
                            background-color:lightblue;
                            border:none;
                            border-radius:20px;
                            padding:10px;
                            ">
                                Update Logo
                            </button>
                        </form>
                        <form action = "delete_logo.php" method = "POST">
                            <button type = "submit" style = "
                            position:absolute;
                            right :-320px;
                            bottom:-10px;
                            font-size :20px;
                            font-weight :bold;
                            background-color:lightblue;
                            border:none;
                            border-radius:20px;
                            
                            "><h4>Delete logo</h4></button>
                    </form>
=======
                        <img class ="cmp_cover_img" src = '<?php echo $cover; ?>'>
                    </div>
                    <div class = "cmp_logo">
                        <!-- left -->
                        <img class = "cmp_logo_img" src = '<?php echo $logo; ?>'>
>>>>>>> ef7768321d3b2581b7129728829c6096b772e67b
                    </div>
                    <div class = "cmp_first_intro">
                        <label>Company Name :</label>
                        <input type = "text" value = "<?php echo $results["cmp_name"];?>" name = "cmp_name">


                        <p>
                            <label>Industry : </label>
                            <input type = "text" value = "<?php echo $results["industry"];?>" name = "industry" id= "second_indus">
                            &middot;
                            <label>Headquarters : </label>
                            <input type = "text" value = "<?php echo $results["headquarters"];?>" name = "headquarters" id = "first_head">
                            &middot;

                        </p>
                        
                    </div>
                </div> 
                <div class = "section2">
                    <h2>Overview</h2>
                    <p>
                        <textarea rows = "8" cols = "80" name = "overview"><?php echo $results["overview"];?></textarea>
                    </p>
                    <h3>Website</h3>
                    <p>
                        <input type = "url" value = "<?php echo $results["website"];?>" name = "website">
                    </p>
                    <h3>Specialties</h3>
                    <p><textarea rows = "8" cols = "80" name = "special"><?php echo $results["special"];?></textarea></p>
                    <h3>Achievements</h3>
                    <p>
                        <textarea rows = "8" cols = "80" name = "achieve"><?php echo $results["achieve"];?></textarea>
                    </p>
                </div>
            </div>

            <div class = "second_div">
<<<<<<< HEAD
                <center><button type = "submit" class = "section3" style = "background-color:greenyellow"><h2>Save</h2></button></center>
=======
                <center><button class = "section3" style = "background-color:greenyellow"><h2>Save</h2></button></center>
>>>>>>> ef7768321d3b2581b7129728829c6096b772e67b
                <div class = "section2">
                    <h2>Company stats</h2>
                    <h3>Industry</h3>
                    <p >
                        <input type = "text" id = "first_indus" value = "<?php echo $results["industry"];?>">
                    </p>
                    <h3>Company Size</h3>
                    <p>
                        <input type = "text" value = "<?php echo $results["cmp_size"];?>" name = "cmp_size">
                    </p>
                    <h3>Headquarters</h3>
                    <p>
<<<<<<< HEAD
                        <input type = "text" value = "<?php echo $results["headquarters"];?>" id = "second_head">
=======
                        <input type = "text" value = "<?php echo $results["headquarters"];?>" name = "headquarters" id = "second_head">
>>>>>>> ef7768321d3b2581b7129728829c6096b772e67b
                    </p>
                </div>
            </div>
        </div>
<<<<<<< HEAD
        </form>
=======

>>>>>>> ef7768321d3b2581b7129728829c6096b772e67b
    </body>
</html>