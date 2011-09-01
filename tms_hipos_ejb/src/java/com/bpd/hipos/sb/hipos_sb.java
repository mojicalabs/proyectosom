/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.hipos.sb;

import com.bpd.hipos.managers.HIPOSAsignacionesManager;
import com.bpd.hipos.managers.HIPOSBeneficiariosManager;
import com.bpd.hipos.managers.HIPOSEntidadesManager;
import com.bpd.hipos.managers.HIPOSInternationalAssuranceManager;
import com.bpd.hipos.managers.HIPOSTiposCategoriasManager;
import com.bpd.hipos.vos.AsignacionEntidadesVO;
import com.bpd.hipos.vos.BeneficiarioVO;
import com.bpd.hipos.vos.DependienteVO;
import com.bpd.hipos.vos.EmpleadoVO;
import com.bpd.hipos.vos.EmployeeEntityAssignmnetVO;
import com.bpd.hipos.vos.EntityAssignmentVO;
import com.bpd.hipos.vos.EntityVO;
import com.bpd.hipos.vos.SettingVO;
import com.bpd.hipos.vos.TipoCategoriaVO;
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.ejb.Stateless;

/**
 *
 * @author u19730
 */
@Stateless
public class hipos_sb implements hipos_sbRemote {

    public BeneficiarioVO getBeneficiario(String codigoEmpleado) {
        HIPOSBeneficiariosManager hbm = new HIPOSBeneficiariosManager();
        return hbm.getBeneficiario(codigoEmpleado);
    }

    public List<DependienteVO> getDependientes(String codigoEmpleado) {
        HIPOSBeneficiariosManager hbm = new HIPOSBeneficiariosManager();
        return hbm.getDependientes(codigoEmpleado);
    }

    public BeneficiarioVO setBeneficiario(BeneficiarioVO beneficiario) {
        BeneficiarioVO result = new BeneficiarioVO();
        try {
            HIPOSBeneficiariosManager hbm = new HIPOSBeneficiariosManager();
            result = hbm.setBeneficiario(beneficiario);
        } catch (Exception ex) {
            Logger.getLogger(hipos_sb.class.getName()).log(Level.SEVERE, null, ex);
        }
        return result;
    }

    public Double getInternationalAssuranceAmmount(String hipoType, String hipoGender, Integer hipoAge) {
        Double result = 0D;
        try {
            HIPOSInternationalAssuranceManager hiam = new HIPOSInternationalAssuranceManager();
            result = hiam.getInternationalAssuranceAmmount(hipoType, hipoGender, hipoAge);
        } catch (Exception ex) {
            Logger.getLogger(hipos_sb.class.getName()).log(Level.SEVERE, null, ex);
        }
        return result;
    }

    public SettingVO getSettings(String codigoEmpleado, String genero, String fechaNacimiento) {
        SettingVO result = new SettingVO();
        try {
            HIPOSBeneficiariosManager hbm = new HIPOSBeneficiariosManager();
            result = hbm.getSettings(codigoEmpleado, genero, fechaNacimiento);
        } catch (Exception ex) {
            Logger.getLogger(hipos_sb.class.getName()).log(Level.SEVERE, null, ex);
        }
        return result;
    }

    public EmpleadoVO getEmpleado(String codigoEmpleado) {
        EmpleadoVO result = new EmpleadoVO();
        try {
            HIPOSBeneficiariosManager hbm = new HIPOSBeneficiariosManager();
            result = hbm.getEmpleado(codigoEmpleado);
        } catch (Exception ex) {
            Logger.getLogger(hipos_sb.class.getName()).log(Level.SEVERE, null, ex);
        }
        return result;
    }

    public List<EmpleadoVO> getEmpleados() {
        List<EmpleadoVO> result = new ArrayList();
        try {
            HIPOSBeneficiariosManager hbm = new HIPOSBeneficiariosManager();
            result = hbm.getEmpleados();
        } catch (Exception ex) {
            Logger.getLogger(hipos_sb.class.getName()).log(Level.SEVERE, null, ex);
        }
        return result;
    }

    public List<EmpleadoVO> getEmpleadosByName(String empName, String empType) {
        List<EmpleadoVO> result = new ArrayList();
        try {
            HIPOSBeneficiariosManager hbm = new HIPOSBeneficiariosManager();
            result = hbm.getEmpleadosByName(empName, empType);
        } catch (Exception ex) {
            Logger.getLogger(hipos_sb.class.getName()).log(Level.SEVERE, null, ex);
        }
        return result;
    }

    public Boolean setEmpleado(EmpleadoVO eVO) {
        Boolean result = false;
        try {
            HIPOSBeneficiariosManager hbm = new HIPOSBeneficiariosManager();
            result = hbm.setEmpleado(eVO);
        } catch (Exception ex) {
            Logger.getLogger(hipos_sb.class.getName()).log(Level.SEVERE, null, ex);
        }
        return result;
    }

