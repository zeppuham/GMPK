<%@ Page Language="C#" AutoEventWireup="true" CodeFile="VolunteerProfile.aspx.cs" Inherits="VolunteerProfile" %>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Team Lead Profile</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles/register.css">
    <script src="js/register.js"></script>
</head>
    <style>
        /* fonts */
@import url('https://fonts.googleapis.com/css?family=Bitter|Lato');

/* body */

body {
	background-image: url("images/website-background.png");
	no-repeat center center fixed; 
  		-webkit-background-size: cover;
 		-moz-background-size: cover;
  		-o-background-size: cover;
 	background-repeat: repeat-x;
 	background-size: cover;
 	background-color: #3c323a;
 	font-family: 'Lato', sans-serif;
 	font-size: 16px;
 	color: #3c323a;
}

.page {
  width: 500px;
  padding: 25px 0 0;
  margin: auto;
}

.image {
  position: absolute;
  max-width: 500px;
  margin: 0 auto 0px;
  padding: 45px;
  text-align: left;
}

input[type=radio] {
    display: block;
    margin: 0 auto;
}
label {
    display: inline-block;
}

.form {
  position: absolute;
  z-index: 1;
  background: #FFFFFF;
  background-image: url("images/bg.jpg");
  max-width: 500px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: left;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Lato", sans-serif;
  outline: 0;
  background: #ffffff;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Bitter", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #b8c076;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button a {
  font-family: "Bitter", sans-serif;
  text-transform: uppercase;
  outline: 0;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
  text-decoration: none;
}

.form button:hover,.form button:active,.form button:focus {
  background: #d3d7ae;
}


.form .message {
  margin: 15px 0 0;
  color: #3c323a;
  font-size: 12px;
}
.form .message a {
  color: #35b6be;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #3c323a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #B8C172;
}
    </style>
    
    <script type="text/javascript">

        $('.message a').click(function () {
            $('form').animate({ height: "toggle", opacity: "toggle" }, "slow");
        });

    </script> 
<body>
<div class="page">
    <div class="form">
        <center><img src="images/text-logo-300.png"></center><br><br>
        
        <h1>Team Lead Profile</h1>
        
        <a href="EditProfile.aspx"><input type="button"
               value="Edit Profile"
               class="btn btn-success"
               style="background-color:#b8c076;font-family: Bitter, sans-serif;text-transform: uppercase;color: #FFFFFF;cursor:pointer;" /></a>
        <img src="" alt="Profile Picture" style="width:304px;height:228px;">
		<h2>Basic Information</h2>

        <label for="profFName">First Name: </label>
        <input type="text" runat="server" id="txtFName" name="profFName"  value="" readonly="true" /> <br>

        <label for="profLName">Last Name: </label>
        <input type="text" runat="server" id="txtLName" name="profLName"  value="" readonly="true" /> <br>

        <label for="profPhone">Phone Number: </label>
        <input type="text" runat="server" id="txtPhoneNum" name="profPhone" value="" readonly ="true"/> <br>

        <label for="profStreet">Street: </label>
        <input type="text" runat="server" id="txtStreet" name="profStreet"  value="" readonly ="true" /> <br>

        <label for="profCity">City: </label>
        <input type="text" runat="server" id="txtCity" name="profCity"  value="" readonly ="true" /> <br>

        <label for="profState">State: </label>
        <input type="text" runat="server" id="txtState" name="profState"  value="" readonly ="true" /> <br>

        <label for="profZip">Zip Code: </label>
        <input type="text" runat="server" id="txtZip" name="profZip"  value="" readonly="true" /> <br>

        <label for="profDOB">Date of Birth: </label>
        <input type="text" runat="server" id="txtDoB"  name="profDOB"  value="" readonly="true" /> <br>

        <h2>Emergency Contact Information</h2>
        <label for="profEmFName">Contact's First Name: </label>
        <input type="text" runat="server" id="txtEmergFName" name="profEmFName"  value="" readonly="true" /> <br>

        <label for="profEmLName">Contact's Last Name: </label>
        <input type="text" runat="server" id="txtEmergLName" name="profEmLName"  value="" readonly="true" /> <br>

        <label for="profEmRelation">Contact's Relationship: </label>
        <input type="text" runat="server" id="txtEmergRelationship" name="profEmRelation"  value="" readonly="true" /> <br>

        <label for="profEmEmail">Contact's Email: </label>
        <input type="text" runat="server" id="txtEmergEmail" name="profEmEmail"  value="" readonly="true" /> <br>

        <label for="profEmPhone">Contact's Phone: </label>
        <input type="text" runat="server" id="txtEmergPhone" name="profEmPhone"  value="" readonly="true" /> <br>

        <h2>Medical Information</h2>
        <label for="profAllergies">Allergies: </label>
        <input type="text"  runat="server" id="txtAllergies" name="profAllergies"  value="" readonly="true" /> <br>

        <label for="profLimitations">Limitations: </label>
        <input type="text" runat="server" id="txtLimitations" name="profLimitations"  value="" readonly="true" /> <br>

        <center> <p class="message">Return to <a href="LeadPortal.aspx"> <i class="fa fa-arrow-left" aria-hidden="true"></i>Team Lead Portal</a>.</p> </center>
        <center> <p class="message">Return to <a href="http://wildlifecenter.org/">The Wildlife Center</a> website.</p> </center>

    </div>
	
</div>


</body>
</html>

