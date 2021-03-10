<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php function threadedComments($comments, $options) {
    ?>
    <div id="<?php $comments->theId(); ?>" class="border rounded p-4 m-4 mx-auto rounded-xl overflow-hidden md:max-w-2xl w-full">
        <div class="md:flex">
            <?php if (Helper::options()->commentsAvatar > 0) { ?>
                <div class="md:flex-shrink-0">
                    <?php $comments->gravatar('64'); ?>
                </div>
            <?php } ?>

            <div class="flex flex-col px-4">
                <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">
                    <?php $comments->author(); ?>
                </div>
                <div class="flex  justify-between block leading-tight text-xs text-gray-700 text-black">
                    <?php $comments->date('Y 年 m 月 d 日 H:i'); ?>


                    <?php $comments->reply(); ?>
                </div>
                <div class="flex-1 flex items-center mt-1 text-gray-500">
                    <?php $comments->content(); ?>
                </div>
            </div>
        </div>

        <?php if ($comments->children) { ?>
            <?php $comments->threadedComments($options); ?>
        <?php } ?>
    </div>
<?php } ?>

<section class="border-t my-4" id="comments">
    <?php $this->comments()->to($comments); ?>

    <?php if ($comments->have()): ?>
        <div class="text-center my-4">
            <?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?>
        </div>

        <?php $comments->listComments(); ?>

        <?php $comments->pageNav('上一页', '下一页', 3, '...', [
            'wrapTag' => 'div',
            'wrapClass' => 'flex items-center justify-between space-x-4 text-gray-500',
            'itemTag' => 'div class="border rounded px-4 py-2"',
            'currentClass' => 'text-indigo-500',
            'prevClass' => 'pagination-previous',
            'nextClass' => 'pagination-next'
        ]); ?>

    <?php endif; ?>

    <?php if ($this->allow('comment')): ?>
        <div id="<?php $this->respondId(); ?>">
            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form" class="my-4 space-y-2">
                <?php if (!$this->user->hasLogin()): ?>
                    <div>
                        发表评论 <?php $comments->cancelReply(); ?>
                    </div>

                    <div>
                        <label for="author" class="block text-sm font-medium text-gray-700">
                            称呼
                        </label>
                        <div class="flex rounded-md shadow-sm">
                            <input type="text" name="author" id="author" value="<?php $this->remember('author'); ?>" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-none rounded-md sm:text-sm border-gray-300" required>
                        </div>
                    </div>

                    <div>
                        <label for="mail" class="block text-sm font-medium text-gray-700">
                            邮箱<?php if (!$this->options->commentsRequireMail): ?>（可选）<?php endif; ?>
                        </label>
                        <div class="flex rounded-md shadow-sm">
                            <input type="email" name="mail" id="mail" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> class="focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-none rounded-md sm:text-sm border-gray-300">
                        </div>
                    </div>

                    <div>
                        <label for="url" class="block text-sm font-medium text-gray-700">
                            网站（可选）
                        </label>
                        <div class="flex rounded-md shadow-sm">
                            <input type="text" name="url" id="url" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> class="focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-none rounded-md sm:text-sm border-gray-300">
                        </div>
                    </div>

                    <div>
                        <textarea placeholder="评论内容" name="text" id="textarea" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" required><?php $this->remember('text'); ?></textarea>
                    </div>
                <?php else: ?>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            <?php if ($this->user->hasLogin()): ?>
                                使用 <a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a> 发表评论：<?php $comments->cancelReply(); ?>
                            <?php endif; ?>
                        </label>

                        <label for="textarea">
                            <textarea name="text" id="textarea" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" required><?php $this->remember('text'); ?></textarea>
                        </label>
                    </div>
                <?php endif; ?>
                <div class="my-2 space-x-4">
                    <button type="submit" class="inline-block inline-flex justify-center py-1 px-3 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        提交评论
                    </button>

                    <?php if ($this->user->hasLogin()): ?>
                        <a href="<?php $this->options->logoutUrl(); ?>" class="hover:text-gray-700">退出</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    <?php else: ?>
        <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
</section>