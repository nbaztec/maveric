<?php
namespace app\controllers
{
	use app\core\Controller;
	use app\helpers\Alert;
	use app\helpers\Url;

	class Login extends Controller
	{
		public function post()
		{
			if ($this->input->post('username') === 'foo' && $this->input->post('password') === 'bar')
			{
				Alert::once('success', 'Welcome FOOBAR!', Url::referrer());
			}

			Alert::once('danger', 'Invalid credentials', Url::referrer());
		}
	}
}