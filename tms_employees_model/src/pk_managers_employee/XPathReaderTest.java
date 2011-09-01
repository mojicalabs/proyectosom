/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package pk_managers_employee;

import javax.xml.xpath.XPathConstants;
import org.w3c.dom.*;

public class XPathReaderTest {

    public XPathReaderTest() {
    }

    public static void main(String[] args) {

        XPathReader reader = new XPathReader("C:\\Inetpub\\wwwroot\\tms\\tms_settings\\tms_employees\\projects.xml");

        // To get a xml attribute.
        String expression = "/projects/project[1]/@id";
        System.out.println(reader.read(expression, XPathConstants.STRING) + "\n");

        // To get a child element's value.'
        expression = "/projects/project[2]/name";
        System.out.println(reader.read(expression, XPathConstants.STRING) + "\n");

        // To get an entire node
        expression = "/projects/project[3]";
        NodeList thirdProject = (NodeList) reader.read(expression, XPathConstants.NODESET);
        traverse(thirdProject);
    }

    private static void traverse(NodeList rootNode) {
        for (int index = 0; index < rootNode.getLength(); index++) {
            Node aNode = rootNode.item(index);
            if (aNode.getNodeType() == Node.ELEMENT_NODE) {
                NodeList childNodes = aNode.getChildNodes();
                if (childNodes.getLength() > 0) {
                    System.out.println("Name: " + aNode.getNodeName() + ", Value: " + aNode.getTextContent());
                }
                traverse(aNode.getChildNodes());
            }
        }
    }
}
