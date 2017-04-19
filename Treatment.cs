using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

/// <summary>
/// Summary description for Treatment
/// </summary>
public class Treatment
{
    //Data Field
    String email;
    String interest1;
    String interest2;
    String interest3;
    String interest4;

    public Treatment(String email, String interest1, String interest2, String interest3, String interest4)
    {
        setEmail(email);
        setInterest1(interest1);
        setInterest2(interest2);
        setInterest3(interest3);
        setInterest4(interest4);
    }

    //Setters
    public void setEmail(String email)
    {
        this.email = email;
    }
    public void setInterest1(String interest1)
    {
        this.interest1 = interest1;
    }
    public void setInterest2(String interest2)
    {
        this.interest2 = interest2;
    }
    public void setInterest3(String interest3)
    {
        this.interest3 = interest3;
    }
    public void setInterest4(String interest4)
    {
        this.interest4 = interest4;
    }

    //Getters
    public String getEmail()
    {
        return this.email;
    }
    public String getInterest1()
    {
        return this.interest1;
    }
    public String getInterest2()
    {
        return this.interest2;
    }
    public String getInterest3()
    {
        return this.interest3;
    }
    public String getInterest4()
    {
        return this.interest4;
    }

}