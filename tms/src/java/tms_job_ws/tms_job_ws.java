/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package tms_job_ws;

import java.util.ArrayList;
import java.util.List;
import javax.jws.WebMethod;
import javax.jws.WebParam;
import javax.jws.WebService;
import pk_managers_job.ManagerJob;
import pk_pojos.TmsJobGeneralInfos;
import pk_pojos.TmsProfileAccess;
import pk_pojos.TmsSkills;
import pk_vo.JobShortVO;
import pk_vo.ProfileAccessVo;
import pk_vo.SkillPAResultVo;
import pk_vo.SkillPAVo;
import pk_vo.SkillVo;

/**
 * @author u19730
 */
@WebService()
public class tms_job_ws {

    @WebMethod(operationName = "setJobGeneralInfo")
    public TmsJobGeneralInfos setJobGeneralInfo(@WebParam(name = "jobObject") TmsJobGeneralInfos jobObject) {
        ManagerJob mj = new ManagerJob();
        return mj.setJobGeneralInfo(jobObject);
    }

    @WebMethod(operationName = "getJobGeneralInfo")
    public TmsJobGeneralInfos getJobGeneralInfo(@WebParam(name = "jobId") Integer jobId) {
        ManagerJob mj = new ManagerJob();
        return mj.getJobGeneralInfo(jobId);
    }

    @WebMethod(operationName = "getJobGeneralInfos")
    public List<TmsJobGeneralInfos> getJobGeneralInfos() {
        ManagerJob mj = new ManagerJob();
        return mj.getJobGeneralInfos();
    }

    @WebMethod(operationName = "setJobGeneralInfoLeadershipStyle")
    public String setJobGeneralInfoLeadershipStyle(@WebParam(name = "jobId") Integer jobId, @WebParam(name = "leadershipStyle") String leadershipStyle) {
        ManagerJob mj = new ManagerJob();
        return mj.setJobGeneralInfoLeadershipStyle(jobId, leadershipStyle);
    }

    @WebMethod(operationName = "getJobGeneralInfoLeadershipStyle")
    public String getJobGeneralInfoLeadershipStyle(@WebParam(name = "jobId") Integer jobId) {
        ManagerJob mj = new ManagerJob();
        return mj.getJobGeneralInfoLeadershipStyle(jobId);
    }

    @WebMethod(operationName = "getJobGeneralInfosShort")
    public List<JobShortVO> getJobGeneralInfosShort() {
        ManagerJob mj = new ManagerJob();
        return mj.getJobGeneralInfosShort();
    }

    /**
     * FROM JULIO CUEVAS - START
     */
    @WebMethod(operationName = "listSkills")
    public List<TmsSkills> listSkills() {
        ManagerJob mj = new ManagerJob();
        return mj.listSkills();
    }

    @WebMethod(operationName = "listSkillsByType")
    public List<TmsSkills> listSkillsByType(@WebParam(name = "type") String type) {
        ManagerJob mj = new ManagerJob();
        return mj.listSkillsByType(type);
    }

    /**
     * Delete Skill
     */
    @WebMethod(operationName = "deleteSkill")
    public Boolean deleteSkill(@WebParam(name = "id") int id) {
        //TODO write your implementation code here:
        ManagerJob mj = new ManagerJob();
        return mj.deleteSkill(id);
    }

    /**
     * Save Skill
     */
    @WebMethod(operationName = "saveSkill")
    public Boolean saveSkill(@WebParam(name = "skill") SkillVo skill) {
        //TODO write your implementation code here:
        ManagerJob mj = new ManagerJob();
        return mj.saveSkill(skill);
    }

    /**
     * List
     */
    @WebMethod(operationName = "listProfileAccess")
    public List<TmsProfileAccess> listProfileAccess() {
        ManagerJob mj = new ManagerJob();
        return mj.listProfileAccess();
    }

    /**
     * Delete
     */
    @WebMethod(operationName = "deleteProfileAccess")
    public Boolean deleteProfileAccess(@WebParam(name = "id") int id) {
        //TODO write your implementation code here:
        ManagerJob mj = new ManagerJob();
        return mj.deleteProfileAccess(id);
    }

    /**
     * Save
     */
    @WebMethod(operationName = "saveProfileAccess")
    public Boolean saveProfileAccess(@WebParam(name = "obj") ProfileAccessVo obj) {
        //TODO write your implementation code here:
        ManagerJob mj = new ManagerJob();
        return mj.saveProfileAccess(obj);
    }

    /**
     * List
     */
    @WebMethod(operationName = "listSkillProfileAccess")
    public List<SkillPAResultVo> listSkillProfileAccess(@WebParam(name = "profileAccess") int profileAccess) {
        List<SkillPAResultVo> li = new ArrayList();
        ManagerJob mj = new ManagerJob();
        if (!mj.listSkillProfileAccess(profileAccess).isEmpty()) {
            li = mj.listSkillProfileAccess(profileAccess);
        }
        return li;
    }

    /**
     * Delete
     */
    @WebMethod(operationName = "deleteSkillProfileAccess")
    public Boolean deleteSkillProfileAccess(@WebParam(name = "id") int id) {
        //TODO write your implementation code here:
        ManagerJob mj = new ManagerJob();
        return mj.deleteSkillProfileAccess(id);
    }

    /**
     * Save
     */
    @WebMethod(operationName = "saveSkillProfileAccess")
    public Boolean saveSkillProfileAccess(@WebParam(name = "obj") SkillPAVo obj) {
        //TODO write your implementation code here:
        ManagerJob mj = new ManagerJob();
        return mj.saveSkillProfileAccess(obj);
    }

    @WebMethod(operationName = "getJobLeadershiStyle")
    public String getJobLeadershiStyle(@WebParam(name = "jobId") Integer jobId) {
        ManagerJob mj = new ManagerJob();
        return mj.getJobLeadershiStyle(jobId);
    }
    /**
     * FROM JULIO CUEVAS - END
     */
}
