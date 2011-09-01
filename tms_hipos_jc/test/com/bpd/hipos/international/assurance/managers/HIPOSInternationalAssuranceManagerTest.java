/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package com.bpd.hipos.international.assurance.managers;

import com.bpd.hipos.managers.HIPOSInternationalAssuranceManager;
import org.junit.AfterClass;
import org.junit.BeforeClass;
import org.junit.Test;
import static org.junit.Assert.*;

/**
 *
 * @author u19730
 */
public class HIPOSInternationalAssuranceManagerTest {

    public HIPOSInternationalAssuranceManagerTest() {
    }

    @BeforeClass
    public static void setUpClass() throws Exception {
    }

    @AfterClass
    public static void tearDownClass() throws Exception {
    }

    @Test
    public void testGetInternationalAssuranceAmmount() throws Exception {
        System.out.println("START getInternationalAssuranceAmmount");
        String hipoType = "P";
        String hipoGender = "M";
        Integer hipoAge = 24;
        HIPOSInternationalAssuranceManager instance = new HIPOSInternationalAssuranceManager();
        Double result = instance.getInternationalAssuranceAmmount(hipoType, hipoGender, hipoAge);
        System.out.println("END getInternationalAssuranceAmmount");
    }

}