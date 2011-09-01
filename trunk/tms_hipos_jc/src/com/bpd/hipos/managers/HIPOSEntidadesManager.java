/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.hipos.managers;

import com.bpd.hipos.pojos.HipoEntidades;
import com.bpd.hipos.pojos.HiposAsignaciones;
import com.bpd.hipos.utils.HIPOSHibernateUtils;
import com.bpd.hipos.vos.ActividadesSaveVO;
import com.bpd.hipos.vos.ActivityVO;
import com.bpd.hipos.vos.EmployeeEntityAssignmnetVO;
import com.bpd.hipos.vos.EntidadesSaveVO;
import com.bpd.hipos.vos.EntityAssignmentVO;
import com.bpd.hipos.vos.EntityVO;
import com.google.gson.Gson;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;
import java.util.Iterator;
import java.util.List;
import org.hibernate.Criteria;
import org.hibernate.HibernateException;
import org.hibernate.Session;
import org.hibernate.criterion.MatchMode;
import org.hibernate.criterion.Order;
import org.hibernate.criterion.Restrictions;

/**
 *
 * @author u19730
 */
public class HIPOSEntidadesManager extends HIPOSActividadesManager {

    public List<EntityVO> getEntities(String entType) throws Exception {
        System.out.println("START getEntities");
        Session s = getMySession();
        Criteria c = s.createCriteria(HipoEntidades.class);
        c.add(Restrictions.eq("type", entType));
        c.addOrder(Order.asc("name"));
        List<HipoEntidades> list = new ArrayList();
        List<EntityVO> lout = new ArrayList();
        list = c.list();
        for (Iterator<HipoEntidades> it = list.iterator(); it.hasNext();) {
            HipoEntidades he = it.next();
            EntityVO eVO = new EntityVO();
            eVO.id = he.getId();
            eVO.name = he.getName();
            eVO.category = he.getCategory();
            eVO.type = he.getType();
            eVO.status = he.getStatus();
            eVO.activities = getActivities(he.getId());
            lout.add(eVO);
        }
        s.close();
        System.out.println("END getEntities");
        return lout;
    }

    public EntityVO getEntity(Integer entId) throws Exception {
        System.out.println("START getEntities");
        Session s = getMySession();
        Criteria c = s.createCriteria(HipoEntidades.class);
        c.add(Restrictions.eq("id", entId));
        HipoEntidades data = (HipoEntidades) c.uniqueResult();
        EntityVO eVO = new EntityVO();
        if (data != null) {
            eVO.id = data.getId();
            eVO.name = data.getName();
            eVO.category = data.getCategory();
            eVO.type = data.getType();
            eVO.status = data.getStatus();
            eVO.activities = getActivities(data.getId());
        }
        s.close();
        System.out.println("END getEntities");
        return eVO;
    }

    public List<EntityVO> getEntitiesByName(String entType, String entName) throws Exception {
        System.out.println("START getEntities");
        Session s = getMySession();
        Criteria c = s.createCriteria(HipoEntidades.class);
        c.add(Restrictions.eq("type", entType));
        c.add(Restrictions.like("name", entName, MatchMode.ANYWHERE));
        c.addOrder(Order.asc("name"));
        List<HipoEntidades> list = new ArrayList();
        List<EntityVO> lout = new ArrayList();
        list = c.list();
        for (Iterator<HipoEntidades> it = list.iterator(); it.hasNext();) {
            HipoEntidades he = it.next();
            EntityVO eVO = new EntityVO();
            eVO.id = he.getId();
            eVO.name = he.getName();
            eVO.category = he.getCategory();
            eVO.type = he.getType();
            eVO.status = he.getStatus();
            eVO.activities = getActivities(he.getId());
            lout.add(eVO);
        }
        s.close();
        System.out.println("END getEntities");
        return lout;
    }

