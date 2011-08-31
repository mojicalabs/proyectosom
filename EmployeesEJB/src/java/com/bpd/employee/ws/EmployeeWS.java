/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package com.bpd.employee.ws;

import com.bpd.employee.beans.EmployeeManagerRemote;
import com.bpd.employee.vos.ResultClassEmployeeVO;
import com.bpd.employee.vos.ResultClassVO;
import javax.ejb.EJB;
import javax.jws.WebMethod;
import javax.jws.WebParam;
import javax.jws.WebService;
import javax.ejb.Stateless;

/**
 *
 * @author Omar Mojica
 */
@WebService()
@Stateless()
public class EmployeeWS {
    @EJB
    private EmployeeManagerRemote ejbRef;// Add business logic below. (Right-click in editor and choose

    @WebMethod(operationName = "getEmployeePositions")
    public ResultClassVO getEmployeePositions(@WebParam(name = "userId")
    String userId) {
        return ejbRef.getEmployeePositions(userId);
    }
    
    @WebMethod(operationName = "getEmployee")
    public ResultClassEmployeeVO getEmployee(@WebParam(name = "userId")
    String userId) {
        return ejbRef.getEmployee(userId);
    }

}
