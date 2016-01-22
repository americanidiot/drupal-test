</div>

<?php print render ( $page['leftAndRightAdv'] ); ?>
</div>
<?php if ( $page['footer'] ): ?>
    <div id="footer">
        <div id="footer-wrapper">
            <span style="float:left;">
		<div style="margin:20px;">
            <a href="http://prantmedia.com.ua/" target="_blank">
                <img src="http://charivne.info/images/logo-footer.png" alt="Розробка сайту"><br>
            </a>&nbsp;&nbsp;&nbsp;<a href="http://prantmedia.com.ua/" target="_blank"><?php print t('Розробка та підтримка')?></a><br>
            <div style="margin-top:2px; margin-left:10px;">
            </div>
        </div>
		</span>
              <span style="float:left;">
            <?php print render ( $page['footer'] ); ?>
              </span>
        </div>
    </div><!-- /#footer -->
<?php endif; ?>
