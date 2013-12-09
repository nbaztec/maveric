Application
===
The application files go inside the `application` directory. If the parent directory is `maveric` then the URLs are as `http://localhost/maveric/test.php`

Controllers
===

Naming
---
Class must be named in capitalized way. File name must match the class name.
Note: Stick to one class per file. Namespaces must match the directory structure.

> If a user requests /test.php the system will look for the class Test in Test.php

Every controller is defined within the `controllers` namespace and extrends the `core\Controller` class

There are 3 methods that are called in the following scenarios:

**`get()`**
Triggers when a GET request is executed.

**`post()`**
Triggers when a POST request is executed.

**`index()`**
Triggers when a neither a `get()` or `post()` are defined

Accessing Input
---
The `core\Controller` has the object for `core\Input`. The input vars can be accessed as

```
$this->input->get('foo');
$this->input->post('bar'); 
$this->input->server('PHP_SELF');
```

The methods return **`null`** if the variable is not set.

Accessing Config
---

The `core\Controller` has the singleton object for `core\Config` to load configuration details defined in `config.php`.

```
# config/config.php

$config['log_path'] = '/var/log/maveric';
$config['database'] = array(
	'host'	=> 'localhost',
	'username'	=> 'test'
);
```
```
# controllers/Test.php

$this->config->item('log_path');
$this->config->item('database', 'host'); // Multidimensional array
```

Models
===
Every model is defined within the `models` namespace and extrends the `core\Model` class and has access to `core\Input`, `core\Log` and `core\Config` objects

```
namespace models;
use core\Model;

class Test extends Model
{
    public function get_data()
	{
		return array(
			'dummy',
			'data'
		);
	}
}
```

Example
===
```
namespace controllers;
use core\Controller;
use models\Test as TestModel;

class Test extends Controller
{
    public function index()
    {
		echo 'This method fires when either a valid get/post method is not present';
	}

	public function post()
	{
		echo 'Post Data:', PHP_EOL;
		var_dump($this->input->post());
	}

	public function get()
	{
		$this->tm = new TestModel();
		$data = $this->tm->get_data();
		echo 'Get Data:', PHP_EOL;
		var_dump($this->input->get());
		var_dump($this->config->item('database', 'host'));
		var_dump($this->_process($data));
        var_dump(Url::base('new_link.php'));
	}

	protected function _process($data)
	{
		return implode(' ', $data);
	}
}
```