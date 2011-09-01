/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.bpd.hipos.vos;

import java.util.List;

/**
 *
 * @author u19730
 */
public class EntityAssignmentVO {

    public Integer id;
    public String name;
    public String type;
    public Integer category;
    public String status;
    public List<ActivityAssignmentVO> activities;
}
