<!--suppress HtmlUnknownTarget -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
    <title><?php echo UkuaPage::getTitle(); ?></title>
    <meta content="<?php echo UkuaPage::getTitle(); ?>" name="twitter:title">
    <meta content="<?php echo UkuaPage::getDescription(); ?>" name="description">
    <meta content="<?php echo UkuaPage::getDescription(); ?>" name="twitter:description">
    <meta content="/public/assets/img/logo_<?php echo UkuaPage::getTheme(); ?>_180x180.png" name="twitter:image">
    <meta content="/public/assets/img/logo_<?php echo UkuaPage::getTheme(); ?>_180x180.png" property="og:image">
    <meta content="website" property="og:type">
    <meta content="summary" name="twitter:card">
    <link href="/public/assets/img/logo_<?php echo UkuaPage::getTheme(); ?>_16x16.png" rel="icon" sizes="16x16"
          type="image/png">
    <link href="/public/assets/img/logo_<?php echo UkuaPage::getTheme(); ?>_32x32.png" rel="icon" sizes="32x32"
          type="image/png">
    <link href="/public/assets/img/logo_<?php echo UkuaPage::getTheme(); ?>_180x180.png" rel="icon" sizes="180x180"
          type="image/png">
    <link href="/public/assets/img/logo_<?php echo UkuaPage::getTheme(); ?>_192x192.png" rel="icon" sizes="192x192"
          type="image/png">
    <link href="/public/assets/img/logo_<?php echo UkuaPage::getTheme(); ?>_512x512.png" rel="icon" sizes="512x512"
          type="image/png">
    <link href="/public/assets/manifest.php" rel="manifest">
    <link href="/public/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet">
    <link href="/public/assets/css/<?php echo UkuaPage::getTheme(); ?>.css" rel="stylesheet">
    <link href="/public/assets/css/style.css" rel="stylesheet">
</head>

<body>

<nav class="navigation-bar navigation-expand-lg fixed-top gradient">
    <div class="container-fluid">
        <a class="navigation-title pulse animated infinite logo" href="/">Ukua</a>
        <button class="navigation-toggler" data-target="#navbarNav" data-toggle="collapse">
            <span class="navigation-toggler-icon">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </button>
        <div class="collapse navigation-collapse" id="navbarNav">
            <ul class="navigation navigation-list ml-auto" id="navList">
                <li class="navigation-item">
                    <a class="navigation-link" href="/">
                        <i class="fa fa-home"></i>&nbsp;<?php echo UkuaMessages::getMessage('Home', Ukua::getLang()) ?>
                    </a>
                </li>
                <li class="navigation-item" id="navLoading">
                    <a class="navigation-link loading">
                        <i class="spinner-border spinner-border-sm"
                           role="status"></i>&nbsp;<?php echo UkuaMessages::getMessage('Loading', Ukua::getLang()) ?>...
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php echo UkuaPage::getMain(); ?>

<footer class="footer">
    <div class="shadow footer-spacer"></div>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-start">
            <div class="col-sm-12 col-md-12 col-lg-4 item text">
                <h3>
                    <i class="fa fa-bullhorn"></i>&nbsp;<?php echo UkuaMessages::getMessage('What-is-Ukua?', Ukua::getLang()) ?>
                </h3>
                <p class="text-left"><?php echo UkuaMessages::getMessage('Ukua-is', Ukua::getLang()) ?></p>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 item">
                <h3>
                    <i class="fa fa-external-link"></i>&nbsp;<?php echo UkuaMessages::getMessage('Links', Ukua::getLang()) ?>
                </h3>
                <ul>
                    <li>
                        <a class="d-flex align-items-center" href="/team">
                            <i class="fa fa-chevron-right"></i>&nbsp;<?php echo UkuaMessages::getMessage('Team', Ukua::getLang()) ?>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="/partner">
                            <i class="fa fa-chevron-right"></i>&nbsp;<?php echo UkuaMessages::getMessage('Partner', Ukua::getLang()) ?>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="/contact">
                            <i class="fa fa-chevron-right"></i>&nbsp;<?php echo UkuaMessages::getMessage('Contact', Ukua::getLang()) ?>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 item">
                <h3>
                    <i class="fa fa-list-alt"></i>
                    &nbsp;<?php echo UkuaMessages::getMessage('Others', Ukua::getLang()) ?>
                </h3>
                <ul>
                    <li>
                        <a class="d-flex align-items-center" href="/legals">
                            <i class="fa fa-chevron-right"></i>&nbsp;<?php echo UkuaMessages::getMessage('Legals-Notices', Ukua::getLang()) ?>
                        </a>
                        <a class="d-flex align-items-center" href="/changelog">
                            <i class="fa fa-chevron-right"></i>&nbsp;Changelog
                        </a>
                        <a class="d-flex align-items-center" href="/status">
                            <i class="fa fa-chevron-right"></i>&nbsp;<?php echo UkuaMessages::getMessage('Servers-status', Ukua::getLang()) ?>
                            <i class="fa fa-server" id="status"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <p class="copyright">
            <?php echo UkuaMessages::getMessage('Developed-with', Ukua::getLang()) ?>&nbsp;
            <i class="fa fa-heart"></i>
            &nbsp;<?php echo UkuaMessages::getMessage('by', Ukua::getLang()) ?> <strong>Levasseur Wesley</strong>
            <br/>
            <strong>Ukua</strong> &copy; 2020
            - <?php echo UkuaMessages::getMessage('All-rights-reserved', Ukua::getLang()) ?>.
        </p>
    </div>
