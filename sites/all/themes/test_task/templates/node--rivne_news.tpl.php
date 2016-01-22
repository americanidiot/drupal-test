<?php

    /**
     * @file
     * Default theme implementation to display a node.
     *
     * Available variables:
     * - $title: the (sanitized) title of the node.
     * - $content: An array of node items. Use render($content) to print them all,
     *   or print a subset such as render($content['field_example']). Use
     *   hide($content['field_example']) to temporarily suppress the printing of a
     *   given element.
     * - $user_picture: The node author's picture from user-picture.tpl.php.
     * - $date: Formatted creation date. Preprocess functions can reformat it by
     *   calling format_date() with the desired parameters on the $created variable.
     * - $name: Themed username of node author output from theme_username().
     * - $node_url: Direct URL of the current node.
     * - $display_submitted: Whether submission information should be displayed.
     * - $submitted: Submission information created from $name and $date during
     *   template_preprocess_node().
     * - $classes: String of classes that can be used to style contextually through
     *   CSS. It can be manipulated through the variable $classes_array from
     *   preprocess functions. The default values can be one or more of the
     *   following:
     *   - node: The current template type; for example, "theming hook".
     *   - node-[type]: The current node type. For example, if the node is a
     *     "Blog entry" it would result in "node-blog". Note that the machine
     *     name will often be in a short form of the human readable label.
     *   - node-teaser: Nodes in teaser form.
     *   - node-preview: Nodes in preview mode.
     *   The following are controlled through the node publishing options.
     *   - node-promoted: Nodes promoted to the front page.
     *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
     *     listings.
     *   - node-unpublished: Unpublished nodes visible only to administrators.
     * - $title_prefix (array): An array containing additional output populated by
     *   modules, intended to be displayed in front of the main title tag that
     *   appears in the template.
     * - $title_suffix (array): An array containing additional output populated by
     *   modules, intended to be displayed after the main title tag that appears in
     *   the template.
     *
     * Other variables:
     * - $node: Full node object. Contains data that may not be safe.
     * - $type: Node type; for example, story, page, blog, etc.
     * - $comment_count: Number of comments attached to the node.
     * - $uid: User ID of the node author.
     * - $created: Time the node was published formatted in Unix timestamp.
     * - $classes_array: Array of html class attribute values. It is flattened
     *   into a string within the variable $classes.
     * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
     *   teaser listings.
     * - $id: Position of the node. Increments each time it's output.
     *
     * Node status variables:
     * - $view_mode: View mode; for example, "full", "teaser".
     * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
     * - $page: Flag for the full page state.
     * - $promote: Flag for front page promotion state.
     * - $sticky: Flags for sticky post setting.
     * - $status: Flag for published status.
     * - $comment: State of comment settings for the node.
     * - $readmore: Flags true if the teaser content of the node cannot hold the
     *   main body content.
     * - $is_front: Flags true when presented in the front page.
     * - $logged_in: Flags true when the current user is a logged-in member.
     * - $is_admin: Flags true when the current user is an administrator.
     *
     * Field variables: for each field instance attached to the node a corresponding
     * variable is defined; for example, $node->body becomes $body. When needing to
     * access a field's raw values, developers/themers are strongly encouraged to
     * use these variables. Otherwise they will have to explicitly specify the
     * desired field language; for example, $node->body['en'], thus overriding any
     * language negotiation rule that was previously applied.
     *
     * @see template_preprocess()
     * @see template_preprocess_node()
     * @see template_process()
     *
     * @ingroup themeable
     */
    echo "<pre>_" . print_r (array_keys($content) , 1 ) . "_</pre>";
    print render($content['field_rimage']);
