/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.employee.ws;

import com.bpd.employee.vos.ResultClassEmployeeVO;
import com.bpd.employee.vos.ResultClassVO;
import javax.ejb.embeddable.EJBContainer;
import org.junit.AfterClass;
import org.junit.BeforeClass;
import org.junit.Test;
import static org.junit.Assert.*;

/**
 *
 * @author Omar Mojica
 */
public class EmployeeWSTest {
    
    public EmployeeWSTest() {
    }

    @BeforeClass
    public static void setUpClass() throws Exception {
    }

    @AfterClass
    public static void tearDownClass() throws Exception {
    }

//    @Test
//    public void testGetEmployeePositions() throws Exception {
//        System.out.println("getEmployeePositions");
//        String userId = "";
//        EJBContainer container = javax.ejb.embeddable.EJBContainer.createEJBContainer();
//        EmployeeWS instance = (EmployeeWS)container.getContext().lookup("java:global/classes/EmployeeWS");
//        ResultClassVO expResult = null;
//        ResultClassVO result = instance.getEmployeePositions(userId);
//        assertEquals(expResult, result);
//        container.close();
//        fail("The test case is a prototype.");
//    }

    @Test
    public void testGetEmployee() throws Exception {
        System.out.println("getEmployee");
        String userId = "u19730";
        EmployeeWS instance = new EmployeeWS();
        ResultClassEmployeeVO result = instance.getEmployee(userId);
        System.out.println("getEmployee");
    }
}