</footer>

<span class="btn ukua-btn btn-lg box-shadow scrollToTopButton" role="button"><i class="fa fa-arrow-up"></i></span>

<script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script defer src="https://www.gstatic.com/firebasejs/8.0.1/firebase-app.js"></script>
<script defer src="https://www.gstatic.com/firebasejs/8.0.1/firebase-analytics.js"></script>
<script defer src="https://www.gstatic.com/firebasejs/8.0.1/firebase-auth.js"></script>
<script defer src="https://www.gstatic.com/firebasejs/8.0.1/firebase-database.js"></script>
<script defer src="/public/assets/js/firebase-init.min.js"></script>
<script defer>
    $(document).ready(() => {
        firebase.auth().onAuthStateChanged(function (user) {
            $('#navLoading').remove()
            if (user) {
                $('#navList').append(
                    "<li class='navigation-item'>" +
                    "<a class='navigation-link' href='/friends' id='nav-friends'>" +
                    "<i class='fa fa-users'></i>&nbsp;<?php echo UkuaMessages::getMessage('Friends', Ukua::getLang()); ?>" +
                    "</a>" +
                    "</li>" +
                    "<li class='navigation-item'>" +
                    "<a class='navigation-link' href='/messages' id='nav-messages'>" +
                    "<i class='fa fa-envelope-o'></i>&nbsp;<?php echo UkuaMessages::getMessage('Messages', Ukua::getLang()); ?>" +
                    "</a>" +
                    "</li>" +
                    "<li class='navigation-item dropdown'>" +
                    "<a class='dropdown-toggle navigation-link' data-toggle='dropdown'>" +
                    "<img alt='X' class='rounded-circle' height='20' loading='lazy' src='" + (user.photoUrl != null ? user.photoUrl : "https://www.gravatar.com/avatar?s=128") + "' width='20'>" +
                    "</a>" +
                    "<div class='dropdown-menu border-0 p-0'>" +
                    "<div class='gradient item-1'>" +
                    "<a class='dropdown-item' href='/profile'>" +
                    "<i class='fa fa-user'></i>&nbsp;<?php echo UkuaMessages::getMessage('Profile', Ukua::getLang()); ?>" +
                    "</a>" +
                    "</div>" +
                    "<div class='gradient item-2'>" +
                    "<a class='dropdown-item' href='/settings'>" +
                    "<i class='fa fa-gear'></i>&nbsp;<?php echo UkuaMessages::getMessage('Settings', Ukua::getLang()); ?>" +
                    "</a>" +
                    "</div>" +
                    "<div class='gradient item-3'>" +
                    "<a class='dropdown-item' href='/auth/logout'>" +
                    "<i class='fa fa-sign-out'></i>&nbsp;<?php echo UkuaMessages::getMessage('Logout', Ukua::getLang()); ?>" +
                    "</a>" +
                    "</div>" +
                    "</div>" +
                    "</li>")
            } else {
                $('#navList').append(
                    "<li class='navigation-item'>" +
                    "<a class='navigation-link' href='/auth'>" +
                    "<i class='fa fa-sign-in'></i>&nbsp;<?php echo UkuaMessages::getMessage('Sign', Ukua::getLang()); ?>" +
                    "</a>" +
                    "</li>")
            }
            $('main.page').addClass('show')
        })
    })
    try {
        firebase.database().ref().child('.info/connected').on('value', connectedSnap => $("#status").css('color', connectedSnap.val() === true ? '#3dcf00' : '#c80000'));
    } catch (e) {
        $("#status").css('color', '#c80000')
    }
</script>
<?php if (UkuaPage::getScriptDefer() != null) { ?>
    <script defer>
        <?php echo UkuaPage::getScriptDefer(); ?>
    </script>
<?php } ?>
<?php if (UkuaPage::getScript() != null) { ?>
    <script>
        <?php echo UkuaPage::getScript(); ?>
    </script>
<?php } ?>
<script src="/public/assets/js/main.min.js"></script>

</body>

</html>