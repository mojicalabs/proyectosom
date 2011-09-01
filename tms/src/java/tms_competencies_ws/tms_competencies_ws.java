/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package tms_competencies_ws;

import java.util.List;
import javax.jws.WebMethod;
import javax.jws.WebParam;
import javax.jws.WebService;
import pk_managers.ManagerCompetencies;
import pk_pojos.TmsJobCompetenciesValues;
import pk_vo.SpecialCompetencyVO;

/**
 *
 * @author u19730
 */
@WebService()
public class tms_competencies_ws {

    @WebMethod(operationName = "getJobCompetencies")
    public List<SpecialCompetencyVO> getJobCompetencies(@WebParam(name = "jobId") Integer jobId) {
        ManagerCompetencies mc = new ManagerCompetencies();
        return mc.getJobCompetencies(jobId);
    }

    @WebMethod(operationName = "setJobCompetency")
    public TmsJobCompetenciesValues setJobCompetency(@WebParam(name = "obj") TmsJobCompetenciesValues obj) {
        ManagerCompetencies mc = new ManagerCompetencies();
        return mc.setJobCompetency(obj);
    }
}
