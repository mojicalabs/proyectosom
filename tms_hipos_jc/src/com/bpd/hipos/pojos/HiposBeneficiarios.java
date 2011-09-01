package com.bpd.hipos.pojos;
// Generated May 19, 2011 7:38:40 PM by Hibernate Tools 3.2.1.GA



/**
 * HiposBeneficiarios generated by hbm2java
 */
public class HiposBeneficiarios  implements java.io.Serializable {


     private Integer id;
     private String codigoEmpleado;
     private String sexoEmpleado;
     private String chkTitular;
     private Double bonificacionPercent;
     private Double bonificacionAmmount;
     private Double planRetiroPercent;
     private Double planRetiroAmmount;
     private Double becasHijosPercent;
     private Double becasHijosAmmount;
     private Double seguroMedicoInternacionalPercent;
     private Double seguroMedicoInternacionalAmmount;

    public HiposBeneficiarios() {
    }

	
    public HiposBeneficiarios(String codigoEmpleado) {
        this.codigoEmpleado = codigoEmpleado;
    }
    public HiposBeneficiarios(String codigoEmpleado, String sexoEmpleado, String chkTitular, Double bonificacionPercent, Double bonificacionAmmount, Double planRetiroPercent, Double planRetiroAmmount, Double becasHijosPercent, Double becasHijosAmmount, Double seguroMedicoInternacionalPercent, Double seguroMedicoInternacionalAmmount) {
       this.codigoEmpleado = codigoEmpleado;
       this.sexoEmpleado = sexoEmpleado;
       this.chkTitular = chkTitular;
       this.bonificacionPercent = bonificacionPercent;
       this.bonificacionAmmount = bonificacionAmmount;
       this.planRetiroPercent = planRetiroPercent;
       this.planRetiroAmmount = planRetiroAmmount;
       this.becasHijosPercent = becasHijosPercent;
       this.becasHijosAmmount = becasHijosAmmount;
       this.seguroMedicoInternacionalPercent = seguroMedicoInternacionalPercent;
       this.seguroMedicoInternacionalAmmount = seguroMedicoInternacionalAmmount;
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
    public String getSexoEmpleado() {
        return this.sexoEmpleado;
    }
    
    public void setSexoEmpleado(String sexoEmpleado) {
        this.sexoEmpleado = sexoEmpleado;
    }
    public String getChkTitular() {
        return this.chkTitular;
    }
    
    public void setChkTitular(String chkTitular) {
        this.chkTitular = chkTitular;
    }
    public Double getBonificacionPercent() {
        return this.bonificacionPercent;
    }
    
    public void setBonificacionPercent(Double bonificacionPercent) {
        this.bonificacionPercent = bonificacionPercent;
    }
    public Double getBonificacionAmmount() {
        return this.bonificacionAmmount;
    }
    
    public void setBonificacionAmmount(Double bonificacionAmmount) {
        this.bonificacionAmmount = bonificacionAmmount;
    }
    public Double getPlanRetiroPercent() {
        return this.planRetiroPercent;
    }
    
    public void setPlanRetiroPercent(Double planRetiroPercent) {
        this.planRetiroPercent = planRetiroPercent;
    }
    public Double getPlanRetiroAmmount() {
        return this.planRetiroAmmount;
    }
    
    public void setPlanRetiroAmmount(Double planRetiroAmmount) {
        this.planRetiroAmmount = planRetiroAmmount;
    }
    public Double getBecasHijosPercent() {
        return this.becasHijosPercent;
    }
    
    public void setBecasHijosPercent(Double becasHijosPercent) {
        this.becasHijosPercent = becasHijosPercent;
    }
    public Double getBecasHijosAmmount() {
        return this.becasHijosAmmount;
    }
    
    public void setBecasHijosAmmount(Double becasHijosAmmount) {
        this.becasHijosAmmount = becasHijosAmmount;
    }
    public Double getSeguroMedicoInternacionalPercent() {
        return this.seguroMedicoInternacionalPercent;
    }
    
    public void setSeguroMedicoInternacionalPercent(Double seguroMedicoInternacionalPercent) {
        this.seguroMedicoInternacionalPercent = seguroMedicoInternacionalPercent;
    }
    public Double getSeguroMedicoInternacionalAmmount() {
        return this.seguroMedicoInternacionalAmmount;
    }
    
    public void setSeguroMedicoInternacionalAmmount(Double seguroMedicoInternacionalAmmount) {
        this.seguroMedicoInternacionalAmmount = seguroMedicoInternacionalAmmount;
    }




}


