<?php

    /**
     * @file
     * Default simple view template to display a list of rows.
     *
     * @ingroup views_templates
     */
?>
<?php if (!empty($title)): ?>
    <h3><?php print $title; ?></h3>
<?php endif; ?>
<div class="alphabet rounding space_bottom_m">
    <ul class="tabs" data-lang="en">
<?php foreach ($all_letters['en'] as $letter){ ?>
    <li><?php print $letter  ?></li>
<?php } ?>
    </ul>
</div>
<div class="alphabet rounding space_bottom_m">
    <ul class="tabs" data-lang="ua">
        <?php foreach ($all_letters['ua'] as $letter){ ?>
            <li><?php print $letter  ?></li>
        <?php } ?>
    </ul>
</div>
<div class="section-tabs" id="en-lang">
    <?php
        $first = true;
        foreach ($all_letters['en'] as $letter){
        $rows = $letters[strtolower($letter)];
        if( !empty($rows) ){
            foreach ($rows as $id=>$row){ ?>
                <div class="<?php print $classes_array[$id]; ?>" <?php ($first?print 'style="display: block"':'')?>>
                    <div class="clear"></div>
                    <?php print $row; ?>
                    <div class="clear"></div>
                </div>
            <?php };
        }else{
        ?>
        <div class="tab ">
            <div class="clear"></div>
            <div class="clear"></div>
        </div>
        <?php
        }
            $first = false;
            ?>
    <?php };
    ?>
</div>
<div class="section-tabs" id="ua-lang">
    <?php
        foreach ($all_letters['ua'] as $letter)
        {
            $rows = $letters[ strtolower ( $letter ) ];
            if ( !empty( $rows ) )
            {
                foreach ( $rows as $id => $row )
                { ?>
                    <div class="<?php print $classes_array[ $id ]; ?>">
                        <div class="clear"></div>
                        <?php print $row; ?>
                        <div class="clear"></div>
                    </div>
                <?php };
            }
            else
            {
                ?>
                <div class="tab ">
                    <div class="clear"></div>
                    <div class="clear"></div>
                </div>
                <?php
                ?>
            <?php }
        };
    ?>
</div>