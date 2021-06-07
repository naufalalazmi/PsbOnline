<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pendaftaran extends CI_Model
{

  // Return row() or result() on Controllers Only
  function getWhereData($table, $where, $order = null, $limit = null)
  {
    if ($order) {
      $this->db->order_by($order[0], $order[1]);
    }
    if ($limit) {
      $this->db->limit($limit);
    }
    $query = $this->db->get_where($table, $where);
    return $query;
  }

  public function getCustom($table, $where)
  {
    $query = $this->db->query("SELECT * from $table where $where");
    return $query;
  }

  public function getCount($table, $where = null)
  {
    if ($where) {
      $this->db->where($where);
    }
    $query = $this->db->get($table);
    return $query->num_rows();
  }

  public function getData($table)
  {
    $query = $this->db->get($table);
    $this->db->order_by('id', 'DESC');
    return $query->result();
  }

  public function insertData($table, $data)
  {
    $query = $this->db->insert($table, $data);
    return $query;
  }

  public function updateData($table, $id, $data)
  {
    $this->db->where('id', $id);
    $query = $this->db->update($table, $data);
    return $query;
  }

  public function deleteData($table, $where)
  {
    return $this->db->delete($table, $where);
  }

  public function dataJson($table, $limit = 1000, $offset = 0, $orders = null, $searchs = null, $join = null, $where = null)
  {
    // count total_found
    if ($where) {
      $this->db->where($where);
    }
    if (!empty($searchs) and is_array($searchs)) {
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
    if ($join) {
      $this->db->select("*, $table.id as id, count(form.id) as total");
      $this->db->from($table);
      $this->db->join("form", "form.id_pendaftaran = $table.id", 'left');
      $this->db->group_by('form.id_pendaftaran');
    } else {
      $this->db->select('*');
      $this->db->from($table);
    }

    if ($where) {
      $this->db->where($where[0], $where[1]);
    }

    if (!empty($searchs) and is_array($searchs)) {
      $this->db->group_start();
      foreach ($searchs as $key => $value) {
        $key = trim($key);
        if (strpos($key, ' ')) {
          $this->db->where($key, $value);
        } else {
          if (count($searchs) == 1) {
            $this->db->like($key, $value);
          } else {
            $this->db->or_like($key, $value);
          }
        }
      }
      $this->db->group_end();
    }
    if ($limit > 0 || $offset > 0) {
      $this->db->limit($limit, $offset);
    }
    if (!empty($orders) and is_array($orders)) {
      foreach ($orders as $key => $value) {
        $this->db->order_by($key, $value);
      }
    } else {
      $this->db->order_by('id', 'desc');
    }
    $query = $this->db->get();

    $total_page  = ceil($total_found / $limit);
    $page_number = $limit > 0 ? (($offset / $limit) + 1) : 1;
    $total_all   = $this->db->count_all($table);

    $retval = array(
      'data' => $query->result(),
      'total_data' => $query->num_rows(),
      'total_found' => $total_found,
      'total_all'  => $total_all,
      'page_number' => $page_number,
      'total_page' => $total_page
    );

    return $retval;
  }

  public function dataJsonHasil()
  {
    $query = $this->db->query("
      SELECT pendaftaran.id as id, title, start_date, end_date, date, COUNT(DISTINCT(pendaftarLulus.id)) as lulus, COUNT(DISTINCT(pendaftarTidakLulus.id)) as tidak_lulus, COUNT(DISTINCT(pendaftarBelum.id)) as belum, COUNT(DISTINCT(pendaftarTotal.id)) as total
        FROM pendaftaran
        LEFT JOIN form AS pendaftarTotal ON pendaftaran.id=pendaftarTotal.id_pendaftaran
        LEFT JOIN form AS pendaftarLulus ON pendaftaran.id=pendaftarLulus.id_pendaftaran
        and pendaftarLulus.status_tes = 'lulus'
        LEFT JOIN form AS pendaftarTidakLulus ON pendaftaran.id=pendaftarLulus.id_pendaftaran
        and pendaftarTidakLulus.status_tes = 'tidak lulus'
        LEFT JOIN form AS pendaftarBelum ON pendaftaran.id=pendaftarBelum.id_pendaftaran
        and isnull(pendaftarBelum.status_tes)
        group by pendaftarTotal.id_pendaftaran
        order by pendaftaran.id desc
      ");

    return $query->result();
  }
}
