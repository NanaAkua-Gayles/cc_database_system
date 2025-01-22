<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OVERVIEW</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="adminHeader">
            <h2 class="ah1">Administrative View</h2>
            <input type="checkbox" id="menu-toggle" class="menu-toggle">
<label for="menu-toggle" class="hamburger">
    <span class="bar"></span>
    <span class="bar"></span>
    <span class="bar"></span>
</label>

<nav class="menu">
    <ul>
        <li style="text-decoration: underline;"><a href="overview.html">OVERVIEW</a></li>       
        <li><a href="members.html">MEMBERS</a></li>
        <li><a href="settings.html">SETTINGS</a></li>
        <li><a href="reports.html">REPORTS</a></li>
        <li><a href="help.html">HELP & SUPPORT </a></li>
    </ul>
</nav>

<nav class="nav-links">
    <ul>            
        <li style="text-decoration: underline;"><a href="overview.html">OVERVIEW</a></li>       
        <li><a href="members.html">MEMBERS</a></li>
        <li><a href="settings.html">SETTINGS</a></li>
        <li><a href="reports.html">REPORTS</a></li>
        <li><a href="help.html">HELP & SUPPORT</a></li>
    </ul>
</nav>
      

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

                <a href="membershipForm.html" class="addNewMember">ADD A NEW MEMBER</a>

                <h2>Members List</h2>

                <div class="table-area">
    <table id="registrationsTable">
        <thead>
            <tr style="background: #b2b2b2; color:white;">
                <th>Title</th>
                <th class="fixed-column">Full Name</th>
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
        <tbody id="membersTableBody">
            <?php
            include('db_conn.php');

            // Fetch data from the database
            $query = "SELECT Title, Fullname, Picture, Gender, Dob, Phone, Email, Address, MaritalStatus, Nationality, Education, Profession, EmergencyContactName, EmergencyContact, Team, Department FROM registration";
            $result = $conn->query($query);

            // Check if there are results
            if ($result->num_rows > 0) {
                // Start outputting the rows
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['Title']) . "</td>";
                    echo "<td class='fixed-column'>" . htmlspecialchars($row['Fullname']) . "</td>";
                    echo "<td><img src='" . htmlspecialchars($row['Picture']) . "' alt='Profile Picture' style='width:100px; height:auto;'></td>";
                    echo "<td>" . htmlspecialchars($row['Gender']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Dob']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Phone']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Address']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['MaritalStatus']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Nationality']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Education']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Profession']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['EmergencyContactName']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['EmergencyContact']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Team']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Department']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='16'>No results found.</td></tr>";
            }

            // Close the connection
            $conn->close();
            ?>
        </tbody>
    </table>
</div>
    <footer>
        <p>&copy; 2024 Christ Commonwealth Community Membership Registration System</p>
    </footer>

    <script>

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

    profilePhoto.onclick = function() {
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


async function loadMembers() {
    const response =await fetch('member.php');
    const members =await response.json();

    const tableBody =document.querySelector('#registrationsTable tbody');
    tableBody.innerHTML = '';

    members.forEach(member => {
        const row = document.createElement('tr');
        row.innerHTML = `
        <td>${member.title}</td>
        <td>${member.fullName}</td>
        <td><img src="${member.picture}" alt="${mmember.fullName}'s Picture" style="width:100px; height:auto;"></td>
        <td>${member.gender}</td>
        <td>${member.dob}</td>
        <td>${member.phone}</td>
        <td>${member.email}</td>
        <td>${member.address}</td>
        <td>${member.maritalStatus}</td>
        <td>${member.nationality}</td>
        <td>${member.education}</td>
        <td>${member.profession}</td>
        <td>${member.emergencyContact}</td>
        <td>${member.team}</td>
        <td>${member.department.join(', ')}</td>
        <td>
        <td>
        <button onclick="editMembers(${member.id})">Edit</button>
        <button onclick="deleteMember(${member.id})">Delete</button>
        </td>
        `;
        tableBody.appendChild(row);
    });
}

    function editMember(id) {
        window.location.href = `mForm.php?id=${id}`;
    }

    async function deleteMember(id) {
        await fetch(`member.php>id=${id}`, { method: 'DELETE' });
        loadMembers();
    }


loadMembers();

    </script>
</body>
</html>