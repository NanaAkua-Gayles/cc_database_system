<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRATION LOGIN</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="adminlogin" id="signUp" style="display:none;">
    <span style="text-align: center; margin-bottom: 20px; color: rgb(240, 21, 105);
"><h1>Admin Registry</h1></span>
    <form method="register.php" method="POST">
        <span style="display: block; margin-bottom: 20px;"><label for="fullname">Full Name:</label></span>
            <input type="text" id="adminUsername" class="loginInput" name="username" required>

        <span style="display: block; margin-bottom: 20px;"><label for="email">Email:</label></span>
        <input type="email" id ="email" class="loginInput" name="email" required>

        <span style="display: block; margin-bottom: 20px;"><label for="phone">Phone Number:</label></span>
        <input type="text" id="phonenumber" class="loginInput" name="phonenumber" required>

        <span style="display: block; margin-bottom: 20px;"><label for="role">Access Level:</label></span>
        <select name="role" id="role" required>
            <option value="adminGeneral">Admin General</option>
            <option value="teamLeader">Team Leader</option>
            <option value="adminGeneral">Regular User</option>
        </select>

        <button type="submit" class="loginButton">Sign Up</button>
    </form>
    <p class="registerLink">Already have an account?
        <button id="signInButton" class="sBtn">Login</button></p>
</div>



    <div class="adminlogin" id="signIn"> 
    <span style="text-align: center; margin-bottom: 20px; color: rgb(240, 21, 105);
"><h1>Admin Login</h1></span>
    <form action="login.php" method="POST">
        <span style="display: block; margin-bottom: 20px;"><label for="username">Username:</label></span>
            <input type="text" id="adminUsername" class="loginInput" name="username" required>
        <span style="display: block; margin-bottom: 20px;"><label for="password">Password:</label></span>
        <input type="password" id="password" class="loginInput" name="password" required>
        
        <a href="#" class="recover">Recover Password</a>

        <button type="submit" class="loginButton">Login</button>
    </form>
        <p class="registerLink">Don't have an account?
        <button id="signUpButton" class="sBtn">Sign Up</button></p>
</div>




<script>
    const signUpButton=document.getElementById('signUpButton');
const signInButton=document.getElementById('signInButton');
const signInForm=document.getElementById('signIn');
const signUpForm=document.getElementById('signUp');

signUpButton.addEventListener('click', function(){
    signInForm.style.display="none";
    signUpForm.style.display="block";
})
signInButton.addEventListener('click', function(){
    signInForm.style.display="block";
    signUpForm.style.display="none";
})
</script>
</body>
</html>