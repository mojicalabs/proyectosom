/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.hipos.managers;

import com.bpd.hipos.vos.TipoCategoriaVO;
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
public class HIPOSTiposCategoriasManagerTest {

    public HIPOSTiposCategoriasManagerTest() {
    }

    @BeforeClass
    public static void setUpClass() throws Exception {
    }

    @AfterClass
    public static void tearDownClass() throws Exception {
    }

//    @Test
//    public void testGetTiposCategorias() throws Exception {
//        System.out.println("getTiposCategorias");
//        String breAct = "";
//        String tipCat = "";
//        HIPOSTiposCategoriasManager instance = new HIPOSTiposCategoriasManager();
//        List expResult = null;
//        List result = instance.getTiposCategorias(breAct, tipCat);
//        assertEquals(expResult, result);
//        fail("The test case is a prototype.");
//    }
//    @Test
//    public void testSetTipoCategoria() throws Exception {
//        System.out.println("setTipoCategoria");
//        TipoCategoriaVO tcVO = null;
//        HIPOSTiposCategoriasManager instance = new HIPOSTiposCategoriasManager();
//        Boolean expResult = null;
//        Boolean result = instance.setTipoCategoria(tcVO);
//        assertEquals(expResult, result);
//        fail("The test case is a prototype.");
//    }
    @Test
    public void testDelTipoCategoria() throws Exception {
        System.out.println("start delTipoCategoria");
        Integer entId = 4;
        HIPOSTiposCategoriasManager instance = new HIPOSTiposCategoriasManager();
        Boolean result = instance.delTipoCategoria(entId);
        System.out.println("end delTipoCategoria");
    }
//    @Test
//    public void testNow() {
//        System.out.println("now");
//        HIPOSTiposCategoriasManager instance = new HIPOSTiposCategoriasManager();
//        Date expResult = null;
//        Date result = instance.now();
//        assertEquals(expResult, result);
//        fail("The test case is a prototype.");
//    }
}
