<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
    </div>

    <footer class="container mx-auto py-4 text-center space-y-2 text-gray-900">
        &copy; <?php echo date('Y'); ?> <a class="text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-indigo-500"
                                           href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a> 由 Typecho 驱动
    </footer>
</div>
</body>
</html>
