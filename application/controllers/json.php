<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
class Json extends CI_Controller {
function getalluserlike()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`movie_userlike`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements[1]=new stdClass();
$elements[1]->field="`movie_userlike`.`user`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";

$elements[2]=new stdClass();
$elements[2]->field="`movie_userlike`.`movie`";
$elements[2]->sort="1";
$elements[2]->header="Movie";
$elements[2]->alias="movie";

$elements[3]=new stdClass();
$elements[3]->field="`movie_userlike`.`status`";
$elements[3]->sort="1";
$elements[3]->header="Status";
$elements[3]->alias="status";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `movie_userlike`");
$this->load->view("json",$data);
}
public function getsingleuserlike()
{
$id=$this->input->get_post("id");
$data["message"]=$this->userlike_model->getsingleuserlike($id);
$this->load->view("json",$data);
}
function getalluserrate()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`movie_userrate`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements[1]=new stdClass();
$elements[1]->field="`movie_userrate`.`user`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";

$elements[2]=new stdClass();
$elements[2]->field="`movie_userrate`.`movie`";
$elements[2]->sort="1";
$elements[2]->header="Movie";
$elements[2]->alias="movie";

$elements[3]=new stdClass();
$elements[3]->field="`movie_userrate`.`rating`";
$elements[3]->sort="1";
$elements[3]->header="Rating";
$elements[3]->alias="rating";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `movie_userrate`");
$this->load->view("json",$data);
}
public function getsingleuserrate()
{
$id=$this->input->get_post("id");
$data["message"]=$this->userrate_model->getsingleuserrate($id);
$this->load->view("json",$data);
}
function getallusercomment()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`movie_usercomment`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements[1]=new stdClass();
$elements[1]->field="`movie_usercomment`.`user`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";

$elements[2]=new stdClass();
$elements[2]->field="`movie_usercomment`.`movie`";
$elements[2]->sort="1";
$elements[2]->header="Movie";
$elements[2]->alias="movie";

$elements[3]=new stdClass();
$elements[3]->field="`movie_usercomment`.`comment`";
$elements[3]->sort="1";
$elements[3]->header="Comment";
$elements[3]->alias="comment";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `movie_usercomment`");
$this->load->view("json",$data);
}
public function getsingleusercomment()
{
$user=$this->input->get_post("user");
$data["message"]=$this->usercomment_model->getsingleusercomment($user);
$this->load->view("json",$data);
}
function getalluserrecommend()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`movie_userrecommend`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements[1]=new stdClass();
$elements[1]->field="`movie_userrecommend`.`user`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";

$elements[2]=new stdClass();
$elements[2]->field="`movie_userrecommend`.`movie`";
$elements[2]->sort="1";
$elements[2]->header="Movie";
$elements[2]->alias="movie";

$elements[3]=new stdClass();
$elements[3]->field="`movie_userrecommend`.`recommendfriend`";
$elements[3]->sort="1";
$elements[3]->header="Recommendfriend";
$elements[3]->alias="recommendfriend";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `movie_userrecommend`");
$this->load->view("json",$data);
}
public function getsingleuserrecommend()
{
$id=$this->input->get_post("id");
$data["message"]=$this->userrecommend_model->getsingleuserrecommend($id);
$this->load->view("json",$data);
}
function getallgenre()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`movie_genre`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements[1]=new stdClass();
$elements[1]->field="`movie_genre`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `movie_genre`");
$this->load->view("json",$data);
}
public function getsinglegenre()
{
$id=$this->input->get_post("id");
$data["message"]=$this->genre_model->getsinglegenre($id);
$this->load->view("json",$data);
}
function getallmovie()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`movie_movie`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements[1]=new stdClass();
$elements[1]->field="`movie_movie`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$elements[2]=new stdClass();
$elements[2]->field="`movie_movie`.`duration`";
$elements[2]->sort="1";
$elements[2]->header="Duration";
$elements[2]->alias="duration";

$elements[3]=new stdClass();
$elements[3]->field="`movie_movie`.`dateofrelease`";
$elements[3]->sort="1";
$elements[3]->header="Dateofrelease";
$elements[3]->alias="dateofrelease";

$elements[4]=new stdClass();
$elements[4]->field="`movie_movie`.`rating`";
$elements[4]->sort="1";
$elements[4]->header="Rating";
$elements[4]->alias="rating";

$elements[5]=new stdClass();
$elements[5]->field="`movie_movie`.`director`";
$elements[5]->sort="1";
$elements[5]->header="Director";
$elements[5]->alias="director";

$elements[6]=new stdClass();
$elements[6]->field="`movie_movie`.`writer`";
$elements[6]->sort="1";
$elements[6]->header="Writer";
$elements[6]->alias="writer";

$elements[7]=new stdClass();
$elements[7]->field="`movie_movie`.`casteandcrew`";
$elements[7]->sort="1";
$elements[7]->header="Casteandcrew";
$elements[7]->alias="casteandcrew";

$elements[8]=new stdClass();
$elements[8]->field="`movie_movie`.`summary`";
$elements[8]->sort="1";
$elements[8]->header="Summary";
$elements[8]->alias="summary";

$elements[9]=new stdClass();
$elements[9]->field="`movie_movie`.`twittertrack`";
$elements[9]->sort="1";
$elements[9]->header="Twittertrack";
$elements[9]->alias="twittertrack";

