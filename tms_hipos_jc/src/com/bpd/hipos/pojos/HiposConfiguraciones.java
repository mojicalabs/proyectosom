package com.bpd.hipos.pojos;
// Generated May 19, 2011 7:38:40 PM by Hibernate Tools 3.2.1.GA



/**
 * HiposConfiguraciones generated by hbm2java
 */
public class HiposConfiguraciones  implements java.io.Serializable {


     private Integer id;
     private String codigoEmpleado;
     private Double totalAmount;
     private Double minAmountPlanRetiro;
     private Double tasaDolar;

    public HiposConfiguraciones() {
    }

	
    public HiposConfiguraciones(String codigoEmpleado) {
        this.codigoEmpleado = codigoEmpleado;
    }
    public HiposConfiguraciones(String codigoEmpleado, Double totalAmount, Double minAmountPlanRetiro, Double tasaDolar) {
       this.codigoEmpleado = codigoEmpleado;
       this.totalAmount = totalAmount;
       this.minAmountPlanRetiro = minAmountPlanRetiro;
       this.tasaDolar = tasaDolar;
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
    public Double getTasaDolar() {
        return this.tasaDolar;
    }
    
    public void setTasaDolar(Double tasaDolar) {
        this.tasaDolar = tasaDolar;
    }




}