    public List<EntityAssignmentVO> getEntitiesAssignmentByName(String entType, String entName) throws Exception {
        System.out.println("START getEntities");
        Session s = getMySession();
        Criteria c = s.createCriteria(HipoEntidades.class);
        c.add(Restrictions.eq("type", entType));
        c.add(Restrictions.like("name", entName, MatchMode.ANYWHERE));
        c.addOrder(Order.asc("name"));
        List<HipoEntidades> list = new ArrayList();
        List<EntityAssignmentVO> lout = new ArrayList();
        list = c.list();
        for (Iterator<HipoEntidades> it = list.iterator(); it.hasNext();) {
            HipoEntidades he = it.next();
            EntityAssignmentVO eVO = new EntityAssignmentVO();
            eVO.id = he.getId();
            eVO.name = he.getName();
            eVO.category = he.getCategory();
            eVO.type = he.getType();
            eVO.status = he.getStatus();
            eVO.activities = getActivitiesAsignment(he.getId());
            lout.add(eVO);
        }
        s.close();
        System.out.println("END getEntities");
        return lout;
    }

    public Boolean setEntity(EntityVO eVO) throws Exception {
        Gson gson = new Gson();
        System.out.println("setEntity: " + gson.toJson(eVO));
        Session s = getMySession();
        Boolean result = true;
        try {
            HipoEntidades data = new HipoEntidades();

            if (eVO.id != null && eVO.id != 0) {
                data.setId(eVO.id);
            }

            data.setName(eVO.name);
            data.setType(eVO.type);
            data.setCategory(eVO.category);
            data.setStatus(eVO.status);

            try {
                s.beginTransaction();
                s.saveOrUpdate(data);
                s.getTransaction().commit();
            } catch (HibernateException he) {
                System.out.println(he.getMessage());
                result = false;
            }

            eVO.id = data.getId();

            List qObjInDb = getActivities(eVO.id);
            List evaDBStr = new ArrayList();
            List evaFrmStr = new ArrayList();
            for (Iterator<ActivityVO> it6 = qObjInDb.iterator(); it6.hasNext();) {
                ActivityVO aObj = it6.next();
                evaDBStr.add(aObj.id);
            }
            if (eVO.activities != null) {
                if (eVO.activities.size() > 0) {
                    for (Iterator<ActivityVO> it7 = eVO.activities.iterator(); it7.hasNext();) {
                        ActivityVO elObj = it7.next();
                        if (elObj != null) {
                            if (elObj.id != null) {
                                evaFrmStr.add(elObj.id);
                            }
                        }
                    }
                }
            }

            evaDBStr.removeAll(evaFrmStr);

            List qObjDiff = evaDBStr;
            if (qObjDiff.size() > 0) {
                delActivity(qObjDiff, "id");
            }

            if (eVO.activities != null) {
                if (eVO.activities.size() >= 0) {
                    result = setActivities(eVO.activities, data.getId(), s);
                }
            }
        } catch (Exception e) {
            System.out.println(e.getMessage());
        } finally {
            s.close();
            System.out.println("END setEntity: " + gson.toJson(eVO));
            return result;
        }
    }

    public Boolean delEntity(int entId) throws Exception {
        Gson gson = new Gson();
        System.out.println("START delEntity: " + gson.toJson(entId));
        int counter = 0;
        Boolean result = true;
        if (entId > 0) {
            Session s = getMySession();
            Criteria c = s.createCriteria(HipoEntidades.class);
            c.add(Restrictions.eq("id", entId));
            List<HipoEntidades> l = c.list();
            try {
                for (Iterator<HipoEntidades> it = l.iterator(); it.hasNext();) {
                    HipoEntidades object = it.next();
                    s.beginTransaction();
                    s.delete(object);
                    s.getTransaction().commit();
                    counter++;
                }
                List<Integer> delActArr = new ArrayList();
                delActArr.add(entId);
                delActivity(delActArr, "entity");
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
        System.out.println("END delEntity");
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
