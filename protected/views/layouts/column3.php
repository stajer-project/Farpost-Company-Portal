<h4>Разделы</h4>
<div id="mainmenu1">
<?php
    $section = Yii::app()->db->createCommand("select name from section")->queryAll();
    $i = 0;
    foreach($section as $row){
        $widget_array[$i] = array('label'=>$row['name'], 'url'=>array('/ebook/oneSection&id='.$row['name']));
        $list[$i] = $widget_array[$i];
        $i++;
    }
    $this->widget('zii.widgets.CMenu',array(
			'items'=>$list,
		)); ?>
</div>