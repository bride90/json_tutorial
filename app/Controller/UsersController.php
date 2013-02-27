
	<?php
	class UsersController extends AppController {
	 
	    var $name = 'Users';
		
		public $helpers = array('Js');
		
		public $components = array('RequestHandler');
		
	    function home(){
	    }
		
		function index(){
			$user = $this->User->find('all');
			debug($user); 
		}
	 
	    function search(){
			if ( $this->RequestHandler->isAjax() ) {
				Configure::write ( 'debug', 0 );
				$this->autoRender=false;
				$users=$this->User->find('all',array('conditions'=>array('User.username LIKE'=>'%'.$_GET['term'].'%')));
					$i=0;
					foreach($users as $user){
						$response[$i]['value']=$user['User']['username'];
						$response[$i]['label']="<img class=\"avatar\" width=\"24\" height=\"24\" src=".$user['User']['profile_pictures']."/><span class=\"username\">".$user['User']['username']."</span>";
						$i++;
					}
				echo json_encode($response);
	        }else{
	            if (!empty($this->data)) {
	                $this->set('users',$this->paginate(array('User.username LIKE'=>'%'.$this->data['User']['username'].'%')));
	            }
	        }
		}

	}
	?>