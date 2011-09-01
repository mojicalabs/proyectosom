/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package tms_settings_ws;

import java.util.List;
import javax.jws.WebMethod;
import javax.jws.WebParam;
import javax.jws.WebService;
import pk_managers.CategorySet;
import pk_managers.ManagerSettings;
import pk_pojos.TmsSettings;
import pk_pojos.TmsSettingsCategories;
import pk_pojos.TmsSettingsLeadershipStyle;

/**
 *
 * @author u19730
 */
@WebService()
public class tms_settings_ws {

    @WebMethod(operationName = "getSettings")
    public List getSettings() {
        ManagerSettings ms = new ManagerSettings();
        return ms.getSettings();
    }

    @WebMethod(operationName = "getSetting")
    public List getSetting(@WebParam(name = "keyname") String keyname) {
        ManagerSettings ms = new ManagerSettings();
        return ms.getSetting(keyname);
    }

    @WebMethod(operationName = "setSetting")
    public TmsSettings setSetting(@WebParam(name = "obj") TmsSettings obj) {
        ManagerSettings ms = new ManagerSettings();
        return ms.setSetting(obj);
    }

    /**
     * if result = 0 then no records where deleted
     * if result > 0 this number of records where deleted
     * if result = -1 there was an error in the function
     * @param keyname
     * @return int
     */
    @WebMethod(operationName = "delSetting")
    public int delSetting(@WebParam(name = "setId") int setId) {
        int result = 0;
        try {
            ManagerSettings ms = new ManagerSettings();
            result = ms.delSetting(setId);
        } catch (Exception ex) {
            result = -1;
        } finally {
            return result;
        }
    }

    @WebMethod(operationName = "getSettingsByCategory")
    public List getSettingsByCategory(@WebParam(name = "cat") int cat) {
        ManagerSettings ms = new ManagerSettings();
        return ms.getSettingsByCategory(cat);
    }

    @WebMethod(operationName = "getCategory")
    public TmsSettingsCategories getCategory(@WebParam(name = "catId") int catId) {
        ManagerSettings ms = new ManagerSettings();
        return ms.getCategory(catId);
    }

    @WebMethod(operationName = "getCategories")
    public List getCategories() {
        ManagerSettings ms = new ManagerSettings();
        return ms.getCategories();
    }

    @WebMethod(operationName = "setCategory")
    public TmsSettingsCategories setCategory(@WebParam(name = "obj") TmsSettingsCategories obj) {
        ManagerSettings ms = new ManagerSettings();
        return ms.setCategory(obj);
    }

    /**
     * if result = 0 then no records where deleted
     * if result > 0 this number of records where deleted
     * if result = -1 there was an error in the function
     * @param keyname
     * @return int
     */
    @WebMethod(operationName = "delCategory")
    public int delCategory(@WebParam(name = "catId") int catId) {
        int result = 0;
        try {
            ManagerSettings ms = new ManagerSettings();
            result = ms.delCategory(catId);
        } catch (Exception ex) {
            result = -1;
        } finally {
            return result;
        }
    }

    @WebMethod(operationName = "getSettingsLeadershipStyle")
    public List<TmsSettingsLeadershipStyle> getSettingsLeadershipStyle() {
        ManagerSettings ms = new ManagerSettings();
        return ms.getSettingsLeadershipStyle();
    }

    @WebMethod(operationName = "getCategorySettings")
    public CategorySet getCategorySettings(@WebParam(name = "cat") int cat) {
        ManagerSettings ms = new ManagerSettings();
        return ms.getCategorySettings(cat);
    }

    @WebMethod(operationName = "getCategoriesSettings")
    public List getCategoriesSettings() {
        ManagerSettings ms = new ManagerSettings();
        return ms.getCategoriesSettings();
    }
}
