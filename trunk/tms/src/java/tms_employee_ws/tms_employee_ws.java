/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package tms_employee_ws;

import java.util.List;
import javax.jws.WebMethod;
import javax.jws.WebParam;
import javax.jws.WebService;
import pk_managers_employee.ManagerEmployee;
import pk_pojos.VwSsMaEmpleadosActivos;
import pk_vo.EmployeeVO;

/**
 * @author u19730
 */
@WebService()
public class tms_employee_ws {

    @WebMethod(operationName = "getCollaborators")
    public List<EmployeeVO> getCollaborators(@WebParam(name = "mgr_emp_id_str") String mgr_emp_id_str) {
        ManagerEmployee me = new ManagerEmployee();
        return me.getCollaborators(mgr_emp_id_str);
    }

    @WebMethod(operationName = "getEvaluators")
    public List<EmployeeVO> getEvaluators(@WebParam(name = "userIdStr") String userIdStr) {
        ManagerEmployee me = new ManagerEmployee();
        return me.getEvaluators(userIdStr);
    }

    @WebMethod(operationName = "getColeagues")
    public List<EmployeeVO> getColeagues(@WebParam(name = "userIdStr") String userIdStr) {
        ManagerEmployee me = new ManagerEmployee();
        return me.getColeagues(userIdStr);
    }

    @WebMethod(operationName = "getEvaluatorsNotSelected")
    public List<EmployeeVO> getEvaluatorsNotSelected(@WebParam(name = "userIdStr") String userIdStr, @WebParam(name = "issueId") Integer issueId) {
        ManagerEmployee me = new ManagerEmployee();
        return me.getEvaluatorsNotSelected(userIdStr, issueId);
    }

    @WebMethod(operationName = "getEvaluatorsSelected")
    public List<EmployeeVO> getEvaluatorsSelected(@WebParam(name = "userIdStr") String userIdStr, @WebParam(name = "issueId") Integer issueId) {
        ManagerEmployee me = new ManagerEmployee();
        return me.getEvaluatorsSelected(userIdStr, issueId);
    }

    @WebMethod(operationName = "getEmployeeData")
    public VwSsMaEmpleadosActivos getEmployeeData(@WebParam(name = "userIdStr") String userIdStr) {
        ManagerEmployee me = new ManagerEmployee();
        return me.getEmployeeData(userIdStr);
    }

    @WebMethod(operationName = "getEmployee")
    public EmployeeVO getEmployee(@WebParam(name = "userIdStr") String userIdStr) {
        ManagerEmployee me = new ManagerEmployee();
        return me.getEmployee(userIdStr);
    }

    @WebMethod(operationName = "getManager")
    public EmployeeVO getManager(@WebParam(name = "userIdStr") String userIdStr) {
        ManagerEmployee me = new ManagerEmployee();
        return me.getManager(userIdStr);
    }

    @WebMethod(operationName = "getEmployeesAlpha")
    public List<EmployeeVO> getEmployeesAlpha(@WebParam(name = "userName") String userName) {
        ManagerEmployee me = new ManagerEmployee();
        return me.getEmployeesAlpha(userName);
    }
}
