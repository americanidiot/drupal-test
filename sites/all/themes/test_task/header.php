<div id="main-container">

    <div id="wrapper">

        <div id="header">
            <?php if ($logo): ?>
                <a href="<?php print $front_page; ?>" class="logo"   name="page-top" title="<?php print t('Home'); ?>" rel="home" id="logo">
                    <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
                </a>
            <?php endif; ?>

            <?php if ($site_name || $site_slogan): ?>
                <div id="name-and-slogan"<?php if ($hide_site_name && $hide_site_slogan) { print ' class="element-invisible"'; } ?>>

                    <?php if ($site_name): ?>
                        <?php if ($title): ?>
                            <div id="site-name"<?php if ($hide_site_name) { print ' class="element-invisible"'; } ?>>
                                <strong>
                                    <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                                </strong>
                            </div>
                        <?php else: /* Use h1 when the content title is empty */ ?>
                            <h1 id="site-name"<?php if ($hide_site_name) { print ' class="element-invisible"'; } ?>>
                                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                            </h1>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($site_slogan): ?>
                        <div id="site-slogan"<?php if ($hide_site_slogan) { print ' class="element-invisible"'; } ?>>
                            <?php print $site_slogan; ?>
                        </div>
                    <?php endif; ?>

                </div> <!-- /#name-and-slogan -->
            <?php endif; ?>
            <?php print render($page['header']); ?>

            <?php
                if( !$logged_in ){
                    ?>
                    <div class="user-control-panel">
                        <a href="/register"></a> <span> </span> <a href="/user/login"><?php print t("Вхід")?></a> <span></span>
                        <div class="currency-rates" style="width: 340px;  margin-top: -40px;  ">
                            <a href="http://autozakaz.in.ua/" target="_blank">
                                <img src="/reklama_baner/avtozakaz8.gif" width="0" height="0" style="display: none !important; visibility: hidden !important; opacity: 0 !important; background-position: 340px 0px;">
                            </a>
                        </div>
                    </div>
                <?php
                }?>

        </div>