    public Boolean delEmpleado(String codigoEmpleado) {
        Boolean result = false;
        try {
            HIPOSBeneficiariosManager hbm = new HIPOSBeneficiariosManager();
            result = hbm.delEmpleado(codigoEmpleado);
        } catch (Exception ex) {
            Logger.getLogger(hipos_sb.class.getName()).log(Level.SEVERE, null, ex);
        }
        return result;
    }

    public List<EntityVO> getEntities(String entType) {
        List<EntityVO> result = new ArrayList();
        try {
            HIPOSEntidadesManager hem = new HIPOSEntidadesManager();
            result = hem.getEntities(entType);
        } catch (Exception ex) {
            Logger.getLogger(hipos_sb.class.getName()).log(Level.SEVERE, null, ex);
        }
        return result;
    }

    public List<EntityVO> getEntitiesByName(String entType, String entName) {
        List<EntityVO> result = new ArrayList();
        try {
            HIPOSEntidadesManager hem = new HIPOSEntidadesManager();
            result = hem.getEntitiesByName(entType, entName);
        } catch (Exception ex) {
            Logger.getLogger(hipos_sb.class.getName()).log(Level.SEVERE, null, ex);
        }
        return result;
    }

    public List<EntityAssignmentVO> getEntitiesAssignmentByName(String entType, String entName) {
        List<EntityAssignmentVO> result = new ArrayList();
        try {
            HIPOSEntidadesManager hem = new HIPOSEntidadesManager();
            result = hem.getEntitiesAssignmentByName(entType, entName);
        } catch (Exception ex) {
            Logger.getLogger(hipos_sb.class.getName()).log(Level.SEVERE, null, ex);
        }
        return result;
    }

    public Boolean setEntity(EntityVO entity) {
        Boolean result = false;
        try {
            HIPOSEntidadesManager hem = new HIPOSEntidadesManager();
            result = hem.setEntity(entity);
        } catch (Exception ex) {
            Logger.getLogger(hipos_sb.class.getName()).log(Level.SEVERE, null, ex);
        }
        return result;
    }

    public Boolean setAsignaciones(List<EmployeeEntityAssignmnetVO> entity) {
        Boolean result = false;
        try {
            HIPOSAsignacionesManager hem = new HIPOSAsignacionesManager();
            result = hem.setAsignaciones(entity);
        } catch (Exception ex) {
            Logger.getLogger(hipos_sb.class.getName()).log(Level.SEVERE, null, ex);
        }
        return result;
    }

    public List<AsignacionEntidadesVO> getAsignaciones(String userId) {
        List<AsignacionEntidadesVO> result = new ArrayList();
        try {
            HIPOSAsignacionesManager hem = new HIPOSAsignacionesManager();
            result = hem.getAsignaciones(userId);
        } catch (Exception ex) {
            Logger.getLogger(hipos_sb.class.getName()).log(Level.SEVERE, null, ex);
        }
        return result;
    }

    public Boolean delEntity(int entId) {
        Boolean result = false;
        try {
            HIPOSEntidadesManager hem = new HIPOSEntidadesManager();
            result = hem.delEntity(entId);
        } catch (Exception ex) {
            Logger.getLogger(hipos_sb.class.getName()).log(Level.SEVERE, null, ex);
        }
        return result;
    }

    public List<TipoCategoriaVO> getTiposCategorias(String breAct, String tipCat) {
        List<TipoCategoriaVO> result = new ArrayList();
        try {
            HIPOSTiposCategoriasManager man = new HIPOSTiposCategoriasManager();
            result = man.getTiposCategorias(breAct, tipCat);
        } catch (Exception ex) {
            Logger.getLogger(hipos_sb.class.getName()).log(Level.SEVERE, null, ex);
        }
        return result;
    }

    public Boolean setTipoCategoria(TipoCategoriaVO tcVO) {
        Boolean result = false;
        try {
            HIPOSTiposCategoriasManager man = new HIPOSTiposCategoriasManager();
            result = man.setTipoCategoria(tcVO);
        } catch (Exception ex) {
            Logger.getLogger(hipos_sb.class.getName()).log(Level.SEVERE, null, ex);
        }
        return result;
    }

    public Boolean delTipoCategoria(int entId) {
        Boolean result = false;
        try {
            HIPOSTiposCategoriasManager man = new HIPOSTiposCategoriasManager();
            result = man.delTipoCategoria(entId);
        } catch (Exception ex) {
            Logger.getLogger(hipos_sb.class.getName()).log(Level.SEVERE, null, ex);
        }
        return result;
    }
}
