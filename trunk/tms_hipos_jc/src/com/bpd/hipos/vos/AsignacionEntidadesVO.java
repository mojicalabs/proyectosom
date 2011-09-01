/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.hipos.vos;

import java.util.Date;
import java.util.List;

/**
 *
 * @author u19730
 */
public class AsignacionEntidadesVO {

    public Integer id;
    public String codigoEmpleado;
    public Integer idEntidad;
    public String nombreEntidad;
    public Date fechaFinal;
    public Integer estado;
    public List<AsignacionActividadesVO> actividades;
}
