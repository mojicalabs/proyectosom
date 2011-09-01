/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.hipos.managers;

import com.bpd.hipos.pojos.HiposTarifarioSeguroMedicoInternacional;
import com.bpd.hipos.utils.HIPOSHibernateUtils;
import com.google.gson.Gson;
import org.hibernate.HibernateException;
import org.hibernate.Query;
import org.hibernate.Session;

/**
 *
 * @author u19730
 */
public class HIPOSInternationalAssuranceManager {

    public Double getInternationalAssuranceAmmount(String hipoType, String hipoGender, Integer hipoAge) throws Exception {
        Gson gson = new Gson();
        System.out.println("START getInternationalAssuranceAmmount: hipoType = " + hipoType + " | hipoGender = " + hipoGender + " | hipoAge = " + hipoAge);
        Double result = 0.00;
        if (hipoAge > 0 && !hipoType.equals("") && !hipoGender.equals("")) {
            Session s = getMySession();
            try {
                if (hipoAge > 23 && hipoType.equals("P")) {
                    hipoType = "E";
                }
                String hql = "from HiposTarifarioSeguroMedicoInternacional where type = '" + hipoType + "' and " + hipoAge + " between minAge and maxAge";
                Query q = s.createQuery(hql);
                q.setMaxResults(1);
                HiposTarifarioSeguroMedicoInternacional object = (HiposTarifarioSeguroMedicoInternacional) q.uniqueResult();
                System.out.println("MID getInternationalAssuranceAmmount: object = " + gson.toJson(object));
                if (object != null) {
                    if (hipoGender.equals("M")) {
                        result = object.getAmmountM().doubleValue();
                    } else if (hipoGender.equals("F")) {
                        result = object.getAmmountF().doubleValue();
                    } else {
                        result = 0.00;
                    }
                }
            } catch (HibernateException hibernateException) {
                throw hibernateException;
            } catch (Exception e) {
                throw e;
            } finally {
                s.close();
            }
        }
        System.out.println("END getInternationalAssuranceAmmount: result = " + result);
        return result;
    }

    private Session getMySession() {
        Session s = HIPOSHibernateUtils.getSessionFactory().openSession();
        return s;
    }
}
