/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package pk_managers_employee;

import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;
import org.hibernate.Criteria;
import org.hibernate.Session;
import org.hibernate.criterion.MatchMode;
import org.hibernate.criterion.Order;
import org.hibernate.criterion.Restrictions;
import pk_pojos.TmsSurveyManagerSessions;
import pk_pojos.VwSsMaEmpleadosActivos;
import pk_util.UtilPojosModel;
import pk_utils.StringManager;
import pk_vo.EmployeeVO;

/**
 * @author u19730
 */
public class ManagerEmployee {

    public List<EmployeeVO> getCollaborators(String mgr_emp_id_str) {
        Session s = getMySession();
        mgr_emp_id_str = mgr_emp_id_str.replace("u", "");
        mgr_emp_id_str = mgr_emp_id_str.replace("U", "");
        Integer mgr_emp_id = Integer.parseInt(mgr_emp_id_str);
        Criteria c = s.createCriteria(VwSsMaEmpleadosActivos.class);
        c.add(Restrictions.eq("mgrEmpId", mgr_emp_id));
        List<VwSsMaEmpleadosActivos> l = new ArrayList();
        l = c.list();
        List lout = new ArrayList();
        for (Iterator it = l.iterator(); it.hasNext();) {
            VwSsMaEmpleadosActivos object = (VwSsMaEmpleadosActivos) it.next();
            EmployeeVO evo = new EmployeeVO();
            evo = getObject(object, "Colaborador");
            lout.add(evo);
        }
        s.close();
        return lout;
    }

    public List<EmployeeVO> getEvaluators(String userIdStr) {
        Session s = getMySession();
        List<EmployeeVO> eva = new ArrayList();
        List<EmployeeVO> col = new ArrayList();
        EmployeeVO man = new EmployeeVO();
        eva = getCollaborators(userIdStr);
        col = getColeagues(userIdStr);
        for (Iterator<EmployeeVO> it = col.iterator(); it.hasNext();) {
            EmployeeVO employeeVO = it.next();
            eva.add(employeeVO);
        }
        man = getManager(userIdStr);
        eva.add(man);
        return eva;
    }

    public String cleanUnidad(String unidadId) {
        StringManager sm = new StringManager();
        String unidadIdOut = sm.left(unidadId, 8);
        return unidadIdOut;
    }

    public List<EmployeeVO> getColeagues(String userIdStr) {
        Session s = getMySession();
        VwSsMaEmpleadosActivos dataEmp = getEmployeeData(userIdStr);
        List<EmployeeVO> lout = new ArrayList();
        if (dataEmp != null) {
            String payGradeCode = dataEmp.getPayGradeCode();
            Integer mgrEmpId = dataEmp.getMgrEmpId();
            Criteria c = s.createCriteria(VwSsMaEmpleadosActivos.class);
            userIdStr = userIdStr.replace("u", "");
            userIdStr = userIdStr.replace("U", "");
            Integer userId = Integer.parseInt(userIdStr);
            c.add(Restrictions.eq("mgrEmpId", mgrEmpId));
            c.add(Restrictions.ne("codigoEmpleado", userId));
            c.add(Restrictions.ge("payGradeCode", payGradeCode));
            List<VwSsMaEmpleadosActivos> l = new ArrayList();
            l = c.list();
            for (Iterator it = l.iterator(); it.hasNext();) {
                VwSsMaEmpleadosActivos object = (VwSsMaEmpleadosActivos) it.next();
                EmployeeVO evo = new EmployeeVO();
                evo = getObject(object, "Colega");
                lout.add(evo);
            }
            s.close();
        }
        return lout;
    }

