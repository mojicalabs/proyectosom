/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.employee.managers;

import com.bpd.employee.helpers.DAOException;
import com.bpd.employee.helpers.MysqlConnectionHelper;
import com.bpd.employee.helpers.SqlServerConnectionHelper;
import com.bpd.employee.vos.EmailVO;
import com.bpd.employee.vos.EmployeePositionVO;
import com.bpd.employee.vos.EmployeeVO;
import com.bpd.employee.vos.ResultClassEmployeeVO;
import com.bpd.employee.vos.ResultClassVO;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;

/**
 *
 * @author Omar Mojica
 */
public class EmployeesModelManager {

    public ResultClassVO getEmployeePositions(String userId) {
        userId = userId.replace("u", "");
        userId = userId.replace("U", "");

        List<EmployeePositionVO> list = new ArrayList();
        Connection c = null;

        ResultClassVO result = new ResultClassVO();

        try {
            c = SqlServerConnectionHelper.getConnection();
            Statement stmt = c.createStatement();
            String sql = "Intervalo_Fecha_En_Posiciones_Empleado_SP " + userId;

            ResultSet rs = stmt.executeQuery(sql);

            while (rs.next()) {
                EmployeePositionVO epVO = new EmployeePositionVO();
                epVO.codigo_empleado = rs.getInt("emp_id");
                epVO.nombre_empleado = strTrim(rs.getString("Nombre"));
                epVO.fecha_efectividad_inicial = formatDate(rs.getDate("eff_dateIni"));
                epVO.fecha_efectividad_final = formatDate(rs.getDate("eff_dateFin"));
                epVO.anos_en_puesto = rs.getInt("Años");
                epVO.meses_en_puesto = rs.getInt("Meses");
                epVO.dias_en_puesto = rs.getInt("Días");
                epVO.cargo = strTrim(rs.getString("Desc_Puesto"));
                epVO.dependencia = strTrim(rs.getString("Dependencia"));
                epVO.empresa = strTrim(rs.getString("Empresa"));
                String anoLabel = "";
                if (epVO.anos_en_puesto > 1) {
                    anoLabel = " Años, ";
                } else {
                    anoLabel = " Año, ";
                }
                String mesLabel = "";
                if (epVO.meses_en_puesto > 1) {
                    mesLabel = " Meses, ";
                } else {
                    mesLabel = " Mes, ";
                }
                String diaLabel = "";
                if (epVO.dias_en_puesto > 1) {
                    diaLabel = " Días";
                } else {
                    diaLabel = " Día";
                }
                epVO.tiempo_en_el_puesto = epVO.anos_en_puesto + anoLabel + epVO.meses_en_puesto + mesLabel + epVO.dias_en_puesto + diaLabel;
                list.add(epVO);
            }

            //order by calification
            //List<EvaluationServicesVO> listOrdered;
            //ordena(list, "calificacion");

            if (list.isEmpty()) {
                result.status = false;
                result.message = "No se encontraron posiciones para este empleado.";
            } else {
                result.value = list;
                result.status = true;
                result.message = "Las posiciones fueron recolectadas con éxito.";
            }
        } catch (SQLException e) {
            //result.message = "Ocurrión un error al guardar las evaluaciones: "+e.getMessage();
            e.printStackTrace();
            throw new DAOException(e);
        } finally {
            SqlServerConnectionHelper.close(c);
        }
        return result;
    }

