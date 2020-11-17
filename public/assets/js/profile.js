class UkuaProfile {

    _pE
    _pTE
    _fE
    _fTE
    _sP
    _pUrl
    _u
    _bd
    _bi
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
        this._bd = $('#birthday')
        this._bi = $('#bio')
        this._e = $('#email')

        firebase.auth().Gc(u => {
            if (!u)
                window.location.replace('/auth')
            else {
                this._sP.attr('user-uid', u.uid)
                firebase.database().ref(`public/${u.uid}`).once('value')
                    .then(d => {
                        this._pUrl.attr('placeholder', d.val().photoUrl ? d.val().photoUrl : 'N/A')
                        this._bd.attr('placeholder', d.val().birthday ? d.val().birthday : 'dd/MM/AAAA')
                        this._bi.attr('placeholder', d.val().bio ? d.val().bio : 'N/A')
                        this._u.attr('placeholder', d.val().username)
                        this._e.attr('placeholder', u.email)
                    })
                    .catch(e => {
                        this._pE.addClass('show')
                        this._pTE.val('Impossible de charger le profil. (' + e.toString() + ')')
                    })
                    .finally(() => { //TODO: Delete this
                        $('main.page').addClass('show')
                    })
            }
        })

        $('#btnPhotoUrl').click(() => {
            this._pUrl.attr('disabled', '')
            this._fE.removeClass('event-success event-error')
            this._fE.addClass('show')
            this._pfEM(null, null, this._fTE, 'Chargement...')
            this._pUrl.val() && this._pUrl.val().match(new RegExp(/https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\\+.~#?&/=]*)/)) ?
                firebase.database().ref(`public/${this._sP.attr('user-uid')}`)
                    .update({photoUrl: this._pUrl.val()})
                    .then(() => this._ic(this._pUrl) && this._pfEM(this._pUrl, 'event-success', this._fTE, 'Modification avec succès, application des changements dans quelques instants...'))
                    .catch(e => this._pfEM(this._pUrl, 'event-error', this._fTE, 'Modification échouée. (' + e.code + ')')) :
                this._pfEM(this._pUrl, 'event-error', this._fTE, 'Modification échouée. (input-malformated)')
            this._lt()
        })

        $('#btnEMail').click(() => {
            this._e.attr('disabled', '')
            this._fE.removeClass('event-success event-error')
            this._fE.addClass('show')
            this._pfEM(null, null, this._fTE, 'Chargement...')
            this._e.val() && this._e.val().match(new RegExp(/[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/)) ?
                firebase.auth().currentUser.Ab(this._e.val())
                    .then(() => this._ic(this._e) && this._pfEM(this._e, 'event-success', this._fTE, 'Modification avec succès, application des changements dans quelques instants...'))
                    .catch(e => this._pfEM(this._e, 'event-error', this._fTE, 'Modification échouée. (' + e.code + ')')) :
                this._pfEM(this._e, 'event-error', this._fTE, 'Modification échouée. (input-malformated)')
            this._lt()
        })

        $('#btnUsername').click(() => {
            this._u.attr('disabled', '')
            this._fE.removeClass('event-success event-error')
            this._fE.addClass('show')
            this._pfEM(null, null, this._fTE, 'Chargement...')
            this._u.val() && this._u.val().match(new RegExp(/([a-zA-Z_.0-9]).{3,16}/gi)) ?
                firebase.database().ref('public').once('value')
                    .then(a => {
                        a.forEach(b => {
                            if (this._u.val() === b.val().username) return true
                        }) ?
                            this._pfEM(this._u, 'event-error', this._fTE, 'Modification échouée. (auth/username-already-in-use)') :
                            firebase.database().ref(`public/${this._sP.attr('user-uid')}`)
                                .update({username: this._u.val()})
                                .then(() => this._ic(this._u) && this._pfEM(this._u, 'event-success', this._fTE, 'Modification avec succès, application des changements dans quelques instants...'))
                                .catch(b => this._pfEM(this._u, 'event-error', this._fTE, 'Modification échouée. (' + b.code + ')'))
                    })
                    .catch(a => this._pfEM(this._u, 'event-error', this._fTE, 'Modification échouée. (' + a.code + ')')) :
                this._pfEM(this._u, 'event-error', this._fTE, 'Modification échouée. (input-malformated)')
            this._lt()
        })

        $('#btnBirthday').click(() => {
            this._bd.attr('disabled', '')
            this._fE.removeClass('event-success event-error')
            this._fE.addClass('show')
            this._pfEM(null, null, this._fTE, 'Chargement...')
            let _m;
            this._bd.val() && (_m = this._bd.val().match(new RegExp(/(0?[1-9]|[1-2][0-9]|3[0-1])[\/](0?[1-9]|1[0-2])[\/](\d{4})/gi))) ?
                console.log(_m, _m[1], _m[2], _m[3])
                /*firebase.database().ref('private/' + this._sP.attr('user-uid'))
                    .update({birthday: this._b.val()})
                    .then(() => this._ic(this._b) && this._pfEM(this._b, 'event-success', this._fTE, 'Modification avec succès, application des changements dans quelques instants...'))
                    .catch(b => this._pfEM(this._b, 'event-error', this._fTE, 'Modification échouée. (' + b.code + ')'))*/ :
                this._pfEM(this._bd, 'event-error', this._fTE, 'Modification échouée. (input-malformated)')
            this._lt()
        })

    }

    _pfEM(i, c, pf, s) {
        c && this._fE.addClass(c)
        pf.html('<span class=\'spinner-grow spinner-grow-sm\' role=\'status\'></span>&nbsp;' + s)
        i && i.attr('disabled', null)
        return true;
    }

    _ic(i) {
        i.attr('placeholder', i.val())
        i.val('')
        return true;
    }

    _lt() {
        this._isLT && clearTimeout(this._cT)
        this._isLT = true
        this._cT = setTimeout(() => this._fE.removeClass('show'), 3e3)
        return true;
    }
}

$(document).ready(() => new UkuaProfile())