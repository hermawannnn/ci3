<?php
class Unit_model extends CI_Model
{

    public function get_all()
    {
        $query = $this->db->get('units');
        return $query->result();
    }

    public function insert($data)
    {
        return $this->db->insert('units', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('units', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('units');
    }
}
