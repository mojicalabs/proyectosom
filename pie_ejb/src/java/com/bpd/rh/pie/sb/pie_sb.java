/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.rh.pie.sb;

import com.bpd.rh.pie.entities.ClientType;
import com.bpd.rh.pie.entities.Complaints;
import com.bpd.rh.pie.entities.Typology;
import com.bpd.rh.pie.facade.Facade;
import com.bpd.rh.pie.vos.ComplaintReportVO;
import com.bpd.rh.pie.vos.PIEVisualizerVO;
import java.util.List;
import javax.ejb.Stateless;
import javax.ejb.LocalBean;

/**
 *
 * @author jalburquerque
 */
@Stateless
@LocalBean
public class pie_sb {

    // Add business logic below. (Right-click in editor and choose
    // "Insert Code > Add Business Method")
    public List<Complaints> getAllComplaint() {
        return Facade.getFacadeInstance().getAllComplaint();
    }

    public String getAllComplaintJson() {
        return Facade.getFacadeInstance().getAllComplaintJson();
    }

    public List<ClientType> getAllClientType() {
        return Facade.getFacadeInstance().getAllClientType();
    }

    public List<Typology> getAllTypology() {
        return Facade.getFacadeInstance().getAllTypology();
    }

    public String getComplaintsJson() {
        return Facade.getFacadeInstance().getComplaintsJson();
    }

    public PIEVisualizerVO getComplaints() {
        return Facade.getFacadeInstance().getComplaints();
    }

    public List<ComplaintReportVO> getComplaintsOLD() {
        return Facade.getFacadeInstance().getComplaintsOLD();
    }

    public PIEVisualizerVO getEvents() {
        return Facade.getFacadeInstance().getEvents();
    }
}