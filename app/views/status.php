<?php
new UkuaPage(
    "Ukua | " . UkuaMessages::getMessage('Status', Ukua::getLang()),
    "
<main class='page'>
    <section class='page-info'>
        <div class='container'>
            <div class='row p-2 status-table'>
                <div class='col-sm-12 p-2 status-item'>
                    <div class='row'>
                        <div class='col text-left'>
                            <h5>" . UkuaMessages::getMessage('Authentication', Ukua::getLang()) . "</h5>
                        </div>
                        <div class='col text-right'>
                            <span class='spinner-grow spinner-grow-sm' id='authStatus' role='status'></span>
                        </div>
                    </div>
                </div>
                <div class='col-sm-12 p-2 status-item'>
                    <div class='row'>
                        <div class='col text-left'>
                            <h5>" . UkuaMessages::getMessage('Database', Ukua::getLang()) . "</h5>
                        </div>
                        <div class='col text-right'>
                            <span class='spinner-grow spinner-grow-sm' id='dbStatus' role='status'></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
",
    "
firebase.database().ref().child('.info/connected').on('value', connectedSnap => {
    $('#authStatus').css('color', connectedSnap.val() === true ? '#3dcf00' : '#c80000');
    $('#dbStatus').css('color', connectedSnap.val() === true ? '#3dcf00' : '#c80000');
});
"
);