/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package pk_managers_employee;

import java.util.List;
import org.junit.AfterClass;
import org.junit.BeforeClass;
import org.junit.Test;

/**
 *
 * @author u19730
 */
public class ManagerEmployeeTest {

    public ManagerEmployeeTest() {
    }

    @BeforeClass
    public static void setUpClass() throws Exception {
    }

    @AfterClass
    public static void tearDownClass() throws Exception {
    }

//    @Test
//    public void testGetCollaborators() {
//        System.out.println("getCollaborators");
//        String mgr_emp_id_str = "";
//        ManagerEmployee instance = new ManagerEmployee();
//        List expResult = null;
//        List result = instance.getCollaborators(mgr_emp_id_str);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    @Test
//    public void testGetEvaluators() {
//        System.out.println("getEvaluators");
//        String userIdStr = "";
//        ManagerEmployee instance = new ManagerEmployee();
//        List expResult = null;
//        List result = instance.getEvaluators(userIdStr);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//    @Test
//    public void testGetEvaluatorsNotSelected() {
//        System.out.println("getEvaluatorsNotSelected");
//        String userIdStr = "U15377";
//        ManagerEmployee instance = new ManagerEmployee();
//        List expResult = null;
//        List result = instance.getEvaluatorsNotSelected(userIdStr, 84);
//        System.out.println("END getEvaluatorsNotSelected");
//    }

    @Test
    public void testGetColeagues() {
        System.out.println("getColeagues");
        String userIdStr = "U15377";
        ManagerEmployee instance = new ManagerEmployee();
        List expResult = null;
        List result = instance.getColeagues(userIdStr);
        System.out.println("END getColeagues");
    }
//    @Test
//    public void testGetEvaluatorsSelected() {
//        System.out.println("getEvaluatorsSelected");
//        String userIdStr = "";
//        ManagerEmployee instance = new ManagerEmployee();
//        List expResult = null;
//        List result = instance.getEvaluatorsSelected(userIdStr);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    @Test
//    public void testPassDataEmpToVO() {
//        System.out.println("passDataEmpToVO");
//        TmsSurveyManagerSessions data = null;
//        VwSsMaEmpleadosActivos dataEmp = null;
//        ManagerEmployee instance = new ManagerEmployee();
//        EmployeeVO expResult = null;
//        EmployeeVO result = instance.passDataEmpToVO(data, dataEmp);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    @Test
//    public void testGetEmployeeData() {
//        System.out.println("getEmployeeData");
//        String userIdStr = "";
//        ManagerEmployee instance = new ManagerEmployee();
//        VwSsMaEmpleadosActivos expResult = null;
//        VwSsMaEmpleadosActivos result = instance.getEmployeeData(userIdStr);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    @Test
//    public void testGetEmployee() {
//        System.out.println("getEmployee");
//        String userIdStr = "";
//        ManagerEmployee instance = new ManagerEmployee();
//        EmployeeVO expResult = null;
//        EmployeeVO result = instance.getEmployee(userIdStr);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    @Test
//    public void testGetEmployeesAlpha() {
//        System.out.println("getEmployeesAlpha");
//        String userName = "";
//        ManagerEmployee instance = new ManagerEmployee();
//        List expResult = null;
//        List result = instance.getEmployeesAlpha(userName);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    @Test
//    public void testGetManager() {
//        System.out.println("getManager");
//        String userIdStr = "";
//        ManagerEmployee instance = new ManagerEmployee();
//        EmployeeVO expResult = null;
//        EmployeeVO result = instance.getManager(userIdStr);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    @Test
//    public void testGetObject() {
//        System.out.println("getObject");
//        VwSsMaEmpleadosActivos object = null;
//        Boolean isManager = null;
//        ManagerEmployee instance = new ManagerEmployee();
//        EmployeeVO expResult = null;
//        EmployeeVO result = instance.getObject(object, isManager);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
}
