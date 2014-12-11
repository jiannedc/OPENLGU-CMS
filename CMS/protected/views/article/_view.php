<?php
/* @var $this ArticleController */
/* @var $data Article */
?>
<li>
	<article class="entry-block">
	<?php if ($data->article_type=='publication'){ ?>
	<div class="row">
	<div class="small-12 medium-6 large-8 columns">
	<?php }?>
	<header class="entry-header">
		<h3 class="entry-title"><?php echo CHtml::link(CHtml::encode($data->article_header), array('view', 'id'=>$data->article_id)); ?></h3>
		<div class="entry-meta">Published on <?php $date = new DateTime($data->date_published); echo date_format($date, 'F j\, Y');	 ?></div>
	</header>
	<?php if ($data->article_type=='publication'){ ?>
	</div>
	<div class="small-12 medium-6 large-4 columns">
		<ul class="button-group even-2">
		<li>
		<?php echo CHtml::link('Preview', Yii::app()->request->baseUrl.'/uploads/'.$data->file_location, array( 'class' => 'button tiny', 'target'=>'_blank'));   ?>
		</li>
		<li>
		<?php 
			echo CHtml::link('Download', $this->createUrl('site/download', array('filename' =>  $data->file_location)), 
			array(
			   // for htmlOptions
			   'onclick' => ' {' . CHtml::ajax(array(
					'type'=>'POST',
					'url'=>$this->createUrl('site/download', array('filename' =>  $data->file_location)))),
					'class' => 'button tiny',
			   )
			);
		?>
		</li>
		</ul>
	</div>
	</div>
	<?php }?>
		<div class="row">
	<?php 
		$photo = Yii::app()->db->createCommand()
		->select('p.filename, p.title, p.caption')
		->from('photo p')
		->join('article_photo ap', 'ap.photo_id = p.photo_id')
		->where('ap.article_id=:article_id ', array(':article_id'=>$data->article_id))
		->queryRow();
		
		if($photo!=null){
	?>

	<div class="small-12 medium-5 large-4 columns">
	<img class="entry-image" src="images/<?php echo $photo['filename'];?>">
	</div>
	<div class="small-12 medium-7 large-8 columns">
	<?php }else{ ?>
	<div class="small-12 medium-12 large-12 columns">
	<?php }?>
	<div class="entry-preview"><p>
		<?php  
			$article_preview = strip_tags($data->article_body);
			
			if (strlen($article_preview) > 375) {
				$temp = substr($article_preview, 0, 375);
				$article_preview = substr($temp, 0, strrpos($temp, ' '))." ... <a href='index.php?r=article/view&id=".$data->article_id."' class='read-more'>Read more</a>";
			}
			echo $article_preview;
		?>
	</p>
	</div>
	</div>
	</div>
	<footer class="entry-meta">
		<span>
		</span>
	</footer>
	</article>
</li>

