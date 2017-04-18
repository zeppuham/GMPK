<%@ Page Title="" Language="C#" AutoEventWireup="true" CodeFile="EditLeadProfile.aspx.cs" Inherits="EditLeadProfile" %>

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
		
                <form runat="server" name="editProf-form" id="edit_profile"> <%--enctype="multipart/form-data"--%>

        <input id="Submit1" type="submit"
              runat ="server"
              onserverclick="btnSubmit_ServerClick"
              value="Save"
              name="saveProf"
              class="btn btn-success"
              style="background-color:#b8c076;font-family: Bitter, sans-serif;text-transform: uppercase;color: #FFFFFF;cursor:pointer;" />
		<img src="" alt="Profile Picture" style="width:304px;height:228px;">
		<input type="file" name="profPicture" id="profPicture">
        <h2>Basic Information</h2>

        
        <label for="profFName">First Name: </label>
        <input type="text" runat="server" id="txtFName" name="profFName"  value=""  /> <br>

        <label for="profLName">Last Name: </label>
        <input type="text" runat="server" id="txtLName" name="profLName"  value=""  /> <br>

        <label for="profPhone">Phone Number: </label>
        <input type="text" runat="server" id="txtPhoneNum" name="profPhone" value="" /> <br>

        <label for="profStreet">Street: </label>
        <input type="text" runat="server" id="txtStreet" name="profStreet"  value=""  /> <br>

        <label for="profCity">City: </label>
        <input type="text" runat="server" id="txtCity" name="profCity"  value=""  /> <br>

        <label for="profState">State: </label>
        <select name="ddlState" id="ddlState">
                        <option style="color:gray" value=""></option>
                        <!-- populate values using php -->
                                                    <option style="color:black" value="Alabama">Alabama</option>
                                                        <option style="color:black" value="Alaska">Alaska</option>
                                                        <option style="color:black" value="Arizona">Arizona</option>
                                                        <option style="color:black" value="Arkansas">Arkansas</option>
                                                        <option style="color:black" value="California">California</option>
                                                        <option style="color:black" value="Colorado">Colorado</option>
                                                        <option style="color:black" value="Connecticut">Connecticut</option>
                                                        <option style="color:black" value="Delaware">Delaware</option>
                                                        <option style="color:black" value="District of Columbia">District of Columbia</option>
                                                        <option style="color:black" value="Florida">Florida</option>
                                                        <option style="color:black" value="Georgia">Georgia</option>
                                                        <option style="color:black" value="Hawaii">Hawaii</option>
                                                        <option style="color:black" value="Idaho">Idaho</option>
                                                        <option style="color:black" value="Illinois">Illinois</option>
                                                        <option style="color:black" value="Indiana">Indiana</option>
                                                        <option style="color:black" value="Iowa">Iowa</option>
                                                        <option style="color:black" value="Kansas">Kansas</option>
                                                        <option style="color:black" value="Kentucky">Kentucky</option>
                                                        <option style="color:black" value="Louisiana">Louisiana</option>
                                                        <option style="color:black" value="Maine">Maine</option>
                                                        <option style="color:black" value="Maryland">Maryland</option>
                                                        <option style="color:black" value="Massachusetts">Massachusetts</option>
                                                        <option style="color:black" value="Michigan">Michigan</option>
                                                        <option style="color:black" value="Minnesota">Minnesota</option>
                                                        <option style="color:black" value="Mississippi">Mississippi</option>
                                                        <option style="color:black" value="Missouri">Missouri</option>
                                                        <option style="color:black" value="Montana">Montana</option>
                                                        <option style="color:black" value="Nebraska">Nebraska</option>
                                                        <option style="color:black" value="Nevada">Nevada</option>
                                                        <option style="color:black" value="New Hampshire">New Hampshire</option>
                                                        <option style="color:black" value="New Jersey">New Jersey</option>
                                                        <option style="color:black" value="New Mexico">New Mexico</option>
                                                        <option style="color:black" value="New York">New York</option>
                                                        <option style="color:black" value="North Carolina">North Carolina</option>
                                                        <option style="color:black" value="North Dakota">North Dakota</option>
                                                        <option style="color:black" value="Ohio">Ohio</option>
                                                        <option style="color:black" value="Oklahoma">Oklahoma</option>
                                                        <option style="color:black" value="Oregon">Oregon</option>
                                                        <option style="color:black" value="Pennsylvania">Pennsylvania</option>
                                                        <option style="color:black" value="Rhode Island">Rhode Island</option>
                                                        <option style="color:black" value="South Carolina">South Carolina</option>
                                                        <option style="color:black" value="South Dakota">South Dakota</option>
                                                        <option style="color:black" value="Tennessee">Tennessee</option>
                                                        <option style="color:black" value="Texas">Texas</option>
                                                        <option style="color:black" value="Utah">Utah</option>
                                                        <option style="color:black" value="Vermont">Vermont</option>
                                                        <option style="color:black" value="Virginia">Virginia</option>
                                                        <option style="color:black" value="Washington">Washington</option>
                                                        <option style="color:black" value="West Virginia">West Virginia</option>
                                                        <option style="color:black" value="Wisconsin">Wisconsin</option>
                                                        <option style="color:black" value="Wyoming">Wyoming</option>
                                                </select> <br><br>

         <label for="profZip">Zip Code: </label>
        <input type="text" runat="server" id="txtZip" name="profZip"  value=""  /> <br>

        <label for="profDOB">Date of Birth: </label>
        <input type="text" runat="server" id="txtDoB"  name="profDOB"  value=""  /> <br>

        <h2>Emergency Contact Information</h2>
        <label for="profEmFName">Contact's First Name: </label>
        <input type="text" runat="server" id="txtEmergFName" name="profEmFName"  value=""  /> <br>

        <label for="profEmLName">Contact's Last Name: </label>
        <input type="text" runat="server" id="txtEmergLName" name="profEmLName"  value=""  /> <br>

        <label for="profEmRelation">Contact's Relationship: </label>
        <input type="text" runat="server" id="txtEmergRelationship" name="profEmRelation"  value=""  /> <br>

        <label for="profEmEmail">Contact's Email: </label>
        <input type="text" runat="server" id="txtEmergEmail" name="profEmEmail"  value=""  /> <br>

        <label for="profEmPhone">Contact's Phone: </label>
        <input type="text" runat="server" id="txtEmergPhone" name="profEmPhone"  value=""  /> <br>

        <h2>Medical Information</h2>
        <label for="profAllergies">Allergies: </label>
        <input type="text"  runat="server" id="txtAllergies" name="profAllergies"  value=""  /> <br>

        <label for="profLimitations">Limitations: </label>
        <input type="text" runat="server" id="txtLimitations" name="profLimitations"  value=""  /> <br>

        <input type="submit"
               runat ="server"
               id="btnSubmit"
               value="Save"
               onserverclick="btnSubmit_ServerClick"
               name="btnSubmit"
               class="btn btn-success"
               style="background-color:#b8c076;font-family: Bitter, sans-serif;text-transform: uppercase;color: #FFFFFF;cursor:pointer;" />

        <center> <p class="message">Return to <a href="LeadProfile.aspx"> <i class="fa fa-arrow-left" aria-hidden="true"></i>Team Lead Portal</a>.</p> </center>
        <center> <p class="message">Return to <a href="http://wildlifecenter.org/">The Wildlife Center</a> website.</p> </center>

        </form>
    </div>
</div>
</body>
</html>

