<?php
namespace app\core
{
	use sys\core\Controller as BaseController;
	use app\models\Client;
	use app\models\Product;
	use app\models\Server;
	use app\libraries\Smarty;
	use app\helpers\Validator;
	use app\helpers\CCPAlert;
	use app\helpers\Url;

	class Controller extends BaseController
	{
		protected $_hosting_id;
		protected $_domain_linked;
		protected $_user_id;
		protected $_smarty;
		protected $_domain;
		protected $_hostname;
		protected $_client;
		protected $_product;

		public function __construct()
		{
			parent::__construct();

			$this->_smarty = Smarty::instance();
			$this->_user_id = $this->input->session('uid');

			$client = new Client($this->_user_id);
			$client_contact = null;

			if ($this->input->session('cid'))
			{
				$client_contact = $client->get_contact($this->input->session('cid'));
			}

			if($this->input->get('domain'))
			{
				$this->_domain = $this->input->get('domain');
				$this->_domain_linked = false;
				$this->_hosting_id = $this->input->get('id');
				$server = new Server(null);
				$this->_hostname = $server->get_random_hostname();
				$this->_hosting_id = null;
				$this->_product = null;
			}
			else if ($this->input->get('id'))
			{
				$this->_hosting_id = $this->input->get('id');
				$this->_domain_linked = true;
				$product = new Product($this->_hosting_id);
				$this->_domain = $product->validate($this->_user_id);
				$this->_hostname = $product->get_hostname($this->_user_id);
				if ( ! $this->_domain)
				{
					$this->_error_billing('Unauthorized Access!');
				}

				if ( ! $this->_product = $product->get_details())
				{
					$this->_error_billing('Product not found!');
				}
			}

			if ( ! $this->_hostname)
			{
				$this->_error_billing('Hostname not found!');
			}

			if ( ! $this->_client = $client->get_profile())
			{
				$this->_error_billing('Client not found!');
			}

			$client_products = $client->get_products();
			$freeTrials = array();
			$hostingProds = array();
			$vpmcHostingProds = array();
			$otherHostingProds = array();
			//seperate products as per product group starts
			foreach($client_products As $key=>$product)
			{
				//Free trials - only products with gid = 19 (joomla demo, linux demo)
	  	     	if($product['productgroupid'] == 19) 
	  	     	{
	  	     		$freeTrials[] = $product;
	  	     	}
	  	     	//Hosting - everything where gid NOT IN (16, 19, 24, 26,28)
	  	     	if($product['productgroupid']  != 16 && $product['productgroupid']  != 19 && $product['productgroupid']  != 24 && $product['productgroupid']  != 26 && $product['productgroupid']  != 28 )
	  	     	{
	  	     		$hostingProds[] = $product;
	  	     	}
	  	     	//VPMC - gid 24, 26
	  	     	if($product['productgroupid']  == 24 || $product['productgroupid']  == 26 )
	  	     	{
	  	     		$vpmcHostingProds[] = $product;
	  	     	}

	  	     	//Other - products with type "other" or gid == 16/28
	  	     	if($product['productgroupid']  == 16 || $product['productgroupid']  == 28 )
	  	     	{
	  	     		$otherHostingProds[] = $product;
	  	     	}
	  	    }
			//ends

			$this->_smarty->attach(array(
				'client' => array(
					'details' => array(
						'avatar' => $this->_client['avatar'],
						'firstname' => $this->_client['firstname'],
					),
					'stats' => array(
						'creditbalance' => $this->_client['credit'],
					),
				),
				'client_contact' => $client_contact,
				'products' => $client_products,
				'CAfreeTrials'   => $freeTrials,
				'CAhostingProds' => $hostingProds,
				'CAvpmcHostingProds' => $vpmcHostingProds,
				'CAotherHostingProds' => $otherHostingProds,
				'domains' => $client->get_domains(),
				'selprod' => $this->_product,
				'hosting_id' => $this->_hosting_id,
				'domain_linked' => $this->_domain_linked,
				'domain' => $this->_domain,
				'domain_primary' => Validator::is_toplevel_domain($this->_domain),
			));

			$this->_render_errors();
		}

		protected function _error_billing($msg)
		{
			CCPAlert::error($msg);
			$this->input->set_session('ccp_mesg', CCPAlert::get_rendered());
			Url::redirect_billing('clientarea.php');
		}

		protected function _render_errors($replace=false)
		{
			$a = CCPAlert::get_rendered();
			if ( ! empty($a['type']) || $replace || $this->_smarty->get_var('ccp_error') === null)
			{
				$this->_smarty->attach('ccp_error', $a);
			}
		}

		protected function _blank($message='')
		{
			$this->_render_errors();
			$this->_smarty->view('blank.tpl', array('message' => $message));
		}
	}
}