    public List<EmployeeVO> getEvaluatorsNotSelected(String userIdStr, Integer issueId) {
        Session s = getMySession();
        List<EmployeeVO> eva = new ArrayList();
        EmployeeVO man = new EmployeeVO();
        List<EmployeeVO> ele = new ArrayList();
        List<String> eleStr = new ArrayList();
        List<EmployeeVO> evaout = new ArrayList();
        List<String> evaStr = new ArrayList();
        eva = getCollaborators(userIdStr);
        man = getManager(userIdStr);
        eva.add(man);
        for (Iterator<EmployeeVO> it = eva.iterator(); it.hasNext();) {
            EmployeeVO evObj = it.next();
            evaStr.add(evObj.codigoEmpleado.toString());
        }
        ele = getEvaluatorsSelected(userIdStr, issueId);
        for (Iterator<EmployeeVO> it = ele.iterator(); it.hasNext();) {
            EmployeeVO elObj = it.next();
            eleStr.add(elObj.codigoEmpleado.toString());
        }
        evaStr.removeAll(eleStr);
        for (Iterator<EmployeeVO> it = eva.iterator(); it.hasNext();) {
            EmployeeVO evObj = it.next();
            if (evaStr.indexOf(evObj.codigoEmpleado.toString()) > -1) {
                evaout.add(evObj);
            }
        }
        return evaout;
    }

    public List<EmployeeVO> getEvaluatorsSelected(String userIdStr, Integer issueId) {
        Session s = getMySession();
        ManagerEmployee me = new ManagerEmployee();
        Criteria c = s.createCriteria(TmsSurveyManagerSessions.class);
        c.add(Restrictions.eq("subjectUser", userIdStr));
        c.add(Restrictions.eq("issueId", issueId));
        List<TmsSurveyManagerSessions> l = new ArrayList();
        l = c.list();
        List<EmployeeVO> lout = new ArrayList();
        for (Iterator<TmsSurveyManagerSessions> it = l.iterator(); it.hasNext();) {
            TmsSurveyManagerSessions data = it.next();
            if (!data.getLogonUser().toString().equals(userIdStr.toString())) {
                VwSsMaEmpleadosActivos dataEmp = me.getEmployeeData(data.getLogonUser());
                EmployeeVO eVO = new EmployeeVO();
                eVO = passDataEmpToVO(data, dataEmp);
                lout.add(eVO);
            }
        }
        s.close();
        return lout;
    }

    public EmployeeVO passDataEmpToVO(TmsSurveyManagerSessions data, VwSsMaEmpleadosActivos dataEmp) {
        EmployeeVO eVO = new EmployeeVO();
        eVO.codigoEmpleado = "U" + dataEmp.getCodigoEmpleado().toString();
        eVO.nombreEmpleado = dataEmp.getNombreEmpleado();
        eVO.empPhoto = dataEmp.getEmpPhoto();
        eVO.rutaPhoto = dataEmp.getRutaPhoto();
        eVO.cargo = dataEmp.getCargo();
        eVO.dependencia = dataEmp.getDepartamento();
        eVO.sentMail = data.getEmailSent();
        eVO.status = "";
        return eVO;
    }

    public List<VwSsMaEmpleadosActivos> getEmployeesDataByUnidad(String unidadId, String payGradeCode) {
        Session s = getMySession();
        Criteria c = s.createCriteria(VwSsMaEmpleadosActivos.class);
        c.add(Restrictions.like("unidad", unidadId, MatchMode.START));
        c.add(Restrictions.eq("payGradeCode", payGradeCode));
        List<VwSsMaEmpleadosActivos> data = c.list();
        s.close();
        return data;
    }

    public VwSsMaEmpleadosActivos getEmployeeData(String userIdStr) {
        Session s = getMySession();
        userIdStr = userIdStr.replace("u", "");
        userIdStr = userIdStr.replace("U", "");
        Integer userId = Integer.parseInt(userIdStr);
        Criteria c = s.createCriteria(VwSsMaEmpleadosActivos.class);
        c.add(Restrictions.eq("codigoEmpleado", userId));
        VwSsMaEmpleadosActivos data = (VwSsMaEmpleadosActivos) c.uniqueResult();
        s.close();
        return data;
    }

    public EmployeeVO getEmployee(String userIdStr) {
        System.out.println("userIdStr: " + userIdStr);
        VwSsMaEmpleadosActivos data = getEmployeeData(userIdStr);
        EmployeeVO evo = new EmployeeVO();
        evo = getObject(data, "");
        return evo;
    }

