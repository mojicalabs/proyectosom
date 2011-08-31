/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.employee.beans;

import com.bpd.employee.helpers.DAOException;
import com.bpd.employee.managers.EmployeesModelManager;
import com.bpd.employee.vos.ResultClassEmployeeVO;
import com.bpd.employee.vos.ResultClassVO;
import javax.ejb.Stateless;

/**
 *
 * @author Omar Mojica
 */
@Stateless
public class EmployeeManager implements EmployeeManagerRemote {

    public ResultClassVO getEmployeePositions(String userId) throws DAOException {
        EmployeesModelManager mgr = new EmployeesModelManager();
        ResultClassVO employees = mgr.getEmployeePositions(userId);
        return employees;
    }

    public ResultClassEmployeeVO getEmployee(String userId) throws DAOException {
        EmployeesModelManager mgr = new EmployeesModelManager();
        ResultClassEmployeeVO employee = mgr.getEmployee(userId);
        return employee;
    }
}
