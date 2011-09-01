/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.hipos.managers;

import com.bpd.hipos.vos.EmpleadoVO;
import java.util.List;
import org.junit.AfterClass;
import org.junit.BeforeClass;
import org.junit.Test;

/**
 *
 * @author u19730
 */
public class HIPOSBeneficiariosManagerTest {

    public HIPOSBeneficiariosManagerTest() {
    }

    @BeforeClass
    public static void setUpClass() throws Exception {
    }

    @AfterClass
    public static void tearDownClass() throws Exception {
    }

//    @Test
//    public void testSetBeneficiario() throws Exception {
//        System.out.println("START setBeneficiario");
//
//        BeneficiarioVO iaaVO = new BeneficiarioVO();
//
//        ItemVO iVO = new ItemVO();
//
//        //iaaVO.id = 0;
//        iaaVO.codigoEmpleado = "U19730";
//        iaaVO.sexoEmpleado = "M";
//
//        iVO.percent = 10D;
//        iVO.ammount = 20000D;
//        iaaVO.bonificacion = iVO;
//        iaaVO.becasHijos = iVO;
//        iaaVO.planRetiro = iVO;
//        iaaVO.seguroMedicoInternacional = iVO;
//
//        List<DependienteVO> ldVO = new ArrayList();
//
//        DependienteVO dVO1 = new DependienteVO();
//        dVO1.parentesco = "Conyuge";
//        dVO1.edad = 30;
//        dVO1.percent = 10D;
//        dVO1.ammount = 20D;
//        ldVO.add(dVO1);
//
//        DependienteVO dVO2 = new DependienteVO();
//        dVO2.parentesco = "Hijo";
//        dVO2.edad = 41;
//        dVO2.percent = 11D;
//        dVO2.ammount = 22D;
//        ldVO.add(dVO2);
//
//        DependienteVO dVO3 = new DependienteVO();
//        dVO3.parentesco = "Hija";
//        dVO3.edad = 52;
//        dVO3.percent = 12D;
//        dVO3.ammount = 22D;
//        ldVO.add(dVO3);
//
//        iaaVO.dependientes = ldVO;
//
//        HIPOSBeneficiariosManager instance = new HIPOSBeneficiariosManager();
//        BeneficiarioVO result = instance.setBeneficiario(iaaVO);
//        System.out.println("END setBeneficiario");
//    }
//
//    public Date now() {
//        Calendar cal = Calendar.getInstance();
//        return cal.getTime();
//    }
//
//    @Test
//    public void testGetBeneficiario() {
//        System.out.println("START getBeneficiario");
//        String bId = "7";
//        HIPOSBeneficiariosManager instance = new HIPOSBeneficiariosManager();
//        BeneficiarioVO result = instance.getBeneficiario(bId);
//        System.out.println("END getBeneficiario");
//    }
//
//    @Test
//    public void testGetDependientes() {
//        System.out.println("START getDependientes");
//        String codigoEmpleado = "U19730";
//        HIPOSBeneficiariosManager instance = new HIPOSBeneficiariosManager();
//        List result = instance.getDependientes(codigoEmpleado);
//        System.out.println("END getDependientes");
//    }
//
//    @Test
//    public void testGetSettings() throws Exception {
//        System.out.println("START getSettings");
//        String codigoEmpleado = "U15377";
//        String genero = "M";
//        String fechaNacimiento = "1974-06-24";
//        HIPOSBeneficiariosManager instance = new HIPOSBeneficiariosManager();
//        SettingVO result = instance.getSettings(codigoEmpleado, genero, fechaNacimiento);
//        System.out.println("END getSettings");
//    }
//    
//    @Test
//    public void testGetEmpleado() throws Exception {
//        System.out.println("START getEmpleado");
//        String codigoEmpleado = "U19730";
//        HIPOSBeneficiariosManager instance = new HIPOSBeneficiariosManager();
//        EmpleadoVO result = instance.getEmpleado(codigoEmpleado);
//        System.out.println("END getEmpleado");
//    }
//    
    @Test
    public void testGetEmpleados() throws Exception {
        System.out.println("START getEmpleados");
        HIPOSBeneficiariosManager instance = new HIPOSBeneficiariosManager();
        List<EmpleadoVO> result = instance.getEmpleados();
        System.out.println("END getEmpleado");
    }
//
//    @Test
//    public void testGetBeneficiario() {
//        System.out.println("getBeneficiario");
//        String codigoEmpleado = "";
//        HIPOSBeneficiariosManager instance = new HIPOSBeneficiariosManager();
//        BeneficiarioVO expResult = null;
//        BeneficiarioVO result = instance.getBeneficiario(codigoEmpleado);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    @Test
//    public void testGetSettings() throws Exception {
//        System.out.println("getSettings");
//        String codigoEmpleado = "";
//        String genero = "";
//        String fechaNacimiento = "";
//        HIPOSBeneficiariosManager instance = new HIPOSBeneficiariosManager();
//        SettingVO expResult = null;
//        SettingVO result = instance.getSettings(codigoEmpleado, genero, fechaNacimiento);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    @Test
//    public void testGetEmpleado() throws Exception {
//        System.out.println("getEmpleado");
//        String codigoEmpleado = "";
//        HIPOSBeneficiariosManager instance = new HIPOSBeneficiariosManager();
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
//        HIPOSBeneficiariosManager instance = new HIPOSBeneficiariosManager();
//        HiposEmpleados expResult = null;
//        HiposEmpleados result = instance.getEmpleadoByCodigoEmpleado(codigoEmpleado);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//    @Test
//    public void testGetEmpleadosByName() throws Exception {
//        System.out.println("getEmpleadosByName");
//        String empName = "MO";
//        String empType = "AP,AE";
//        HIPOSBeneficiariosManager instance = new HIPOSBeneficiariosManager();
//        List result = instance.getEmpleadosByName(empName, empType);
//        System.out.println("getEmpleadosByName");
//
//    }
//    @Test
//    public void testSetEmpleado() throws Exception {
//        System.out.println("setEmpleado");
//        EmpleadoVO eVO = null;
//        HIPOSBeneficiariosManager instance = new HIPOSBeneficiariosManager();
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
//        HIPOSBeneficiariosManager instance = new HIPOSBeneficiariosManager();
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
//        HIPOSBeneficiariosManager instance = new HIPOSBeneficiariosManager();
//        List expResult = null;
//        List result = instance.getDependientes(codigoEmpleado);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    @Test
//    public void testSetBeneficiario() throws Exception {
//        System.out.println("setBeneficiario");
//        BeneficiarioVO iaaVO = null;
//        HIPOSBeneficiariosManager instance = new HIPOSBeneficiariosManager();
//        BeneficiarioVO expResult = null;
//        BeneficiarioVO result = instance.setBeneficiario(iaaVO);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    @Test
//    public void testDelDependiente() throws Exception {
//        System.out.println("delDependiente");
//        List setId = null;
//        HIPOSBeneficiariosManager instance = new HIPOSBeneficiariosManager();
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
//        HIPOSBeneficiariosManager instance = new HIPOSBeneficiariosManager();
//        Date expResult = null;
//        Date result = instance.now();
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//    @Test
//    public void testSetBeneficiario() throws Exception {
//        System.out.println("START setEmpleado");
//
//        EmpleadoVO iaaVO = new EmpleadoVO();
//
//        //iaaVO.id = 0;
//        iaaVO.codigoEmpleado = "U19730";
//        iaaVO.cargo = "AAA";
//        iaaVO.dependencia = "bbb";
//        iaaVO.empresa = "ccc";
//        iaaVO.estado = "A";
//        iaaVO.minAmountPlanRetiro = 20D;
//        iaaVO.tipoHipo = "ddd";
//        iaaVO.totalAmount = 11D;
//
//        HIPOSBeneficiariosManager instance = new HIPOSBeneficiariosManager();
//        instance.setEmpleado(iaaVO);
//        System.out.println("END setEmpleado");
//    }    
//    @Test
//    public void testGetEmpleado() throws Exception {
//        System.out.println("START getEmpleado");
//        String codigoEmpleado = "U19730";
//        SOAPResponse instance = new SOAPResponse();
//        EmpleadoVO result = instance.SOAPResponse(codigoEmpleado);
//        System.out.println("END getEmpleado");
//    }
//    @Test
//    public void testDelDependiente() throws Exception {
//        System.out.println("delDependiente");
//        List setId = null;
//        HIPOSBeneficiariosManager instance = new HIPOSBeneficiariosManager();
//        int expResult = 0;
//        int result = instance.delDependiente(setId);
//    }
//
//    @Test
//    public void testNow() {
//        System.out.println("now");
//        HIPOSBeneficiariosManager instance = new HIPOSBeneficiariosManager();
//        Date expResult = null;
//        Date result = instance.now();
//    }
}
