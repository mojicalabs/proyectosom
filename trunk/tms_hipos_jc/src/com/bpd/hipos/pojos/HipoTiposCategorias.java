package com.bpd.hipos.pojos;
// Generated May 19, 2011 7:38:40 PM by Hibernate Tools 3.2.1.GA



/**
 * HipoTiposCategorias generated by hbm2java
 */
public class HipoTiposCategorias  implements java.io.Serializable {


     private Integer id;
     private String name;
     private String breAct;
     private String tipCat;
     private String status;

    public HipoTiposCategorias() {
    }

    public HipoTiposCategorias(String name, String breAct, String tipCat, String status) {
       this.name = name;
       this.breAct = breAct;
       this.tipCat = tipCat;
       this.status = status;
    }
   
    public Integer getId() {
        return this.id;
    }
    
    public void setId(Integer id) {
        this.id = id;
    }
    public String getName() {
        return this.name;
    }
    
    public void setName(String name) {
        this.name = name;
    }
    public String getBreAct() {
        return this.breAct;
    }
    
    public void setBreAct(String breAct) {
        this.breAct = breAct;
    }
    public String getTipCat() {
        return this.tipCat;
    }
    
    public void setTipCat(String tipCat) {
        this.tipCat = tipCat;
    }
    public String getStatus() {
        return this.status;
    }
    
    public void setStatus(String status) {
        this.status = status;
    }




}


