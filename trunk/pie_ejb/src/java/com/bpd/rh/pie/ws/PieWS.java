/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.rh.pie.ws;

import com.bpd.rh.pie.entities.ClientType;
import com.bpd.rh.pie.entities.Complaints;
import com.bpd.rh.pie.entities.Typology;
import com.bpd.rh.pie.sb.pie_sb;
import com.bpd.rh.pie.vos.ComplaintReportVO;
import com.bpd.rh.pie.vos.PIEVisualizerVO;
import java.util.List;
import javax.ejb.EJB;
import javax.jws.WebMethod;
import javax.jws.WebService;
import javax.ejb.Stateless;

/**
 *
 * @author Omar Mojica
 */
@WebService(serviceName = "pie_ear")
@Stateless()
public class PieWS {
    @EJB
    private pie_sb ejbRef;// Add business logic below. (Right-click in editor and choose
    // "Insert Code > Add Web Service Operation")

    @WebMethod(operationName = "getAllComplaint")
    public List<Complaints> getAllComplaint() {
        return ejbRef.getAllComplaint();
    }

    @WebMethod(operationName = "getAllComplaintJson")
    public String getAllComplaintJson() {
        return ejbRef.getAllComplaintJson();
    }

    @WebMethod(operationName = "getAllClientType")
    public List<ClientType> getAllClientType() {
        return ejbRef.getAllClientType();
    }

    @WebMethod(operationName = "getAllTypology")
    public List<Typology> getAllTypology() {
        return ejbRef.getAllTypology();
    }

    @WebMethod(operationName = "getComplaintsJson")
    public String getComplaintsJson() {
        return ejbRef.getComplaintsJson();
    }

    @WebMethod(operationName = "getComplaints")
    public PIEVisualizerVO getComplaints() {
        return ejbRef.getComplaints();
    }

    @WebMethod(operationName = "getComplaintsOLD")
    public List<ComplaintReportVO> getComplaintsOLD() {
        return ejbRef.getComplaintsOLD();
    }

    @WebMethod(operationName = "getEvents")
    public PIEVisualizerVO getEvents() {
        return ejbRef.getEvents();
    }
    
}
