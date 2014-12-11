<?php
/* @var $this ArticleController */
/* @var $data Article */
?>
<li>
	<article class="entry-block">
	<header class="entry-header">
		<div class="row clearfix">
		<div class="left">
		<h3 class="entry-title"><?php echo CHtml::link(CHtml::encode($data->article_header), array('view', 'id'=>$data->article_id)); ?></h3>
		<div class="entry-meta">Published on <?php $date = new DateTime($data->date_published); echo date_format($date, 'F j\, Y');	 ?></div>
		</div>
		<ul class="button-group right">
			<?php
			echo "<li>".CHtml::link('<i class=foundicon-edit></i>EDIT', $this->createUrl('article/update', array('id' => $data->article_id)), 
				array(
				   'class' => 'button tiny',
				   )
			   )."</li>";
			echo "<li>".CHtml::link('<i class=foundicon-trash></i>DELETE', $this->createUrl('article/delete', array('id' => $data->article_id)), 
				array(
				   // for htmlOptions
				   'onclick' => ' {' . CHtml::ajax(array(
											'type'=>'POST',
											'url'=>$this->createUrl('article/delete', array('id' => $data->article_id)),
											   'beforeSend' => 'js:function(){if(confirm("Are you sure you want to delete?"))return true;else return false;}',
											   'success' => "js:function(html){  window.location.reload(true); }")) .
											   'return false;}', // returning false prevents the default navigation to another url on a new page 
				   'class' => 'button tiny',
				   )
			   )."</li>";;
			?>
		</ul>
		</div>
	</header>
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

