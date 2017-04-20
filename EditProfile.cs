using System;
using System.Text;
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
// Change Framework version to 4.0.0 to import reference below
using System.Windows.Forms;
using System.Security.Cryptography;
using System.Data.Entity;


public class EditProfile
{
    // data fields
    private String fName;
    private String lName;
    private String street;
    private String city;
    private String state;
    private String zip;
    private String phoneNumber;
    private String DoB;
    private String emergencyPhone;
    private String emergencyFirstName;
    private String emergencyLastName;
    private String emergencyEmail;
    private String relationship;
    private String allergies;
    private String limitations;

    // constructor
	public EditProfile(String fname, String lname, String street, 
                    String city, String state, String zip, String phoneNumber, String DoB
                     , String emergencyFirstName, String EmergencyLastName, String emergencyPhone, String emergencyEmail, String relationship, String allergies, String limitations)
	{
        setFName(fname);
        setLName(lname);
        setStreet(street);
        setCity(city);
        setState(state);
        setZip(zip);
        setPhone(phoneNumber);
        setDoB(DoB);
        setEmergencyFirstName(emergencyFirstName);
        setEmergencyLastName(EmergencyLastName);
        setEmergencyPhone(emergencyPhone);
        setEmergencyEmail(emergencyEmail);
        setRelationship(relationship);
        setAllergies(allergies);
        setLimitations(limitations);
	}
    
    // setter methods
    public void setFName(String fname)
    {
        if (fname != "")
        {
            this.fName = fname;
        }
    }
    public void setLName(String lname)
    {
        if (lname != "")
        {
            this.lName = lname;
        }
    }
    public void setStreet(String street)
    {
        if (street != "")
        {
            this.street = street;
        }
    }
    public void setCity(String city)
    {
        if (city != "")
        {
            this.city = city;
        }
    }
    public void setState(String state)
    {
        if (state != "")
        {
            this.state = state;
        }
    }
    public void setZip(String zip)
    {
        if (zip != "")
        {
            this.zip = zip;
        }
    }
    public void setPhone(String phoneNumber)
    {
        if (phoneNumber != "")
        {
            this.phoneNumber = phoneNumber;
        }
    }
    public void setDoB(String DoB)
    {
        if (DoB != "")
        {
            this.DoB = DoB;
        }
    }
    public void setEmergencyFirstName(String emergencyFirstName)
    {
        if (emergencyFirstName != "")
        {
            this.emergencyFirstName = emergencyFirstName;
        }
    }
    public void setEmergencyLastName(String emergencyLastName)
    {
        if (emergencyLastName != "")
        {
            this.emergencyLastName = emergencyLastName;
        }
    }
    public void setEmergencyPhone(String emergencyPhone)
    {
        if (emergencyPhone != "")
        {
            this.emergencyPhone = emergencyPhone;
        }
    }
    public void setEmergencyEmail(String emergencyEmail)
    {
        if (emergencyEmail != "")
        {
            this.emergencyEmail = emergencyEmail;
        }
    }
    public void setRelationship(String relationship)
    {
        this.relationship = relationship;
    }
    public void setAllergies(String allergies)
    {
        if (allergies != "")
        {
            this.allergies = allergies;
        }
    }
    public void setLimitations(String limitations)
    {
        if (limitations != "")
        {
            this.limitations = limitations;
        }
    }

    // getter methods
    public String getFName()
    {
        return this.fName;
    }
    public String getLName()
    {
        return this.lName;
    }
    public String getStreet()
    {
        return this.street;
    }
    public String getCity()
    {
        return this.city;
    }
    public String getState()
    {
        return this.state;
    }
    public String getZip()
    {
        return this.zip;
    }
    public String getPhone()
    {
        return this.phoneNumber;
    }
    public String getDoB()
    {
        return this.DoB;
    }
    public String getEmergencyFirstName()
    {
        return this.emergencyFirstName;
    }
    public String getEmergencyLastName()
    {
        return this.emergencyLastName;
    }
    public String getEmergencyPhone()
    {
        return this.emergencyPhone;
    }
    public String getEmergencyEmail()
    {
        return this.emergencyEmail;
    }
    public String getRelationship()
    {
        return this.relationship;
    }
    public String getAllergies()
    {
        return this.allergies;
    }
    public String getLimitations()
    {
        return this.limitations;
    }
}