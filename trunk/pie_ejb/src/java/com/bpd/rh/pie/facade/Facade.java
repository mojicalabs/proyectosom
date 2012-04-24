/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.rh.pie.facade;

import com.bpd.rh.pie.entities.ClientType;
import com.bpd.rh.pie.managers.ComplaintManager;
import com.bpd.rh.pie.entities.Complaints;
import com.bpd.rh.pie.entities.Typology;
import com.bpd.rh.pie.managers.ClientTypeManager;
import com.bpd.rh.pie.managers.EventManager;
import com.bpd.rh.pie.managers.TypologyManager;
import com.bpd.rh.pie.providers.EventProvider;
import com.bpd.rh.pie.vos.PIEVisualizerVO;
import com.bpd.rh.pie.vos.ComplaintReportVO;
import java.util.List;

/**
 *
 * @author jalburquerque
 */
public class Facade {

    private static Facade instance = null;

    public static Facade getFacadeInstance() {
        if (instance == null) {
            instance = new Facade();
        }
        return instance;
    }

    public List<Complaints> getAllComplaint() {
        return ComplaintManager.getComplaintManagerInstance().getAllComplaint();
    }

    public String getComplaintsJson() {
        return ComplaintManager.getComplaintManagerInstance().getComplaintsJson();
    }

    public String getAllComplaintJson() {
        return ComplaintManager.getComplaintManagerInstance().getAllComplaintJson();
    }

    public List<ClientType> getAllClientType() {
        return ClientTypeManager.getClientTypeManagerInstance().getAllClientType();
    }

    public List<Typology> getAllTypology() {
        return TypologyManager.getTypologyManagerInstance().getAllTypology();
    }

    public PIEVisualizerVO getComplaints() {
        return ComplaintManager.getComplaintManagerInstance().getComplaints();
    }

    public List<ComplaintReportVO> getComplaintsOLD() {
        return ComplaintManager.getComplaintManagerInstance().getComplaintsOLD();
    }

    public PIEVisualizerVO getEvents() {
        return EventProvider.getEventProviderInstance().getEvents();
    }
}
