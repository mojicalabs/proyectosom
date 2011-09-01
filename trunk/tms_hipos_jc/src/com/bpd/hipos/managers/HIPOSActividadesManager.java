/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.hipos.managers;

import com.bpd.hipos.pojos.HipoActividades;
import com.bpd.hipos.utils.HIPOSHibernateUtils;
import com.bpd.hipos.vos.ActividadesLoadVO;
import com.bpd.hipos.vos.ActivityAssignmentVO;
import com.bpd.hipos.vos.ActivityVO;
import com.google.gson.Gson;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;
import java.util.Iterator;
import java.util.List;
import org.hibernate.Criteria;
import org.hibernate.HibernateException;
import org.hibernate.Session;
import org.hibernate.criterion.Restrictions;

/**
 *
 * @author u19730
 */
public class HIPOSActividadesManager {

    public List<ActivityVO> getActivities(Integer idEntity) throws Exception {
        System.out.println("getActivities: " + idEntity);
        Session s = getMySession();
        Criteria c = s.createCriteria(HipoActividades.class);
        c.add(Restrictions.eq("idEntity", idEntity));
        List<HipoActividades> l = new ArrayList();
        List<ActivityVO> lout = new ArrayList();
        l = c.list();
        for (Iterator<HipoActividades> it = l.iterator(); it.hasNext();) {
            HipoActividades ha = it.next();
            ActivityVO aVO = new ActivityVO();
            aVO.id = ha.getId();
            aVO.name = ha.getName();
            aVO.idType = ha.getIdType();
            aVO.status = ha.getStatus();
            lout.add(aVO);
        }
        s.close();
        return lout;
    }

    public List<ActivityAssignmentVO> getActivitiesAsignment(Integer idEntity) throws Exception {
        System.out.println("getActivities: " + idEntity);
        Session s = getMySession();
        Criteria c = s.createCriteria(HipoActividades.class);
        c.add(Restrictions.eq("idEntity", idEntity));
        List<HipoActividades> l = new ArrayList();
        List<ActivityAssignmentVO> lout = new ArrayList();
        l = c.list();
        for (Iterator<HipoActividades> it = l.iterator(); it.hasNext();) {
            HipoActividades ha = it.next();
            ActivityAssignmentVO aVO = new ActivityAssignmentVO();
            aVO.id = ha.getId();
            aVO.name = ha.getName();
            aVO.idType = ha.getIdType();
            aVO.status = ha.getStatus();
            aVO.startDate = null;
            aVO.endDate = null;
            lout.add(aVO);
        }
        s.close();
        return lout;
    }

    public ActividadesLoadVO getActivity(Integer idActivity) throws Exception {
        System.out.println("getActivity: " + idActivity);
        Session s = getMySession();
        Criteria c = s.createCriteria(HipoActividades.class);
        c.add(Restrictions.eq("id", idActivity));
        HipoActividades data = (HipoActividades) c.uniqueResult();
        ActividadesLoadVO aVO = new ActividadesLoadVO();
        if (data != null) {
            aVO.id = data.getId();
            aVO.name = data.getName();
            aVO.idEntity = data.getIdEntity();
            aVO.idType = data.getIdType();
            aVO.status = data.getStatus();
        }
        s.close();
        return aVO;
    }

    public Boolean setActivities(List<ActivityVO> activities, Integer entId, Session s) throws Exception {
        System.out.println("setActivities: " + entId);
        Boolean result = true;
        try {
            for (Iterator<ActivityVO> it = activities.iterator(); it.hasNext();) {
                ActivityVO object = it.next();
                if (object != null) {
                    HipoActividades ha = new HipoActividades();

                    if (object.id != null && object.id != 0) {
                        ha.setId(object.id);
                    }

                    ha.setName(object.name);
                    ha.setIdEntity(entId);
                    ha.setIdType(object.idType);
                    ha.setStatus(object.status);

                    try {
                        s.beginTransaction();
                        s.saveOrUpdate(ha);
                        s.getTransaction().commit();
                    } catch (HibernateException he) {
                        System.out.println("setActivities / Hibernate: " + he.getMessage());
                        result = false;
                    }
                }
            }
        } catch (Exception e) {
            System.out.println("setActivities / Otro error: " + e.getMessage());
            result = false;
        } finally {
            return result;
        }
    }

    public Boolean delActivity(List<Integer> entId, String byType) throws Exception {
        Gson gson = new Gson();
        System.out.println("delEntity: " + gson.toJson(entId));
        int counter = 0;
        Boolean result = true;
        if (entId.size() > 0) {
            Session s = getMySession();
            List<HipoActividades> l = new ArrayList();
            try {
                Criteria c = s.createCriteria(HipoActividades.class);
                String byField = "";
                if (byType.equals("entity")) {
                    byField = "idEntity";
                } else {
                    byField = "id";
                }
                c.add(Restrictions.in(byField, entId));
                l = c.list();
                for (Iterator it = l.iterator(); it.hasNext();) {
                    HipoActividades object = (HipoActividades) it.next();
                    s.beginTransaction();
                    s.delete(object);
                    s.getTransaction().commit();
                    counter++;
                }
            } catch (HibernateException hibernateException) {
                result = false;
                throw hibernateException;
            } finally {
                s.close();
            }

            if (counter != l.size()) {
                result = false;
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
}
