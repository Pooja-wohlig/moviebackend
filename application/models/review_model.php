<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class review_model extends CI_Model
{
    public function create($user,$movie,$status,$review)
    {
        $data=array("user" => $user,"movie" => $movie,"status" => $status,"review" => $review);
        $query=$this->db->insert( "movie_review", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("movie_review")->row();
        return $query;
    }
    function getsinglereview($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("movie_review")->row();
        return $query;
    }
    public function edit($id,$user,$movie,$status,$review)
    {
        $data=array("user" => $user,"movie" => $movie,"status" => $status,"review" => $review);
        $this->db->where( "id", $id );
        $query=$this->db->update( "movie_review", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `movie_review` WHERE `id`='$id'");
        return $query;
    }
}
?>
