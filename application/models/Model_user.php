<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model {

    // Return row() or result() on Controllers Only
    public function getWhereData($table, $where){
		  return $this->db->get_where($table,$where);
    }

    public function getWhere($table, $where) {
      $query = $this->db->query("SELECT * FROM $table where $where");
      return $query->result();
    }
    
    public function getData($table) {
        $query = $this->db->get($table);
        $this->db->order_by('id', 'DESC');
        return $query->result();
    }

    public function insertData($table, $data) {
        $query = $this->db->insert($table, $data);
        return $query;
    }

    public function updateData($table, $id, $data) {
      $this->db->where('id', $id);
      $query = $this->db->update($table, $data);
      return $query;
    }

    public function deleteData($table, $where) {
      return $this->db->delete($table, $where);
    }

    public function dataJson($table, $limit = 1000, $offset = 0, $orders = null, $searchs = null) {
      // count total_found
      if (! empty ($searchs) and is_array($searchs)) {
        foreach ($searchs as $key => $value) {
          $key = trim($key);
          if (strpos($key, ' ')) {
            $this->db->where($key, $value);
          } else {
            $this->db->like($key, $value);
          }
        }
      }
      $total_found = $this->db->count_all_results($table);
      
      // retrieve the data
      $this->db->select('*');
      $this->db->from($table);

      if (! empty ($searchs) and is_array($searchs)) {
          foreach ($searchs as $key => $value) {
              $key = trim($key);
              if (strpos($key, ' ')) {
                  $this->db->where($key, $value);
              } else {
                  $this->db->like($key, $value);
              }
          }
      }
      if ($limit > 0 || $offset > 0) {
        $this->db->limit($limit, $offset);
      }
      if (! empty ($orders) and is_array($orders)) {
        foreach ($orders as $key => $value) {
          $this->db->order_by($key, $value);
        }
      } else {
        $this->db->order_by('id', 'desc');
      }
      $query = $this->db->get();
      
      $total_page  = ceil($total_found / $limit);
      $page_number = $limit > 0 ? (( $offset / $limit) + 1) : 1;
      $total_all   = $this->db->count_all($table);

      $retval = array(
        'data'=> $query->result(),
        'total_data' => $query->num_rows(),
        'total_found'=> $total_found,
        'total_all'  => $total_all,
        'page_number'=> $page_number,
        'total_page' => $total_page
      );

      return $retval;
    }
}
