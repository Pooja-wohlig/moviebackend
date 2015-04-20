<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class watch_model extends CI_Model
{
    public function create($user,$movie,$status)
    {
        $data=array("user" => $user,"movie" => $movie,"status" => $status);
        $query=$this->db->insert( "movie_watch", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("movie_watch")->row();
        return $query;
    }
    function getsinglewatch($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("movie_watch")->row();
        return $query;
    }
    public function edit($id,$user,$movie,$status)
    {
        $data=array("user" => $user,"movie" => $movie,"status" => $status);
        $this->db->where( "id", $id );
        $query=$this->db->update( "movie_watch", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `movie_watch` WHERE `id`='$id'");
        return $query;
    }
}
?>
