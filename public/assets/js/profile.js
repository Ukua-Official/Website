class UkuaProfile {

    _pE
    _pTE
    _fE
    _fTE
    _sP
    _pUrl
    _u
    _b
    _e
    _isLT
    _cT

    constructor() {
        this._pE = $('.page-event')
        this._pTE = $('.page-event #pageTextEvent')
        this._fE = $('.form-event')
        this._fTE = $('.form-event #formTextEvent')
        this._sP = $('section.page-section')
        this._pUrl = $('#photoUrl')
        this._u = $('#username')
        this._b = $('#birthday')
        this._e = $('#email')

        firebase.auth().Gc(u => {
            if (!u)
                window.location.replace('/Website/public/index.html')
            else {
                this._sP.attr('user-uid', firebase.auth().currentUser.uid)
                firebase.database().ref('users/' + u.uid + '/').once('value')
                    .then(d => {
                        this._pUrl.attr('placeholder', d.val().photoUrl ? d.val().photoUrl : 'N/A')
                        this._u.attr('placeholder', d.val().username)
                        this._b.attr('placeholder', d.val().birthday ? d.val().birthday : 'N/A')
                        this._e.attr('placeholder', u.email)
                    })
                    .catch(e => {
                        this._pE.addClass('show')
                        this._pTE.val('Impossible de charger le profil. (' + e.code + ')')
                    })
                    .finally(() => {
                        $('main.page').addClass('show')
                    })
            }
        })

        $('#btnPhotoUrl').click(() => {
            this._pUrl.attr("disabled", "")
            this._fE.removeClass('event-success event-error')
            this._fE.addClass('show')
            this._pfEM(null, null, this._fTE, 'Chargement...')
            this._pUrl.val() && this._pUrl.val().match(new RegExp(/https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\\+.~#?&/=]*)/gi)) ?
                firebase.database().ref("users/" + this._sP.attr("user-uid"))
                    .update({photoUrl: this._pUrl.val()})
                    .then(() => this._ic(this._pUrl) && this._pfEM(this._pUrl, "event-success", this._fTE, "Modification avec succès, application des changements dans quelques instants..."))
                    .catch(a => this._pfEM(this._pUrl, "event-error", this._fTE, "Modification échouée. (" + a.code + ")")) :
                this._pfEM(this._pUrl, "event-error", this._fTE, "Modification échouée. (not-url-input)")
            this._lt()
        })

        $('#btnEMail').click(() => {
            this._e.attr("disabled", "")
            this._fE.removeClass('event-success event-error')
            this._fE.addClass('show')
            this._pfEM(null, null, this._fTE, 'Chargement...')
            this._e.val() && this._e.val().match(new RegExp(/[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/gi)) ?
                firebase.auth().currentUser.Ab(this._e.val())
                    .then(() => this._ic(this._e) && this._pfEM(this._e, "event-success", this._fTE, "Modification avec succès, application des changements dans quelques instants..."))
                    .catch(b => this._pfEM(this._e, "event-error", this._fTE, "Modification échouée. (" + b.code + ")")) :
                this._pfEM(this._e, "event-error", this._fTE, "Modification échouée. (not-email-input)")
            this._lt()
        })

        $('#btnUsername').click(() => {
            this._u.attr("disabled", "")
            this._fE.removeClass('event-success event-error')
            this._fE.addClass('show')
            this._pfEM(null, null, this._fTE, 'Chargement...')
            this._u.val() && this._u.val().match(new RegExp(/([a-zA-Z_.0-9]).{3,16}/gi)) ?
                firebase.database().ref("users").once("value").then(a => {
                    a.forEach(a => {
                        if (this._u.val() === a.val().username) return true
                    }) ?
                        this._pfEM(this._u, "event-error", this._fTE, "Modification échouée. (already-username-exist)") :
                        firebase.database().ref("users/" + this._sP.attr("user-uid"))
                            .update({username: this._u.val()})
                            .then(() => this._ic(this._u) && this._pfEM(this._u, "event-success", this._fTE, "Modification avec succès, application des changements dans quelques instants..."))
                            .catch(b => this._pfEM(this._u, "event-error", this._fTE, "Modification échouée. (" + b.code + ")"))
                }).catch(a => this._pfEM(this._u, "event-error", this._fTE, "Modification échouée. (" + a.code + ")")) :
                this._pfEM(this._u, "event-error", this._fTE, "Modification échouée. (str-bad-format)")
            this._lt()
        })

    }

    _pfEM(i, c, pf, s) {
        c && this._fE.addClass(c)
        pf.html('<span class="spinner-grow spinner-grow-sm" role="status"></span>&nbsp;' + s)
        i && i.attr("disabled", null)
        return true;
    }

    _ic(i) {
        i.attr('placeholder', i.val())
        i.val("")
        return true;
    }

    _lt() {
        this._isLT && clearTimeout(this._cT)
        this._isLT = true
        this._cT = setTimeout(() => this._fE.removeClass("show"), 3e3)
        return true;
    }
}

$(document).ready(() => new UkuaProfile())