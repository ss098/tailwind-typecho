<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="prose prose-indigo my-4">
    <h1>
        <?php $this->title() ?>
    </h1>

    <?php $this->content(); ?>
</div>

<div class="text-center my-8">
    <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished" class="block text-gray-500 text-sm">
        发表于 <?php $this->date('Y 年 m 月 d 日'); ?>
    </time>
</div>

<?php $this->need('comments.php'); ?>

<?php $this->need('footer.php'); ?>
