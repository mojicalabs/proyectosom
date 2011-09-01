/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.hipos.managers;

import java.util.Date;
import java.util.List;
import org.junit.AfterClass;
import org.junit.BeforeClass;
import org.junit.Test;
import static org.junit.Assert.*;

/**
 *
 * @author u19730
 */
public class HIPOSEntidadesManagerTest {

    public HIPOSEntidadesManagerTest() {
    }

    @BeforeClass
    public static void setUpClass() throws Exception {
    }

    @AfterClass
    public static void tearDownClass() throws Exception {
    }

    @Test
    public void testGetEntities() throws Exception {
        System.out.println("START getEntities");
        String entType = "brecha";
        HIPOSEntidadesManager instance = new HIPOSEntidadesManager();
        List expResult = null;
        List result = instance.getEntities(entType);
        System.out.println("END getEntities");
    }
}