    public ResultClassEmployeeVO getEmployee(String userId) {
        userId = userId.replace("u", "");
        userId = userId.replace("U", "");

        EmployeeVO data = new EmployeeVO();
        Connection c = null;

        ResultClassEmployeeVO result = new ResultClassEmployeeVO();

        try {
            c = MysqlConnectionHelper.getConnection();
            Statement stmt = c.createStatement();
            String sql = "SELECT * FROM vw_ss_ma_empleados_activos WHERE codigo_empleado = " + userId;

            ResultSet rs = stmt.executeQuery(sql);

            if (rs.next()) {
                EmployeeVO epVO = new EmployeeVO();
                epVO.id = rs.getInt("id");
                epVO.codigoEmpleado = rs.getInt("codigo_empleado");
                epVO.admRrhh = strTrim(rs.getString("adm_rrhh"));
                epVO.alias = strTrim(rs.getString("alias"));
                epVO.birthDate = strTrim(rs.getString("birth_date"));
                epVO.bloodDonorInd = strTrim(rs.getString("blood_donor_ind"));
                epVO.bloodTypeCode = strTrim(rs.getString("blood_type_code"));
                epVO.cargo = strTrim(rs.getString("cargo"));
                epVO.centro = strTrim(rs.getString("centro"));
                epVO.codigoSupervisorOriginal = strTrim(rs.getString("codigo_supervisor_original"));
                epVO.departamento = strTrim(rs.getString("departamento"));
                epVO.depositAcctNbr = strTrim(rs.getString("deposit_acct_nbr"));
                epVO.empPhoto = strTrim(rs.getString("emp_photo"));
                epVO.empStatusCode = strTrim(rs.getString("emp_status_code"));
                epVO.emplDesc = strTrim(rs.getString("empl_desc"));
                epVO.emplId = strTrim(rs.getString("empl_id"));
                epVO.employmentTypeCode = strTrim(rs.getString("employment_type_code"));
                epVO.firstMiddleName = strTrim(rs.getString("first_middle_name"));
                epVO.firstName = strTrim(rs.getString("first_name"));
                epVO.height = strTrim(rs.getString("height"));
                epVO.hireDate = strTrim(rs.getString("hire_date"));
                epVO.individualId = strTrim(rs.getString("individual_id"));
                epVO.lastName = strTrim(rs.getString("last_name"));
                epVO.locCode = strTrim(rs.getString("loc_code"));
                epVO.mgrEmpId = rs.getInt("mgr_emp_id");
                epVO.nationalId1 = strTrim(rs.getString("national_id_1"));
                epVO.nombreEmpleado = strTrim(rs.getString("nombre_empleado"));
                epVO.payGradeCode = strTrim(rs.getString("pay_grade_code"));
                epVO.phone1AreaCityCode = strTrim(rs.getString("phone_1_area_city_code"));
                epVO.phone1ExtensionNbr = strTrim(rs.getString("phone_1_extension_nbr"));
                epVO.phone1Nbr = strTrim(rs.getString("phone_1_nbr"));
                epVO.polizaId = strTrim(rs.getString("poliza_id"));
                epVO.puesto = strTrim(rs.getString("puesto"));
                epVO.rutaPhoto = strTrim(rs.getString("ruta_photo"));
                epVO.sexCode = strTrim(rs.getString("sex_code"));
                epVO.unidad = strTrim(rs.getString("unidad"));
                epVO.weight = strTrim(rs.getString("weight"));
                data = epVO;
            }

            if (data == null) {
                result.status = false;
                result.message = "No se encontró este empleado.";
            } else {
                result.value = data;
                result.status = true;
                result.message = "Las informaciones del empleado fueron recolectadas con éxito.";
            }
        } catch (SQLException e) {
            result.status = false;
            result.message = "Ocurrión un error al guardar las evaluaciones: " + e.getMessage();
            e.printStackTrace();
            throw new DAOException(e);
        } finally {
            MysqlConnectionHelper.close(c);
        }
        return result;
    }

    public String strTrim(String strValue) {
        String result = "";
        if (strValue != null) {
            result = strValue.trim();
        }
        return result;
    }

    public void sendMail(EmailVO eVO) throws Exception {
        eVO.myRecipient = ("'" + eVO.myRecipient.replace("'", "") + "'");
        eVO.mySubject = ("'" + eVO.mySubject.replace("'", "") + "'");
        eVO.myMSG1 = ("'" + eVO.myMSG1.replace("'", "") + "'");
        eVO.myMSG2 = ("'" + eVO.myMSG2.replace("'", "") + "'");
        eVO.myFuente = ("'" + eVO.myFuente.replace("'", "") + "'");

        try {
            Class.forName("com.microsoft.sqlserver.jdbc.SQLServerDriver");
            Connection connection = DriverManager.getConnection("jdbc:sqlserver://co02intranet:1433;databaseName=intranetrh;selectMethod=cursor", "intranetrh", "intranetrh");
            Statement statement = connection.createStatement();
            statement.execute("sp_send_mail_generico " + eVO.myRecipient + ", " + eVO.mySubject + ", " + eVO.myMSG1 + ", " + eVO.myMSG2 + ", " + eVO.myFuente + ";");
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    public String formatDate(Date data) {
        String pattern = "dd/MM/yyyy";
        SimpleDateFormat sdf = new SimpleDateFormat(pattern);
        String result = sdf.format(data);
        return result;
    }
}
