<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_model
{
    public function hapusDataMenu($id)
    {
        $this->db->delete('user_menu', ['id' => $id]);
    }

    public function getAllMenu()
    {
        return $this->db->get('user_menu')->result_array();
    }

    public function getSubmenu()
    {
        $query = "SELECT `user_sub_menu`.*,`user_menu`.`menu`
                    FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id`=`user_menu`.`id` ";

        return $this->db->query($query)->result_array();
    }

    public function getSubmenuById()
    {
        $id = $this->input->post('id');
        return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
    }

    public function ubahDataSub()
    {
        $menuid = $this->input->post('menu_id');
        $title = $this->input->post('submenu');
        $url = $this->input->post('url');
        $icon = $this->input->post('icon');
        $id = $this->input->post('id');
        $data = [
            'menu_id' => $menuid,
            'title' => $title,
            'url' => $url,
            'icon' => $icon
        ];
        $this->db->where('id', $id);
        $this->db->update('user_sub_menu', $data);
        return $this->db->affected_rows();
    }
}
