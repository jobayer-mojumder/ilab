<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_admin_model extends CI_Model {
	
    /************************user models function***************************/
    function get_user_lists(){
        $this->db->select('admin.password,admin.ad_id, admin.fullname, admin.email, admin.status, admin_group.id, admin_group.name');
        $this->db->join('admin_group', 'admin.group = admin_group.id', 'inner');
        $this->db->order_by('ad_id', 'ASC');     
        $query = $this->db->get('admin');
        return $query->result();
    }

    function user_add($data){
        $result = $this->db->insert('admin',$data);
        return $result;
    }

    function user_update($id, $data){
        $this->db->where('ad_id', $id);
        $result = $this->db->update('admin',$data);
        return $result;
    }

    function get_user_by_id($id){
        $query = $this->db->get_where('admin',array('ad_id' => $id));
        $result = $query->result();
        return $result[0];
    }

    function user_del($id){
        $this->db->where('ad_id', $id);
        $result = $this->db->delete('admin');
        return $result;
    }

    function get_group_lists_active(){
        $this->db->where('status', '1');
        $this->db->order_by('name', 'ASC');     
        $query = $this->db->get('admin_group');
        return $query->result();
    }

    function get_admin_modules(){
        $this->db->where('m_status', '1');
        $this->db->order_by('m_id', 'ASC');     
        $query = $this->db->get('admin_module');
        return $query->result();
    }

    function get_admin_group_access($id){
        $this->db->where('a_group', $id);
        $this->db->order_by('a_module', 'ASC');     
        $query = $this->db->get('admin_access');
        return $query->result();
    }

    function group_access_del($id){
        $this->db->where('a_group', $id);
        $result = $this->db->delete('admin_access');
        return $result;
    }

    function group_access_insert($data){
        $result = $this->db->insert('admin_access',$data);
        return $result;
    }

    /************************group models function***************************/

    function get_group_lists(){
        $this->db->where('name !=', 'super_admin');
        $this->db->order_by('id', 'ASC');     
        $query = $this->db->get('admin_group');
        return $query->result();
    }

    function group_add($data){
        $result = $this->db->insert('admin_group',$data);
        return $result;
    }

    function group_update($id, $data){
        $this->db->where('id', $id);
        $result = $this->db->update('admin_group',$data);
        return $result;
    }

    function get_group_by_id($id){
        $query = $this->db->get_where('admin_group',array('id' => $id));
        $result = $query->result();
        return $result[0];
    }

    function group_del($id){
        $this->db->where('id', $id);
        $result = $this->db->delete('admin_group');
        return $result;
    }

    /************************module models function***************************/

    function get_module_lists(){
        $this->db->order_by('m_id', 'ASC');     
        $query = $this->db->get('admin_module');
        return $query->result();
    }

    function module_add($data){
        $result = $this->db->insert('admin_module',$data);
        return $result;
    }

    function module_update($id, $data){
        $this->db->where('m_id', $id);
        $result = $this->db->update('admin_module',$data);
        return $result;
    }

    function get_module_by_id($id){
        $query = $this->db->get_where('admin_module',array('m_id' => $id));
        $result = $query->result();
        return $result[0];
    }

    function module_del($id){
        $this->db->where('m_id', $id);
        $result = $this->db->delete('admin_module');
        return $result;
    }

    /************************history models function***************************/

    function get_history_lists(){
        $this->db->order_by('created_at', 'DESC');     
        $query = $this->db->get('admin_login_history');
        return $query->result();
    }
    
    /************************record models function***************************/

    function get_record_lists(){
        $this->db->join('admin', 'admin_record.admin = admin.ad_id', 'inner');
        $this->db->join('admin_module', 'admin_record.module = admin_module.m_name', 'inner');
        $this->db->order_by('created_at', 'DESC');     
        $query = $this->db->get('admin_record');
        return $query->result();
    }

    function clear_record($start, $end){
        // echo $start;
        // echo "<br>";
        // echo $end;
        // exit();
        $this->db->where('created_at >=', $start);
        $this->db->where('created_at <=', $end);
        $result = $this->db->delete('admin_record');
        return $result;
    }


}