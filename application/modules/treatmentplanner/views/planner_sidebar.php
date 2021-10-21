<!-- main sidebar -->

    <aside style="margin-top: 78px;" id="sidebar_main">        
        <div class="menu_section">
            <ul>
                <?php
                    $dashboardList = array("index");
                    $dashboardListClass = in_array($this->router->fetch_method(), $dashboardList) ? "current_section" : "";
                ?>
                <li class="<?php echo $dashboardListClass; ?>">
                    <a href="<?= site_url('doctor'); ?>">
                        <span class="menu_icon"><i class="material-icons">dashboard</i></span>
                        <span class="menu_title">Dashboard</span>
                    </a>
                </li>
                <li class="new_treat">
                    <a href="<?= site_url('Treatmentplanner/create_planner'); ?>">
                        <span class="menu_icon"><i class="material-icons">dashboard</i></span>
                        <span class="menu_title">New Treatment Plan</span>
                    </a>
                </li>
                <li >
                    <a href="<?= site_url('Treatmentplanner/treatment_plan1'); ?>">
                        <span class="menu_icon"><i class="material-icons">dashboard</i></span>
                        <span class="menu_title">Treatment Plan 1</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('login/logout'); ?>">
                        <span class="menu_icon"><i class="material-icons">logout</i></span>
                        <span class="menu_title">Logout</span>
                    </a>
                </li>

            </ul>
        </div>
    </aside><!-- main sidebar end -->
    