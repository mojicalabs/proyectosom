/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.hipos.vos;

/**
 *
 * @author u19730
 */
public class EmpleadoVO implements Comparable {

    public Integer id;
    public String codigoEmpleado;
    public String nombreEmpleado;
    public String dependencia;
    public String cargo;
    public String empresa;
    public String tipoHipo;
    public Double totalAmount;
    public Double minAmountPlanRetiro;
    public String estado;
    public ItemEmpPhotoVO itemEmpPhoto;

    public int compareTo(Object o) {
        int result = this.nombreEmpleado.compareTo(((EmpleadoVO) o).nombreEmpleado);
        return result == 0 ? this.nombreEmpleado.compareTo(((EmpleadoVO) o).nombreEmpleado) : result;
    }
}
