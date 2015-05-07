<?php
/**
 * Annotations Routes 
 *
 * //fix me (we must change below code to get all list modules)
 *   //$modules = ['core', 'dashboard'];
 *
 *   // Use the annotations router.
 *   $router = new RouterAnnotations(true);
 *   $router->setDefaultModule('dashboard');
 *   //$router->setDefaultNamespace('Ns\Dashboard\Controllers');
 *   //$router->setDefaultController("Index");
 *   //$router->setDefaultAction("index");
 *
 *   // Read the annotations from controllers.
 *   foreach ($modules as $module)
 *   {
 *       $moduleName = ucfirst($module);
 *
 *       // Get all file names.
 *       $files = scandir( ROOT_PATH . '/apps/' . $module . '/controllers');
 *       // Iterate files.
 *       foreach ($files as $file)
 *       {
 *           if ($file == "." || $file == ".." || strpos($file, 'Controller.php') === false) {
 *               continue;
 *           }
 *           //$controller = 'Ns\\'.$moduleName . '\Controllers\\' . str_replace('Controller.php', '', $file);
 *           $controller = 'Ns\\'.$moduleName . '\Controllers\\' . str_replace('Controller.php', '', $file);
 *          
 *           $router->addModuleResource(strtolower($module), $controller);
 *       }
 *   }
 *
 *
 *   return $router;
 */


/**
 * Routes are globally registered in this file
 */

use Phalcon\Mvc\Router;

/**
 * Registering a router
 */
$di['router'] = function () {

    $router = new Router();

    $router->setDefaultModule("dashboard");
    //$router->setDefaultNamespace("Api\\Core\\Controller\\");
    
    $router->add('/:module/:controller/:action', array(
        'module' => 1,
        'controller' => 2,
        'action' => 3
    ));
    
    $router->add('/:controller/:action', array(
        'module' => 1,
        'controller' => 1,
        'action' => 2
    ));

    $router->add('/login', array(
        'module' => 'dashboard',
        'controller' => 'login',
        'action' => 'index' 
    ));

    $router->add('/logout', array(
        'module' => 'dashboard',
        'controller' => 'login',
        'action' => 'logout' 
    ));

    $router->add('/dashboard', array(
        'module' => 'dashboard',
        'controller' => 'index',
        'action' => 'index' 
    ));

    $router->add('/users/edit/:int', array(
        'module' => 'user',
        'controller' => 'user',
        'action' => 'edit',
        'id' => 1 
    ))->setName("admin-users-edit");

    $router->add('/users/delete/:int', array(
        'module' => 'user',
        'controller' => 'user',
        'action' => 'delete',
        'id' => 1 
    ))->setName("admin-users-delete");

    $router->add('/users', array(
        'namespace' => 'Ns\System\Controllers\Permission',
        'module' => 'system',
        'controller' => 'users',
        'action' => 'index' 
    ));

    $router->add('/roles', array(
        'namespace' => 'Ns\System\Controllers\Permission',
        'module' => 'system',
        'controller' => 'roles',
        'action' => 'index' 
    ));

    $router->add('/roles/edit/:int', array(
        'namespace' => 'Ns\System\Controllers\Permission',
        'module' => 'system',
        'controller' => 'roles',
        'action' => 'edit',
        'id' => 1 
    ))->setName("admin-roles-edit");

    $router->add('/import', array(
        //'namespace' => 'Ns\Netsuite\Controllers',
        'module' => 'netsuite',
        'controller' => 'import',
        'action' => 'index' 
    ));

    $router->add('/import/view/:int', array(
        'module' => 'netsuite',
        'controller' => 'import',
        'action' => 'view',
        'id' => 1 
    ))->setName("admin-import-status-view");

    $router->add('/import/delete/:int', array(
        'module' => 'netsuite',
        'controller' => 'import',
        'action' => 'delete',
        'id' => 1 
    ))->setName("admin-import-status-delete");

    $router->add('/export', array(
        //'namespace' => 'Ns\Netsuite\Controllers',
        'module' => 'netsuite',
        'controller' => 'export',
        'action' => 'index' 
    ));

    $router->add('/export/delete/:int', array(
        'module' => 'netsuite',
        'controller' => 'export',
        'action' => 'delete',
        'id' => 1 
    ))->setName("admin-export-status-delete");

    $router->add('/apilog', array(
        'namespace' => 'Ns\Netsuite\Controllers\Log',
        'module' => 'netsuite',
        'controller' => 'api',
        'action' => 'index' 
    ));

    $router->add('/changelog', array(
        'namespace' => 'Ns\Netsuite\Controllers\Log',
        'module' => 'netsuite',
        'controller' => 'changelog',
        'action' => 'index' 
    ));

    $router->add('/changelog/delete/:int', array(
        'namespace' => 'Ns\Netsuite\Controllers\Log',
        'module' => 'netsuite',
        'controller' => 'changelog',
        'action' => 'delete',
        'id' => 1 
    ))->setName("admin-changelog-delete");

    $router->removeExtraSlashes(true);

    return $router;

    //fix me (we must change below code to get all list modules)
    //$modules = ['core', 'dashboard'];

    // Use the annotations router.
/*    $router = new RouterAnnotations(true);
    $router->setDefaultModule('dashboard');
    //$router->setDefaultNamespace('Ns\Dashboard\Controllers');
    //$router->setDefaultController("Index");
    //$router->setDefaultAction("index");

    // Read the annotations from controllers.
    foreach ($modules as $module)
    {
        $moduleName = ucfirst($module);

        // Get all file names.
        $files = scandir( ROOT_PATH . '/apps/' . $module . '/controllers');
        // Iterate files.
        foreach ($files as $file)
        {
            if ($file == "." || $file == ".." || strpos($file, 'Controller.php') === false) {
                continue;
            }
            //$controller = 'Ns\\'.$moduleName . '\Controllers\\' . str_replace('Controller.php', '', $file);
            $controller = 'Ns\\'.$moduleName . '\Controllers\\' . str_replace('Controller.php', '', $file);
           
            $router->addModuleResource(strtolower($module), $controller);
        }
    }


    return $router;*/
};