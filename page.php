<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="prose prose-indigo mx-auto my-4">
    <?php $this->content(); ?>
</div>

<?php $this->need('comments.php'); ?>

<?php $this->need('footer.php'); ?>
