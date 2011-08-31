/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.employee.helpers;

/**
 *
 * @author u29975
 */
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class SqlServerConnectionHelper {

    private String url;
    private static SqlServerConnectionHelper instance;

    private SqlServerConnectionHelper() {

        try {
            Class.forName("net.sourceforge.jtds.jdbc.Driver");
            url = "jdbc:jtds:sqlserver://10.32.0.177:1433/empleados";
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    public static Connection getConnection() throws SQLException {
        if (instance == null) {
            instance = new SqlServerConnectionHelper();
        }
        try {
            return DriverManager.getConnection(instance.url, "alldb", "alldb");
        } catch (SQLException e) {
            throw e;
        }
    }

    public static void close(Connection connection) {
        try {
            if (connection != null) {
                connection.close();
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}
