/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.hipos.resources;

/**
 *
 * @author u19730
 */
import java.util.*;
import java.io.*;

public class AgeCalculation {

    public Integer getAge(Date fecha) throws IOException {
        Calendar dob = Calendar.getInstance();
        dob.setTime(fecha);
        Calendar today = Calendar.getInstance();
        int age = today.get(Calendar.YEAR) - dob.get(Calendar.YEAR);
        if (today.get(Calendar.DAY_OF_YEAR) < dob.get(Calendar.DAY_OF_YEAR)) {
            age--;
        }
        return age;
    }

    public Date getDateFromString(String fecha) throws IOException {
        Date result = null;
        String[] dateSplit = fecha.split("-");
        int year = Integer.parseInt(dateSplit[0]);
        int month = Integer.parseInt(dateSplit[1]) - 1;
        int day = Integer.parseInt(dateSplit[2]);
        GregorianCalendar calendar = new GregorianCalendar(year, month, day);
        result = calendar.getTime();
        return result;
    }
}
