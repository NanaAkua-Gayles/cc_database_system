<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACCESS ADMIN</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="adminHeader">
            <h2>General Admin Dashboard</h2>
            <div class="menu-toggle" onclick="toggleMenu()">
                <div class="hamburger" id="hamburger">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
            </div>
            <nav class="menu" id="menu">
                <div class="close" id="close" onclick="toggleMenu()">
                    <div class="bar" style="transform:rotate(45deg) translate(4px, 3px);"></div>
                    <div class="bar" style="transform:rotate(-45deg) translate(3px, -4px);"></div>
                </div>
            </nav>

            <div class="nav" id="desktop-menu">
            </div>

            <div class="profile-card">
                <div class="profile-photo" id="profilePhoto"></div>
            </div>
    </header>

    
    <div class="popup" id="popup">
        <div class="tProfile" style="display:relative; background: #35424a; height: 30px;
            border-radius: 8px 8px 0 0; padding: 30px; font-size: 1.2em;">
            <strong>Profile</strong></div>

        <div id="popupPhoto" class="profile-photo" style="margin:auto; margin-top:-9%; 
        width: 60px; height:60px; border:none;"></div>

        <div class="pDetails" style="margin-bottom:40%; padding:15px;">
            <p><strong>General Admin</strong></p>
            <p><strong>generaladmin@gmail.com</strong></p>
        </div>
        <hr> 

        <div style="margin-top:10%; text-align:left; margin-left:20px"><strong>Logout</strong></div>
    </div>

            <h2>Members List</h2>
            <table id="registrations-table">
                <thead>
                    <tr style="background: #b2b2b2; color:white;">
                        <th>Title</th>
                        <th>Full Name</th>
                        <th>Picture</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Residential Address</th>
                        <th>Marital Status</th>
                        <th>Nationality</th>
                        <th>Education Level</th>
                        <th>Profession</th>
                        <th>Name of Emergency Contact</th>
                        <th>Emergency Contact</th>
                        <th>Team Name</th>
                        <th>Auxiliary Department</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
    <footer>
        <p>&copy; 2024 Christ Commonwealth Community Membership Registration System</p>
    </footer>

    <script>
        
//Menu Items
const menuItems=[
    {name: "Overview", link: "indexs.php"},
    {name: "Members", link: "members.php"},
    {name: "Settings", link: "settings.php"},
    {name: "Reports", link: "reports.php"},
    {name: "Help & Support", link: "help.php"},
];

//Mobile Menu
function createMobileMenu() {
    const menu =document.getElementById("menu");
    menuItems.forEach(item => {
        const anchor = document.createElement("a");
                                    anchor.href = item.link;
                                    anchor.innerText = item.name;

                                    anchor.addEventListener("click", (event) => {
                                        event.preventDefault();
                                        handleMenuClick(item.name);
                                    });

                                    menu.appendChild(anchor);
    });
}


//Function for creating desktop navigation
function createDesktopMenu() {
    const desktopMenu = document.getElementById("desktop-menu");
    menuItems.forEach(item => {
        const anchor = document.createElement("a");
        anchor.href = item.link;
        anchor.innerText =item.name;

        anchor.addEventListener("click", (event) => {
            event.preventDefault();
            handleMenuClick(item.name);
        });
        desktopMenu.appendChild(anchor);
    });
}

function handleMenuClick(menuItem) {
    const content = document.getElementById("content");
    content.innerHTML = `<div class="Welcome"><h2>${menuItem} Page</h2>
    <p>Content for ${menuItem} goes here.</p></div>`;
}

function toggleMenu() {
    const menu = document.getElementById("menu");
    const hamburgerIcon = document.getElementById("hamburger");

    menu.classList.toggle("active");
    menu.style.display = menu.classList.contains("active") ? "flex" : "none";

    if (menu.classList.contains("active")) {
        hamburgerIcon.style.display = "none";
    } else {
        hamburgerIcon.style.display = "flex";
    }
}

//Profile Photo
    const user = {
        fullName:"General Admin",
        email:"generaladmin@gmail.com",
        username:"GENERALADMIN"
    };

    const profilePhoto =document.getElementById("profilePhoto");
    const initials =user.fullName.split(" ").map(name => name.charAt(0)).join("");
    profilePhoto.textContent =initials.toUpperCase();

//Popup Functionality
    const popup =document.getElementById('popup');
    const popupPhoto =document.getElementById('popupPhoto');

    profilePhoto.onclick =function() {
        popup.style.display = 'block';
        popupPhoto.textContent =initials.toUpperCase();
    };

    const fileInput =document.createElement('input');
    fileInput.type ='file';
    fileInput.accept = 'image/*';
    fileInput.style.display = 'none';

    popupPhoto.onclick =function() {
        fileInput.click();
    };

    fileInput.onchange =function(event) {
        const file =event.target.files[0];
        if (file) {
            const reader = new FileReader ();
            reader.onload =function(e) {
popupPhoto.style.backgroundImage = `url(${e.target.result})`;

popupPhoto.style.backgroundSize = `cover`;
                popupPhoto.style.color = 'transparent';
            };
            reader.readAsDataURL(file);
        }
    };

    document.addEventListener('click', function(event) {
        if (popup.style.display === 'block' && !popup.contains(event.target) && !
profilePhoto.contains(event.target)) {
        popup.style.display = 'none';
        }
    });


    createMobileMenu();
    createDesktopMenu();


    </script>
</body>
</html>