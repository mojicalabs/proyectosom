/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.employee.managers;

import com.bpd.employee.vos.ResultClassEmployeeVO;
import org.junit.AfterClass;
import org.junit.BeforeClass;
import org.junit.Test;

/**
 *
 * @author Omar Mojica
 */
public class EmployeesModelManagerTest {
    
    public EmployeesModelManagerTest() {
    }

    @BeforeClass
    public static void setUpClass() throws Exception {
    }

    @AfterClass
    public static void tearDownClass() throws Exception {
    }

//    @Test
//    public void testGetEmployeePositions() {
//        System.out.println("getEmployeePositions");
//        String userId = "";
//        EmployeesModelManager instance = new EmployeesModelManager();
//        ResultClassVO expResult = null;
//        ResultClassVO result = instance.getEmployeePositions(userId);
//        assertEquals(expResult, result);
//        fail("The test case is a prototype.");
//    }

    @Test
    public void testGetEmployee() {
        System.out.println("start getEmployee");
        String userId = "u19730";
        EmployeesModelManager instance = new EmployeesModelManager();
        ResultClassEmployeeVO result = instance.getEmployee(userId);
        System.out.println("end getEmployee");
    }

//    @Test
//    public void testSendMail() throws Exception {
//        System.out.println("sendMail");
//        EmailVO eVO = null;
//        EmployeesModelManager instance = new EmployeesModelManager();
//        instance.sendMail(eVO);
//        fail("The test case is a prototype.");
//    }
//
//    @Test
//    public void testFormatDate() {
//        System.out.println("formatDate");
//        Date data = null;
//        EmployeesModelManager instance = new EmployeesModelManager();
//        String expResult = "";
//        String result = instance.formatDate(data);
//        assertEquals(expResult, result);
//        fail("The test case is a prototype.");
//    }
}
