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

public partial class EditLeadProfile : System.Web.UI.Page
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
        // retrieve current user's email
        String email = System.Web.HttpContext.Current.User.Identity.Name;

        sc.Open();

        // populate Team Lead profile
        using (SqlCommand cmd = new SqlCommand("SELECT FirstName, LastName, Phone, Street, CityCounty, State_, ZipCode, dateofBirth, EmergencyContactFirstName, EmergencyContactLastName, EmergencyContactRelationship, EmergencyContactEmail, EmergencyContactPhone, Allergies, Limitations From Member where Email = @Email", sc))
        {
            cmd.Parameters.AddWithValue("@email", email);

            using (var reader = cmd.ExecuteReader())
            {
                while (reader.Read())
                {
                    txtFName.Value = reader[0].ToString();
                    txtLName.Value = reader[1].ToString();

                    // test if value is null before displaying 
                    if (reader[2] != DBNull.Value)
                    {
                        txtPhoneNum.Value = reader[2].ToString();
                    }
                    if (reader[3] != DBNull.Value)
                    {
                        txtStreet.Value = reader[3].ToString();
                    }
                    if (reader[4] != DBNull.Value)
                    {
                        txtCity.Value = reader[4].ToString();
                    }
                    if (reader[5] != DBNull.Value)
                    {
                        String currState = reader[5].ToString();
                    }
                    if (reader[6] != DBNull.Value)
                    {
                        txtZip.Value = reader[6].ToString();
                    }
                    if (reader[7] != DBNull.Value)
                    {
                        txtDoB.Value = reader[7].ToString();
                    }
                    if (reader[8] != DBNull.Value)
                    {
                        txtEmergFName.Value = reader[8].ToString();
                    }
                    if (reader[9] != DBNull.Value)
                    {
                        txtEmergLName.Value = reader[9].ToString();
                    }
                    if (reader[10] != DBNull.Value)
                    {
                        txtEmergRelationship.Value = reader[10].ToString();
                    }
                    if (reader[11] != DBNull.Value)
                    {
                        txtEmergEmail.Value = reader[11].ToString();
                    }
                    if (reader[12] != DBNull.Value)
                    {
                        txtEmergPhone.Value = reader[12].ToString();
                    }
                    if (reader[13] != DBNull.Value)
                    {
                        txtAllergies.Value = reader[13].ToString();
                    }
                    if (reader[14] != DBNull.Value)
                    {
                        txtLimitations.Value = reader[14].ToString();
                    }
                }
            }
        }
        sc.Close();
    }
    protected void btnSubmit_ServerClick(object sender, EventArgs e)
    {
        // create variables
        Object fname = DBNull.Value; Object lname = DBNull.Value; Object phone = DBNull.Value; Object Street = DBNull.Value;
        Object City = DBNull.Value; Object State = DBNull.Value; Object zip = DBNull.Value;
        Object EmergConFName = DBNull.Value; Object EmergConLName = DBNull.Value; Object EmergConRelationship = DBNull.Value; Object EmergConEmail = DBNull.Value; Object EmergConPhone = DBNull.Value;
        Object Allergies = DBNull.Value; Object Limitations = DBNull.Value; Object DoB = DBNull.Value;

        // test if input was entered for each textBox and store in variables
        String empty = Request.Form["txtFname"];
        if (empty != null)
        {
            fname = Request.Form["txtFname"].ToString();
        }

        empty = Request.Form["txtLname"];
        if (empty != null)
        {
            lname = Request.Form["txtLname"].ToString();
        }

        empty = Request.Form["txtPhoneNum"];
        if (empty != null)
        {
            phone = Request.Form["txtPhoneNum"].ToString();
        }

        empty = Request.Form["txtStreet"];
        if (empty != null)
        {
            Street = Request.Form["txtStreet"].ToString();
        }

        empty = Request.Form["txtCity"];
        if (empty != null)
        {
            City = Request.Form["txtCity"].ToString();
        }

        if (Request.Form["ddlState"] != null)
        {
            State = Request.Form["ddlState"].ToString();
        }

        empty = Request.Form["txtZip"];
        if (empty != null)
        {
            zip = Request.Form["txtZip"].ToString();
        }

        empty = Request.Form["txtDoB"];
        if (empty != null)
        {
            DoB = Request.Form["txtDoB"].ToString();
        }

        empty = Request.Form["txtEmergFName"];
        if (empty != null)
        {
            EmergConFName = Request.Form["txtEmergFName"].ToString();
        }

        empty = Request.Form["txtEmergLName"];
        if (empty != null)
        {
            EmergConLName = Request.Form["txtEmergLName"].ToString();
        }

        empty = Request.Form["txtEmergRelationship"];
        if (empty != null)
        {
            EmergConRelationship = Request.Form["txtEmergRelationship"].ToString();
        }

        empty = Request.Form["txtEmergPhone"];
        if (empty != null)
        {
            EmergConPhone = Request.Form["txtEmergPhone"].ToString();
        }

        empty = Request.Form["txtEmergEmail"];
        if (empty != null)
        {
            EmergConEmail = Request.Form["txtEmergEmail"].ToString();
        }

        empty = Request.Form["txtAllergies"];
        if (empty != null)
        {
            Allergies = Request.Form["txtAllergies"].ToString();
        }

        empty = Request.Form["txtLimitations"];
        if (empty != null)
        {
            Limitations = Request.Form["txtLimitations"].ToString();
        }

        // retrieve current user's email
        String email = System.Web.HttpContext.Current.User.Identity.Name;

        sc.Open();
        SqlCommand update = new SqlCommand();
        update.CommandText = "Update Member SET FirstName = @fname, LastName = @lname, Phone = @Phone, DateOfBirth =@DoB";
        update.CommandText += ", Street = @Street, CityCounty = @city, State_ = @state, ZipCode = @Zip, EmergencyContactFirstName = @emergFName";
        update.CommandText += ", EmergencyContactLastName = @EmergLName, EmergencyContactEmail = @emergEmail, EmergencyContactPhone = @EmergPhone, EmergencyContactRelationship = @EmergRelationship";
        update.CommandText += ", Allergies = @Allergies, Limitations = @Limitations Where Email = @Email";

        update.Connection = sc;
        update.Parameters.AddWithValue("@fname", fname);
        update.Parameters.AddWithValue("@lname", lname);
        update.Parameters.AddWithValue("@Phone", phone);
        update.Parameters.AddWithValue("@DoB", DoB);
        update.Parameters.AddWithValue("@city", City);
        update.Parameters.AddWithValue("@Street", Street);
        update.Parameters.AddWithValue("@state", State);
        update.Parameters.AddWithValue("@Zip", zip);
        update.Parameters.AddWithValue("@emergFName", EmergConFName);
        update.Parameters.AddWithValue("@EmergLName", EmergConLName);
        update.Parameters.AddWithValue("@emergEmail", EmergConEmail);
        update.Parameters.AddWithValue("@EmergPhone", EmergConPhone);
        update.Parameters.AddWithValue("@EmergRelationship", EmergConRelationship);
        update.Parameters.AddWithValue("@Allergies", Allergies);
        update.Parameters.AddWithValue("@Limitations", Limitations);
        update.Parameters.AddWithValue("@Email", email);

        update.ExecuteNonQuery();

        sc.Close();

        MessageBox.Show("Success! Your profile has been updated!");
        Response.Redirect("LeadProfile.aspx");
    }
}