?>
<div class="container-main">

    <div class="aaa" style="margin: 5px 0; font-size: 12px; margin-bottom: 10px;">
        <a href="http://charivne.info/">Головна</a>

        <span style="color: grey; font-size: 11px;"> &nbsp; /&nbsp; </span>

        <a href="http://charivne.info/rivne-news/all">Новини Рівного</a>


    </div>




    <h1><?php print render($title); ?></h1>

    <div class="clearfix mT10">
        <div style="float:left;">
            <!-- Put this script tag to the <head> of your page -->
            <script type="text/javascript" src="//vk.com/js/api/openapi.js?79"></script>

            <script type="text/javascript">
                VK.init({apiId: 3273042, onlyWidgets: true});
            </script>

            <!-- Put this div tag to the place, where the Like block will be -->
            <div id="vk_like" style="height: 18px; width: 180px; position: relative; clear: both; background: none;"><iframe name="fXDeffb8" frameborder="0" src="http://vk.com/widget_like.php?app=3273042&amp;width=100%&amp;_ver=1&amp;page=0&amp;url=http%3A%2F%2Fcharivne.info%2Frivne-news%2Franishe-sudymyj-rivnyanyn-popavsya-na-kradizhtsi-velosypeda&amp;type=button&amp;verb=0&amp;color=&amp;title=%D0%A0%D0%B0%D0%BD%D1%96%D1%88%D0%B5%20%D1%81%D1%83%D0%B4%D0%B8%D0%BC%D0%B8%D0%B9%20%D1%80%D1%96%D0%B2%D0%BD%D1%8F%D0%BD%D0%B8%D0%BD%20&amp;description=%D0%9D%D0%BE%D0%B2%D0%B8%D0%BD%D0%B8%20%D0%A0%D1%96%D0%B2%D0%BD%D0%BE%D0%B3%D0%BE%20%D0%BE%D0%BD%D0%BB%D0%B0%D0%B9%D0%BD.%20%D0%86%D0%BD%D1%84%D0%BE%D1%80%D0%BC%D0%B0%D1%86%D1%96%D0%B9%D0%BD%D0%BE-%D1%80%D0%BE%D0%B7%D0%B2%D0%B0%D0%B6%D0%B0%D0%BB%D1%8C%D0%BD%D0%B8%D0%B9%20%D0%BF%D0%BE%D1%80%D1%82%D0%B0%D0%BB%20%D0%A0%D1%96%D0%B2%D0%BD%D0%BE%D0%B3%D0%BE.%20%D0%A7%D0%B0%D0%A0%D1%96%D0%B2%D0%BD%D0%B5.%D1%96%D0%BD%D1%84%D0%BE.&amp;image=http%3A%2F%2Fcharivne.info%2Fimg2%2F20160103163756.jpg&amp;text=&amp;h=18&amp;height=18&amp;referrer=http%3A%2F%2Fcharivne.info%2Frivne-news%2Fall&amp;152136539b3" width="100%" height="18" scrolling="no" id="vkwidget1" style="overflow: hidden; height: 18px; width: 180px; z-index: 150;"></iframe></div>
            <script type="text/javascript">
                VK.Widgets.Like("vk_like", {type: "button", height: 18});
            </script>
        </div>
        <div style="float:left; margin-left:5px;">
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1&appId=188654804538359";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
            <div class="fb-like fb_iframe_widget" data-send="true" data-layout="button_count" data-width="300" data-show-faces="false" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=188654804538359&amp;container_width=0&amp;href=http%3A%2F%2Fcharivne.info%2Frivne-news%2Franishe-sudymyj-rivnyanyn-popavsya-na-kradizhtsi-velosypeda&amp;layout=button_count&amp;locale=ru_RU&amp;sdk=joey&amp;send=true&amp;show_faces=false&amp;width=300"><span style="vertical-align: bottom; width: 190px; height: 20px;"><iframe name="f26a8f6914" width="300px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" src="http://www.facebook.com/plugins/like.php?app_id=188654804538359&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D42%23cb%3Dfb27a663%26domain%3Dcharivne.info%26origin%3Dhttp%253A%252F%252Fcharivne.info%252Ffe3557044%26relation%3Dparent.parent&amp;container_width=0&amp;href=http%3A%2F%2Fcharivne.info%2Frivne-news%2Franishe-sudymyj-rivnyanyn-popavsya-na-kradizhtsi-velosypeda&amp;layout=button_count&amp;locale=ru_RU&amp;sdk=joey&amp;send=true&amp;show_faces=false&amp;width=300" style="border: none; visibility: visible; width: 190px; height: 20px;" class=""></iframe></span></div>
        </div>
        <div style="float:left; margin-left:20px;">

        </div>

    </div>
    <div class="clearfix mT10">
        <div style="float:left;">
            05.01.2016, 19:57 &nbsp;&nbsp;&nbsp;&nbsp;  Переглядів: 88						</div>
        <div style="float:left; margin-left:15px;">

        </div>

    </div>





    <div class="data"> </div>
    <div style="padding-top:20px;">
        <img src="http://charivne.info/img2/20160103163756.jpg" alt="" style="width: 560px;">
    </div>


    <div class="text_news" style="padding-top:20px; border-color:#fff;" <?php print $content_attributes; ?>>
            <?php
                // We hide the comments and links now so that we can render them later.
                hide($content['comments']);
                hide($content['links']);
                print render($content);
            ?>
    </div>
    <div class="clear"></div>
    <div style="margin-bottom: 15px; margin-top: 15px;" class="clearfix">
        <div id="disqus_thread"><iframe id="dsq-app1" name="dsq-app1" allowtransparency="true" frameborder="0" scrolling="no" tabindex="0" title="Disqus" width="100%" src="http://disqus.com/embed/comments/?base=default&amp;version=f3e1717b71e7256da258d3a504e56865&amp;f=charivne&amp;t_u=http%3A%2F%2Fcharivne.info%2Frivne-news%2Franishe-sudymyj-rivnyanyn-popavsya-na-kradizhtsi-velosypeda&amp;t_d=%D0%A0%D0%B0%D0%BD%D1%96%D1%88%D0%B5%20%D1%81%D1%83%D0%B4%D0%B8%D0%BC%D0%B8%D0%B9%20%D1%80%D1%96%D0%B2%D0%BD%D1%8F%D0%BD%D0%B8%D0%BD%20%22%D0%BF%D0%BE%D0%BF%D0%B0%D0%B2%D1%81%D1%8F%22%20%D0%BD%D0%B0%20%D0%BA%D1%80%D0%B0%D0%B4%D1%96%D0%B6%D1%86%D1%96%20%D0%B2%D0%B5%D0%BB%D0%BE%D1%81%D0%B8%D0%BF%D0%B5%D0%B4%D0%B0&amp;t_t=%D0%A0%D0%B0%D0%BD%D1%96%D1%88%D0%B5%20%D1%81%D1%83%D0%B4%D0%B8%D0%BC%D0%B8%D0%B9%20%D1%80%D1%96%D0%B2%D0%BD%D1%8F%D0%BD%D0%B8%D0%BD%20%22%D0%BF%D0%BE%D0%BF%D0%B0%D0%B2%D1%81%D1%8F%22%20%D0%BD%D0%B0%20%D0%BA%D1%80%D0%B0%D0%B4%D1%96%D0%B6%D1%86%D1%96%20%D0%B2%D0%B5%D0%BB%D0%BE%D1%81%D0%B8%D0%BF%D0%B5%D0%B4%D0%B0&amp;s_o=default" style="width: 100% !important; border: none !important; overflow: hidden !important; height: 631px !important;" horizontalscrolling="no" verticalscrolling="no"></iframe><iframe id="indicator-north" name="indicator-north" allowtransparency="true" frameborder="0" scrolling="no" tabindex="0" title="Disqus" style="width: 566px !important; border: none !important; overflow: hidden !important; top: 0px !important; min-width: 566px !important; max-width: 566px !important; position: fixed !important; z-index: 2147483646 !important; height: 29px !important; min-height: 29px !important; max-height: 29px !important; display: none !important;"></iframe><iframe id="indicator-south" name="indicator-south" allowtransparency="true" frameborder="0" scrolling="no" tabindex="0" title="Disqus" style="width: 566px !important; border: none !important; overflow: hidden !important; bottom: 0px !important; min-width: 566px !important; max-width: 566px !important; position: fixed !important; z-index: 2147483646 !important; height: 29px !important; min-height: 29px !important; max-height: 29px !important; display: none !important;"></iframe></div>
        <script type="text/javascript">
            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
            var disqus_shortname = 'charivne'; // required: replace example with your forum shortname

            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function() {
                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
        </script>
        <noscript>Please enable JavaScript to view the &lt;a href="http://disqus.com/?ref_noscript"&gt;comments powered by Disqus.&lt;/a&gt;</noscript>

        <!-- Put this div tag to the place, where the Comments block will be -->
        <div id="vk_comments" style="height: 148px; width: 560px; background: none;"><iframe name="fXD337bd" frameborder="0" src="http://vk.com/widget_comments.php?app=3273042&amp;width=560px&amp;_ver=1&amp;limit=20&amp;height=0&amp;mini=auto&amp;norealtime=0&amp;page=0&amp;status_publish=1&amp;attach=*&amp;url=http%3A%2F%2Fcharivne.info%2Frivne-news%2Franishe-sudymyj-rivnyanyn-popavsya-na-kradizhtsi-velosypeda&amp;title=%D0%A0%D0%B0%D0%BD%D1%96%D1%88%D0%B5%20%D1%81%D1%83%D0%B4%D0%B8%D0%BC%D0%B8%D0%B9%20%D1%80%D1%96%D0%B2%D0%BD%D1%8F%D0%BD%D0%B8%D0%BD%20&amp;description=%D0%9D%D0%BE%D0%B2%D0%B8%D0%BD%D0%B8%20%D0%A0%D1%96%D0%B2%D0%BD%D0%BE%D0%B3%D0%BE%20%D0%BE%D0%BD%D0%BB%D0%B0%D0%B9%D0%BD.%20%D0%86%D0%BD%D1%84%D0%BE%D1%80%D0%BC%D0%B0%D1%86%D1%96%D0%B9%D0%BD%D0%BE-%D1%80%D0%BE%D0%B7%D0%B2%D0%B0%D0%B6%D0%B0%D0%BB%D1%8C%D0%BD%D0%B8%D0%B9%20%D0%BF%D0%BE%D1%80%D1%82%D0%B0%D0%BB%20%D0%A0%D1%96%D0%B2%D0%BD%D0%BE%D0%B3%D0%BE.%20%D0%A7%D0%B0%D0%A0%D1%96%D0%B2%D0%BD%D0%B5.%D1%96%D0%BD%D1%84%D0%BE.&amp;image=http%3A%2F%2Fcharivne.info%2Fimg2%2F20160103163756.jpg&amp;referrer=http%3A%2F%2Fcharivne.info%2Frivne-news%2Fall&amp;152136539d1" width="560" height="133" scrolling="no" id="vkwidget2" style="overflow: hidden; height: 148px;"></iframe></div>
        <script type="text/javascript">
            VK.Widgets.Comments("vk_comments", {limit: 20, width: "560", attach: "*"});
        </script>
    </div>

    <div style="margin-bottom:20px; margin-top:20px;">
        <a href="http://autozakaz.in.ua/" target="_blank"><img src="http://charivne.info/client_br/man_560x100.jpg"></a>
    </div>
    <h2>Читайте також:</h2>
    <div style="margin-bottom: 15px;" class="clearfix">



        <div style="height: 200px; margin-right:15px; float:left;">
            <div style="width:170px; height: 100px; overflow:hidden;">
                <a style="font-size: 12px; font-weight: bold; line-height: 20px;" href="http://charivne.info/rivne-news/ranishe-sudymyj-rivnyanyn-popavsya-na-kradizhtsi-velosypeda">	<img src="http://charivne.info/img2/20160103163756.jpg" alt="" style="width: 200px;"></a>
            </div>
            <div style="width:160px;">
                <a style="font-size: 12px; font-weight: bold; line-height: 20px;" href="http://charivne.info/rivne-news/ranishe-sudymyj-rivnyanyn-popavsya-na-kradizhtsi-velosypeda">Раніше судимий рівнянин "попався" на крадіжці велосипеда</a>
            </div>
        </div>
        <div style="height: 200px; margin-right:15px; float:left;">
            <div style="width:170px; height: 100px; overflow:hidden;">
                <a style="font-size: 12px; font-weight: bold; line-height: 20px;" href="http://charivne.info/rivne-news/rizdvyani-kolyadky-ta-shchedrivky-teksty-pisen">	<img src="http://charivne.info/img2/20160102202511.jpg" alt="" style="width: 200px;"></a>
            </div>
            <div style="width:160px;">
                <a style="font-size: 12px; font-weight: bold; line-height: 20px;" href="http://charivne.info/rivne-news/rizdvyani-kolyadky-ta-shchedrivky-teksty-pisen">Різдвяні колядки та щедрівки (тексти пісень)</a>
            </div>
        </div>
        <div style="height: 200px; margin-right:15px; float:left;">
            <div style="width:170px; height: 100px; overflow:hidden;">
                <a style="font-size: 12px; font-weight: bold; line-height: 20px;" href="http://charivne.info/rivne-news/na-majdani-nezalezhnosti-zapratsyuvav-punkt-obihrivu-">	<img src="http://charivne.info/img2/20160105161858.jpg" alt="" style="width: 200px;"></a>
            </div>
            <div style="width:160px;">
                <a style="font-size: 12px; font-weight: bold; line-height: 20px;" href="http://charivne.info/rivne-news/na-majdani-nezalezhnosti-zapratsyuvav-punkt-obihrivu-">На майдані Незалежності запрацював пункт обігріву </a>
            </div>
        </div>
        <div style="height: 200px; margin-right:15px; float:left;">
            <div style="width:170px; height: 100px; overflow:hidden;">
                <a style="font-size: 12px; font-weight: bold; line-height: 20px;" href="http://charivne.info/rivne-news/deputaty-zaslukhaly-smachylo">	<img src="http://charivne.info/img2/20160105160231.JPG" alt="" style="width: 200px;"></a>
            </div>
            <div style="width:160px;">
                <a style="font-size: 12px; font-weight: bold; line-height: 20px;" href="http://charivne.info/rivne-news/deputaty-zaslukhaly-smachylo">Депутати заслухали Смачило</a>
            </div>
        </div>
        <div style="height: 200px; margin-right:15px; float:left;">
            <div style="width:170px; height: 100px; overflow:hidden;">
                <a style="font-size: 12px; font-weight: bold; line-height: 20px;" href="http://charivne.info/rivne-news/lozovyj-zajshov-do-kovalchuka">	<img src="http://charivne.info/img2/20160105155004.png" alt="" style="width: 200px;"></a>
            </div>
            <div style="width:160px;">
                <a style="font-size: 12px; font-weight: bold; line-height: 20px;" href="http://charivne.info/rivne-news/lozovyj-zajshov-do-kovalchuka">Лозовий зайшов до Ковальчука</a>
            </div>
        </div>
        <div style="height: 200px; margin-right:15px; float:left;">
            <div style="width:170px; height: 100px; overflow:hidden;">
                <a style="font-size: 12px; font-weight: bold; line-height: 20px;" href="http://charivne.info/rivne-news/30-rivnyan-otrymayut-na-likuvannya-po-dvi-tysyachi">	<img src="http://charivne.info/img2/20160105153754.jpg" alt="" style="width: 200px;"></a>
            </div>
            <div style="width:160px;">
                <a style="font-size: 12px; font-weight: bold; line-height: 20px;" href="http://charivne.info/rivne-news/30-rivnyan-otrymayut-na-likuvannya-po-dvi-tysyachi">30 рівнян отримають на лікування по дві тисячі</a>
            </div>
        </div>
        <div class="clear"></div>

    </div>

    <div class="quote space_bottom_m clearfix">
        <div class="head">

        </div>
        <blockquote>
        </blockquote>
    </div>



    <div class="mT40">

        <div class="clearfix">


            <!-- Orakul 4.0 azure 12x1 -->
            <style>
                .orakul-azure-block {margin:3px;border:1px solid #ebebeb;-moz-border-radius:10px;-webkit-border-radius:10px;border-radius:10px;}
                .orakul-azure-block .orakul-ttl {background:#f7f7f7;-moz-border-radius:10px 10px 0 0;-webkit-border-radius:10px 10px 0 0;border-radius:10px 10px 0 0;height:21px;overflow:hidden;zoom:1;border-bottom:1px solid #f7f7f7;}
                .orakul-azure-block .orakul-ttl a.orakul-title {font-size:12px;font-family:Arial;color:#154081;text-decoration:none;font-weight:bold;display:block;float:left;margin:3px 5px 0 7px;}
                .orakul-azure-block .orakul-ttl a.orakul-logo {float:right;margin:3px 8px 0 0;_background:none;_filter:progid:DXImageTransform.Microsoft.AlphaImageLoader (src='http://informers.orakul.com/inf_img/orakul-logo.png',sizingMethod='scale');width:65px;height:16px;}
                .orakul-azure-block .orakul-ttl a.orakul-logo img {border:none;_display:none;}
                .orakul-azure-block .orakul-content {background:#FFF;padding:5px;}
                .orakul-azure-block .orakul-content td {text-align:center;}
                .orakul-azure-block .orakul-content a {color:#154081;font-size:12px;font-family:Arial;text-decoration:none;}
                .orakul-azure-block .orakul-content img {border:0;}

                .orakul-azure-block .orakul-footer {background:#fff;-moz-border-radius:0 0 10px 10px;-webkit-border-radius:0 0 10px 10px;border-radius:0 0 10px 10px;height:21px;overflow:hidden;zoom:1;border-top:1px solid #f7f7f7;text-align:center;}
                .orakul-azure-block .orakul-footer a {color:#154081;font-size:11px;font-family:Arial;position:relative;top:0;}
            </style>
            <script type="text/javascript">
                function siClickCountOrakul(){
                    var orCount=document.createElement("script");
                    orCount.setAttribute("type","text/javascript");
                    orCount.setAttribute("src","http://informers.orakul.ua/counter.php?lang=ru&rnd="+new Date().valueOf());
                    document.getElementsByTagName("head")[0].appendChild(orCount);
                }
            </script>
            <div class="orakul-azure-block">
                <div class="orakul-ttl">
                    <a onmousedown="siClickCountOrakul();" href="http://orakul.ua/" class="orakul-title" target="_blank">Гороскоп</a>
                    <a onmousedown="siClickCountOrakul();" href="http://orakul.ua/" class="orakul-logo" target="_blank"><img src="http://informers.orakul.ua/inf_img/orakul-logo.png" width="65" height="16"></a>
                </div>
                <div class="orakul-content">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tbody><tr>
                            <td align="center">
                                <a onmousedown="siClickCountOrakul();" href="http://orakul.ua/horoscope/astro/general/today/aries.html" target="_blank"><img src="http://informers.orakul.ua/inf_img/ico-aries.gif" width="52" height="52"></a>
                                <br>
                                <a onmousedown="siClickCountOrakul();" href="http://orakul.ua/horoscope/astro/general/today/aries.html" target="_blank">Овен</a>
                            </td>
                            <td>
                                <a onmousedown="siClickCountOrakul();" href="http://orakul.ua/horoscope/astro/general/today/taurus.html" target="_blank"><img src="http://informers.orakul.ua/inf_img/ico-taurus.gif" width="52" height="52"></a>
                                <br>
                                <a onmousedown="siClickCountOrakul();" href="http://orakul.ua/horoscope/astro/general/today/taurus.html" target="_blank">Телец</a>
                            </td>
                            <td>
                                <a onmousedown="siClickCountOrakul();" href="http://orakul.ua/horoscope/astro/general/today/gemini.html" target="_blank"><img src="http://informers.orakul.ua/inf_img/ico-gemini.gif" width="52" height="52"></a>
                                <br>
                                <a onmousedown="siClickCountOrakul();" href="http://orakul.ua/horoscope/astro/general/today/gemini.html" target="_blank">Близнецы</a>
                            </td>
                            <td>
                                <a onmousedown="siClickCountOrakul();" href="http://orakul.ua/horoscope/astro/general/today/cancer.html" target="_blank"><img src="http://informers.orakul.ua/inf_img/ico-cancer.gif" width="52" height="52"></a>
                                <br>
                                <a onmousedown="siClickCountOrakul();" href="http://orakul.ua/horoscope/astro/general/today/cancer.html" target="_blank">Рак</a>
                            </td>
                            <td>
                                <a onmousedown="siClickCountOrakul();" href="http://orakul.ua/horoscope/astro/general/today/lion.html" target="_blank"><img src="http://informers.orakul.ua/inf_img/ico-leo.gif" width="52" height="52"></a>
                                <br>
                                <a onmousedown="siClickCountOrakul();" href="http://orakul.ua/horoscope/astro/general/today/lion.html" target="_blank">Лев</a>
                            </td>
                            <td>
                                <a onmousedown="siClickCountOrakul();" href="http://orakul.ua/horoscope/astro/general/today/virgo.html" target="_blank"><img src="http://informers.orakul.ua/inf_img/ico-virgo.gif" width="52" height="52"></a>
                                <br>
                                <a onmousedown="siClickCountOrakul();" href="http://orakul.ua/horoscope/astro/general/today/virgo.html" target="_blank">Дева</a>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <a onmousedown="siClickCountOrakul();" href="http://orakul.ua/horoscope/astro/general/today/libra.html" target="_blank"><img src="http://informers.orakul.ua/inf_img/ico-libra.gif" width="52" height="52"></a>
                                <br>
                                <a onmousedown="siClickCountOrakul();" href="http://orakul.ua/horoscope/astro/general/today/libra.html" target="_blank">Весы</a>
                            </td>
                            <td>
                                <a onmousedown="siClickCountOrakul();" href="http://orakul.ua/horoscope/astro/general/today/scorpio.html" target="_blank"><img src="http://informers.orakul.ua/inf_img/ico-scorpio.gif" width="52" height="52"></a>
                                <br>
                                <a onmousedown="siClickCountOrakul();" href="http://orakul.ua/horoscope/astro/general/today/scorpio.html" target="_blank">Скорпион</a>
                            </td>
                            <td>
                                <a onmousedown="siClickCountOrakul();" href="http://orakul.ua/horoscope/astro/general/today/sagittarius.html" target="_blank"><img src="http://informers.orakul.ua/inf_img/ico-sagittarius.gif" width="52" height="52"></a>
                                <br>
                                <a onmousedown="siClickCountOrakul();" href="http://orakul.ua/horoscope/astro/general/today/sagittarius.html" target="_blank">Стрелец</a>
                            </td>
                            <td>
                                <a onmousedown="siClickCountOrakul();" href="http://orakul.ua/horoscope/astro/general/today/capricorn.html" target="_blank"><img src="http://informers.orakul.ua/inf_img/ico-capricorn.gif" width="52" height="52"></a>
                                <br>
                                <a onmousedown="siClickCountOrakul();" href="http://orakul.ua/horoscope/astro/general/today/capricorn.html" target="_blank">Козерог</a>
                            </td>
                            <td>
                                <a onmousedown="siClickCountOrakul();" href="http://orakul.ua/horoscope/astro/general/today/aquarius.html" target="_blank"><img src="http://informers.orakul.ua/inf_img/ico-aquarius.gif" width="52" height="52"></a>
                                <br>
                                <a onmousedown="siClickCountOrakul();" href="http://orakul.ua/horoscope/astro/general/today/aquarius.html" target="_blank">Водолей</a>
                            </td>
                            <td>
                                <a onmousedown="siClickCountOrakul();" href="http://orakul.ua/horoscope/astro/general/today/pisces.html" target="_blank"><img src="http://informers.orakul.ua/inf_img/ico-pisces.gif" width="52" height="52"></a>
                                <br>
                                <a onmousedown="siClickCountOrakul();" href="http://orakul.ua/horoscope/astro/general/today/pisces.html" target="_blank">Рыбы</a>
                            </td>
                        </tr>
                        </tbody></table>
                </div>
                <div class="orakul-footer">
                    <a onmousedown="siClickCountOrakul();" href="http://sonnik.orakul.ua/" target="_blank">тлумачення снів</a>
                </div>
            </div>
            <!-- Orakul 4.0 azure 12x1 -->

        </div>

        <!--  News Join -->

        <div class="clearfix">
            <style>

                .join_informer_2530 * { border: none; padding: 0; margin: 0; }

                .join_informer_2530 { text-align:left; clear: both; padding: 5px;}

                .join_informer_2530 a.join_link, a.join_text {font-size: 13px;
                    font-family: Arial; margin-bottom:10px;
                    color:#000000;text-decoration:none; font-weight:normal;}

                .join_informer_2530 a.join_link:hover, a.join_text:hover {
                    color:#000000;text-decoration:underline;}

                .join_informer_2530 .join_img {width: 90px; height: 90px;
                    margin-right: 2px; }

            </style>


            <div class="join_informer_2530" id="join_informer_2530">

                <a href="http://weather.join.ua">Погода</a>, <a href="http://news.join.ua">Новости</a>, загрузка...

            </div>


            <!-- Асинхронный код, 27.05.2013 -->

            <script type="text/javascript">  (function() {

                    var i = document.createElement("script"); i.type =
                        "text/javascript"; i.async = true; i.charset = "UTF-8";

                    i.src = "http://partner.join.com.ua/async/2530/";

                    var s = document.getElementsByTagName("script")[0];
                    s.parentNode.insertBefore(i, s);

                })();</script>

            <!--  News Join -->
        </div>					</div>
    <div class="mT40">
        <div id="n4p_29549">Loading...</div>
        <script type="text/javascript" charset="utf-8">
            (function(d,s){
                var o=d.createElement(s);
                o.async=true;
                o.type="text/javascript";
                o.charset="utf-8";
                o.src="http://js.ua.redtram.com/n4p/0/29/ticker_29549.js";
                var x=d.getElementsByTagName(s)[0];
                x.parentNode.insertBefore(o,x);
            })(document,"script");
        </script>
    </div>
</div>


<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

    <?php print $user_picture; ?>

    <?php print render($title_prefix); ?>
    <?php if (!$page): ?>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>
    <?php print render($title_suffix); ?>

    <?php if ($display_submitted): ?>
        <div class="submitted">
            <?php print $submitted; ?>
        </div>
    <?php endif; ?>

    <div class="content"<?php print $content_attributes; ?>>
        <?php
            // We hide the comments and links now so that we can render them later.
            hide($content['comments']);
            hide($content['links']);
            print render($content);
        ?>
    </div>

    <?php print render($content['links']); ?>

    <?php print render($content['comments']); ?>

</div>
