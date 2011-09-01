/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.hipos.sb;

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
import javax.ejb.Remote;

/**
 *
 * @author u19730
 */
@Remote
public interface hipos_sbRemote {

    BeneficiarioVO getBeneficiario(String codigoEmpleado);

    List<DependienteVO> getDependientes(String codigoEmpleado);

    BeneficiarioVO setBeneficiario(BeneficiarioVO beneficiario);

    Double getInternationalAssuranceAmmount(String hipoType, String hipoGender, Integer hipoAge);

    SettingVO getSettings(String codigoEmpleado, String genero, String fechaNacimiento);

    EmpleadoVO getEmpleado(String codigoEmpleado);

    List<EmpleadoVO> getEmpleados();

    List<EmpleadoVO> getEmpleadosByName(String empName, String empType);

    Boolean setEmpleado(EmpleadoVO eVO);

    Boolean delEmpleado(String codigoEmpleado);

    List<EntityVO> getEntities(String entType);

    List<EntityVO> getEntitiesByName(String entType, String entName);

    List<EntityAssignmentVO> getEntitiesAssignmentByName(String entType, String entName);

    Boolean setEntity(EntityVO entity);

    Boolean setAsignaciones(List<EmployeeEntityAssignmnetVO> entity);
    
    List<AsignacionEntidadesVO> getAsignaciones(String userId);

    Boolean delEntity(int entId);

    List<TipoCategoriaVO> getTiposCategorias(String breAct, String tipCat);

    Boolean setTipoCategoria(TipoCategoriaVO tcVO);

    Boolean delTipoCategoria(int entId);
}
