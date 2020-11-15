<?php
new UkuaPage(
    "Ukua | 404",
    UkuaMessages::getMessage('404-desc', Ukua::getLang()),
    /** @lang HTML */ "<main class='page'>
    <section class='page-section'>
        <div class='container'>
            <div class='page-title strong'>
                <p>404 - " . UkuaMessages::getMessage('Access-Not-Found', Ukua::getLang()) . "</p>
            </div>
        </div>
    </section>
</main>",
);