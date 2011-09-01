/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package tms_leadershipstyle_ws;

import java.util.List;
import javax.jws.WebMethod;
import javax.jws.WebParam;
import javax.jws.WebService;
import pk_managers.ManagerLeadershipStyle;
import pk_managers.ManagerMIDE;
import pk_managers.ManagerSGD;
import pk_managers.ManagerSurveys;
import pk_vo.LeadershipCompetencySummaryVO;
import pk_vo.LeadershipCompetencyVO;
import pk_vo.LeadershipMIDEVO;
import pk_vo.LeadershipSGDVO;
import pk_vo.LeadershipStyleCommentsVO;
import pk_vo.LeadershipStyleDatesVO;
import pk_vo.LeadershipStyleDecisionVO;
import pk_vo.LeadershipStyleVO;

/**
 * @author U19730
 */
@WebService()
public class tms_leadershipstyle_ws {

    @WebMethod(operationName = "getLeadershipIssues")
    public List<LeadershipStyleDatesVO> getLeadershipIssues(@WebParam(name = "userId") String userId) throws Exception {
        ManagerLeadershipStyle mls = new ManagerLeadershipStyle();
        return mls.getLeadershipIssues(userId);
    }

    @WebMethod(operationName = "getLeadershipIssue")
    public List<LeadershipStyleVO> getLeadershipIssue(@WebParam(name = "issId") Integer issId) throws Exception {
        ManagerLeadershipStyle mls = new ManagerLeadershipStyle();
        return mls.getLeadershipIssue(issId);
    }

    @WebMethod(operationName = "getLeadershipCompetencies")
    public List<LeadershipCompetencyVO> getLeadershipCompetencies(@WebParam(name = "issId") Integer issId) {
        ManagerLeadershipStyle mls = new ManagerLeadershipStyle();
        return mls.getLeadershipCompetencies(issId);
    }

    @WebMethod(operationName = "getLeadershipIssueComment")
    public LeadershipStyleCommentsVO getLeadershipIssueComment(@WebParam(name = "issId") Integer issId, @WebParam(name = "issMode") String issMode) {
        ManagerSurveys ms = new ManagerSurveys();
        return ms.getLeadershipIssueComment(issId, issMode);
    }

    @WebMethod(operationName = "getDataSGD")
    public List<LeadershipSGDVO> getDataSGD(@WebParam(name = "userId") String userId) {
        ManagerSGD msgd = new ManagerSGD();
        return msgd.getDataSGD(userId);
    }

    @WebMethod(operationName = "getDataMIDE")
    public List<LeadershipMIDEVO> getDataMIDE(@WebParam(name = "userId") String userId) {
        ManagerMIDE mmide = new ManagerMIDE();
        return mmide.getDataMIDE(userId);
    }

    @WebMethod(operationName = "getLeadershipCompetenciesSummary")
    public List<LeadershipCompetencySummaryVO> getLeadershipCompetenciesSummary(@WebParam(name = "userId") String userId) {
        ManagerLeadershipStyle mls = new ManagerLeadershipStyle();
        return mls.getLeadershipCompetenciesSummary(userId);
    }

    @WebMethod(operationName = "getLeadershipStyleDecision")
    public List<LeadershipStyleDecisionVO> getLeadershipStyleDecision(@WebParam(name = "userId") String userId) {
        ManagerLeadershipStyle mls = new ManagerLeadershipStyle();
        return mls.getLeadershipStyleDecision(userId);
    }
}
