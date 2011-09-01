/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.hipos.managers;

import com.bpd.hipos.pojos.HiposEmpleados;
import com.bpd.hipos.vos.EmpleadoVO;
import com.bpd.hipos.vos.SettingVO;
import java.util.Date;
import java.util.List;
import org.junit.AfterClass;
import org.junit.BeforeClass;
import org.junit.Test;
import static org.junit.Assert.*;

/**
 *
 * @author Omar Mojica
 */
public class HIPOSEmpleadosManagerTest {

    public HIPOSEmpleadosManagerTest() {
    }

    @BeforeClass
    public static void setUpClass() throws Exception {
    }

    @AfterClass
    public static void tearDownClass() throws Exception {
    }

//    @Test
//    public void testGetSettings() throws Exception {
//        System.out.println("getSettings");
//        String codigoEmpleado = "";
//        String genero = "";
//        String fechaNacimiento = "";
//        HIPOSEmpleadosManager instance = new HIPOSEmpleadosManager();
//        SettingVO expResult = null;
//        SettingVO result = instance.getSettings(codigoEmpleado, genero, fechaNacimiento);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//    @Test
//    public void testGetEmpleado() throws Exception {
//        System.out.println("getEmpleado");
//        String codigoEmpleado = "";
//        HIPOSEmpleadosManager instance = new HIPOSEmpleadosManager();
//        EmpleadoVO expResult = null;
//        EmpleadoVO result = instance.getEmpleado(codigoEmpleado);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    @Test
//    public void testGetEmpleadoByCodigoEmpleado() throws Exception {
//        System.out.println("getEmpleadoByCodigoEmpleado");
//        String codigoEmpleado = "";
//        HIPOSEmpleadosManager instance = new HIPOSEmpleadosManager();
//        HiposEmpleados expResult = null;
//        HiposEmpleados result = instance.getEmpleadoByCodigoEmpleado(codigoEmpleado);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    @Test
//    public void testGetEmpleados() throws Exception {
//        System.out.println("getEmpleados");
//        HIPOSEmpleadosManager instance = new HIPOSEmpleadosManager();
//        List expResult = null;
//        List result = instance.getEmpleados();
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
    @Test
    public void testGetEmpleadosByName() throws Exception {
        System.out.println("start getEmpleadosByName");
        String empName = "MO";
        String empType = "AP,AE";
        HIPOSEmpleadosManager instance = new HIPOSEmpleadosManager();
        List result = instance.getEmpleadosByName(empName, empType);
        System.out.println("end getEmpleadosByName");
    }
//    @Test
//    public void testSetEmpleado() throws Exception {
//        System.out.println("setEmpleado");
//        EmpleadoVO eVO = null;
//        HIPOSEmpleadosManager instance = new HIPOSEmpleadosManager();
//        Boolean expResult = null;
//        Boolean result = instance.setEmpleado(eVO);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    @Test
//    public void testDelEmpleado() throws Exception {
//        System.out.println("delEmpleado");
//        String codigoEmpleado = "";
//        HIPOSEmpleadosManager instance = new HIPOSEmpleadosManager();
//        Boolean expResult = null;
//        Boolean result = instance.delEmpleado(codigoEmpleado);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    @Test
//    public void testGetDependientes() {
//        System.out.println("getDependientes");
//        String codigoEmpleado = "";
//        HIPOSEmpleadosManager instance = new HIPOSEmpleadosManager();
//        List expResult = null;
//        List result = instance.getDependientes(codigoEmpleado);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    @Test
//    public void testDelDependiente() throws Exception {
//        System.out.println("delDependiente");
//        List setId = null;
//        HIPOSEmpleadosManager instance = new HIPOSEmpleadosManager();
//        int expResult = 0;
//        int result = instance.delDependiente(setId);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    @Test
//    public void testNow() {
//        System.out.println("now");
//        HIPOSEmpleadosManager instance = new HIPOSEmpleadosManager();
//        Date expResult = null;
//        Date result = instance.now();
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
}
