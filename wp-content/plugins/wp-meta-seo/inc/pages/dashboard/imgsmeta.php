<div class="panel panel-success-full panel-updates">
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-7 col-lg-8">
                <h4 class="panel-title text-success"><?php _e('Image title/alt', 'wp-meta-seo') ?></h4>
                <h3><?php echo $results['imgs_metas_statis'][2] . '%' ?></h3>
                <div class="progress">
                    <div style="width: <?php echo $results['imgs_metas_statis'][2] . '%' ?>" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?php echo $results['imgs_metas_statis'][2] ?>" role="progressbar" class="progress-bar progress-bar-info">
                        <span class="sr-only"><?php echo $results['imgs_metas_statis'][2] . '%' ?> Complete (success)</span>
                    </div>
                </div>
                <p><?php _e('Image data filled (in content)', 'wp-meta-seo') ?>: <?php echo $results['imgs_metas_statis'][0] . '/' . $results['imgs_metas_statis'][1] ?></p>
            </div>
            <div class="col-xs-5 col-lg-4 text-right">
                <input type="text" value="<?php echo $results['imgs_metas_statis'][2] ?>" class="dial-info">
            </div>
        </div>
    </div>
</div>