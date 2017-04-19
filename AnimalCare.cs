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

/// <summary>
/// Summary description for AnimalCare
/// </summary>
public class AnimalCare
{
    //Data Fields
    String email;
    String animalExp;
    String comfortFood;
    String livePrey;
    String outside;
    String lift;
    String rabies;
    String vac;
    String availability;
    String commitment;
    String rights;
    String learn;
    String passion;



    //Constructors
	public AnimalCare(String email, String animalExp, String comfortFood, String livePrey, String outside,
        String lift, String rabies, String vac, String availability, String commitment, String rights,
        String learn, String passion)
	{
        //is.email = System.Web.HttpContext.Current.User.Identity.Name;
        setEmail(email);
        setAnimalExp(animalExp);
        setComfortFood(comfortFood);
        setLivePrey(livePrey);
        setOutside(outside);
        setLift(lift);
        setRabies(rabies);
        setRabies(vac);
        setAvailability(availability);
        setCommitment(commitment);
        setRights(rights);
        setLearn(learn);
        setPassion(passion);

	}

    //Setters
    public void setEmail(String email)
    {
        this.email = email;
    }
    public void setAnimalExp(String animalExp)
    {
        this.animalExp = animalExp;
    }
    public void setComfortFood(String comfortFood)
    {
        this.comfortFood = comfortFood;
    }
    public void setLivePrey(String livePrey)
    {
        this.livePrey = livePrey;
    }
    public void setOutside(String outside)
    {
        this.outside = outside;
    }
    public void setLift(String lift)
    {
        this.lift = lift;
    }
    public void setRabies(String rabies)
    {
        this.rabies = rabies;
    }
    public void setAvailability(String availability)
    {
        this.availability = availability;
    }
    public void setCommitment(String commitment)
    {
        this.commitment = commitment;
    }
    public void setRights(String rights)
    {
        this.rights = rights;
    }
    public void setLearn(String learn)
    {
        this.learn = learn;
    }
    public void setPassion(String passion)
    {
        this.passion = passion;
    }

    //Getters
    public String getEmail()
    {
        return this.email;
    }
    public String getAnimalExp()
    {
        return this.animalExp;
    }
    public String getComfortFood()
    {
        return this.comfortFood;
    }
    public String getLivePrey()
    {
        return this.livePrey;
    }
    public String getOutside()
    {
        return this.outside;
    }
    public String getLift()
    {
        return this.lift;
    }
    public String getRabies()
    {
        return this.rabies;
    }
    public String getVac()
    {
        return this.vac;
    }
    public String getAvailability()
    {
        return this.availability;
    }
    public String getCommitment()
    {
        return this.commitment;
    }
    public String getRights()
    {
        return this.rights;
    }
    public String getLearn()
    {
        return this.learn;
    }
    public String getPassion()
    {
        return this.passion;
    }



}