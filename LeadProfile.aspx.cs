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

public partial class LeadProfile : System.Web.UI.Page
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

        // create variables
        String fname; String lname; String phone; String Street; String City; String State; String zip; String EmergConFName; String EmergConLName; String EmergConRelationship; String EmergConPhone; String Allergies; String Limitations; String DoB;

        sc.Open();

        // populate team lead profile
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
                        txtState.Value = reader[5].ToString();
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


    }
}