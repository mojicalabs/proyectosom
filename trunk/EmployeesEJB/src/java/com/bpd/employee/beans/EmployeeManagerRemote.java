/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.employee.beans;

import com.bpd.employee.vos.ResultClassEmployeeVO;
import com.bpd.employee.vos.ResultClassVO;
import javax.ejb.Remote;

/**
 *
 * @author Omar Mojica
 */
@Remote
public interface EmployeeManagerRemote {

    ResultClassVO getEmployeePositions(String userId);
    
    ResultClassEmployeeVO getEmployee(String userId);
}
