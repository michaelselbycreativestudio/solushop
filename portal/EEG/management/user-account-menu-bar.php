<!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $ManagerUsername; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li  style="background-color: #333!important;" class="user-header bg-light-blue">
                                    <img src="../../assets/management/img/default-avatar.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $ManagerFullName; ?>
                                    </p>
                                </li>
                                
                                <!-- Menu Footer-->
                                <li class="user-body">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>