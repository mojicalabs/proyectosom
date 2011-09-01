/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.hipos.managers;

import com.bpd.hipos.pojos.HiposBeneficiarios;
import com.bpd.hipos.pojos.HiposConfiguraciones;
import com.bpd.hipos.pojos.HiposDependientes;
import com.bpd.hipos.pojos.HiposEmpleados;
import com.bpd.hipos.resources.AgeCalculation;
import com.bpd.hipos.utils.HIPOSHibernateUtils;
import com.bpd.hipos.vos.DependienteVO;
import com.bpd.hipos.vos.EmpleadoVO;
import com.bpd.hipos.vos.EmployeeVO;
import com.bpd.hipos.vos.ItemEmpPhotoVO;
import com.bpd.hipos.vos.SettingVO;
import com.google.gson.Gson;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;
import java.util.Iterator;
import java.util.List;
import org.hibernate.Criteria;
import org.hibernate.Session;
import org.hibernate.criterion.MatchMode;
import org.hibernate.criterion.Order;
import org.hibernate.criterion.Restrictions;
import ws.Tms_employee_wsService;

/**
 *
 * @author u19730
 */
public class HIPOSEmpleadosManager {

    Gson gson = new Gson();

    public SettingVO getSettings(String codigoEmpleado, String genero, String fechaNacimiento) throws Exception {
        codigoEmpleado = codigoEmpleado.toUpperCase();
        genero = genero.toUpperCase();
        SettingVO sVO = new SettingVO();
        if (codigoEmpleado != null || !codigoEmpleado.equals("0") || !codigoEmpleado.equals("")) {
            System.out.println("getSettings: " + codigoEmpleado);
            AgeCalculation ac = new AgeCalculation();
            HIPOSInternationalAssuranceManager hiam = new HIPOSInternationalAssuranceManager();
            HiposEmpleados he = new HiposEmpleados();
            he = getEmpleadoData(codigoEmpleado);
            sVO.totalAmount = he.getTotalAmount();
            sVO.minAmountPlanRetiro = he.getMinAmountPlanRetiro();
            sVO.tasaDolar = getTasa(1);
            sVO.amountSeguroInternacional = hiam.getInternationalAssuranceAmmount("E", genero, ac.getAge(ac.getDateFromString(fechaNacimiento)));
            sVO.tieneDatos = getTieneDatos(codigoEmpleado);
            sVO.tienePermiso = getTienePermiso(codigoEmpleado);
        }
        return sVO;
    }

    public EmpleadoVO getEmpleado(String codigoEmpleado) throws Exception {
        System.out.println("getEmpleado: " + codigoEmpleado);
        codigoEmpleado = codigoEmpleado.toUpperCase();
        EmpleadoVO eVO = new EmpleadoVO();
        if (codigoEmpleado != null || !codigoEmpleado.equals("0") || !codigoEmpleado.equals("")) {
            HiposEmpleados he = getEmpleadoData(codigoEmpleado);
            if (he != null) {
                EmployeeVO empVO = getEmployee(codigoEmpleado);
                eVO.id = he.getId();
                eVO.codigoEmpleado = codigoEmpleado;
                eVO.totalAmount = he.getTotalAmount();
                eVO.minAmountPlanRetiro = he.getMinAmountPlanRetiro();
                eVO.tipoHipo = he.getTipoHipo();
                eVO.estado = he.getEstado();
                if (empVO != null) {
                    eVO.nombreEmpleado = empVO.nombreEmpleado;
                    eVO.cargo = empVO.cargo;
                    eVO.dependencia = empVO.dependencia;
                    ItemEmpPhotoVO iep = new ItemEmpPhotoVO();
                    iep.nombreEmpleado = empVO.nombreEmpleado;
                    iep.empPhoto = empVO.rutaPhoto + empVO.empPhoto;
                    eVO.itemEmpPhoto = iep;
                }
            }
        }
        return eVO;
    }

    public HiposEmpleados getEmpleadoByCodigoEmpleado(String codigoEmpleado) throws Exception {
        System.out.println("getEmpleadoByCodigoEmpleado: " + codigoEmpleado);
        HiposEmpleados result = new HiposEmpleados();
        codigoEmpleado = codigoEmpleado.toUpperCase();
        if (codigoEmpleado != null || !codigoEmpleado.equals("0") || !codigoEmpleado.equals("")) {
            result = getEmpleadoData(codigoEmpleado);
        }
        return result;
    }

