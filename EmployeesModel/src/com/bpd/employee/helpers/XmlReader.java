/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.employee.helpers;

/**
 *
 * @author u29975
 */
import java.io.File;
import java.net.URI;
import java.net.URL;
import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import org.w3c.dom.Document;
import org.w3c.dom.Element;
import org.w3c.dom.Node;
import org.w3c.dom.NodeList;

public class XmlReader {

    public static void main(String argv[]) {

        try {
            File file = new File("config.xml");
            DocumentBuilderFactory dbf = DocumentBuilderFactory.newInstance();
            DocumentBuilder db = dbf.newDocumentBuilder();
            Document doc = db.parse(file);
            doc.getDocumentElement().normalize();
            System.out.println("Root element " + doc.getDocumentElement().getNodeName());
            NodeList nodeLst = doc.getElementsByTagName("evaluation");
            //System.out.println("Configuracion de Porcentaje de Evaluacion");

            for (int s = 0; s < nodeLst.getLength(); s++) {

                Node fstNode = nodeLst.item(s);

                if (fstNode.getNodeType() == Node.ELEMENT_NODE) {

                    Element fstElmnt = (Element) fstNode;
                    NodeList fstNmElmntLst = fstElmnt.getElementsByTagName("percent_feliz");
                    Element fstNmElmnt = (Element) fstNmElmntLst.item(0);
                    NodeList fstNm = fstNmElmnt.getChildNodes();
                    //System.out.println("Porcentaje Feliz : " + ((Node) fstNm.item(0)).getNodeValue());
//      NodeList lstNmElmntLst = fstElmnt.getElementsByTagName("lastname");
//      Element lstNmElmnt = (Element) lstNmElmntLst.item(0);
//      NodeList lstNm = lstNmElmnt.getChildNodes();
//      System.out.println("Last Name : " + ((Node) lstNm.item(0)).getNodeValue());
                }

            }
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    public static String readConfigByName(String filename, String node, String subnode) {
        NodeList fstNm = null;
        
        try {
            
            DocumentBuilderFactory dbf = DocumentBuilderFactory.newInstance();
            DocumentBuilder db = dbf.newDocumentBuilder();
            Document doc = db.parse("Http://localhost:8080/"+ filename);
            doc.getDocumentElement().normalize();
            //System.out.println("Root element " + doc.getDocumentElement().getNodeName());
            NodeList nodeLst = doc.getElementsByTagName(node);

            for (int s = 0; s < nodeLst.getLength(); s++) {

                Node fstNode = nodeLst.item(s);

                if (fstNode.getNodeType() == Node.ELEMENT_NODE) {

                    Element fstElmnt = (Element) fstNode;
                    NodeList fstNmElmntLst = fstElmnt.getElementsByTagName(subnode);
                    Element fstNmElmnt = (Element) fstNmElmntLst.item(0);
                    fstNm = fstNmElmnt.getChildNodes();
                    //System.out.println("Porcentaje Feliz : " + ((Node) fstNm.item(0)).getNodeValue());
                }

            }
        } catch (Exception e) {
            e.printStackTrace();
        }

        return ((Node) fstNm.item(0)).getNodeValue();
    }
}
