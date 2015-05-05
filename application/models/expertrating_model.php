<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class expertrating_model extends CI_Model
{
    public function create($expert,$movie,$rating)
    {
        $data=array("expert" => $expert,"movie" => $movie,"rating" => $rating);
        $query=$this->db->insert( "movie_expertrating", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("movie_expertrating")->row();
        return $query;
    }
    function getsingleexpertrating($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("movie_expertrating")->row();
        return $query;
    }
    public function edit($id,$expert,$movie,$rating)
    {
        $data=array("expert" => $expert,"movie" => $movie,"rating" => $rating);
        $this->db->where( "id", $id );
        $query=$this->db->update( "movie_expertrating", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `movie_expertrating` WHERE `id`='$id'");
        return $query;
    }
	  public function getratingdropdown()
	{
		$rating= array("0","0.5","1","1.5","2","2.5","3","3.5","4","4.5","5");
		return $rating;
	}
	 public function viewexpertrating()
	{
		$query=$this->db->query("SELECT `movie_expert`.`id`,`movie_expert`.`name` FROM `movie_expert`")->result();
//		 print_r($query);
		return $query;
	}
	 public function viewexpertratingold()
	{
		$query=$this->db->query("SELECT `movie_expertrating`.`id`,`movie_expert`.`name` FROM `movie_expertrating` LEFT OUTER JOIN `movie_expert` ON `movie_expert`.`id`=`movie_expertrating`.`expert`")->result();
//		 print_r($query);
		return $query;
	}
//	public function insertdata($rating,$expert[$key],$movie) {
//		for($i=0;i<expert[].length;$i++){
//			
//		}
//	}
}
?>