    public List<EmpleadoVO> getEmpleados() throws Exception {
        System.out.println("getEmpleados");
        Session s = getMySession();
        Criteria c = s.createCriteria(HiposEmpleados.class);
        c.addOrder(Order.asc("nombreEmpleado"));
        List<HiposEmpleados> list = new ArrayList();
        List<EmpleadoVO> lout = new ArrayList();
        list = c.list();
        try {
            for (Iterator<HiposEmpleados> it = list.iterator(); it.hasNext();) {
                HiposEmpleados he = it.next();
                EmpleadoVO eVO = new EmpleadoVO();
                EmployeeVO empVO = getEmployee(he.getCodigoEmpleado());
                eVO.id = he.getId();
                eVO.codigoEmpleado = he.getCodigoEmpleado();
                eVO.totalAmount = he.getTotalAmount();
                eVO.minAmountPlanRetiro = he.getMinAmountPlanRetiro();
                eVO.tipoHipo = he.getTipoHipo();
                eVO.estado = he.getEstado();
                if (empVO != null) {
                    eVO.nombreEmpleado = empVO.nombreEmpleado;
                    eVO.cargo = empVO.cargo;
                    eVO.dependencia = empVO.dependencia;
                    ItemEmpPhotoVO iep = new ItemEmpPhotoVO();
                    iep.nombreEmpleado = empVO.nombreEmpleado;
                    iep.empPhoto = empVO.rutaPhoto + empVO.empPhoto;
                    eVO.itemEmpPhoto = iep;
                }
                lout.add(eVO);
            }
        } catch (Exception e) {
            System.out.println("Error en getEmpleados: ");
            System.out.println(e.getMessage());
            throw e;
        } finally {
            s.close();
        }
        return lout;
    }

    public List<EmpleadoVO> getEmpleadosByName(String empName, String empType) throws Exception {
        System.out.println("getEmpleadosByName");
        Session s = getMySession();
        Criteria c = s.createCriteria(HiposEmpleados.class);
        //c.add(Restrictions.like("nombreEmpleado", empName, MatchMode.ANYWHERE));
        if (!empType.equals("ALL") && !empType.isEmpty()) {
            String[] empTypeSplit = null;
            empTypeSplit = empType.split(",");
            c.add(Restrictions.in("tipoHipo", empTypeSplit));
        }
        c.addOrder(Order.asc("nombreEmpleado"));
        List<HiposEmpleados> list = new ArrayList();
        List<EmpleadoVO> lout = new ArrayList();
        list = c.list();
        try {
            for (Iterator<HiposEmpleados> it = list.iterator(); it.hasNext();) {
                HiposEmpleados he = it.next();
                EmpleadoVO eVO = new EmpleadoVO();
                EmployeeVO empVO = getEmployee(he.getCodigoEmpleado());
                if (empVO.nombreEmpleado.contains(empName)) {
                    eVO.id = he.getId();
                    eVO.codigoEmpleado = he.getCodigoEmpleado();
                    eVO.totalAmount = he.getTotalAmount();
                    eVO.minAmountPlanRetiro = he.getMinAmountPlanRetiro();
                    eVO.tipoHipo = he.getTipoHipo();
                    eVO.estado = he.getEstado();
                    if (empVO != null) {
                        eVO.nombreEmpleado = empVO.nombreEmpleado;
                        eVO.cargo = empVO.cargo;
                        eVO.dependencia = empVO.dependencia;
                        ItemEmpPhotoVO iep = new ItemEmpPhotoVO();
                        iep.nombreEmpleado = empVO.nombreEmpleado;
                        iep.empPhoto = empVO.rutaPhoto + empVO.empPhoto;
                        eVO.itemEmpPhoto = iep;
                    }
                    lout.add(eVO);
                }
            }
        } catch (Exception e) {
            System.out.println("Error en getEmpleadosByName: ");
            System.out.println(e.getMessage());
            throw e;
        } finally {
            s.close();
        }
        return lout;
    }