    public List<EmployeeVO> getEmployeesAlpha(String userName) {
        Session s = getMySession();
        Criteria c = s.createCriteria(VwSsMaEmpleadosActivos.class);
        c.add(Restrictions.like("nombreEmpleado", userName, MatchMode.START));
        c.addOrder(Order.asc("nombreEmpleado"));
        List<VwSsMaEmpleadosActivos> l = new ArrayList();
        l = c.list();
        List lout = new ArrayList();
        for (Iterator it = l.iterator(); it.hasNext();) {
            VwSsMaEmpleadosActivos object = (VwSsMaEmpleadosActivos) it.next();
            EmployeeVO evo = new EmployeeVO();
            evo = getObject(object, "");
            lout.add(evo);
        }
        s.close();
        return lout;
    }

    public List<VwSsMaEmpleadosActivos> getEmployees() {
        Session s = getMySession();
        Criteria c = s.createCriteria(VwSsMaEmpleadosActivos.class);
        /********************** BORRAR ***********************/
//        List<Integer> codEmpArr = new ArrayList();
//        codEmpArr.add(28915);
//        codEmpArr.add(28911);
//        codEmpArr.add(28492);
//        codEmpArr.add(28021);
//        codEmpArr.add(24807);
//        codEmpArr.add(24665);
//        codEmpArr.add(24285);
//        codEmpArr.add(24248);
//        codEmpArr.add(23758);
//        codEmpArr.add(23675);
//        codEmpArr.add(23526);
//        codEmpArr.add(23318);
//        codEmpArr.add(23181);
//        codEmpArr.add(23093);
//        codEmpArr.add(22838);
//        codEmpArr.add(22750);
//        codEmpArr.add(22673);
//        codEmpArr.add(22589);
//        codEmpArr.add(22517);
//        codEmpArr.add(22444);
//        codEmpArr.add(22411);
//        codEmpArr.add(22410);
//        codEmpArr.add(22409);
//        codEmpArr.add(22225);
//        codEmpArr.add(21746);
//        codEmpArr.add(21564);
//        codEmpArr.add(21496);
//        codEmpArr.add(21361);
//        codEmpArr.add(21248);
//        codEmpArr.add(21101);
//        codEmpArr.add(20938);
//        codEmpArr.add(20696);
//        codEmpArr.add(20557);
//        codEmpArr.add(20411);
//        codEmpArr.add(20375);
//        codEmpArr.add(20344);
//        codEmpArr.add(20019);
//        codEmpArr.add(19743);
//        codEmpArr.add(19689);
//        codEmpArr.add(19603);
//        codEmpArr.add(19475);
//        codEmpArr.add(19455);
//        codEmpArr.add(19449);
//        codEmpArr.add(19376);
//        codEmpArr.add(19283);
//        codEmpArr.add(19275);
//        codEmpArr.add(19107);
//        codEmpArr.add(19062);
//        codEmpArr.add(18899);
//        codEmpArr.add(18742);
//        codEmpArr.add(18698);
//        codEmpArr.add(18644);
//        codEmpArr.add(18404);
//        codEmpArr.add(18403);
//        codEmpArr.add(18299);
//        codEmpArr.add(18285);
//        codEmpArr.add(18057);
//        codEmpArr.add(17854);
//        codEmpArr.add(17438);
//        codEmpArr.add(17343);
//        codEmpArr.add(17044);
//        codEmpArr.add(16966);
//        codEmpArr.add(16934);
//        codEmpArr.add(16924);
//        codEmpArr.add(16913);
//        codEmpArr.add(16856);
//        codEmpArr.add(16815);
//        codEmpArr.add(16793);
//        codEmpArr.add(16718);
//        codEmpArr.add(16555);
//        codEmpArr.add(16483);
//        codEmpArr.add(16455);
//        codEmpArr.add(16446);
//        codEmpArr.add(16321);
//        codEmpArr.add(16319);
//        codEmpArr.add(16256);
//        codEmpArr.add(16228);
//        codEmpArr.add(16208);
//        codEmpArr.add(16089);
//        codEmpArr.add(15951);
//        codEmpArr.add(15880);
//        codEmpArr.add(15873);
//        codEmpArr.add(15855);
//        codEmpArr.add(15837);
//        codEmpArr.add(15760);
//        codEmpArr.add(15731);
//        codEmpArr.add(15715);
//        codEmpArr.add(15641);
//        codEmpArr.add(15531);
//        codEmpArr.add(15377);
//        codEmpArr.add(15230);
//        codEmpArr.add(15183);
//        codEmpArr.add(15052);
//        codEmpArr.add(15025);
//        codEmpArr.add(14989);
//        codEmpArr.add(14769);
//        codEmpArr.add(14761);
//        codEmpArr.add(14755);
//        codEmpArr.add(14532);
//        codEmpArr.add(14350);
//        codEmpArr.add(14118);
//        codEmpArr.add(14080);
//        codEmpArr.add(14010);
//        codEmpArr.add(13968);
//        codEmpArr.add(13887);
//        codEmpArr.add(13758);
//        codEmpArr.add(13610);
//        codEmpArr.add(13566);
//        codEmpArr.add(13558);
//        codEmpArr.add(13126);
//        codEmpArr.add(13067);
//        codEmpArr.add(13013);
//        codEmpArr.add(12877);
//        codEmpArr.add(12314);
//        codEmpArr.add(11990);
//        codEmpArr.add(11715);
//        codEmpArr.add(11390);
//        codEmpArr.add(11166);
//        codEmpArr.add(11110);
//        codEmpArr.add(10769);
//        codEmpArr.add(10741);
//        codEmpArr.add(10721);
//        codEmpArr.add(10699);
//        codEmpArr.add(10565);
//        c.add(Restrictions.in("codigoEmpleado", codEmpArr));
        /********************** BORRAR ***********************/
        c.add(Restrictions.eq("empStatusCode", "A"));
        c.add(Restrictions.eq("employmentTypeCode", "01"));
        //List payGradeCodeArr = new ArrayList();
        /*** START GERENTES ***/
//        payGradeCodeArr.add("13");
//        payGradeCodeArr.add("14");
//        payGradeCodeArr.add("15");
//        c.add(Restrictions.in("payGradeCode", payGradeCodeArr));
        /*** END GERENTES ***/
        /*** START VICEPRESIDENTES ***/
        /*** JOHN STRAZZO ***/
//        List<Integer> codEmpArr = new ArrayList();
//        codEmpArr.add(19387);
//        Criterion codigoEmpleado = Restrictions.in("codigoEmpleado", codEmpArr);
        /*** JOHN STRAZZO ***/
//        Criterion payGradeCode = Restrictions.gt("payGradeCode", "15");
//        LogicalExpression orExp = Restrictions.or(codigoEmpleado, payGradeCode);
//        c.add(orExp);
        /*** END VICEPRESIDENTES ***/

        /*** START GERENTES DE DIVISION Y VICEPRESIDENTES ***/
        c.add(Restrictions.gt("payGradeCode", "13"));
        /*** END GERENTES DE DIVISION Y VICEPRESIDENTES ***/

        List<VwSsMaEmpleadosActivos> l = new ArrayList();
        l = c.list();
        s.close();
        return l;
    }

    public EmployeeVO getManager(String userIdStr) {
        VwSsMaEmpleadosActivos employee = getEmployeeData(userIdStr);
        String mgrEmpId = employee.getMgrEmpId().toString();
        VwSsMaEmpleadosActivos manager = getEmployeeData(mgrEmpId);
        EmployeeVO evo = new EmployeeVO();
        evo = getObject(manager, "Supervisor");
        return evo;
    }

    private Session getMySession() {
        Session s = UtilPojosModel.getSessionFactory().openSession();
        return s;
    }

    public EmployeeVO getObject(VwSsMaEmpleadosActivos object, String empType) {
        EmployeeVO evo = new EmployeeVO();
        evo.codigoEmpleado = "U" + object.getCodigoEmpleado();
        evo.nombreEmpleado = object.getNombreEmpleado() + " (" + empType + ")";
        evo.cargo = object.getCargo();
        evo.dependencia = object.getDepartamento();
        evo.mgrEmpId = "U" + object.getMgrEmpId();
        evo.empPhoto = object.getEmpPhoto();
        evo.rutaPhoto = object.getRutaPhoto();
        evo.sentMail = "NO";
        evo.status = "";
        return evo;
    }
}
