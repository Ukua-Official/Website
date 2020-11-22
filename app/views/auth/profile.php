<?php

new UkuaPage(
    "Ukua | " . UkuaMessages::getMessage('Profile', Ukua::getLang()),
    UkuaMessages::getMessage('Profile-desc', Ukua::getLang()),
    /* @lang HTML */ "<main class='page'>
    <section class='page-section block profile'>
        <div class='container'>
            <h2 class='text-center pb-5'>" . UkuaMessages::getMessage('Profile', Ukua::getLang()) . "</h2>
            <div class='form-event'>
                <ul class='list-unstyled border rounded shadow-sm p-2'>
                    <li class='text-center' id='formTextEvent'>
                        <span class='spinner-grow spinner-grow-sm' role='status'></span>
                    </li>
                </ul>
            </div>
            <div class='form-row'>
                <div class='col-md-6'>
                    <div class='form-group'>
                        <div class='input-group'>
                            <div class='input-group-prepend'>
                                <span class='input-group-text'><i class='fa fa-photo'></i>&nbsp;Photo de profil</span>
                            </div>
                            <input autocomplete='off' class='form-control' id='photoUrl' placeholder='" . UkuaMessages::getMessage('Loading', Ukua::getLang()) . "'
                                   type='url'>
                            <div class='input-group-append'>
                                <button class='btn ukua-btn btn-block' id='btnPhotoUrl' type='submit'>
                                    <i class='fa fa-edit'></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class='form-group'>
                        <div class='input-group'>
                            <div class='input-group-prepend'><span class='input-group-text'><i
                                    class='fa fa-envelope'></i>&nbsp;Adresse mail</span>
                            </div>
                            <input autocomplete='off' class='form-control' id='email' placeholder='" . UkuaMessages::getMessage('Loading', Ukua::getLang()) . "'
                                   type='email'>
                            <div class='input-group-append'>
                                <button class='btn ukua-btn btn-block' id='btnEMail' type='submit'>
                                    <i class='fa fa-edit'></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class='form-group'>
                        <div class='input-group'>
                            <div class='input-group-prepend'>
                                <span class='input-group-text'><i class='fa fa-tag'></i>&nbsp;Nom d'utilisateur</span>
                            </div>
                            <input autocomplete='off' class='form-control' id='username' maxlength='16' minlength='3'
                                   placeholder='" . UkuaMessages::getMessage('Loading', Ukua::getLang()) . "'>
                            <div class='input-group-append'>
                                <button class='btn ukua-btn btn-block' id='btnUsername' type='submit'>
                                    <i class='fa fa-edit'></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class='form-group'>
                        <div class='input-group'>
                            <div class='input-group-prepend'>
                                <span class='input-group-text'><i
                                        class='fa fa-birthday-cake'></i>&nbsp;Anniversaire</span>
                            </div>
                            <input autocomplete='off' class='form-control' id='birthday' maxlength='10' minlength='8'
                                   placeholder='" . UkuaMessages::getMessage('Loading', Ukua::getLang()) . "'>
                            <div class='input-group-append'>
                                <button class='btn ukua-btn btn-block' id='btnBirthday' type='submit'>
                                    <i class='fa fa-edit'></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='col-md-12'>
                    <div class='form-group'>
                        <div class='input-group'>
                            <div class='input-group-prepend'>
                                <span class='input-group-text'><i class='fa fa-eye'></i>&nbsp;Bio</span>
                            </div>
                            <input autocomplete='off' class='form-control' id='bio' placeholder='" . UkuaMessages::getMessage('Loading', Ukua::getLang()) . "'/>
                            <div class='input-group-append'>
                                <button class='btn ukua-btn btn-block' id='btnBio' type='submit'>
                                    <i class='fa fa-edit'></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='col-md-4 d-flex justify-content-center'>
                    <div class='form-group' style='width: fit-content;'>
                        <div class='input-group' style='width: fit-content;'>
                            <div class='input-group-prepend'>
                                <span class='input-group-text' style='border-radius: .25rem;'><i
                                        class='fa fa-users'></i>&nbsp;? amis</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='col-md-4 d-flex justify-content-center mb-3 mb-md-0 mb-lg-0'>
                    <div class='dropdown'>
                        <button aria-expanded='false' class='btn ukua-btn dropdown-toggle' data-toggle='dropdown'
                                type='button'>Thème
                        </button>
                        <div class='dropdown-menu'>
                            <a class='dropdown-item disabled' id='lightTheme'><i class='fa fa-sun-o'></i>&nbsp;Light</a>
                            <a class='dropdown-item disabled' id='darkTheme'<i class='fa fa-moon-o'></i>&nbsp;Dark</a>
                        </div>
                    </div>
                </div>
                <div class='col-md-4 d-flex justify-content-center'>
                    <div class='form-group' style='width: fit-content;'>
                        <div class='input-group' style='width: fit-content;'>
                            <div class='input-group-prepend'>
                                <span class='input-group-text' style='border-radius: .25rem;'><i
                                        class='fa fa-envelope'></i>&nbsp;? discussions</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>",
    /* @lang JavaScript */ "class UkuaAuthProfile {

    _fdPrivateRef
    _fdPublicRef
    _pE
    _pTE
    _fE
    _fTE
    _pUrl
    _u
    _bd
    _bi
    _e
    _lT
    _dT
    _cssT
    _isLT
    _cT

    constructor() {
        firebase.auth().Gc(u => {
            if (!u) window.location.replace('/auth')
            else {
                this._pE = $('.page-event')
                this._pTE = $('.page-event #pageTextEvent')
                this._fE = $('.form-event')
                this._fTE = $('.form-event #formTextEvent')
                this._pUrl = $('#photoUrl')
                this._u = $('#username')
                this._bd = $('#birthday')
                this._bi = $('#bio')
                this._e = $('#email')
                this._e.attr('placeholder', u.email)
                this._lT = $('#lightTheme')
                this._dT = $('#darkTheme')
                this._cssT = $('#cssTheme')
                this._fdPrivateRef = firebase.database().ref('ukua/' + u.uid)
                this._fdPublicRef = firebase.database().ref('users/' + u.uid)
                if (Cookies.get('UkuaTheme')) Cookies.get('UkuaTheme') === 'light' ? this._dT.removeClass('disabled') : this._lT.removeClass('disabled')
                else this._dT.removeClass('disabled')
                this._fdPublicRef.once('value')
                    .then(d => this._pUrl.attr('placeholder', d.val().photoUrl ? unescape(d.val().photoUrl) : 'N/A') && this._u.attr('placeholder', unescape(d.val().username)))
                    .catch(e => this._pE.addClass('show') && this._pTE.append('<h3 class=\'p-1\'>Impossible de charger la partie publique du profil. (' + e.toString() + ')</h3>'))
                    .finally(() =>
                        this._fdPrivateRef.child('birthday').once('value')
                            .then(d => this._bd.attr('placeholder', d.val() ? unescape(d.val()) : 'dd/MM/AAAA'))
                            .catch(e => e.code === 'PERMISSION_DENIED' ? this._bd.attr('placeholder', 'dd/MM/AAAA') : this._pE.addClass('show') && this._pTE.append('<h3 class=\'p-1\'>Impossible de charger la partie privée du profil. (' + e.toString() + ')</h3>'))
                        && this._fdPrivateRef.child('bio').once('value')
                            .then(d => this._bi.attr('placeholder', d.val() ? unescape(d.val()) : 'N/A'))
                            .catch(e => e.code === 'PERMISSION_DENIED' ? this._bi.attr('placeholder', 'N/A') : this._pE.addClass('show') && this._pTE.append('<h3 class=\'p-1\'>Impossible de charger la partie privée du profil. (' + e.toString() + ')</h3>')))

                $('#btnPhotoUrl').click(() => {
                    this._pUrl.attr('disabled', '')
                    this._fE.removeClass('event-success event-error')
                    this._fE.addClass('show')
                    this._icpfs(null, null, this._fTE, '" . UkuaMessages::getMessage('Loading', Ukua::getLang()) . "')
                    this._pUrl.val() && (this._pUrl.val().toLowerCase() === 'n/a' || this._pUrl.val().match(new RegExp(/https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}([-a-zA-Z0-9()@:%_\+.~#?&/=]*)/))) ?
                        this._fdPublicRef.child('photoUrl')
                            .set(this._pUrl.val().toLowerCase() === 'n/a' ? null : unescape(this._pUrl.val()))
                            .then(() => this._ic(this._pUrl) && this._icpfs(this._pUrl, 'event-success', this._fTE, 'Modification avec succès, application des changements dans quelques instants...'))
                            .catch(e => this._icpfs(this._pUrl, 'event-error', this._fTE, 'Modification échouée. (' + e.code + ')')) :
                        this._icpfs(this._pUrl, 'event-error', this._fTE, 'Modification échouée. (input-malformated)')
                    this._lt()
                })

                $('#btnEMail').click(() => {
                    this._e.attr('disabled', '')
                    this._fE.removeClass('event-success event-error')
                    this._fE.addClass('show')
                    this._icpfs(null, null, this._fTE, '" . UkuaMessages::getMessage('Loading', Ukua::getLang()) . "')
                    this._e.val() && this._e.val().match(new RegExp(/[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/)) ?
                        firebase.auth().currentUser.Ab(this._e.val())
                            .then(() => this._ic(this._e) && this._icpfs(this._e, 'event-success', this._fTE, 'Modification avec succès, application des changements dans quelques instants...'))
                            .catch(e => this._icpfs(this._e, 'event-error', this._fTE, 'Modification échouée. (' + e.code + ')')) :
                        this._icpfs(this._e, 'event-error', this._fTE, 'Modification échouée. (input-malformated)')
                    this._lt()
                })

                $('#btnUsername').click(() => {
                    this._u.attr('disabled', '')
                    this._fE.removeClass('event-success event-error')
                    this._fE.addClass('show')
                    this._icpfs(null, null, this._fTE, '" . UkuaMessages::getMessage('Loading', Ukua::getLang()) . "')
                    this._u.val() && this._u.val().match(new RegExp(/([a-zA-Z_.0-9]).{2,16}/gi)) ?
                        firebase.database().ref('users').orderByChild('username').equalTo(this._u.val()).once('value')
                            .then(a => a.exists() ? this._icpfs(this._u, 'event-error', this._fTE, 'Modification échouée. (auth/username-already-in-use)') :
                                this._fdPublicRef.child('username')
                                    .set(unescape(this._u.val()))
                                    .then(() => this._ic(this._u) && this._icpfs(this._u, 'event-success', this._fTE, 'Modification avec succès, application des changements dans quelques instants...'))
                                    .catch(b => this._icpfs(this._u, 'event-error', this._fTE, 'Modification échouée. (' + b.code + ')')))
                            .catch(a => this._icpfs(this._u, 'event-error', this._fTE, 'Modification échouée. (' + a.code + ')')) :
                        this._icpfs(this._u, 'event-error', this._fTE, 'Modification échouée. (input-malformated)')
                    this._lt()
                })

                $('#btnBirthday').click(() => {
                    this._bd.attr('disabled', '')
                    this._fE.removeClass('event-success event-error')
                    this._fE.addClass('show')
                    this._icpfs(null, null, this._fTE, '" . UkuaMessages::getMessage('Loading', Ukua::getLang()) . "')
                    let _m
                    this._bd.val() && (this._bd.val().toLowerCase() === 'n/a' || (_m = this._bd.val().match(new RegExp(/(0?[1-9]|[1-2][0-9]|3[0-1])[\/](0?[1-9]|1[0-2])[\/](\d{4})/gi)))) ?
                        parseInt(_m.toString().split('/')[2]) <= new Date().getFullYear() - 13 ?
                            this._fdPrivateRef.child('birthday')
                                .set(this._bd.val().toLowerCase() === 'n/a' ? null : unescape(this._bd.val()))
                                .then(() => this._ic(this._bd) && this._icpfs(this._bd, 'event-success', this._fTE, 'Modification avec succès, application des changements dans quelques instants...'))
                                .catch(b => this._icpfs(this._bd, 'event-error', this._fTE, 'Modification échouée. (' + b.code + ')')) :
                            this._icpfs(this._bd, 'event-error', this._fTE, 'Modification échouée. (age-too-low)') :
                        this._icpfs(this._bd, 'event-error', this._fTE, 'Modification échouée. (input-malformated)')
                    this._lt()
                })

                $('#btnBio').click(() => {
                    this._bi.attr('disabled', '')
                    this._fE.removeClass('event-success event-error')
                    this._fE.addClass('show')
                    this._icpfs(null, null, this._fTE, '" . UkuaMessages::getMessage('Loading', Ukua::getLang()) . "')
                    this._bi.val() || (this._bi && this._bi.val().toLowerCase() === 'n/a') ?
                        this._fdPrivateRef.child('bio')
                            .set(this._bi.val().toLowerCase() === 'n/a' ? null : unescape(this._bi.val()))
                            .then(() => this._ic(this._bi) && this._icpfs(this._bi, 'event-success', this._fTE, 'Modification avec succès, application des changements dans quelques instants...'))
                            .catch(e => this._icpfs(this._bi, 'event-error', this._fTE, 'Modification échouée. (' + e.code + ')')) :
                        this._icpfs(this._bi, 'event-error', this._fTE, 'Modification échouée. (input-malformated)')
                    this._lt()
                })
            }
            this._lT.click(() => Cookies.set('UkuaTheme', 'light', {expires: 365}) && this._cssT.attr('href', '/public/assets/css/light.css') && this._lT.addClass('disabled') && this._dT.removeClass('disabled'))
            this._dT.click(() => Cookies.set('UkuaTheme', 'dark', {expires: 365}) && this._cssT.attr('href', '/public/assets/css/dark.css') && this._dT.addClass('disabled') && this._lT.removeClass('disabled'))
        })
    }

    _icpfs(i, c, pf, s) {
        c && this._fE.addClass(c)
        pf.html('<span class=\'spinner-grow spinner-grow-sm\' role=\'status\'></span>&nbsp;' + s)
        i && i.attr('disabled', null)
        return true
    }

    _ic(i) {
        i.attr('placeholder', unescape(i.val()))
        i.val('')
        return true
    }

    _lt() {
        this._isLT && clearTimeout(this._cT)
        this._isLT = true
        this._cT = setTimeout(() => this._fE.removeClass('show'), 3e3)
        return true
    }
}

$(document).ready(() => new UkuaAuthProfile())"
);