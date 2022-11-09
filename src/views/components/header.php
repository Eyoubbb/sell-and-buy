<header class="topnav">
    <!- Left side -->
    <ul>
        <li>
            <a href="#"><img src="/images/logo.svg" alt="" srcset=""></a>
        </li>
    </ul>
    <ul class="nav-item">
        <li>
            <?= '<a class="hover-link" href="">' . NAV_SHOP . '</a>' ?>
        </li>
        <li>
            <?= '<a class="hover-link" href="">' . NAV_PAGES . '</a>' ?>  
        </li>
        <li>
            <?= '<a class="hover-link" href="">' . NAV_COLLECTIONS . '</a>' ?>
        </li>
        <li>
            <?= '<a class="hover-link" href="">' . NAV_CREATOR . '</a>' ?>
        </li>
    </ul>
        <!-- right -->
    <ul class="nav-item right">
        <li>
            <a class="hover-link" href="">FR</a>
        </li>
        <li>
            <a class="hover-link" href="">EN</a>
        </li>
        <li>
            <?= '<a class="hover-link" href="">' . NAV_LOGIN . '</a>' ?>
        </li>
        <li>
            <?= '<a id="search" class="hover-link" href="">' . NAV_SEARCH . '</a>' ?>
        </li>
        <li>
            <form style="display:none" method="get">
                <div class="search-form">
                    <input type="text" name="" id="" placeholder="Search..." aria-label="search">
                </div>
            </form>
        </li>
    
    </ul>
</header>