<?php
new UkuaPage(
    "Ukua | 403",
    UkuaMessages::getMessage('403-desc', Ukua::getLang()),
    /** @lang HTML */ "<main class='page'>
    <section class='page-section'>
        <div class='container'>
            <div class='page-title strong'>
                <p>403 - " . UkuaMessages::getMessage('Access-Forbidden', Ukua::getLang()) . "</p>
            </div>
        </div>
    </section>
</main>"
);