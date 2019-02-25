<?php
class Users_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	
	
	//------------------------------------Create user-----------------------------------------------------------------

	function get_user_count()
	{
		$query = $this->db->query("SELECT *  FROM admin  where ad_id !='1' ");
	    return $query->num_rows();
	}

	function get_user_list($num,$offset)
	{   
		$query = $this->db->query("SELECT *  FROM admin  where ad_id !='1' ");
	    return $query->result();
	}

    function user_add($data)//add user
    {
        $result = $this->db->insert('admin',$data);
        return $result;
    }

	function get_user_by_id($id)
	{
		$query = $this->db->get_where('admin',array('ad_id' => $id));
		$result = $query->result();
		return $result[0];
	}

	function get_latest_user_id()
	{
		$this->db->select_max('ad_id');
		$query = $this->db->get_where('admin');
		$result = $query->result();
		return $result[0]->id;
	}

    function user_upd($id, $data)//update user
    {
        $this->db->where('ad_id', $id);
    	$result = $this->db->update('admin',$data);
        return $result;
    }

  

    function user_user_del($id)//delete user
    {
        $this->db->where('ad_id', $id);
    	$result = $this->db->delete('admin');
        return $result;
    }
	
	
	//------------------------------------Create user-----------------------------------------------------------------
	
	

	 function login($username, $password)
        {
		$query = $this->db->get_where('online_market_users', array('username'=>$username));
		$skb = $query->result();
		if ($query->num_rows()==0) return false;
		else
                {

                    foreach($skb as $chk):
                    $string = $this->encrypt->decode($chk->password);
                    endforeach;
                    if($password==$string)
                    {
                        $result = $query->result();
                        $userid = $result[0]->id;
                        return $query->result();
                     }
                    else
                    return false;
		}
        }
		
		public function get_profile($id)
        {

            $query = $this->db->query("SELECT *  FROM online_market_users  where id='$id' ");
            return $query->result();

        }
		public function get_operator()
        {

            $query = $this->db->query("SELECT title  FROM company  ORDER BY id DESC ");
            return $query->result();

        }
		
		public function get_company()
        {

            $query = $this->db->query("SELECT title  FROM company  ORDER BY id ASC ");
            return $query->result();

        }

}