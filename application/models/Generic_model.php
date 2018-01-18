<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generic_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getGeneric($column, $order, $table)
    {
        //$this->db->order_by('nome', 'asc');
        $this->db->order_by($column, $order);
        $query = $this->db->get($table);
        
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    function getGenericWhere($column_id, $id, $table, $column, $order)
    {   
        if (!($column === null) && !($order === null))
            $this->db->order_by($column, $order); 
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($column_id.' = '.$id);
        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    function getGenericById($column_id, $id, $table)
    {
        //$this->db->where('idpessoas', $id);
        $this->db->where($column_id, $id);
        $query = $this->db->get($table);
        
        if ($query->num_rows() > 0)
            return $query->row();
        else
            return false;
    }

    function submit($table, $fields)
    {
        $this->db->insert($table, $fields);
        
        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    function update($column_id, $id, $table, $fields)
    {
        $this->db->where($column_id, $id);
        $this->db->update($table, $fields);

        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    function delete($column_id, $id, $table)
    {
        $this->db->where($column_id, $id);
        $this->db->delete($table);

        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }
}