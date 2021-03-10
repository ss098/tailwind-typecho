<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html lang="zh">
<head>
    <title><?php $this->archiveTitle(array(
            'category' => _t('分类 %s 下的文章'),
            'search' => _t('包含关键字 %s 的文章'),
            'tag' => _t('标签 %s 下的文章'),
            'author' => _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <meta charset="<?php $this->options->charset(); ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">

    <link rel="stylesheet" href="<?php $this->options->themeUrl('app.min.css'); ?>" />

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>
<body>

<div class="flex flex-col min-h-screen">
    <div class="border-b">
        <div class="flex items-center justify-between max-w-4xl px-4 py-2 mx-auto">
            <div class="flex items-center space-x-4">
                <a href="<?php $this->options->siteUrl(); ?>" class="font-bold text-xl uppercase select-none text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-indigo-500">
                    <?php $this->options->title() ?>
                </a>

                <div class="flex items-center space-x-2">
                    <!-- 分类 -->
                    <?php foreach ($this->widget('Widget_Metas_Category_List')->stack as $category) { ?>
                        <a href="<?= $category['permalink'] ?>"
                           class="flex items-center px-4 py-2 rounded select-none <?= $this->is('category', $category['slug']) ? 'bg-gray-100' : '' ?> hover:bg-gray-100 outline-none text-sm focus:outline-none ease-linear transition-colors">
                            <?= $category['name'] ?>
                        </a>
                    <?php } ?>
                </div>
            </div>

            <div class="flex items-center space-x-4">
                <!-- 页面 -->
                <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                <?php while ($pages->next()): ?>
                    <a href="<?php $pages->permalink(); ?>" class="flex items-center px-4 py-2 rounded select-none <?= $this->is('page', $pages->slug) ? 'bg-gray-100' : '' ?> hover:bg-gray-100 outline-none text-sm focus:outline-none ease-linear"><?php $pages->title(); ?></a>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <div class="flex-1 max-w-4xl justify-center p-4">

