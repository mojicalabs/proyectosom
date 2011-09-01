/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package com.bpd.hipos.ws;

import com.bpd.hipos.sb.hipos_sbRemote;
import com.bpd.hipos.vos.AsignacionEntidadesVO;
import com.bpd.hipos.vos.BeneficiarioVO;
import com.bpd.hipos.vos.DependienteVO;
import com.bpd.hipos.vos.EmpleadoVO;
import com.bpd.hipos.vos.EmployeeEntityAssignmnetVO;
import com.bpd.hipos.vos.EntityAssignmentVO;
import com.bpd.hipos.vos.EntityVO;
import com.bpd.hipos.vos.SettingVO;
import com.bpd.hipos.vos.TipoCategoriaVO;
import java.util.List;
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
public class tms_hipos_ws {
    @EJB
    private hipos_sbRemote ejbRef;// Add business logic below. (Right-click in editor and choose
    // "Insert Code > Add Web Service Operation")

    @WebMethod(operationName = "getBeneficiario")
    public BeneficiarioVO getBeneficiario(@WebParam(name = "codigoEmpleado")
    String codigoEmpleado) {
        return ejbRef.getBeneficiario(codigoEmpleado);
    }

    @WebMethod(operationName = "getDependientes")
    public List<DependienteVO> getDependientes(@WebParam(name = "codigoEmpleado")
    String codigoEmpleado) {
        return ejbRef.getDependientes(codigoEmpleado);
    }

    @WebMethod(operationName = "setBeneficiario")
    public BeneficiarioVO setBeneficiario(@WebParam(name = "beneficiario")
    BeneficiarioVO beneficiario) {
        return ejbRef.setBeneficiario(beneficiario);
    }

    @WebMethod(operationName = "getInternationalAssuranceAmmount")
    public Double getInternationalAssuranceAmmount(@WebParam(name = "hipoType")
    String hipoType, @WebParam(name = "hipoGender")
    String hipoGender, @WebParam(name = "hipoAge")
    Integer hipoAge) {
        return ejbRef.getInternationalAssuranceAmmount(hipoType, hipoGender, hipoAge);
    }

    @WebMethod(operationName = "getSettings")
    public SettingVO getSettings(@WebParam(name = "codigoEmpleado")
    String codigoEmpleado, @WebParam(name = "genero")
    String genero, @WebParam(name = "fechaNacimiento")
    String fechaNacimiento) {
        return ejbRef.getSettings(codigoEmpleado, genero, fechaNacimiento);
    }

    @WebMethod(operationName = "getEmpleado")
    public EmpleadoVO getEmpleado(@WebParam(name = "codigoEmpleado")
    String codigoEmpleado) {
        return ejbRef.getEmpleado(codigoEmpleado);
    }

    @WebMethod(operationName = "getEmpleados")
    public List<EmpleadoVO> getEmpleados() {
        return ejbRef.getEmpleados();
    }

    @WebMethod(operationName = "getEmpleadosByName")
    public List<EmpleadoVO> getEmpleadosByName(@WebParam(name = "empName")
    String empName, @WebParam(name = "empType")
    String empType) {
        return ejbRef.getEmpleadosByName(empName, empType);
    }

    @WebMethod(operationName = "setEmpleado")
    public Boolean setEmpleado(@WebParam(name = "eVO")
    EmpleadoVO eVO) {
        return ejbRef.setEmpleado(eVO);
    }

    @WebMethod(operationName = "delEmpleado")
    public Boolean delEmpleado(@WebParam(name = "codigoEmpleado")
    String codigoEmpleado) {
        return ejbRef.delEmpleado(codigoEmpleado);
    }

    @WebMethod(operationName = "getEntities")
    public List<EntityVO> getEntities(@WebParam(name = "entType")
    String entType) {
        return ejbRef.getEntities(entType);
    }

    @WebMethod(operationName = "getEntitiesByName")
    public List<EntityVO> getEntitiesByName(@WebParam(name = "entType")
    String entType, @WebParam(name = "entName")
    String entName) {
        return ejbRef.getEntitiesByName(entType, entName);
    }

    @WebMethod(operationName = "getEntitiesAssignmentByName")
    public List<EntityAssignmentVO> getEntitiesAssignmentByName(@WebParam(name = "entType")
    String entType, @WebParam(name = "entName")
    String entName) {
        return ejbRef.getEntitiesAssignmentByName(entType, entName);
    }

    @WebMethod(operationName = "setEntity")
    public Boolean setEntity(@WebParam(name = "entity")
    EntityVO entity) {
        return ejbRef.setEntity(entity);
    }

    @WebMethod(operationName = "setAsignaciones")
    public Boolean setAsignaciones(@WebParam(name = "entity")
    List<EmployeeEntityAssignmnetVO> entity) {
        return ejbRef.setAsignaciones(entity);
    }

    @WebMethod(operationName = "getAsignaciones")
    public List<AsignacionEntidadesVO> getAsignaciones(@WebParam(name = "userId")
    String userId) {
        return ejbRef.getAsignaciones(userId);
    }

    @WebMethod(operationName = "delEntity")
    public Boolean delEntity(@WebParam(name = "entId")
    int entId) {
        return ejbRef.delEntity(entId);
    }

    @WebMethod(operationName = "getTiposCategorias")
    public List<TipoCategoriaVO> getTiposCategorias(@WebParam(name = "breAct")
    String breAct, @WebParam(name = "tipCat")
    String tipCat) {
        return ejbRef.getTiposCategorias(breAct, tipCat);
    }

    @WebMethod(operationName = "setTipoCategoria")
    public Boolean setTipoCategoria(@WebParam(name = "tcVO")
    TipoCategoriaVO tcVO) {
        return ejbRef.setTipoCategoria(tcVO);
    }

    @WebMethod(operationName = "delTipoCategoria")
    public Boolean delTipoCategoria(@WebParam(name = "entId")
    int entId) {
        return ejbRef.delTipoCategoria(entId);
    }

}
