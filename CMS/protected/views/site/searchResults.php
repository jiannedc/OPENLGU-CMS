<?php
/* @var $this ArticleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Search'
);
$this->setPageTitle('Search Results');
$this->layout='page';
?>


<div class="row">
<div class="small-12 medium-8 large-8 columns">
<?php
	if($searchArticles==null && $searchFiles==null && $searchServices==null && $searchSpages==null ){
		echo "No Results Found.";
	}
?>
<ul class="article-list">
	<?php
			foreach($searchArticles as $r_article){
				if($r_article['article_type']=='publication') continue;
	?>
	<li>
	<article class="entry-block">
	<header class="entry-header">
		<h3 class="entry-title"><?php echo CHtml::link(CHtml::encode($r_article['article_header']), array('article/view', 'id'=>$r_article['article_id'])); ?></h3>
		<div class="entry-meta">Published on <?php $date = new DateTime($r_article['date_published']); echo date_format($date, 'F j\, Y');	 ?></div>
	</header>
	<div class="row">
	<?php 
		$photo = Yii::app()->db->createCommand()
		->select('p.filename, p.title, p.caption')
		->from('photo p')
		->join('article_photo ap', 'ap.photo_id = p.photo_id')
		->where('ap.article_id=:article_id ', array(':article_id'=>$r_article['article_id']))
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
			 $article_preview = strip_tags($r_article['article_body']);
			 
			 if (strlen($article_preview) > 375) {
				$temp = substr($article_preview, 0, 375);
				$article_preview = substr($temp, 0, strrpos($temp, ' '))." ... <a href='index.php?r=article/view&id=".$r_article['article_id']."' class='read-more'>Read more</a>";
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
	<?php } ?>
</ul>
<ul class="article-list">
	<?php
			foreach($searchFiles as $r_file){
	?>
	<li>
	<article class="entry-block">
	<div class="row">
	<div class="small-12 medium-6 large-8 columns">
	<header class="entry-header">
		<h3 class="entry-title"><?php echo $r_file['title']; ?></h3>
		<div class="entry-meta"><?php echo $r_file['description']; ?></div>
	</header>
	</div>
	<div class="small-12 medium-6 large-4 columns">
		<ul class="button-group even-2">
		<li>
		<?php echo CHtml::link('Preview', Yii::app()->request->baseUrl.'/uploads/'.$r_file['file_location'], array( 'class' => 'button tiny', 'target'=>'_blank'));   ?>
		</li>
		<li>
		<?php 
			echo CHtml::link('Download', $this->createUrl('site/download', array('filename' =>  $r_file['file_location'])), 
			array(
			   // for htmlOptions
			   'onclick' => ' {' . CHtml::ajax(array(
					'type'=>'POST',
					'url'=>$this->createUrl('site/download', array('filename' =>  $r_file['file_location'])))),
					'class' => 'button tiny',
			   )
			);
		?>
		</li>
		</ul>
	</div>
	</div>
	</article>
	</li>
	<?php } ?>
</ul>
<ul class="article-list">
	<?php
			foreach($searchServices as $r_service){
	?>
	<li>
	<article class="entry-block">
	<header class="entry-header">
		<h3 class="entry-title"><?php echo CHtml::link($r_service['service_name'], array('view', 'id'=>$r_service['service_id'])); ?></h3>
		<div class="entry-meta"><?php echo $r_service['service_description'] ?></div>
	</header>
	<div class="row">
	<div class="small-12 medium-12 large-12 columns">
	<div class="entry-preview"><p>
		<?php  
			$content_preview = strip_tags($r_service['content']);
			
			if (strlen($content_preview) > 375) {
				$temp = substr($content_preview, 0, 375);
				$content_preview = substr($temp, 0, strrpos($temp, ' '))." ... ";
			}
			echo $content_preview;
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
	<?php } ?>
</ul>
<ul class="article-list">
	<?php
			foreach($searchSpages as $r_spage){
	?>
	<li>
	<article class="entry-block">
	<div class="section_subheader">
	<header class="entry-header">
		<h3 class="entry-title"><?php echo CHtml::link($r_spage['title'], array('site/page&view='.$r_spage['url'])); ?></h3>
	</header>
	</div>
	</article>
	</li>
	<?php } ?>
</ul>
</div>
	<?php 
		$this->renderPartial('//layouts/_sideContent');
	?>
</div>