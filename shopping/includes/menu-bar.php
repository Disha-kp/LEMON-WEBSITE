<div class="header-nav animate-dropdown" style="background-color:rgba(255, 255, 255,0.8);">
    <div class="container">
        <div class="yamm navbar navbar-default" role="navigation" style="background-color:rgb(99, 96, 81); border: none;">
            <div class="navbar-header">
                <button 
                    data-target="#mc-horizontal-menu-collapse" 
                    data-toggle="collapse" 
                    class="navbar-toggle collapsed" 
                    type="button" 
                    style="background-color:rgb(129, 118, 85); border-color:rgb(104, 97, 59);">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar" style="background-color: #FFFFFF;"></span>
                    <span class="icon-bar" style="background-color: #FFFFFF;"></span>
                    <span class="icon-bar" style="background-color: #FFFFFF;"></span>
                </button>
            </div>
            <div class="nav-bg-class">
                <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                    <div class="nav-outer">
                        <ul class="nav navbar-nav" style="color: #FFFFFF; font-weight: bold;">
                            <li class="active dropdown yamm-fw">
                                <a href="index.php" data-hover="dropdown" class="dropdown-toggle" style="color: #FFFFFF;">Home</a>
                            </li>
                            <?php 
                            $sql = mysqli_query($con, "select id,categoryName from category limit 6");
                            while ($row = mysqli_fetch_array($sql)) { ?>
                                <li class="dropdown yamm">
                                    <a href="category.php?cid=<?php echo $row['id'];?>" style="color: #FFFFFF;">
                                        <?php echo $row['categoryName']; ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                        <!-- /.navbar-nav -->
                        <div class="clearfix"></div>				
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
