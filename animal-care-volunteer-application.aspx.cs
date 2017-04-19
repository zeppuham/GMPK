using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Web.UI.WebControls.WebParts;
using System.Web.UI.HtmlControls;
using System.Data;
using System.Configuration;
using System.Web.Security;
using System.Data.SqlClient;
using System.Globalization;
using System.Text;
using System.Security.Cryptography;
using System.IO;
using System.Windows.Forms;


public partial class AnimalCareApp : System.Web.UI.Page
{
      SqlConnection sc = new SqlConnection();
      protected void Page_Load(object sender, EventArgs e)
      {
          // Connect to DataBase
          try
          {
              sc.ConnectionString = @"Server=LocalHost;Database=GroupProject;Trusted_Connection=Yes;";
          }
          catch (Exception ex)
          {
              MessageBox.Show("Error" + ex.Message);
          }
      }
      protected void btnSend_ServerClick(object sender, EventArgs e)
      {
          // get current user email
          String email = System.Web.HttpContext.Current.User.Identity.Name;

          // get user input
          String animalExp = Request.Form["txtAnimalExp"].ToString();
          String comfortFood = Request.Form["txtComfortFood"].ToString();
          String livePrey = Request.Form["txtLivePrey"].ToString();
          String outside = Request.Form["txtOutside"].ToString();
          String lift = Request.Form["txtLift"].ToString();
          String rabies = Request.Form["ddlRabies"].ToString();
          String vac = Request.Form["ddlVacCost"].ToString();
          String availability = Request.Form["txtAvailable"].ToString();
          String commitment = Request.Form["ddlCommitment"].ToString();
          String rights = Request.Form["txtRights"].ToString();
          String learn = Request.Form["txtLearn"].ToString();
          String passion = Request.Form["txtPassion"].ToString();
          Object other = DBNull.Value;
          if (Request.Form["txtElse"] != null)
          {
              other = Request.Form["txtElse"].ToString();
          }
          
          sc.Open();

          AnimalCare newApplication = new AnimalCare(email, animalExp, comfortFood, livePrey, outside, lift, rabies, vac,
              availability, commitment, rights, learn, passion);

          // store in db
          SqlCommand insert = new SqlCommand();
          insert.Connection = sc;
          insert.CommandText = "INSERT into animal_care_app (userEmail, animalExp, comfortFood, livePrey, outside, lift, rabies, vac, availability, commitment, rights, learn, passion, other)";
          insert.CommandText += "VALUES (@email, @animalExp, @comfortFood, @livePrey, @outside, @lift, @rabies, @vac, @availability, @commitment, @rights, @learn, @passion, @other)";
          insert.Parameters.AddWithValue("email", newApplication.getEmail());
          insert.Parameters.AddWithValue("@animalExp", newApplication.getAnimalExp());
          insert.Parameters.AddWithValue("@comfortFood", newApplication.getComfortFood());
          insert.Parameters.AddWithValue("@livePrey", newApplication.getLivePrey());
          insert.Parameters.AddWithValue("@outside", newApplication.getOutside());
          insert.Parameters.AddWithValue("@lift", newApplication.getLift());
          insert.Parameters.AddWithValue("@rabies", newApplication.getRabies());
          insert.Parameters.AddWithValue("@vac", newApplication.getVac());
          insert.Parameters.AddWithValue("@availability", newApplication.getAvailability());
          insert.Parameters.AddWithValue("@commitment", newApplication.getCommitment());
          insert.Parameters.AddWithValue("@rights", newApplication.getRights());
          insert.Parameters.AddWithValue("@learn", newApplication.getLearn());
          insert.Parameters.AddWithValue("@passion", newApplication.getPassion());
          insert.Parameters.AddWithValue("@other", other );

          insert.ExecuteNonQuery();

          // return to applicant portal if sussessful
          MessageBox.Show("Success! Your Application has been submitted and is being reviewed by our Staff. If approved you will be able to view the department page after log in ");

          // determine where to redirect user to
          SqlCommand userType = new SqlCommand("select volunteer from member where email = @email");
          userType.Connection = sc;
          userType.Parameters.AddWithValue("@email", email);
          bool type = (bool)userType.ExecuteScalar();
          if (type)
          {
              Response.Redirect("../VolunteerPortal.aspx");
          }
          else
          {
              Response.Redirect("../ApplicantPortal.aspx");
          }

          sc.Close();
      }
}