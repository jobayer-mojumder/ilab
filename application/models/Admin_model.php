<?php
class Admin_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function login($data){
        $this->db->select('*');
        $query = $this->db->get_where('admin',array('username'=>$data['username']));
        if($query->num_rows()==0) return false;
        else{
            $this->load->library('encrypt');
            $result = $query->result();
            $pass = $this->encrypt->decode($result[0]->password);
            if(strcmp($pass, $data['password']) == 0){
                return $result[0];
            }else{
                return false;
            }
        }
    }

    function get_group_name($id){
        $this->db->select('*');
        $query = $this->db->get_where('admin_group',array('id'=>$id));
        $result = $query->result();
        return $result[0]->name;
    }

    function get_admin_info($admin_data)
    {
        $this->db->select('*');
        $query = $this->db->get_where('admin',array('ad_id'=>$admin_data));
        $result = $query->result();
        return $result[0];
    }

    function login_module($group){
        $this->db->select('admin_module.m_name, admin_module.m_id');
        $this->db->join('admin_module', 'admin_module.m_id = admin_access.a_module', 'inner');
        $query = $this->db->get_where('admin_access',array('a_group'=>$group));
        $result = $query->result();
        return $result;
    }

    function login_module_parent($group){
        $this->db->select('admin_module.m_parent');
        $this->db->join('admin_module', 'admin_module.m_id = admin_access.a_module', 'inner');
        $this->db->distinct('admin_module.m_parent');
        $query = $this->db->get_where('admin_access',array('a_group'=>$group));
        $result = $query->result();
        return $result;
    }

    function login_module_parent_sub($group){
        $this->db->select('admin_module.m_sub');
        $this->db->join('admin_module', 'admin_module.m_id = admin_access.a_module', 'inner');
        $this->db->distinct('admin_module.m_sub');
        $query = $this->db->get_where('admin_access',array('a_group'=>$group));
        $result = $query->result();
        return $result;
    }

    //----------------------ip authenticate---------------------

    function get_ipauth_count(){
        $query = $this->db->get('admin_ipauth');
        return $query->num_rows();
    }

    function get_ipauth_list($num,$offset)
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('admin_ipauth',$num,$offset);
        return $query->result();
    }

    function ipauth_add($data){
        $result = $this->db->insert('admin_ipauth',$data);
        return $result;
    }

    function get_ipauth_by_id($id)
    {
        $query = $this->db->get_where('admin_ipauth',array('id' => $id));
        $result = $query->result();
        return $result[0];
    }

    function get_latest_ipauth_id()
    {
        $this->db->select_max('id');
        $query = $this->db->get_where('admin_ipauth');
        $result = $query->result();
        return $result[0]->id;
    }
    function ipauth_upd($id, $data){
        $this->db->where('id', $id);
        $result = $this->db->update('admin_ipauth',$data);
        return $result;
    }

    function user_ipauth_del($id){
        $this->db->where('id', $id);
        $result = $this->db->delete('admin_ipauth');
        return $result;
    }

    function get_pass($data){
        $this->db->select('password');
        $query = $this->db->get_where('admin',array('ad_id'=>$data['ad_id']));
        if($query->num_rows()==0) return false;
        else{
            $result = $query->result();
            $pass = $this->encrypt->decode($result[0]->password);
            return $pass;
        }
    }

    function upd_pass($admindata,$data){
        $this->db->where('ad_id',$data['ad_id']);
        $result = $this->db->update('admin', array('password'=>$admindata['password'],'email'=>$admindata['email'],'username'=>$admindata['username ']));
        return $result;
    }

    function login_history_add($data){
        $result = $this->db->insert('admin_login_history', $data);
    }

    /**************subscription models function********************/
    function get_subscription_lists() {
        $this->db->order_by('date', 'DESC');
        $query = $this->db->get('subscription');
        return $query->result();
    }

    function subscription_update($id, $data) {
        $this->db->where('id', $id);
        $result = $this->db->update('subscription', $data);
        return $result;
    }

    function subscription_del($id) {
        $this->db->where('id', $id);
        $result = $this->db->delete('subscription');
        return $result;
    }


}