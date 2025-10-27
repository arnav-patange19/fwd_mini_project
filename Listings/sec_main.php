<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="sec_main.css">
    </head>
    <body>
        <header>
            <div class = "logo">
                Our Logo
            </div>
            <div class = "headeroptions">
                <input type = "text" placeholder = "Search" >
                <button>&#128269;</button>
            </div>
            <div class = "profile">
                <img src = "applimg/profile.jpg" class = "profimg">
            </div>
        </header>
        <div class = "header2">
            <div class = "profdiv">
                <img src = "applimg/search.png" class = "profsearch">
                <select id = "profession" class = "profession">
                    <option>Designer</option>
                    <option>Developer</option>
                </select>
            </div>
            
            <div class = "profdiv">
                <img src = "applimg/loc.png" class = "profsearch">
                <select id = "worklocation" class = "profession">
                    <option>New York</option>
                    <option>Japan</option>
                </select>
            </div>

           <div class = "profdiv">
                <img src = "applimg/experience.jpg" class = "profsearch">
                <select id = "experience" class = "profession">
                    <option>experience</option>
                    <option>upskill</option>
                </select>
            </div>

            <div class = "profdiv">
                <img src = "applimg/money.png" class = "profsearch">
                <select id = "duration" class = "profession">
                    <option>Per Month</option>
                    <option>Per Year</option>
                </select>
            </div>
            <div class = "salaryrange">
                <div style="display: inline; color: white;">Salary Range</div><br>
                <input type="range" min="0" max="2000" class = "salrange">
            </div>
        </div>
        <nav>
            <h2>Filters</h2>
            <div>
            <p class = "filtertitle">Working schedule</p>
            <input type = "checkbox" name = "working" value = "fulltime" class = "checkbox"><label for = "fulltime">Full Time</label><br>
            <input type = "checkbox" name = "working" value = "partime"  class = "checkbox"><label for = "partime">Part Time</label><br>
            <input type = "checkbox" name = "working" value = "internship"  class = "checkbox"><label for = "internship">Internship</label><br>
            <input type = "checkbox" name = "working" value = "projectwork"  class = "checkbox"><label for = "projectwork">Project Work</label><br>
            <input type = "checkbox" name = "working" value = "volunteering"  class = "checkbox"><label for = "volunteering">Volunteering</label>
            </div>

            <div>
            <p class = "filtertitle">Employment Type</p>
            <input type = "checkbox" name = "employment" value = "fullday"  class = "checkbox"><label for = "fullday">Full Day</label><br>
            <input type = "checkbox" name = "employment" value = "flexible"  class = "checkbox"><label for = "flexible">Flexible Schedule</label><br>
            <input type = "checkbox" name = "employment" value = "shiftwork"  class = "checkbox"><label for = "shiftwork">Shift Work</label><br>
            <input type = "checkbox" name = "employment" value = "distantwork"  class = "checkbox"><label for = "distantwork">Distant Work</label><br>
            <input type = "checkbox" name = "employment" value = "shiftmethod"  class = "checkbox"><label for = "shiftmethod">Shift Method</label>
            </div>
            
        </nav>
    </body>
</html>