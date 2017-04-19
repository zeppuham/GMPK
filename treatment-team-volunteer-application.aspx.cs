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

public partial class treatment_team_volunteer_application : System.Web.UI.Page
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

        String interest1 = Request.Form["txtInterest1"].ToString();
        String interest2 = Request.Form["txtInterest2"].ToString();
        String interest3 = Request.Form["txtInterest3"].ToString();
        String interest4 = Request.Form["txtInterest4"].ToString();

        sc.Open();

        Treatment newApplication = new Treatment(email, interest1, interest2, interest3, interest4);

        // submit to database
        SqlCommand insert = new SqlCommand();
        insert.Connection = sc;
        insert.CommandText = "INSERT INTO treatment_team_app (interest1, interest2, interest3, interest4, userEmail)";
        insert.CommandText += "VALUES (@interest1, @interest2, @interest3, @interest4, @email)";

       
        insert.Parameters.AddWithValue("@interest1", newApplication.getInterest1());
        insert.Parameters.AddWithValue("@interest2", newApplication.getInterest2());
        insert.Parameters.AddWithValue("@interest3", newApplication.getInterest3());
        insert.Parameters.AddWithValue("@interest4", newApplication.getInterest4());
        insert.Parameters.AddWithValue("@email", newApplication.getEmail());

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