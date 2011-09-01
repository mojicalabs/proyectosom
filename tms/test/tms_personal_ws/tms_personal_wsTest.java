/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package tms_personal_ws;

import java.util.List;
import org.junit.AfterClass;
import org.junit.BeforeClass;
import org.junit.Test;
import static org.junit.Assert.*;
import pk_pojos.TmsProfilesSkills;
import pk_vo.ExperienceVO;
import pk_vo.HIPOEducationsVO;
import pk_vo.ParamExpVO;
import pk_vo.PersonalProfileSkillsVO;
import pk_vo.RelationRolVO;
import pk_vo.ResultVO;

/**
 *
 * @author Omar Mojica
 */
public class tms_personal_wsTest {

    public tms_personal_wsTest() {
    }

    @BeforeClass
    public static void setUpClass() throws Exception {
    }

    @AfterClass
    public static void tearDownClass() throws Exception {
    }

//    @Test
//    public void testGetProfileSkill() {
//        System.out.println("getProfileSkill");
//        Integer psId = null;
//        tms_personal_ws instance = new tms_personal_ws();
//        TmsProfilesSkills expResult = null;
//        TmsProfilesSkills result = instance.getProfileSkill(psId);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    @Test
//    public void testGetProfileSkills() {
//        System.out.println("getProfileSkills");
//        String skillType = "";
//        tms_personal_ws instance = new tms_personal_ws();
//        List expResult = null;
//        List result = instance.getProfileSkills(skillType);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    @Test
//    public void testSetProfileSkill() {
//        System.out.println("setProfileSkill");
//        PersonalProfileSkillsVO psObj = null;
//        tms_personal_ws instance = new tms_personal_ws();
//        instance.setProfileSkill(psObj);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    @Test
//    public void testDelProfileSkill() {
//        System.out.println("delProfileSkill");
//        Integer psId = null;
//        tms_personal_ws instance = new tms_personal_ws();
//        Integer expResult = null;
//        Integer result = instance.delProfileSkill(psId);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//    @Test
//    public void testGetProfileEmployability() {
//        System.out.println("getProfileEmployability");
//        String userId = "u10936";
//        tms_personal_ws instance = new tms_personal_ws();
//        List result = instance.getProfileEmployability(userId);
//        System.out.println("getProfileEmployability");
//    }
//    @Test
//    public void testGetChartDataRoles() {
//        System.out.println("getChartDataRoles");
//        String userId = "";
//        tms_personal_ws instance = new tms_personal_ws();
//        List expResult = null;
//        List result = instance.getChartDataRoles(userId);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    @Test
//    public void testGetChartDataCarreers() {
//        System.out.println("getChartDataCarreers");
//        String userId = "";
//        tms_personal_ws instance = new tms_personal_ws();
//        List expResult = null;
//        List result = instance.getChartDataCarreers(userId);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    @Test
//    public void testGetProfileExperiences() throws Exception {
//        System.out.println("getProfileExperiences");
//        String userId = "";
//        tms_personal_ws instance = new tms_personal_ws();
//        List expResult = null;
//        List result = instance.getProfileExperiences(userId);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    @Test
//    public void testGetProfileEducationsByUserId() throws Exception {
//        System.out.println("getProfileEducationsByUserId");
//        String userId = "";
//        tms_personal_ws instance = new tms_personal_ws();
//        List expResult = null;
//        List result = instance.getProfileEducationsByUserId(userId);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    @Test
//    public void testGetProfileEducationsReport() throws Exception {
//        System.out.println("getProfileEducationsReport");
//        String userId = "";
//        tms_personal_ws instance = new tms_personal_ws();
//        HIPOEducationsVO expResult = null;
//        HIPOEducationsVO result = instance.getProfileEducationsReport(userId);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    @Test
//    public void testSaveProfileExperience() throws Exception {
//        System.out.println("saveProfileExperience");
//        ExperienceVO expVO = null;
//        tms_personal_ws instance = new tms_personal_ws();
//        ResultVO expResult = null;
//        ResultVO result = instance.saveProfileExperience(expVO);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    @Test
//    public void testDeleteProfileExperience() {
//        System.out.println("deleteProfileExperience");
//        Integer expId = null;
//        tms_personal_ws instance = new tms_personal_ws();
//        int expResult = 0;
//        int result = instance.deleteProfileExperience(expId);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    @Test
//    public void testSaveProfileRole() throws Exception {
//        System.out.println("saveProfileRole");
//        List<RelationRolVO> rrVO = null;
//        tms_personal_ws instance = new tms_personal_ws();
//        ResultVO expResult = null;
//        ResultVO result = instance.saveProfileRole(rrVO);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    @Test
//    public void testDeleteProfileRole() {
//        System.out.println("deleteProfileRole");
//        List<ParamExpVO> params = null;
//        tms_personal_ws instance = new tms_personal_ws();
//        int expResult = 0;
//        int result = instance.deleteProfileRole(params);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
}
