/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.hipos.managers;

//import com.bpd.hipos.pojos.HiposAsignaciones;
import com.bpd.hipos.pojos.HiposAsignaciones;
import com.bpd.hipos.utils.HIPOSHibernateUtils;
import com.bpd.hipos.vos.ActividadesLoadVO;
import com.bpd.hipos.vos.ActividadesSaveVO;
import com.bpd.hipos.vos.AsignacionActividadesVO;
import com.bpd.hipos.vos.AsignacionEntidadesVO;
import com.bpd.hipos.vos.EmployeeEntityAssignmnetVO;
import com.bpd.hipos.vos.EntidadesSaveVO;
import com.bpd.hipos.vos.EntityVO;
import com.google.gson.Gson;
import java.util.ArrayList;
import java.util.Date;
import java.util.Iterator;
import java.util.List;
import org.hibernate.Criteria;
import org.hibernate.Session;
import org.hibernate.criterion.ProjectionList;
import org.hibernate.criterion.Projections;
import org.hibernate.criterion.Restrictions;

/**
 *
 * @author u19730
 */
public class HIPOSAsignacionesManager {

    public List<AsignacionEntidadesVO> getAsignaciones(String userId) throws Exception {
        System.out.println("getAsignaciones: " + userId);
        Session s = getMySession();
        Criteria c = s.createCriteria(HiposAsignaciones.class);
        c.add(Restrictions.eq("codigoEmpleado", userId));

        ProjectionList pl = Projections.projectionList();
        pl.add(Projections.property("idEntidad"));
        pl.add(Projections.groupProperty("idEntidad"));
        c.setProjection(pl);

        List<Object[]> l = new ArrayList();
        List<AsignacionEntidadesVO> lout = new ArrayList();
        l = c.list();

        HIPOSEntidadesManager em = new HIPOSEntidadesManager();
        for (Iterator<Object[]> it = l.iterator(); it.hasNext();) {
            Object[] ha = it.next();
            Integer idEntidad = (Integer) ha[0];
            AsignacionEntidadesVO aVO = new AsignacionEntidadesVO();
            EntityVO entVO = em.getEntity(idEntidad);
            aVO.idEntidad = idEntidad;
            aVO.nombreEntidad = entVO.name;
            aVO.codigoEmpleado = userId;
            aVO.fechaFinal = getActivitiesFechaFinal(userId);
            aVO.estado = getActivitiesAverage(userId);
            aVO.actividades = getAsignacionesActividades(idEntidad, userId);
            lout.add(aVO);
        }
        s.close();
        return lout;
    }

    public Boolean setAsignaciones(List<EmployeeEntityAssignmnetVO> dataVO) throws Exception {
        Gson gson = new Gson();
        System.out.println("setAsignaciones: " + gson.toJson(dataVO));
        Session s = getMySession();
        Boolean result = true;

        try {
            for (Iterator<EmployeeEntityAssignmnetVO> it = dataVO.iterator(); it.hasNext();) {
                EmployeeEntityAssignmnetVO empleadoVO = it.next();

                if (empleadoVO.entidades != null && empleadoVO.entidades.size() > 0) {
                    List<EntidadesSaveVO> entidades = empleadoVO.entidades;
                    for (Iterator<EntidadesSaveVO> it1 = entidades.iterator(); it1.hasNext();) {
                        EntidadesSaveVO entidadVO = it1.next();

                        if (entidadVO.actividades != null && entidadVO.actividades.size() > 0) {
                            List<ActividadesSaveVO> actividades = entidadVO.actividades;
                            for (Iterator<ActividadesSaveVO> it2 = actividades.iterator(); it2.hasNext();) {
                                ActividadesSaveVO actividadVO = it2.next();

                                HiposAsignaciones data = new HiposAsignaciones();
                                data.setCodigoEmpleado(empleadoVO.codigoEmpleado);
                                data.setLogonUser(empleadoVO.logonUser);
                                data.setEstado(0);
                                data.setFechaInicial(actividadVO.startDate);
                                data.setFechaFinal(actividadVO.endDate);
                                data.setIdActividad(actividadVO.id);
                                data.setIdEntidad(entidadVO.id);
                                if (actividadVO.id == null || actividadVO.id == 0) {
                                    data.setNombreActividadAdhoc(actividadVO.nombreAdHoc);
                                } else {
                                    data.setNombreActividadAdhoc("");
                                }
                                s.beginTransaction();
                                s.saveOrUpdate(data);
                                s.getTransaction().commit();
                            }
                        }
                    }
                }
            }
        } catch (Exception e) {
            System.out.println("Error en setAsignaciones: " + e.getMessage());
            throw e;
        } finally {
            s.close();
            System.out.println("END setAsignaciones: ");
            return result;
        }
    }

