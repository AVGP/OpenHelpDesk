<html>
    <head>
        <title>OpenHelpDesk - <?php echo $title_for_layout; ?></title>
        <?php echo $html->css('screen','stylesheet',array('media' => 'screen,projection')); ?>
        <?php echo $html->css('screen','stylesheet',array('media' => 'screen,projection')); ?>
        <?php echo $html->css('layout','stylesheet'); ?>
        <!--[if lt IE 8]>
            <?php echo $html->css('ie','stylesheet',array('media' => 'screen,projection')); ?>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <div class="span-24 last" id="navigation">
                <div class="span-20">Links</div>
                <div class="span-4 last" id="shorstats">Statistics</div>
            </div>
            <div class="span-24 last">
                <?php echo $content_for_layout; ?>
            </div>
        </div>
    </body>
</html> 
