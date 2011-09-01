/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.hipos.vos;

import java.util.List;

/**
 *
 * @author u19730
 */
public class BeneficiarioVO {

    public Integer id;
    public String codigoEmpleado;
    public String sexoEmpleado;
    public String chkTitular;
    public ItemVO bonificacion;
    public ItemVO planRetiro;
    public ItemVO becasHijos;
    public ItemVO seguroMedicoInternacional;
    public List<DependienteVO> dependientes;
}
