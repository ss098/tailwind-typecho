<?php
/**
 * 基于 TailwindCSS 的 Typecho 模板
 *
 * @package tailwind-typecho
 * @author cenegd
 * @version 1
 * @link https://www.qiyichao.cn/
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div class="space-y-4">
    <?php while ($this->next()): ?>
        <div class="space-y-4 group border border-gray-200 rounded px-4 py-6">
            <a href="<?php $this->permalink() ?>" class="block space-y-4">
                <h1 class="block font-bold text-xl text-gray-700 text-gray-700 group-hover:text-gray-900">
                    <?php $this->title() ?>
                </h1>

                <article class="text-gray-500 group-hover:text-gray-700">
                    <?php $this->excerpt(160); ?>
                </article>
            </a>

            <div class="flex space-x-4 text-gray-400 text-sm">
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>

                    <?php $this->date('Y 年 m 月 d日'); ?>
                </div>

                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>

                    <?php $this->commentsNum(); ?> 条评论
                </div>
            </div>
        </div>
    <?php endwhile; ?>

    <?php echo $this->currentPage(1); ?>
    <?php $this->pageNav('上一页', '下一页', 3, '...', [
        'wrapTag' => 'div',
        'wrapClass' => 'flex items-center justify-between space-x-4 text-gray-500',
        'itemTag' => 'div class="border rounded px-4 py-2"',
        'currentClass' => 'text-indigo-500',
        'prevClass' => 'pagination-previous',
        'nextClass' => 'pagination-next'
    ]); ?>
</div>

<?php $this->need('footer.php'); ?>
