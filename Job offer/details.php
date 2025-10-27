<!Doctype html>
<html>
    <head>
        <link href = "details.css" rel = "stylesheet">
        <script>
            function first(){
                document.getElementById("demo").style.color = "red";
            }
        </script>
    </head>
    <body>
        <div class = "section1">
            <div class = "cmp_cover">
                <img class ="cmp_cover_img" src = "..\\cmp_logos\\Morgan Stanley\\cover.jpeg">
            </div>
            <div class = "cmp_logo">
                <img class = "cmp_logo_img" src = "..\\cmp_logos\\Morgan Stanley\\logo.jpeg">
            </div>
            <div class = "cmp_first_intro">
                <p>Posted on 20-12-2025</p>
                <h1>UI/UX Designer</h1>
                <p>Onsite &middot; Full Time &middot; 12 Applicants</p>

                <div>
                    <table>
                        <tr>
                            <td rowspan = 2><img class = "icons" src = "details_imgs\\money.png"></td>
                            <td style = " vertical-align: bottom; padding-right:60px">100000</td>
                            <td rowspan = 2><img class = "icons" src = "details_imgs\\location.png"></td>
                            <td style = " vertical-align: bottom; padding-right:60px">100000</td>
                            <td rowspan = 2><img class = "icons" src = "details_imgs\\experience.jpeg"></td>
                            <td style = " vertical-align: bottom;">100000</td>
                        </tr>
                        <tr>
                            <td style = " vertical-align: top;">Salary</td>
                            <td style = " vertical-align: top;">Location</td>
                            <td style = " vertical-align: top;">Experience</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div> 

        <div class = "section2">
            <button type = "button" class = "slider_button1" onclick = "first()">Job Description</button><button id = "red" type="button" class = "slider_button2">Job Details</button>
        </div>
    </body>
</html>