$elements[10]=new stdClass();
$elements[10]->field="`movie_movie`.`trailer`";
$elements[10]->sort="1";
$elements[10]->header="Trailer";
$elements[10]->alias="trailer";

$elements[11]=new stdClass();
$elements[11]->field="`movie_movie`.`isfeatured`";
$elements[11]->sort="1";
$elements[11]->header="Isfeatured";
$elements[11]->alias="isfeatured";

$elements[12]=new stdClass();
$elements[12]->field="`movie_movie`.`isintheator`";
$elements[12]->sort="1";
$elements[12]->header="Isintheator";
$elements[12]->alias="isintheator";

$elements[13]=new stdClass();
$elements[13]->field="`movie_movie`.`iscommingsoon`";
$elements[13]->sort="1";
$elements[13]->header="Iscommingsoon";
$elements[13]->alias="iscommingsoon";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `movie_movie`");
$this->load->view("json",$data);
}
public function getsinglemovie()
{
$id=$this->input->get_post("id");
$data["message"]=$this->movie_model->getsinglemovie($id);
$this->load->view("json",$data);
}
function getallexpert()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`movie_expert`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements[1]=new stdClass();
$elements[1]->field="`movie_expert`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$elements[2]=new stdClass();
$elements[2]->field="`movie_expert`.`status`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `movie_expert`");
$this->load->view("json",$data);
}
public function getsingleexpert()
{
$id=$this->input->get_post("id");
$data["message"]=$this->expert_model->getsingleexpert($id);
$this->load->view("json",$data);
}
function getallexpertrating()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`movie_expertrating`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements[1]=new stdClass();
$elements[1]->field="`movie_expertrating`.`expert`";
$elements[1]->sort="1";
$elements[1]->header="Expert";
$elements[1]->alias="expert";

$elements[2]=new stdClass();
$elements[2]->field="`movie_expertrating`.`movie`";
$elements[2]->sort="1";
$elements[2]->header="Movie";
$elements[2]->alias="movie";

$elements[3]=new stdClass();
$elements[3]->field="`movie_expertrating`.`rating`";
$elements[3]->sort="1";
$elements[3]->header="Rating";
$elements[3]->alias="rating";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `movie_expertrating`");
$this->load->view("json",$data);
}
public function getsingleexpertrating()
{
$id=$this->input->get_post("id");
$data["message"]=$this->expertrating_model->getsingleexpertrating($id);
$this->load->view("json",$data);
}
   public function login()
   {
        $email=$this->input->get("email");
//        $password=$this->input->get("password");
        $data['message']=$this->user_model->login($email);
        $this->load->view('json',$data);
    }
	 public function authenticate()
    {
        $data['message']=$this->user_model->authenticate();
		$this->load->view('json',$data);
    }
	public function forgotpassword(){
	$email=$this->input->get("email");
		$this->restapi_model->forgotpassword($email);
	}	
	
	 
    public function logout()
    {
        $this->session->sess_destroy();
        
		$this->load->view('json',true);
    }
    public function signup()
    {
        $name=$this->input->get_post("name");    
        $email=$this->input->get_post("email");
        $password=$this->input->get_post("password");
       $data['message']=$this->user_model->frontendsignup($name, $email, $password);
        $this->load->view('json',$data);
        
    }
 public function isfeatured(){
  $data['message']=$this->restapi_model->isfeatured();
	 $this->load->view('json',$data); 
 }
 
 public function theatresthisweek(){
 $data['message']=$this->restapi_model->theatresthisweek();
	 $this->load->view('json',$data); 
 }
 public function userdetails(){
	 $user=$this->input->get('user');
	 $data['message']=$this->restapi_model->userdetails($user);
	 $this->load->view('json',$data);
 }
 public function moviedetails(){
	 $movieid=$this->input->get('movie');
	 $data['message']=$this->restapi_model->moviedetails($movieid);
	 $this->load->view('json',$data);
 }
	public function usercomment(){
	$movieid=$this->input->get('movie');
	$comment=$this->input->get('comment');
	$user=$this->input->get('user');
	$data['message']=$this->restapi_model->usercomment($movieid, $comment,$user);
	 $this->load->view('json',$data);		
	}
 public function userrating(){
	$movieid=$this->input->get('movie');
	$rating=$this->input->get('rating');
	$user=$this->input->get('user');
	$data['message']=$this->restapi_model->userrating($movieid, $user, $rating);
	 $this->load->view('json',$data);		
	}
	 public function watched(){
	$movieid=$this->input->get('movie');
	$user=$this->input->get('user');
	$data['message']=$this->restapi_model->watched($movieid, $user);
	 $this->load->view('json',$data);		
	}
	 public function twitterfeeds(){
	$movieid=$this->input->get('movie');
	$data['message']=$this->restapi_model->twitterfeeds($movieid);
	 $this->load->view('json',$data);		
	}
	public function moviesearch(){
	$moviename=$this->input->get('moviename');
	$data['message']=$this->restapi_model->moviesearch($moviename);
	 $this->load->view('json',$data);
	}
		public function allavgrating(){
	$data['message']=$this->restapi_model->allavgrating();
	 $this->load->view('json',$data);
	}
        public function changepassword() {
        $email=$this->input->get("email");
        $oldpassword=$this->input->get("oldpassword");
        $newpassword=$this->input->get("newpassword");
        $confirmpassword=$this->input->get("confirmpassword");
        $data["message"] = $this->restapi_model->changepassword($email,$oldpassword,$newpassword,$confirmpassword);
        $this->load->view("json", $data);
    }
}
?>