    public Boolean setEmpleado(EmpleadoVO eVO) throws Exception {

        System.out.println("setEmpleado: " + gson.toJson(eVO));
        HiposEmpleados data = new HiposEmpleados();
        Session s = getMySession();
        Boolean result = false;
        try {
            if (eVO.id != null && eVO.id != 0) {
                data.setId(eVO.id);
            } else {
                HiposEmpleados he = getEmpleadoByCodigoEmpleado(eVO.codigoEmpleado);
                if (he != null) {
                    data.setId(he.getId());
                }
            }

            data.setCodigoEmpleado(eVO.codigoEmpleado);
            data.setTipoHipo(eVO.tipoHipo);
            data.setTotalAmount(eVO.totalAmount);
            data.setMinAmountPlanRetiro(eVO.minAmountPlanRetiro);
            data.setLogonUser(getLogonUser());
            data.setFechaRegistro(now());
            data.setEstado(eVO.estado);

            s.beginTransaction();
            s.saveOrUpdate(data);
            s.getTransaction().commit();
            result = true;
        } catch (Exception e) {
            System.out.println("Error en setEmpleado: " + gson.toJson(data));
            System.out.println(e.getMessage());
            throw e;
        } finally {
            s.close();
        }
        return result;
    }

    public Boolean delEmpleado(String codigoEmpleado) throws Exception {
        System.out.println("delEmpleado: " + codigoEmpleado);
        Session s = getMySession();
        Criteria c = s.createCriteria(HiposEmpleados.class);
        c.add(Restrictions.eq("codigoEmpleado", codigoEmpleado));
        List<HiposEmpleados> list = c.list();
        Boolean result = false;
        int counter = 0;
        HiposEmpleados objectError = new HiposEmpleados();
        try {
            for (Iterator<HiposEmpleados> it = list.iterator(); it.hasNext();) {
                HiposEmpleados object = it.next();
                objectError = object;
                s.beginTransaction();
                s.delete(object);
                s.getTransaction().commit();
                counter++;
            }
        } catch (Exception e) {
            System.out.println("Error en delEmpleado: " + gson.toJson(objectError));
            System.out.println(e.getMessage());
            throw e;
        } finally {
            s.close();
        }

        if (counter != list.size()) {
            throw new Exception("Not all the records where deleted");
        } else {
            result = true;
        }
        return result;
    }

    private EmployeeVO getEmployee(String codigoEmpleado) throws Exception {
        EmployeeVO eVO = new EmployeeVO();
        try {
            Tms_employee_wsService ews = new Tms_employee_wsService();
            wsGen.EmployeeVO wsVO = ews.getTms_employee_wsPort().getEmployee(codigoEmpleado);
            eVO.nombreEmpleado = wsVO.getNombreEmpleado().replace("()", "").trim();
            eVO.cargo = wsVO.getCargo();
            eVO.dependencia = wsVO.getDependencia();
            eVO.rutaPhoto = wsVO.getRutaPhoto();
            eVO.empPhoto = wsVO.getEmpPhoto();
        } catch (Exception e) {
            System.out.println("Error en getEmployee: " + gson.toJson(eVO));
            System.out.println(e.getMessage());
            throw e;
        }
        return eVO;
    }

    public List<DependienteVO> getDependientes(String codigoEmpleado) {
        System.out.println("getDependientes: " + codigoEmpleado);
        codigoEmpleado = codigoEmpleado.toUpperCase();
        Session s = getMySession();
        Criteria c = s.createCriteria(HiposDependientes.class);
        c.add(Restrictions.eq("codigoEmpleado", codigoEmpleado));
        List<HiposDependientes> l = new ArrayList();
        List<DependienteVO> lout = new ArrayList();
        l = c.list();
        for (Iterator<HiposDependientes> it = l.iterator(); it.hasNext();) {
            HiposDependientes hdep = it.next();
            DependienteVO dVO = new DependienteVO();
            dVO.id = hdep.getId();
            dVO.parentesco = hdep.getParentesco();
            dVO.edad = hdep.getEdad();
            dVO.percent = hdep.getPercent();
            dVO.ammount = hdep.getAmmount();
            lout.add(dVO);
        }
        s.close();
        return lout;
    }

