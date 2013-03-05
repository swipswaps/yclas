<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Contact extends Controller {

	public function action_index()
	{ 

		//template header
		$this->template->title           	= __('Contact Us');
		$this->template->meta_description	= __('Contact Us');
				
		$this->template->styles 			= array('css/jquery.sceditor.min.css' => 'screen');
		//$this->template->scripts['footer'][]= 'js/autogrow-textarea.js';
		$this->template->scripts['footer'][]= 'js/jquery.sceditor.min.js';
		$this->template->scripts['footer'][]= '/js/jqBootstrapValidation.js';
		$this->template->scripts['footer'][]= 'js/pages/new.js';

		$is_user = Auth::instance();

		if($is_user->logged_in())
		{
			$user = new Model_User();
			$user = $user->where('id_user', '=', Auth::instance()->get_user()->id_user)
						 ->limit(1)
						 ->find();

			$name 	= $user->name;
			$email 	= $user->email;
			
		}
		else 
		{
			$name 	= NULL;
			$email 	= NULL;
		}

		$captcha_show = core::config('formconfig.captcha-captcha');
		if($this->request->post()) //message submition  
		{
			
			if($captcha_show === 'FALSE' )
			{ 
				Alert::set(Alert::SUCCESS, __('Success, your message is sent'));

				$message = array('name'			=>$this->request->post('name'),
								 'email_from'	=>$this->request->post('email'),
								 'subject'		=>$this->request->post('subject'),
								 'message'		=>$this->request->post('message'));

				$admin = new Model_User();
				$admin = $admin->where('id_role', '=', 10)->limit(1)->find();
				
				// email::send($admin->email,$message['email_from'],$message['subject'],$message['message']);
				email::sendEmailFile($admin->email,$message['subject'],$message['message'],$message['email_from'],$admin->name);
			}
			else
			{
				Alert::set(Alert::ERROR, __('You made some mistake'));
			}
			

		}
	
	    
		$this->template->content = View::factory('pages/contact', array('name' =>$name, 
																		'email'=>$email,
																		'captcha_show'=>$captcha_show));
	}

}