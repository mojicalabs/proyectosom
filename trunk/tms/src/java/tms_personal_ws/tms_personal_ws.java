/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package tms_personal_ws;

import java.util.List;
import javax.jws.Oneway;
import javax.jws.WebMethod;
import javax.jws.WebParam;
import javax.jws.WebService;
import pk_managers.ManagerCarreer;
import pk_managers.ManagerEducation;
import pk_managers.ManagerExperience;
import pk_managers.ManagerPersonal;
import pk_managers.ManagerRole;
import pk_pojos.TmsProfilesSkills;
import pk_vo.EducationVO;
import pk_vo.ExperienceVO;
import pk_vo.ExperiencesVO;
import pk_vo.HIPOEducationsVO;
import pk_vo.ParamExpVO;
import pk_vo.PersonalProfileCarreersVO;
import pk_vo.PersonalProfileEmployabilityVO;
import pk_vo.PersonalProfileRolesVO;
import pk_vo.PersonalProfileSkillsVO;
import pk_vo.RelationRolVO;
import pk_vo.ResultVO;

/**
 *
 * @author u19730
 */
@WebService()
public class tms_personal_ws {

    @WebMethod(operationName = "getProfileSkill")
    public TmsProfilesSkills getProfileSkill(@WebParam(name = "psId") Integer psId) {
        ManagerPersonal mp = new ManagerPersonal();
        return mp.getProfileSkill(psId);
    }

    @WebMethod(operationName = "getProfileSkills")
    public List<TmsProfilesSkills> getProfileSkills(@WebParam(name = "skillType") String skillType) {
        ManagerPersonal mp = new ManagerPersonal();
        return mp.getProfileSkills(skillType);
    }

    @WebMethod(operationName = "setProfileSkill")
    @Oneway
    public void setProfileSkill(@WebParam(name = "psObj") PersonalProfileSkillsVO psObj) {
        ManagerPersonal mp = new ManagerPersonal();
        mp.setProfileSkill(psObj);
    }

    @WebMethod(operationName = "delProfileSkill")
    public Integer delProfileSkill(@WebParam(name = "psId") Integer psId) {
        ManagerPersonal mp = new ManagerPersonal();
        Integer result = null;
        try {
            result = mp.delProfileSkill(psId);
        } catch (Exception ex) {
        } finally {
            return result;
        }
    }

    @WebMethod(operationName = "getProfileEmployability")
    public List<PersonalProfileEmployabilityVO> getProfileEmployability(@WebParam(name = "userId") String userId) {
        ManagerPersonal mp = new ManagerPersonal();
        List<PersonalProfileEmployabilityVO> result = null;
        try {
            result = mp.getProfileEmployability(userId);
        } catch (Exception ex) {
        } finally {
            return result;
        }
    }

    @WebMethod(operationName = "getChartDataRoles")
    public List<PersonalProfileRolesVO> getChartDataRoles(@WebParam(name = "userId") String userId) {
        ManagerRole mr = new ManagerRole();
        List<PersonalProfileRolesVO> result = null;
        try {
            result = mr.getChartDataRoles(userId);
        } catch (Exception ex) {
        } finally {
            return result;
        }
    }

    @WebMethod(operationName = "getChartDataCarreers")
    public List<PersonalProfileCarreersVO> getChartDataCarreers(@WebParam(name = "userId") String userId) {
        ManagerCarreer mc = new ManagerCarreer();
        List<PersonalProfileCarreersVO> result = null;
        try {
            result = mc.getChartDataCarreers(userId);
        } catch (Exception ex) {
        } finally {
            return result;
        }
    }

    @WebMethod(operationName = "getProfileExperiences")
    public List<ExperiencesVO> getProfileExperiences(@WebParam(name = "userId") String userId) throws Exception {
        ManagerExperience ms = new ManagerExperience();
        List<ExperiencesVO> result = null;
        try {
            result = ms.getProfileExperiences(userId);
        } catch (Exception ex) {
            return result;
        } finally {
            return result;
        }
    }

    @WebMethod(operationName = "getProfileEducationsByUserId")
    public List<EducationVO> getProfileEducationsByUserId(@WebParam(name = "userId") String userId) throws Exception {
        ManagerEducation me = new ManagerEducation();
        List<EducationVO> result = null;
        try {
            result = me.getProfileEducationsByUserId(userId);
        } catch (Exception ex) {
            return result;
        } finally {
            return result;
        }
    }

    @WebMethod(operationName = "getProfileEducationsReport")
    public HIPOEducationsVO getProfileEducationsReport(@WebParam(name = "userId") String userId) throws Exception {
        ManagerEducation me = new ManagerEducation();
        HIPOEducationsVO result = null;
        try {
            result = me.getProfileEducationsReport(userId);
        } catch (Exception ex) {
            return result;
        } finally {
            return result;
        }
    }

    @WebMethod(operationName = "saveProfileExperience")
    public ResultVO saveProfileExperience(@WebParam(name = "expVO") ExperienceVO expVO) throws Exception {
        ManagerExperience ms = new ManagerExperience();
        ResultVO result = null;
        try {
            result = ms.saveProfileExperience(expVO);
        } catch (Exception ex) {
            return result;
        } finally {
            return result;
        }
    }

    @WebMethod(operationName = "deleteProfileExperience")
    public int deleteProfileExperience(@WebParam(name = "expId") Integer expId) {
        ManagerExperience me = new ManagerExperience();
        int result = 0;
        try {
            result = me.deleteProfileExperience(expId);
        } catch (Exception ex) {
            return result;
        } finally {
            return result;
        }
    }

    @WebMethod(operationName = "saveProfileRole")
    public ResultVO saveProfileRole(
            @WebParam(name = "rrVO") List<RelationRolVO> rrVO) throws Exception {
        ManagerRole mr = new ManagerRole();
        ResultVO result = null;
        try {
            result = mr.saveProfileRole(rrVO);
        } catch (Exception ex) {
            return result;
        } finally {
            return result;
        }
    }

    @WebMethod(operationName = "deleteProfileRole")
    public int deleteProfileRole(@WebParam(name = "params") List<ParamExpVO> params) {
        ManagerRole mr = new ManagerRole();
        int result = 0;
        try {
            result = mr.deleteProfileRole(params);
        } catch (Exception ex) {
            return result;
        } finally {
            return result;
        }
    }
}
