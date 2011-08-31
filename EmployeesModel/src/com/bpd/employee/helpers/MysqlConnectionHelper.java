/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.employee.helpers;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

/**
 *
 * @author u29975
 */
public class MysqlConnectionHelper {

    private String url;
    private static MysqlConnectionHelper instance;

    private MysqlConnectionHelper() {
        try {
            Class.forName("com.mysql.jdbc.Driver");
            //co02intranet
            //url = "jdbc:mysql://10.32.0.177:3306/default";
            //localhost
            url = "jdbc:mysql://localhost:3306/default";
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    public static Connection getConnection() throws SQLException {
        if (instance == null) {
            instance = new MysqlConnectionHelper();
        }
        try {
            return DriverManager.getConnection(instance.url, "root", "");
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
