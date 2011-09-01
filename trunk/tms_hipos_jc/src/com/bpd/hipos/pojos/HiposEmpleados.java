package com.bpd.hipos.pojos;
// Generated May 19, 2011 7:38:40 PM by Hibernate Tools 3.2.1.GA


import java.util.Date;

/**
 * HiposEmpleados generated by hbm2java
 */
public class HiposEmpleados  implements java.io.Serializable {


     private Integer id;
     private String codigoEmpleado;
     private String tipoHipo;
     private Double totalAmount;
     private Double minAmountPlanRetiro;
     private Date fechaRegistro;
     private String logonUser;
     private String estado;

    public HiposEmpleados() {
    }

	
    public HiposEmpleados(String codigoEmpleado, String tipoHipo, Date fechaRegistro, String logonUser, String estado) {
        this.codigoEmpleado = codigoEmpleado;
        this.tipoHipo = tipoHipo;
        this.fechaRegistro = fechaRegistro;
        this.logonUser = logonUser;
        this.estado = estado;
    }
    public HiposEmpleados(String codigoEmpleado, String tipoHipo, Double totalAmount, Double minAmountPlanRetiro, Date fechaRegistro, String logonUser, String estado) {
       this.codigoEmpleado = codigoEmpleado;
       this.tipoHipo = tipoHipo;
       this.totalAmount = totalAmount;
       this.minAmountPlanRetiro = minAmountPlanRetiro;
       this.fechaRegistro = fechaRegistro;
       this.logonUser = logonUser;
       this.estado = estado;
    }
   
    public Integer getId() {
        return this.id;
    }
    
    public void setId(Integer id) {
        this.id = id;
    }
    public String getCodigoEmpleado() {
        return this.codigoEmpleado;
    }
    
    public void setCodigoEmpleado(String codigoEmpleado) {
        this.codigoEmpleado = codigoEmpleado;
    }
    public String getTipoHipo() {
        return this.tipoHipo;
    }
    
    public void setTipoHipo(String tipoHipo) {
        this.tipoHipo = tipoHipo;
    }
    public Double getTotalAmount() {
        return this.totalAmount;
    }
    
    public void setTotalAmount(Double totalAmount) {
        this.totalAmount = totalAmount;
    }
    public Double getMinAmountPlanRetiro() {
        return this.minAmountPlanRetiro;
    }
    
    public void setMinAmountPlanRetiro(Double minAmountPlanRetiro) {
        this.minAmountPlanRetiro = minAmountPlanRetiro;
    }
    public Date getFechaRegistro() {
        return this.fechaRegistro;
    }
    
    public void setFechaRegistro(Date fechaRegistro) {
        this.fechaRegistro = fechaRegistro;
    }
    public String getLogonUser() {
        return this.logonUser;
    }
    
    public void setLogonUser(String logonUser) {
        this.logonUser = logonUser;
    }
    public String getEstado() {
        return this.estado;
    }
    
    public void setEstado(String estado) {
        this.estado = estado;
    }




}