    public List<AsignacionActividadesVO> getAsignacionesActividades(Integer entId, String userId) throws Exception {
        System.out.println("getAsignaciones: " + entId);
        Session s = getMySession();
        Criteria c = s.createCriteria(HiposAsignaciones.class);
        c.add(Restrictions.eq("codigoEmpleado", userId));
        c.add(Restrictions.eq("idEntidad", entId));

        List<HiposAsignaciones> l = new ArrayList();
        List<AsignacionActividadesVO> lout = new ArrayList();
        l = c.list();

        HIPOSActividadesManager am = new HIPOSActividadesManager();
        for (Iterator<HiposAsignaciones> it = l.iterator(); it.hasNext();) {
            HiposAsignaciones ha = it.next();
            AsignacionActividadesVO aVO = new AsignacionActividadesVO();
            ActividadesLoadVO actVO = am.getActivity(ha.getIdActividad());
            aVO.id = actVO.id;
            if (ha.getNombreActividadAdhoc().isEmpty()) {
                aVO.name = actVO.name;
            } else {
                aVO.name = ha.getNombreActividadAdhoc();
            }
            aVO.codigoEmpleado = ha.getCodigoEmpleado();
            aVO.fechaFinal = ha.getFechaFinal();
            aVO.fechaInicial = ha.getFechaInicial();
            aVO.nombreActividadAdhoc = ha.getNombreActividadAdhoc();
            aVO.estado = ha.getEstado();
            lout.add(aVO);
        }
        s.close();
        return lout;
    }

    public Integer getActivitiesAverage(String userId) throws Exception {
        return null;
    }

    public Date getActivitiesFechaFinal(String userId) throws Exception {
        return null;
    }

//    public Boolean setAsignaciones(List<AsignacionVO> Asignaciones, Integer entId, Session s) throws Exception {
//        System.out.println("setAsignaciones: " + entId);
//        Boolean result = true;
//        try {
//            for (Iterator<AsignacionVO> it = Asignaciones.iterator(); it.hasNext();) {
//                AsignacionVO object = it.next();
//                if (object != null) {
//                    HiposAsignaciones ha = new HiposAsignaciones();
//
//                    if (object.id != null && object.id != 0) {
//                        ha.setId(object.id);
//                    }
//
//                    ha.setName(object.name);
//                    ha.setIdEntity(entId);
//                    ha.setIdType(object.idType);
//                    ha.setStatus(object.status);
//
//                    try {
//                        s.beginTransaction();
//                        s.saveOrUpdate(ha);
//                        s.getTransaction().commit();
//                    } catch (HibernateException he) {
//                        System.out.println("setAsignaciones / Hibernate: " + he.getMessage());
//                        result = false;
//                    }
//                }
//            }
//        } catch (Exception e) {
//            System.out.println("setAsignaciones / Otro error: " + e.getMessage());
//            result = false;
//        } finally {
//            return result;
//        }
//    }
//
//    public Boolean delActivity(List<Integer> entId, String byType) throws Exception {
//        Gson gson = new Gson();
//        System.out.println("delEntity: " + gson.toJson(entId));
//        int counter = 0;
//        Boolean result = true;
//        if (entId.size() > 0) {
//            Session s = getMySession();
//            List<HiposAsignaciones> l = new ArrayList();
//            try {
//                Criteria c = s.createCriteria(HiposAsignaciones.class);
//                String byField = "";
//                if (byType.equals("entity")) {
//                    byField = "idEntity";
//                } else {
//                    byField = "id";
//                }
//                c.add(Restrictions.in(byField, entId));
//                l = c.list();
//                for (Iterator it = l.iterator(); it.hasNext();) {
//                    HiposAsignaciones object = (HiposAsignaciones) it.next();
//                    s.beginTransaction();
//                    s.delete(object);
//                    s.getTransaction().commit();
//                    counter++;
//                }
//            } catch (HibernateException hibernateException) {
//                result = false;
//                throw hibernateException;
//            } finally {
//                s.close();
//            }
//
//            if (counter != l.size()) {
//                result = false;
//                throw new Exception("Not all the records where deleted");
//            }
//        }
//        return result;
//    }
//
//    public Date now() {
//        Calendar cal = Calendar.getInstance();
//        return cal.getTime();
//    }
//
    private Session getMySession() {
        Session s = HIPOSHibernateUtils.getSessionFactory().openSession();
        return s;
    }
}
