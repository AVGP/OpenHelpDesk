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
                <div class="span-20">
                    <ul class="horizontal_linklist">
                        <li><?php echo $html->link('Dashboard','/users/dashboard'); ?></li>
                        <li><?php echo $html->link('My Tickets','/tickets/search/owner/me'); ?></li>
                        <li><?php echo $html->link('Queues','/queues/'); ?></li>
                        <li><?php echo $html->link('New Ticket','/tickets/add'); ?></li>
                        <li><?php echo $html->link('Admin','/pages/admin'); ?></li>
                        <li><?php echo $html->link('Logout','/users/logout'); ?></li>
                    </ul>
                </div>
                <div class="span-4 last" id="shorstats">Statistics</div>
            </div>
            <div class="span-24 last">
                <?php echo $content_for_layout; ?>
            </div>
        </div>
    </body>
</html> 
