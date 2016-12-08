<?php
// error_reporting( E_ALL );
// ini_set("error_reporting", E_ALL);
// remove the following lines when in production mode
 defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
 defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

// Set the constant for the FRONT_STORE Directory
// Don't change if you are not sure
$cms_version='1.0';

//You need to specify the path to CORE FOLDER CORRECTLY
define('CORE_FOLDER',dirname(__FILE__).DIRECTORY_SEPARATOR.'core');


define('COMMON_FOLDER',dirname(__FILE__).DIRECTORY_SEPARATOR.'common');
define('RESOURCES_FOLDER',dirname(__FILE__).DIRECTORY_SEPARATOR.'resources');
define('PROPERTY_IMAGES',dirname(__FILE__).DIRECTORY_SEPARATOR.'property-images');
define('THUMBS_FOLDER',dirname(__FILE__).DIRECTORY_SEPARATOR.'thumbs');
define('AVATAR_FOLDER',dirname(__FILE__).DIRECTORY_SEPARATOR.'avatar');
define('CMS_FOLDER',dirname(__FILE__).DIRECTORY_SEPARATOR.'protected');
define('CMS_WIDGETS',CMS_FOLDER.DIRECTORY_SEPARATOR.'widgets');
define('FRONT_END',dirname(__FILE__).DIRECTORY_SEPARATOR.'protected');
define('FRONT_STORE',dirname(__FILE__));
define('BACK_END',dirname(__FILE__).DIRECTORY_SEPARATOR.'protected');
define('BACK_STORE',dirname(__FILE__));

//require( dirname(__FILE__).'/vacation-rental-blog/wp-blog-header.php' );
//define('WP_USE_THEMES', false);



// change the following paths if necessary
$yii=dirname(__FILE__).'/yii/framework/yii.php';
$globals=COMMON_FOLDER.'/globals.php';
$mTemplate=COMMON_FOLDER.'/email_template.php';
$mCamp=COMMON_FOLDER.'/email_campaigner.php';
$define=COMMON_FOLDER.'/define.php';
$config=FRONT_END.'/config/main.php';


require_once($yii);
require_once($globals);
require_once($define);
require_once($mTemplate);
require_once($mCamp);


//Yii::createWebApplication($config)->run();
$app = Yii::createWebApplication($config);
Yii::import('common.extensions.yiiexcel.YiiExcel', true);
Yii::registerAutoloader(array('YiiExcel', 'autoload'), true);
PHPExcel_Shared_ZipStreamWrapper::register();
if (ini_get('mbstring.func_overload') & 2) {
        throw new Exception('Multibyte function overloading in PHP must be disabled for string functions (2).');
    }
PHPExcel_Shared_String::buildCharacterSets();

if ( !isset( Yii::app()->session['currency'] ) || ( Yii::app()->session['currency'] == '' )  ) 
	{ Yii::app()->getModule('currencymanager')->setdefaultcurrency('AUD'); }

$app->run();



