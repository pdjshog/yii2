<?php
$this->breadcrumbs=array(
	UserModule::t("Users"),
);
if(UserModule::isAdmin()) {
	$this->layout='//layouts/column2';
	$this->menu=array(
	    array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin')),
	    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
	);
}
?>

<?php
$t_ad=$t_us=false;
if (!isset($_GET['view'])){
	$t_us=true;
} else {
	$t_ad=true;
	}

 $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
				array('label'=>'User list', 'url'=>array('/user'), 'active'=>$t_us),
				array('label'=>'Admin list', 'url'=>array('/user&view=admin'), 'active'=>$t_ad),
    ),
)); 




 $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered',
    'dataProvider'=>$dataProvider,
    'template'=>"{items}",
    'columns'=>array(
				array('name'=>'username', 'header'=>'User Name','type'=>'raw','value' => 'CHtml::link(CHtml::encode($data->username),array("user/view","id"=>$data->id))'),
				array('name'=>'create_at', 'header'=>'Registration date','value'=>'date("d.m.y H:s",strtotime( $data->create_at))'),
				array('name'=>'lastvisit_at', 'header'=>'Last visit','value'=>'date("d.m.y H:s",strtotime( $data->lastvisit_at))'),
    ),
)); 
?>