/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.hipos.managers;

import com.bpd.hipos.pojos.HipoActividades;
import com.bpd.hipos.pojos.HipoTiposCategorias;
import com.bpd.hipos.utils.HIPOSHibernateUtils;
import com.bpd.hipos.vos.TipoCategoriaVO;
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
public class HIPOSTiposCategoriasManager {

    Gson gson = new Gson();

    public List<TipoCategoriaVO> getTiposCategorias(String breAct, String tipCat) throws Exception {
        System.out.println("getTiposCategories");
        Session s = getMySession();
        Criteria c = s.createCriteria(HipoTiposCategorias.class);
        c.add(Restrictions.eq("breAct", breAct));
        c.add(Restrictions.eq("tipCat", tipCat));
        List<HipoTiposCategorias> l = new ArrayList();
        List<TipoCategoriaVO> lout = new ArrayList();
        l = c.list();
        for (Iterator<HipoTiposCategorias> it = l.iterator(); it.hasNext();) {
            HipoTiposCategorias htc = it.next();
            TipoCategoriaVO aVO = new TipoCategoriaVO();
            aVO.id = htc.getId();
            aVO.name = htc.getName();
            aVO.breAct = htc.getBreAct();
            aVO.tipCat = htc.getTipCat();
            aVO.status = htc.getStatus();
            lout.add(aVO);
        }
        s.close();
        return lout;
    }

    public Boolean setTipoCategoria(TipoCategoriaVO tcVO) throws Exception {
        System.out.println("setTipoCategoria: " + gson.toJson(tcVO));
        Boolean result = true;
        Session s = getMySession();
        try {
            if (tcVO != null) {
                HipoTiposCategorias ha = new HipoTiposCategorias();
                if (tcVO.id != null && tcVO.id != 0) {
                    ha.setId(tcVO.id);
                }
                ha.setName(tcVO.name);
                ha.setBreAct(tcVO.breAct);
                ha.setTipCat(tcVO.tipCat);
                ha.setStatus(tcVO.status);

                s.beginTransaction();
                s.saveOrUpdate(ha);
                s.getTransaction().commit();
            }
        } catch (Exception e) {
            System.out.println("Error en setTipoCategoria: " + gson.toJson(tcVO));
            System.out.println(e.getMessage());
            result = false;
            throw e;
        } finally {
            s.close();
            return result;
        }
    }

    public Boolean delTipoCategoria(int entId) throws Exception {
        Gson gson = new Gson();
        System.out.println("START delTipoCategoria: " + gson.toJson(entId));
        int counter = 0;
        Boolean result = true;
        if (entId > 0) {
            Session s = getMySession();
            Criteria c = s.createCriteria(HipoTiposCategorias.class);
            c.add(Restrictions.eq("id", entId));
            List<HipoTiposCategorias> l = c.list();
            HipoTiposCategorias objectError = new HipoTiposCategorias();
            try {
                for (Iterator<HipoTiposCategorias> it = l.iterator(); it.hasNext();) {
                    HipoTiposCategorias object = it.next();
                    s.beginTransaction();
                    s.delete(object);
                    s.getTransaction().commit();
                    counter++;
                }
            } catch (HibernateException e) {
                System.out.println("Error en delTipoCategoria: " + gson.toJson(objectError));
                System.out.println(e.getMessage());
                result = false;
                throw e;
            } finally {
                s.close();
            }

            if (counter != l.size()) {
                result = false;
                throw new Exception("Not all the records where deleted");
            }
        }
        System.out.println("END delTipoCategoria");
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