    private Boolean getTieneDatos(String codigoEmpleado) {
        codigoEmpleado = codigoEmpleado.toUpperCase();
        System.out.println("START getTieneDatos: " + codigoEmpleado);
        Boolean result = false;
        if (codigoEmpleado != null && !codigoEmpleado.equals("0") && !codigoEmpleado.equals("")) {
            Session s = getMySession();
            Criteria c = s.createCriteria(HiposBeneficiarios.class);
            c.add(Restrictions.eq("codigoEmpleado", codigoEmpleado));
            c.setMaxResults(1);
            HiposBeneficiarios data = (HiposBeneficiarios) c.uniqueResult();
            if (data != null) {
                result = true;
            }
            s.close();
        }
        System.out.println("END getTieneDatos: " + result);
        return result;
    }

    private Boolean getTienePermiso(String codigoEmpleado) {
        codigoEmpleado = codigoEmpleado.toUpperCase();
        System.out.println("START getTienePermiso: " + codigoEmpleado);
        Boolean result = false;
        if (codigoEmpleado != null && !codigoEmpleado.equals("0") && !codigoEmpleado.equals("")) {
            Session s = getMySession();
            Criteria c = s.createCriteria(HiposEmpleados.class);
            c.add(Restrictions.eq("codigoEmpleado", codigoEmpleado));
            c.setMaxResults(1);
            HiposEmpleados data = (HiposEmpleados) c.uniqueResult();
            if (data != null) {
                result = true;
            }
            s.close();
        }
        System.out.println("END getTienePermiso: " + result);
        return result;
    }

    private HiposEmpleados getEmpleadoData(String codigoEmpleado) {
        System.out.println("START getEmpleado: " + codigoEmpleado);
        codigoEmpleado = codigoEmpleado.toUpperCase();
        HiposEmpleados result = new HiposEmpleados();
        if (codigoEmpleado != null || !codigoEmpleado.equals("0") || !codigoEmpleado.equals("")) {
            Session s = getMySession();
            Criteria c = s.createCriteria(HiposEmpleados.class);
            c.add(Restrictions.eq("codigoEmpleado", codigoEmpleado));
            c.setMaxResults(1);
            HiposEmpleados data = (HiposEmpleados) c.uniqueResult();
            if (data != null) {
                result = data;
            }
            s.close();
        }
        System.out.println("END getEmpleado: " + codigoEmpleado);
        return result;
    }

    private Double getTasa(Integer tId) {
        Double result = 0D;
        if (tId != null || !tId.equals(0)) {
            Session s = getMySession();
            System.out.println("getTasa: " + tId);
            Criteria c = s.createCriteria(HiposConfiguraciones.class);
            c.add(Restrictions.eq("id", tId));
            c.setMaxResults(1);
            HiposConfiguraciones data = (HiposConfiguraciones) c.uniqueResult();
            if (data != null) {
                result = data.getTasaDolar();
            }
            s.close();
        }
        return result;
    }

    public int delDependiente(List setId) throws Exception {
        int result = 0;
        if (setId.size() > 0) {
            Session s = getMySession();
            Criteria c = s.createCriteria(HiposDependientes.class);
            c.add(Restrictions.in("id", setId));
            List<HiposDependientes> l = c.list();
            HiposDependientes objectError = new HiposDependientes();
            try {
                for (Iterator it = l.iterator(); it.hasNext();) {
                    HiposDependientes object = (HiposDependientes) it.next();
                    objectError = object;
                    s.beginTransaction();
                    s.delete(object);
                    s.getTransaction().commit();
                    result++;
                }
            } catch (Exception e) {
                System.out.println("Error en delDependiente: " + gson.toJson(objectError));
                System.out.println(e.getMessage());
                throw e;
            } finally {
                s.close();
            }

            if (result != l.size()) {
                throw new Exception("Not all the records where deleted");
            }
        }
        return result;
    }

    public Date now() {
        Calendar cal = Calendar.getInstance();
        return cal.getTime();
    }

    private Session getMySession() {
        Session s = HIPOSHibernateUtils.getSessionFactory().openSession();
        return s;
    }

    private String getLogonUser() {
        return "U19730";
    }
}
