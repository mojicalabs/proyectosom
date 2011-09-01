/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package tms_surveys_ws;

import java.util.List;
import javax.jws.WebMethod;
import javax.jws.WebParam;
import javax.jws.WebService;
import pk_managers.ManagerSurveys;
import pk_vo.LeadershipStyleCommentsVO;
import pk_vo.ScoresVO;
import pk_vo.SurveyIssueVO;
import pk_vo.SurveySessionVO;
import pk_vo.SurveyTitleVO;
import pk_vo.SurveyVO;

/**
 *
 * @author u19730
 */
@WebService()
public class tms_surveys_ws {

    @WebMethod(operationName = "getLeadershipIssueComment")
    public LeadershipStyleCommentsVO getLeadershipIssueComment(@WebParam(name = "issId") Integer issId, @WebParam(name = "issMode") String issMode) {
        ManagerSurveys ms = new ManagerSurveys();
        return ms.getLeadershipIssueComment(issId, issMode);
    }

    @WebMethod(operationName = "setSurveyIssue")
    public SurveyIssueVO setSurveyIssue(@WebParam(name = "siVO") SurveyIssueVO siVO) {
        ManagerSurveys ms = new ManagerSurveys();
        return ms.setSurveyIssue(siVO);
    }

    @WebMethod(operationName = "sendSurveyIssue")
    public SurveyIssueVO sendSurveyIssue(@WebParam(name = "siVO") SurveyIssueVO siVO) {
        ManagerSurveys ms = new ManagerSurveys();
        return ms.sendSurveyIssue(siVO);
    }

    @WebMethod(operationName = "saveSurvey")
    public SurveyVO saveSurvey(@WebParam(name = "sVO") SurveyVO sVO) {
        ManagerSurveys ms = new ManagerSurveys();
        return ms.saveSurvey(sVO);
    }

    @WebMethod(operationName = "modelateSurvey")
    public SurveyVO modelateSurvey(@WebParam(name = "sVO") SurveyVO sVO) {
        ManagerSurveys ms = new ManagerSurveys();
        return ms.modelateSurvey(sVO);
    }

    @WebMethod(operationName = "setSurveyIssueAuto")
    public SurveyIssueVO setSurveyIssueAuto(@WebParam(name = "userId") String userId) {
        ManagerSurveys ms = new ManagerSurveys();
        return ms.setSurveyIssueAuto(userId);
    }

    @WebMethod(operationName = "setSurveyScore")
    public List<ScoresVO> setSurveyScore(@WebParam(name = "sVO") List<ScoresVO> sVO) {
        ManagerSurveys ms = new ManagerSurveys();
        return ms.setSurveyScore(sVO);
    }

    @WebMethod(operationName = "getSurveyIssue")
    public SurveyIssueVO getSurveyIssue(@WebParam(name = "siId") Integer siId) {
        ManagerSurveys ms = new ManagerSurveys();
        return ms.getSurveyIssue(siId);
    }

    @WebMethod(operationName = "getSurveyIssues")
    public List<SurveyIssueVO> getSurveyIssues() {
        ManagerSurveys ms = new ManagerSurveys();
        return ms.getSurveyIssues();
    }

    @WebMethod(operationName = "getSurveys")
    public List<SurveyVO> getSurveys() {
        ManagerSurveys ms = new ManagerSurveys();
        return ms.getSurveys();
    }

    @WebMethod(operationName = "getSurveyTitles")
    public List<SurveyTitleVO> getSurveyTitles() {
        ManagerSurveys ms = new ManagerSurveys();
        return ms.getSurveyTitles();
    }

    @WebMethod(operationName = "createSurvey")
    public SurveyVO createSurvey() {
        ManagerSurveys ms = new ManagerSurveys();
        return ms.createSurvey();
    }

    @WebMethod(operationName = "deleteSurvey")
    public int deleteSurvey(@WebParam(name = "sId") Integer sId) {
        ManagerSurveys ms = new ManagerSurveys();
        return ms.deleteSurvey(sId);
    }

    @WebMethod(operationName = "deleteIssue")
    public int deleteIssue(@WebParam(name = "issueId") Integer issueId) {
        ManagerSurveys ms = new ManagerSurveys();
        return ms.deleteIssue(issueId);
    }

    @WebMethod(operationName = "getSurveyIssuesByCreator")
    public List<SurveyIssueVO> getSurveyIssuesByCreator(@WebParam(name = "userCreator") String userCreator) {
        ManagerSurveys ms = new ManagerSurveys();
        return ms.getSurveyIssuesByCreator(userCreator);
    }

    @WebMethod(operationName = "getSurveySubjectSurveyees")
    public SurveySessionVO getSurveySubjectSurveyees(@WebParam(name = "userLogon") String userLogon) {
        ManagerSurveys ms = new ManagerSurveys();
        return ms.getSurveySubjectSurveyees(userLogon);
    }

    @WebMethod(operationName = "getSurveySubjectSurveyeesAuto")
    public SurveySessionVO getSurveySubjectSurveyeesAuto(@WebParam(name = "userLogon") String userLogon) {
        ManagerSurveys ms = new ManagerSurveys();
        return ms.getSurveySubjectSurveyeesAuto(userLogon);
    }

    @WebMethod(operationName = "getSurveyIssueByUserId")
    public SurveyIssueVO getSurveyIssueByUserId(@WebParam(name = "userId") String userId) {
        ManagerSurveys ms = new ManagerSurveys();
        return ms.getSurveyIssueByUserId(userId);
    }
}
