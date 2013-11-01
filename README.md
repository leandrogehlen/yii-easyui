Yii EasyUI
==========

Yii EasyUI is a extension of [Yii](http://www.yiiframework.com) that helps to work with [jQuery EasyUI](http://www.jeasyui.com) library.

The extension implements widgets for writing the componentes javascript.

Including the resources
------------------------

Download http://www.jeasyui.com/download/, extracting content in ```js/jquery-easyui```  
Download [yii-easyui](https://github.com/leandrogehlen/yii-easyui/archive/master.zip) extracting content in ```protected/extensions```
    
Configuration
-------------
Is necessary that the controllers extends of class ```EuiController```

```php
Yii::import('ext.yii-easyui.base.EuiController');

class SiteController extends EuiController {

    public function actionIndex() 
    {
	      $this->render('index');	
    }	
}
```

####Important!

The native css files used by [Yii](http://www.yiiframework.com) generate conflicts with [jQuery EasyUI](http://www.jeasyui.com)  
To avoid conflict **REMOVE** the following lines in ```protected/views/layouts/main.php```

```php
<!-- blueprint CSS framework -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />

<!--[if lt IE 8]>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
<![endif]-->

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
```

Widgets
------

In view files is possible to write widget components to render JQuery Easyui format, according to the following example:

```php
$this->widget('ext.yii-easyui.widgets.EuiWindow', array(
	'id' => 'win',
	'title' => 'My Window',
	'style' => 'width:500px;height:250px;padding:10px;'			
));

``` 

Results:

![Hello World](https://jquery-easyui.googlecode.com/svn/trunk/share/tutorial/window/win1_1.png)
