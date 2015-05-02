<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class restapi_model extends CI_Model
{
	public function theatresthisweek(){
	$query['theatresthisweek']=$this->db->query("SELECT `id`, `name`, `image`, `duration`, `dateofrelease`, `rating`, `director`, `writer`, `casteandcrew`, `summary`, `twittertrack`, `trailer`, `isfeatured`, `iscommingsoon`, `isintheator` FROM `movie_movie` WHERE `isintheator`='1'")->result();
	
		return $query;
	}
	public function allavgrating(){
	$query['allavgrating']=$this->db->query("SELECT AVG(rating),`movie` FROM `movie_expertrating` GROUP BY `movie`")->result();
		return $query;
	}
	
public function isfeatured(){
	$query['isfeatured']=$this->db->query("SELECT `id`, `name`, `duration`,`image`, `dateofrelease`, `rating`, `director`, `writer`, `casteandcrew`, `summary`, `twittertrack`, `trailer`, `isintheator`, `iscommingsoon`, `isfeatured`
 FROM `movie_movie` WHERE `isfeatured`='1'")->result();
		return $query;
	}
    public function userdetails($user)
    {
        $query['userdetails']=$this->db->query("SELECT `id`,`name`,`password`,`email`,`accesslevel`,`timestamp`,`status`,`image`,`username`,`socialid`,`logintype`,`json`,`address`,`street`,`city` FROM `user` WHERE `id`='$user'")->row();
		
		$query['watched']=$this->db->query("SELECT `movie_movie`.`id`, `movie_movie`.`image`, `movie_movie`.`name`, `movie_movie`.`duration`, `movie_movie`.`dateofrelease`, `movie_movie`.`rating`, `movie_movie`.`director`, `movie_movie`.`writer`, `movie_movie`.`casteandcrew`, `movie_movie`.`summary`, `movie_movie`.`twittertrack`, `movie_movie`.`trailer`, `movie_movie`.`isfeatured`, `movie_movie`.`iscommingsoon`, `movie_movie`.`isintheator`  FROM `movie_movie` LEFT OUTER JOIN `movie_watch` ON `movie_movie`.`id`=`movie_watch`.`movie` WHERE `movie_watch`.`user`='$user'")->result();
		
		$query['watchcount']=$this->db->query("SELECT COUNT(`movie_watch`.`movie`) as `count`,`movie_watch`.`user` FROM `movie_watch` WHERE `movie_watch`.`user`='$user'")->row();
		$query['watchcount']=$query['watchcount']->count;
		
		$query['ratings']=$this->db->query("SELECT `movie_userrate`.`user`,`movie_movie`.`id`, `movie_movie`.`image`, `movie_movie`.`name`, `movie_movie`.`duration`, `movie_movie`.`dateofrelease`, `movie_movie`.`rating`, `movie_movie`.`director`, `movie_movie`.`writer`, `movie_movie`.`casteandcrew`, `movie_movie`.`summary`, `movie_movie`.`twittertrack`, `movie_movie`.`trailer`, `movie_movie`.`isfeatured`, `movie_movie`.`iscommingsoon`, `movie_movie`.`isintheator`,`movie_userrate`.`rating` FROM `movie_userrate` LEFT OUTER JOIN `movie_movie` ON `movie_userrate`.`movie`=`movie_movie`.`id` WHERE `movie_userrate`.`user`='$user'")->result();

		$query['ratecount']=$this->db->query("SELECT COUNT(`movie_userrate`.`rating`) as `count`,`movie_userrate`.`user` FROM `movie_userrate` WHERE `movie_userrate`.`user`='$user'")->row();
		$query['ratecount']=$query['ratecount']->count;
		
		$query['reviewed']=$this->db->query("SELECT `movie_movie`.`id`,  `movie_movie`.`image`, `movie_movie`.`name`, `movie_movie`.`duration`, `movie_movie`.`dateofrelease`, `movie_movie`.`rating`, `movie_movie`.`director`, `movie_movie`.`writer`, `movie_movie`.`casteandcrew`, `movie_movie`.`summary`, `movie_movie`.`twittertrack`, `movie_movie`.`trailer`, `movie_movie`.`isfeatured`, `movie_movie`.`iscommingsoon`, `movie_movie`.`isintheator`, `movie_review`.`review` FROM `movie_movie` LEFT OUTER JOIN `movie_review` ON `movie_movie`.`id`=`movie_review`.`movie` WHERE `movie_review`.`user`='$user'")->result();

		$query['reviewcount']=$this->db->query("SELECT COUNT(`movie_review`.`review`) as `count`,`movie_review`.`user` FROM `movie_review` WHERE `movie_review`.`user`='$user'")->row();
		$query['reviewcount']=$query['reviewcount']->count;
		
		$query['recommended']=$this->db->query("SELECT `movie_userrecommend`.`recommendfriend` AS `recommended_id`,`user`.`name` AS `recommended_friend`,`movie_movie`.`id`, `movie_movie`.`name`, `movie_movie`.`image`, `movie_movie`.`duration`, `movie_movie`.`dateofrelease`, `movie_movie`.`rating`, `movie_movie`.`director`, `movie_movie`.`writer`, `movie_movie`.`casteandcrew`, `movie_movie`.`summary`, `movie_movie`.`twittertrack`, `movie_movie`.`trailer`, `movie_movie`.`isfeatured`, `movie_movie`.`iscommingsoon`, `movie_movie`.`isintheator` FROM `movie_movie` LEFT OUTER JOIN `movie_userrecommend` ON `movie_movie`.`id`=`movie_userrecommend`.`movie` LEFT OUTER JOIN `user` ON `movie_userrecommend`.`recommendfriend`=`user`.`id` WHERE `movie_userrecommend`.`user`='$user'")->result();
		
		$query['recommendcount']=$this->db->query("SELECT COUNT(`movie_userrecommend`.`recommendfriend`) as `count`,`movie_userrecommend`.`user` FROM `movie_userrecommend` WHERE `movie_userrecommend`.`user`='$user'")->row();
		$query['recommendcount']=$query['recommendcount']->count;
		
		$query['commentcount']=$this->db->query("SELECT count(comment) as `commentcount` FROM `movie_usercomment` WHERE `user`='$user'")->row();
	$query['commentcount']=$query['commentcount']->commentcount;
	 $query['comment']=$this->db->query("SELECT `movie_movie`.`id`, `movie_movie`.`name` as `moviename`, `movie_movie`.`duration`, `movie_movie`.`dateofrelease`, `movie_movie`.`rating`, `movie_movie`.`director`, `movie_movie`.`writer`, `movie_movie`.`casteandcrew`, `movie_movie`.`summary`, `movie_movie`.`twittertrack`, `movie_movie`.`trailer`,(UNIX_TIMESTAMP(`movie_usercomment`.`timestamp`)*1000) as `timestamp`, `movie_movie`.`isfeatured`,`movie_movie`.`image`,`movie_movie`.`iscommingsoon`, `movie_movie`.`isintheator`,`movie_usercomment`.`comment` FROM `movie_movie` LEFT OUTER JOIN `movie_usercomment` ON `movie_usercomment`.`movie`=`movie_movie`.`id` WHERE `movie_usercomment`.`user`='$user'")->result();
		return $query;
    }
  
public function moviedetails($movieid){
//$query['moviedetails']=$this->db->query("SELECT `id`, `name`, `duration`, `dateofrelease`, `rating`, `director`, `writer`, `casteandcrew`, `summary`, `twittertrack`, `trailer`, `isfeatured`, `iscommingsoon`, `isintheator` FROM `movie_movie` WHERE `id`='$movieid'")->result();
	
	
	
	$query['description']=$this->db->query("SELECT `movie_movie`.`id`, `movie_movie`.`name` as `moviename`, `movie_movie`.`duration`, `movie_movie`.`dateofrelease`, `movie_movie`.`rating`, `movie_movie`.`director`, `movie_movie`.`writer`, `movie_movie`.`casteandcrew`, `movie_movie`.`summary`, `movie_movie`.`twittertrack`, `movie_movie`.`trailer`, `movie_movie`.`isfeatured`,`movie_movie`.`image`,`movie_movie`.`iscommingsoon`, `movie_movie`.`isintheator`,`moviegenre`.`genre`,`movie_genre`.`name` as `genrename` FROM `movie_movie` LEFT OUTER JOIN `moviegenre` ON `moviegenre`.`movie`=`movie_movie`.`id` LEFT OUTER JOIN `movie_genre` ON `movie_genre`.`id`=`moviegenre`.`genre` WHERE `movie_movie`.`id`='$movieid'")->row();
	
	$query['expertrating']=$this->db->query("SELECT `movie_expert`.`name`,`movie_expertrating`.`movie`,`movie_expertrating`.`rating` FROM `movie_expert` LEFT OUTER JOIN `movie_expertrating` ON `movie_expertrating`.`expert`=`movie_expert`.`id` WHERE `movie_expertrating`.`movie`='$movieid'")->result();
	
	$query['averageexpertrating']=$this->db->query("SELECT AVG(rating) as `averageexpertrating` FROM `movie_expertrating` WHERE `movie`='$movieid'")->row();
	$query['averageexpertrating']=$query['averageexpertrating']->averageexpertrating;
	
	$query['averagerating']=$this->db->query("SELECT AVG(rating) as `averagerating` FROM `movie_userrate` WHERE `movie`='$movieid'")->row();
	$query['averagerating']=$query['averagerating']->averagerating;
	$query['reviews']=$this->db->query("SELECT `user`.`name`,`movie_review`.`review` FROM `user` LEFT OUTER JOIN `movie_review` ON `movie_review`.`user`=`user`.`id` WHERE `movie_review`.`movie`='$movieid'")->result();		
	
	return $query;
}
	public function twitterfeeds($movieid){
	 $query1['twittertrack']=$this->db->query("SELECT `twittertrack` FROM `movie_movie` WHERE `id`='$movieid'")->row();
			$hashstring = $query1['twittertrack']->twittertrack;
            $this->load->library('twitteroauth');
            $this->config->load('twitter');
            $this->connection = $this->twitteroauth->create($this->config->item('twitter_consumer_token'), $this->config->item('twitter_consumer_secret'), $this->config->item('twitter_access_token'), $this->config->item('twitter_access_secret'));
            $hashstring = urlencode($hashstring);
            $data = $this->twitteroauth->get('search/tweets.json?q=' . $hashstring . "&count=20");
            $prediction = $data;
	        return $prediction;
	}
	public function usercomment($movieid, $comment, $user){
	 $data=array("user" => $user,"movie" => $movieid,"comment" => $comment);
$query=$this->db->insert( "movie_usercomment", $data );
$id=$this->db->insert_id();
		 if(!$query)
         return  0;
		 else
		return  $id;
	}
	public function userrating($movieid, $user, $rating){
	$query=$this->db->query("SELECT * FROM `movie_userrate` WHERE `user`='$user' AND `movie`='$movieid'");
		if($query->num_rows == 0){
		$data=array("user" => $user,"movie" => $movieid,"rating" => $rating);
$query=$this->db->insert( "movie_userrate", $data );
$id=$this->db->insert_id();
		}
		else{
		$query=$this->db->query("UPDATE `movie_userrate` SET `rating` = '$rating' WHERE `user`='$user' AND `movie`='$movieid'");
		}
	 
	}
	
	public function watched($movieid, $user){
	 $data=array("user" => $user,"movie" => $movieid);
$query=$this->db->insert( "movie_watch", $data );
$id=$this->db->insert_id();
		 if(!$query)
         return  0;
		 else
		return  $id;
	
	}
	public function forgotpassword($email){
	$query=$this->db->query("SELECT `id` FROM `user` WHERE `email`='$email'");
//		echo $query->num_rows;
//		return 0;
		if($query->num_rows == 0){
			
			echo "in if";
//		return 0;
		}
		else{
		$this->load->library('email');
			$this->email->from('pthakare33@gmail.com', 'Pooja');
			$this->email->to($email); 
			$this->email->subject('Password Change');
			$this->email->message('hiiiiiiii');	
			$this->email->send();
			echo $this->email->print_debugger();
		}
	}
//	public function setpassword($userid,$newpassword,$confirmpassword){
//	if($newpassword==$confirmpassword){
//	return 1;
//	}
//	}
	
	public function moviesearch($moviename){
		
	$query['moviesearch']=$this->db->query("SELECT `id`, `name`, `image`, `duration`, `dateofrelease`, `rating`, `director`, `writer`, `casteandcrew`, `summary`, `twittertrack`, `trailer`, `isfeatured`, `iscommingsoon`, `isintheator` FROM `movie_movie` WHERE `name` LIKE '%$moviename%'")->result();
		return $query;
	}
		public function changepassword($email,$oldpassword,$newpassword,$confirmpassword){
		 $oldpassword=md5($oldpassword);
        $newpassword=md5($newpassword);
        $confirmpassword=md5($confirmpassword);
			
			if($newpassword==$confirmpassword){
        $useridquery=$this->db->query("SELECT `id` FROM `user` WHERE `email`='$email' AND `password`='$oldpassword'");
//			echo $useridquery;
        if($useridquery->num_rows()==0)
        {
            return 0;
        }
        else
        {
            $query=$useridquery->row();
            $userid=$query->id;
            $updatequery=$this->db->query("UPDATE `user` SET `password`='$newpassword' WHERE `id`='$userid'");
            return 1;
        }
			}
			else{
			echo "Mismatch";
			}
	 }
}
?>
