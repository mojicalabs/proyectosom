/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package pk_managers;

import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;
import org.hibernate.Criteria;
import org.hibernate.HibernateException;
import org.hibernate.Session;
import org.hibernate.criterion.Restrictions;
import pk_pojos.TmsCompetencies;
import pk_pojos.TmsJobCompetenciesValues;
import pk_pojos.TmsJobGeneralInfos;
import pk_util.UtilPojosModel;
import pk_vo.NormalCompetencyVO;
import pk_vo.SpecialCompetencyVO;

/**
 * @author u19730
 */
public class ManagerCompetencies {

    // <editor-fold defaultstate="collapsed" desc="crud for competencies">
    public List<SpecialCompetencyVO> getJobCompetencies(Integer jobId) {
        Session s = getMySession();
        Criteria c = s.createCriteria(TmsCompetencies.class);
        c.add(Restrictions.eq("competencyType", 2));
        List l = c.list();
        List<SpecialCompetencyVO> lout = new ArrayList();
        try {
            for (Iterator it = l.iterator(); it.hasNext();) {
                TmsCompetencies object = (TmsCompetencies) it.next();
                SpecialCompetencyVO scvo = new SpecialCompetencyVO();
                scvo.competencyLabel = object.getName();
                scvo.competencyList = getNormalCompetencies(jobId, object.getComplements());
                lout.add(scvo);
            }
        } catch (HibernateException hibernateException) {
            throw hibernateException;
        } finally {
            s.close();
        }

        return lout;
    }

    public List<NormalCompetencyVO> getNormalCompetencies(Integer jobId, String compIds) {
        Session s = getMySession();
        Criteria c = s.createCriteria(TmsCompetencies.class);
        String[] compIdsArrayString = compIds.split(",");
        List compIdsArray = new ArrayList();
        for (int i = 0; i < compIdsArrayString.length; i++) {
            if (!compIdsArrayString[i].equals(null)) {
                compIdsArray.add(Integer.parseInt(compIdsArrayString[i]));
            }
        }
        c.add(Restrictions.in("id", compIdsArray));
        List l = c.list();
        List<NormalCompetencyVO> lout = new ArrayList();
        try {
            for (Iterator it = l.iterator(); it.hasNext();) {
                TmsCompetencies object = (TmsCompetencies) it.next();
                NormalCompetencyVO ncvo = new NormalCompetencyVO();
                TmsJobCompetenciesValues jcv = getJobCompetencyValueByJobCompetency(jobId, object.getId());
                if (jcv != null) {
                    ncvo.id = jcv.getId();
                    ncvo.cnValue = jcv.getCnValue();
                } else {
                    ncvo.id = null;
                    ncvo.cnValue = null;
                }
                ncvo.job_id = jobId;
                ncvo.competency_id = object.getId();
                ncvo.cnLabel = object.getName();
                lout.add(ncvo);
            }
        } catch (HibernateException hibernateException) {
            throw hibernateException;
        } finally {
            s.close();
        }

        return lout;
    }

    private TmsJobCompetenciesValues getJobCompetencyValueByJobCompetency(Integer jobId, Integer jcvId) {
        Session s = getMySession();
        Criteria c = s.createCriteria(TmsJobCompetenciesValues.class);
        c.add(Restrictions.eq("jobId", jobId));
        c.add(Restrictions.eq("competencyId", jcvId));
        TmsJobCompetenciesValues obj = (TmsJobCompetenciesValues) c.uniqueResult();
        if (obj == null) {
            Integer jobIdParent = getCompetencyLevel(jobId);
            obj = getJobCompetencyValueByParent(jobIdParent, jcvId);
            if (obj == null) {
                Integer jobIdParentEmp = getCompetencyLevel(jobIdParent);
                obj = getJobCompetencyValueByParent(jobIdParentEmp, jcvId);
                if (obj != null) {
                    obj.setId(null);
                    obj.setJobId(jobId);
                }
            } else {
                obj.setId(null);
                obj.setJobId(jobId);
            }
        }
        return obj;
    }

    public Integer getCompetencyLevel(Integer jobId) {
        Integer valorInt = null;
        if (jobId != null) {
            Session s = getMySession();
            Criteria c = s.createCriteria(TmsJobGeneralInfos.class);
            c.add(Restrictions.eq("id", jobId));
            TmsJobGeneralInfos obj = (TmsJobGeneralInfos) c.uniqueResult();
            String valueString = obj.getDescriptionGroup();
            if (!valueString.isEmpty()) {
                valorInt = Integer.parseInt(valueString);
            } else {
                valorInt = null;
            }
            System.out.println(valorInt);
            return valorInt;
        } else {
            return valorInt;
        }
    }

    private TmsJobCompetenciesValues getJobCompetencyValueByParent(Integer jobId, Integer jcvId) {
        Session s = getMySession();
        Criteria c = s.createCriteria(TmsJobCompetenciesValues.class);
        c.add(Restrictions.eq("jobId", jobId));
        c.add(Restrictions.eq("competencyId", jcvId));
        TmsJobCompetenciesValues obj = (TmsJobCompetenciesValues) c.uniqueResult();
        return obj;
    }

    public TmsJobCompetenciesValues setJobCompetency(TmsJobCompetenciesValues cnObject) {
        Session s = getMySession();
        s.beginTransaction();
        s.saveOrUpdate(cnObject);
        s.getTransaction().commit();
        s.close();

        TmsJobCompetenciesValues jcv = getJobCompetencyValueByJobCompetency(cnObject.getJobId(), cnObject.getCompetencyId());
        return jcv;
    }

    private TmsJobCompetenciesValues getJobCompetency(Integer jcvId) {
        Session s = getMySession();
        Criteria c = s.createCriteria(TmsJobCompetenciesValues.class);
        c.add(Restrictions.eq("id", jcvId));
        TmsJobCompetenciesValues obj = (TmsJobCompetenciesValues) c.uniqueResult();
        return obj;
    }

    public int delJobCompetency(int jcvId) throws Exception {
        Session s = getMySession();
        Criteria c = s.createCriteria(TmsJobCompetenciesValues.class);
        c.add(Restrictions.eq("id", jcvId));
        List l = c.list();
        int result = 0;
        try {
            for (Iterator it = l.iterator(); it.hasNext();) {
                TmsJobCompetenciesValues object = (TmsJobCompetenciesValues) it.next();
                s.beginTransaction();
                s.delete(object);
                s.getTransaction().commit();
                result++;
            }
        } catch (HibernateException hibernateException) {
            throw hibernateException;
        } finally {
            s.close();
        }

        if (result != l.size()) {
            throw new Exception("Not all the records where deleted");
        }
        return result;
    }

    private Session getMySession() {
        Session s = UtilPojosModel.getSessionFactory().openSession();
        return s;
    }

    public String getJobGeneralInfoLeadershipStyle(Integer jobId) {
        Session s = getMySession();
        TmsJobGeneralInfos data = new TmsJobGeneralInfos();
        data = (TmsJobGeneralInfos) s.get(TmsJobGeneralInfos.class, jobId);
        s.close();
        //s.getSessionFactory().close();

        return data.getLeadershipStyle();
    }

    // </editor-fold>
}
