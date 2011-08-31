/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.employee.beans;

import com.bpd.employee.vos.ResultClassEmployeeVO;
import com.bpd.employee.vos.ResultClassVO;
import org.junit.AfterClass;
import org.junit.BeforeClass;
import org.junit.Test;
import static org.junit.Assert.*;

/**
 *
 * @author Omar Mojica
 */
public class EmployeeManagerTest {

    public EmployeeManagerTest() {
    }

    @BeforeClass
    public static void setUpClass() throws Exception {
    }

    @AfterClass
    public static void tearDownClass() throws Exception {
    }

//    @Test
//    public void testGetEmployeePositions() throws Exception {
//        System.out.println("START getEmployeePositions");
//        String userId = "19730";
//        EmployeeManager instance = new EmployeeManager();
//        ResultClassVO result = instance.getEmployeePositions(userId);
//        System.out.println("END getEmployeePositions");
//    }
    
    @Test
    public void testGetEmployee() throws Exception {
        System.out.println("START getEmployee");
        String userId = "19730";
        EmployeeManager instance = new EmployeeManager();
        ResultClassEmployeeVO result = instance.getEmployee(userId);
        System.out.println("END getEmployee");
    }
}
