<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRATION FORM</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <section>
    <div class="membershipGrouping">
        <div class="fHeadings">
            <img src="coloredLogo.PNG" class="cLogo">
            <h1>CHRIST COMMONWEALTH COMMUNITY (CCC)</h1><br>
            <h3><span style="font-size: 1.2em;">Membership Registration Form</span></h3>
        </div>
    <form>
    <div class="fDetail">
        <label>Title</label><br>
        <select id="placeholder">
            <option>Select Title ...</option>
            <option>Mr.</option>
            <option>Mrs.</option>
            <option>Miss</option>
        </select>
    </div>

    <div class="fDetail">
        <label for="fullname" id="lbl">Full Name <span style="color: red;">*</span></label> <br><br>
            <input type="text" name="name" id="placeholder" required>
    </div>


    <div class="fDetail">
        <label for="picture-upload" id="lbl">Passport Size Picture</label><br>
        <div class="picture-placeholder"></div>
            <input type="file" id="picture-upload" accept="image/*">
        </label>
    </div>

    <div class="fDetail">
        <label id="lbl">Gender <span style="color: red;">*</span></label><br>
        <select id="placeholder">
            <option>Select Gender ...</option>
            <option>Male</option>
            <option>Female</option>
        </select>
    </div>    

    <div class="fDetail">
        <label id="lbl">Date of Birth <span style="color: red;">*</span></label><br><br>
            <input type="date" id="placeholder" name="date-of-birth">
    </div>

    <div class="fDetail">
        <label id="lbl">Phone Number <span style="color: red;">*</span></label><br><br>
            <input type="text" name="name" id="placeholder" required>
    </div>

    <div class="fDetail">
        <label id="lbl" >Email Address <span style="color: red;">*</span></label><br><br>
            <input type="email" name="name" id="placeholder" required>
    </div>

    <div class="fDetail">
        <label id="lbl">Residential Address <span style="color: red;">*</span></label><br><br>
            <input type="text" name="name" id="placeholder" required>
    </div>

    <div class="fDetail">
        <label id="lbl">Marital Status</label><br>
        <select id="placeholder">
            <option> Single</option>
            <option> Married </option>
        </select> 
    </div>

    <div class="fDetail">
        <label id="lbl">Nationality <span style="color: red;">*</span></label><br><br>
            <input type="text" name="name" id="placeholder" required>
    </div>

    <div class="fDetail">
    <label id="lbl">Educational Level</label><br>
    <select id="placeholder">
        <option> Basic Education</option>
        <option> Secondary Education</option> 
        <option> Tertiary Education</option>
    </select>
    </div>

    <div class="fDetail">
        <label>Profession </label><br><br>
            <input type="text" name="name" id="placeholder">
    </div>

    <div class="fDetail">
        <label>Name of Emergency Contact <span style="color: red;">*</span></label><br><br>
            <input type="text" name="name" id="placeholder" required>
    </div>

    <div class="fDetail">
        <label>Emergency Contact <span style="color: red;">*</span></label><br><br>
            <input type="text" name="name" id="placeholder" required>
    </div>

    <div class="fDetail">
        <label>Name of your Team <span style="color: red;">*</span></label><br><br>
            <input type="text" name="name" id="placeholder" required>
    </div>

    <div class="fDetail">
        <label>Auxiliary Department</label><br>
        <label>
            <input type="checkbox" name="group1" value="option1"> Lead Presbyter
        </label>
        <label>
            <input type="checkbox" name="group1" value="option1"> Pastoral Board
        </label> 
        <label>
            <input type="checkbox" name="group1" value="option1"> Board of Deacons
        </label>
        <label>
        <input type="checkbox" name="group1" value="option1"> Clergy Wives
        </label>
         <label>
        <input type="checkbox" name="group1" value="option1"> Music Department
         </label> 
        <label>
        <input type="checkbox" name="group1" value="option1"> Media Department
        </label>
        <label>
        <input type="checkbox" name="group1" value="option1"> Ushering Department
        </label>
        <label>
        <input type="checkbox" name="group1" value="option1"> League of Extraordinary Ladies
        </label> 
        <label>
        <input type="checkbox" name="group1" value="option1"> League of Extraordinary Gentlemen
        </label>
        </div>

    <button type="submit" class="mfButton">Submit</button>
</form>
</div>
</section>
</main>
<footer>
    <p>&copy; 2024 Christ Commonwealth Community Membership Registration System</p>
</footer>
</body>
</html>