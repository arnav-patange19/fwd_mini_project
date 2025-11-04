<?php 
require_once "profile_model.php";
?>
<!doctype html>
<html>
    <head>
        <link href = "profile.css" rel = "stylesheet">
    </head>
    <body>
    <form action = "save_update.php" method = "POST">
        <div class = "main_div">
            <div class = "first_div">
                <div class = "section1">
                    <div class = "cmp_cover">
                        <form action = "cover_update.php" method = "POST" enctype = "multipart/form-data">
                            <input type = "file" name = "file" style = "
                            position:absolute;
                            right :90px;
                            bottom:15px;
                            ">
                            <button type = "submit" style = "
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
                        <img class ="cmp_cover_img" src = "<?php echo 'profile_img/' . $results['username'] . '_cover.jpeg'; ?>" style = "
                        height: 191px;
                        width:100%;
                        ">
                    </div>
                    <div class = "cmp_logo">
                        <img class = "cmp_logo_img" src = "<?php echo 'profile_img/' . $results['username'] . '.jpeg'; ?>" style = "
                        height: 208px;
                        width: 208px;
                        ">
                        <form action = "logo_update.php" method = "POST" enctype = "multipart/form-data">
                            <input type = "file" name = "file" style = "
                            position:absolute;
                            right :-250px;
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
                    </div>
                    <div class = "cmp_first_intro">
                        <h2> Name : <input type = "text" name = "name" value = "<?php echo $results['name'];?>"> </h2>
                        <p>Username : <?php echo $results['username'];?></p>
                        <p>Location : <input type = "text" name = "location" value = "<?php echo $results['location'];?>"></p>
                    </div>
                </div> 
                <div class = "section2">
                    <h2>About</h2>
                    <p>
                    <textarea name = "about" rows = 10 cols=120><?php echo $results['about'];?></textarea>
                    </p>
                </div>

                <div class = "section2">
                    <h2>Experience</h2>
                    <p>
                    <textarea name = "experience" rows = 10 cols=120><?php echo $results['experience'];?></textarea>
                    </p>
                </div>
                <div class = "section2">
                    <h2>Education</h2>
                    <p>
                    <textarea name = "education" rows = 10 cols=120><?php echo $results['education'];?></textarea>
                    </p>
                </div>
                <div class = "section2">
                    <h2>Skills</h2>
                    <p>
                    <textarea name = "skills" rows = 10 cols=120><?php echo $results['skills'];?></textarea>
                    </p>
                </div>
                <div class = "section2">
                    <h2>Achievements</h2>
                    <p>
                    <textarea name = "achieve" rows = 10 cols=120><?php echo $results['achievements'];?></textarea>
                    </p>
                </div>
                <div class = "section2">
                    <h2>Goals</h2>
                    <p>
                    <textarea name = "goals" rows = 10 cols=120><?php echo $results['goals'];?></textarea>
                    </p>
                </div>
                
            </div>

            <div class = "second_div">
                <center><button class = "section3" class = "edit_profile"><h2>Save Changes</h2></button></center>
               
                <div class = "section2">
                    <h2>Personal Information</h2>
                    <h3>Email Id</h3>
                    <p><input type = "text" name = "email" value = "<?php echo $results['email'];?>"></p>
                    <h3>Pronouns</h3>
                    <p><input type = "text" name = "pronouns" value = "<?php echo $results['pronouns'];?>"></p>
                    <h3>Resume</h3>
                    <p><embed src="<?php
                    $file = 'profile_pdf/' . $results['username'] . '.pdf';;
                    if(file_exists($file))
                     echo 'profile_pdf/' . $results['username'] . '.pdf'; 
                    else echo "";
                     ?>" type="application/pdf" width="100%" height="400px" /></p>

                    <form action = "resume_update.php" method = "POST" enctype = "multipart/form-data">
                        <input type = "file" name = "file">
                        <button><h4>Update Resume</h4></button>
                    </form>
                    <form action = "delete_resume.php" method = "POST">
                            <button type = "submit"><h4>Delete Resume</h4></button>
                    </form>

                </div>
            </div>
        </div>
    </form>
    </body>
</html>