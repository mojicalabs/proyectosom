package com.bpd.hipos.pojos;
// Generated May 19, 2011 7:38:40 PM by Hibernate Tools 3.2.1.GA



/**
 * HipoEntidades generated by hbm2java
 */
public class HipoEntidades  implements java.io.Serializable {


     private Integer id;
     private String name;
     private String type;
     private Integer category;
     private String status;

    public HipoEntidades() {
    }

    public HipoEntidades(String name, String type, Integer category, String status) {
       this.name = name;
       this.type = type;
       this.category = category;
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
    public String getType() {
        return this.type;
    }
    
    public void setType(String type) {
        this.type = type;
    }
    public Integer getCategory() {
        return this.category;
    }
    
    public void setCategory(Integer category) {
        this.category = category;
    }
    public String getStatus() {
        return this.status;
    }
    
    public void setStatus(String status) {
        this.status = status;
    }




}


