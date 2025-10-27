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
        <div class = "main_div">
            <div class = "first_div">
                <div class = "section1">
                    <div class = "cmp_cover">
                        <form action = "profile_edit_contri_inc.php" method = "POST" enctype = "multipart/form-data">
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
                        <img class ="cmp_cover_img" src = '<?php echo $cover; ?>'>
                    </div>
                    <div class = "cmp_logo">
                        <!-- left -->
                        <img class = "cmp_logo_img" src = '<?php echo $logo; ?>'>
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
                <center><button class = "section3" style = "background-color:greenyellow"><h2>Save</h2></button></center>
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
                        <input type = "text" value = "<?php echo $results["headquarters"];?>" name = "headquarters" id = "second_head">
                    </p>
                </div>
            </div>
        </div>

    </body>
</html>