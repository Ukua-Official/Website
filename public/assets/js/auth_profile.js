class UkuaAuthProfile {

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
    _isLT
    _cT

    constructor() {
        firebase.auth().Gc(u => {
            if (!u)
                window.location.replace('/auth')
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
                this._fdPrivateRef = firebase.database().ref(`private/${u.uid}`)
                this._fdPublicRef = firebase.database().ref(`public/${u.uid}`)
                this._fdPrivateRef.once('value')
                    .then(d => this._bd.attr('placeholder', d.val().birthday ? unescape(d.val().birthday) : 'dd/MM/AAAA') && this._bi.attr('placeholder', d.val().bio ? unescape(d.val().bio) : 'N/A'))
                    .catch(e => this._pE.addClass('show') && this._pTE.append('<h3 class="p-1">Impossible de charger la partie privée du profil. (' + e.toString() + ')</h3>'))
                    .finally(() =>
                        this._fdPublicRef.once('value')
                            .then(d => this._pUrl.attr('placeholder', d.val().photoUrl ? unescape(d.val().photoUrl) : 'N/A') && this._u.attr('placeholder', unescape(d.val().username)))
                            .catch(e => this._pE.addClass('show') && this._pTE.append('<h3 class="p-1">Impossible de charger la partie publique du profil. (' + e.toString() + ')</h3>')))
                //check number friends-chats

                $('#btnPhotoUrl').click(() => {
                    this._pUrl.attr('disabled', '')
                    this._fE.removeClass('event-success event-error')
                    this._fE.addClass('show')
                    this._icpfs(null, null, this._fTE, 'Chargement...')
                    this._pUrl.val() && this._pUrl.val().match(new RegExp(/https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\\+.~#?&/=]*)/)) ?
                        this._fdPublicRef
                            .update({photoUrl: unescape(this._pUrl.val())})
                            .then(() => this._ic(this._pUrl) && this._icpfs(this._pUrl, 'event-success', this._fTE, 'Modification avec succès, application des changements dans quelques instants...'))
                            .catch(e => this._icpfs(this._pUrl, 'event-error', this._fTE, 'Modification échouée. (' + e.code + ')')) :
                        this._icpfs(this._pUrl, 'event-error', this._fTE, 'Modification échouée. (input-malformated)')
                    this._lt()
                })

                $('#btnEMail').click(() => {
                    this._e.attr('disabled', '')
                    this._fE.removeClass('event-success event-error')
                    this._fE.addClass('show')
                    this._icpfs(null, null, this._fTE, 'Chargement...')
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
                    this._icpfs(null, null, this._fTE, 'Chargement...')
                    this._u.val() && this._u.val().match(new RegExp(/([a-zA-Z_.0-9]).{3,16}/gi)) ?
                        firebase.database().ref('public').once('value')
                            .then(a => {
                                a.forEach(b => {
                                    if (this._u.val() === b.val().username) return true
                                }) ?
                                    this._icpfs(this._u, 'event-error', this._fTE, 'Modification échouée. (auth/username-already-in-use)') :
                                    this._fdPublicRef
                                        .update({username: unescape(this._u.val())})
                                        .then(() => this._ic(this._u) && this._icpfs(this._u, 'event-success', this._fTE, 'Modification avec succès, application des changements dans quelques instants...'))
                                        .catch(b => this._icpfs(this._u, 'event-error', this._fTE, 'Modification échouée. (' + b.code + ')'))
                            })
                            .catch(a => this._icpfs(this._u, 'event-error', this._fTE, 'Modification échouée. (' + a.code + ')')) :
                        this._icpfs(this._u, 'event-error', this._fTE, 'Modification échouée. (input-malformated)')
                    this._lt()
                })

                $('#btnBirthday').click(() => {
                    this._bd.attr('disabled', '')
                    this._fE.removeClass('event-success event-error')
                    this._fE.addClass('show')
                    this._icpfs(null, null, this._fTE, 'Chargement...')
                    let _m, _vBd = this._bd.val();
                    _vBd && (_m = _vBd.match(new RegExp(/(0?[1-9]|[1-2][0-9]|3[0-1])[\/](0?[1-9]|1[0-2])[\/](\d{4})/gi))) ?
                        parseInt(_m.toString().split('/')[2]) <= new Date().getFullYear() - 13 ?
                            this._fdPrivateRef
                                .update({birthday: unescape(_vBd)})
                                .then(() => this._ic(this._bd) && this._icpfs(this._bd, 'event-success', this._fTE, 'Modification avec succès, application des changements dans quelques instants...'))
                                .catch(b => this._icpfs(this._bd, 'event-error', this._fTE, 'Modification échouée. (' + b.code + ')'))
                                .finally(() => this._fdPrivateRef.once('value')
                                    .then(a => a.val().settings.public_birthday &&
                                        this._fdPublicRef
                                            .update({birthday: unescape(_vBd)})
                                            .catch(e => this._icpfs(this._bi, 'event-warning', this._fTE, 'Modification incomplète. (' + e.code + ')')))) :
                            this._icpfs(this._bd, 'event-error', this._fTE, 'Modification échouée. (age-too-low)') :
                        this._icpfs(this._bd, 'event-error', this._fTE, 'Modification échouée. (input-malformated)')
                    this._lt()
                })

                $('#btnBio').click(() => {
                    this._bi.attr('disabled', '')
                    this._fE.removeClass('event-success event-error')
                    this._fE.addClass('show')
                    this._icpfs(null, null, this._fTE, 'Chargement...')
                    let _vBi = this._bi.val()
                    _vBi ?
                        this._fdPrivateRef
                            .update({bio: unescape(_vBi)})
                            .then(() => this._ic(this._bi) && this._icpfs(this._bi, 'event-success', this._fTE, 'Modification avec succès, application des changements dans quelques instants...'))
                            .catch(e => this._icpfs(this._bi, 'event-error', this._fTE, 'Modification échouée. (' + e.code + ')'))
                            .finally(() => this._fdPrivateRef.once('value')
                                .then(a => a.val().settings.public_bio &&
                                    this._fdPublicRef
                                        .update({bio: unescape(_vBi)})
                                        .catch(e => this._icpfs(this._bi, 'event-warning', this._fTE, 'Modification incomplète. (' + e.code + ')')))) :
                        this._icpfs(this._bi, 'event-error', this._fTE, 'Modification échouée. (input-malformated)')
                    this._lt()
                })
            }
        })
    }

    _icpfs(i, c, pf, s) {
        c && this._fE.addClass(c)
        pf.html('<span class=\'spinner-grow spinner-grow-sm\' role=\'status\'></span>&nbsp;' + s)
        i && i.attr('disabled', null)
        return true;
    }

    _ic(i) {
        i.attr('placeholder', unescape(i.val()))
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

$(document).ready(() => new UkuaAuthProfile())