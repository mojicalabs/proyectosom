/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.hipos.managers;

import java.util.List;
import org.junit.AfterClass;
import org.junit.BeforeClass;
import org.junit.Test;
import static org.junit.Assert.*;

/**
 *
 * @author Omar Mojica
 */
public class HIPOSAsignacionesManagerTest {

    public HIPOSAsignacionesManagerTest() {
    }

    @BeforeClass
    public static void setUpClass() throws Exception {
    }

    @AfterClass
    public static void tearDownClass() throws Exception {
    }

    @Test
    public void testGetAsignaciones() throws Exception {
        System.out.println("start getAsignaciones");
        String userId = "U16208";
        HIPOSAsignacionesManager instance = new HIPOSAsignacionesManager();
        List result = instance.getAsignaciones(userId);
        System.out.println("end getAsignaciones");

    }
}
