<?php
/*
 * @author      Bilna Development <development@bilna.com> 
 */

namespace Ns\Dashboard\Controllers;

//use Phalcon\Http\Request;
use Ns\Core\Controllers\CoreController; 
use Ns\Dashboard\Models\Admin\AdminUsers as Users;

class IndexController extends CoreController
{
	/*
	 * initialize
     */
	public function initialize()
	{
		parent::initialize();
	}

	/*
	 * index 
     */
    public function indexAction()
    {
        $user = new Users;
        $user->setTestingah(3);

        debug($user->getTestingah());
        //debug($user::$_underscoreCache);
        die;            
    }

    public function check()
    {
        die('hbsvdhc');
    }
}

