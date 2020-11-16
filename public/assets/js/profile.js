class UkuaProfile {

    _pageEvent
    _pageEventText
    _formEvent
    _formTextEvent
    _sectionPage
    _photoUrl
    _username
    _birthday
    _email
    _isLaunchTimeout = false;
    _currentTimeout;

    constructor() {
        this._pageEvent = $('.page-event')
        this._pageEventText = $('.page-event #pageTextEvent')
        this._formEvent = $('.form-event')
        this._formTextEvent = $('.form-event #formTextEvent')
        this._sectionPage = $('section.page-section')
        this._photoUrl = $('#photoUrl')
        this._username = $('#username')
        this._birthday = $('#birthday')
        this._email = $('#email')

        firebase.auth().Gc(user => {
            if (!user)
                window.location.replace('/Website/public/index.html')
            else {
                this._sectionPage.attr('user-uid', firebase.auth().currentUser.uid)
                firebase.database().ref('users/' + user.uid + '/').once('value')
                    .then(dataSnapshot => {
                        this._photoUrl.attr('placeholder', dataSnapshot.val().photoUrl ? dataSnapshot.val().photoUrl : 'N/A')
                        this._username.attr('placeholder', dataSnapshot.val().username)
                        this._birthday.attr('placeholder', dataSnapshot.val().birthday ? dataSnapshot.val().birthday : 'N/A')
                        this._email.attr('placeholder', user.email)
                    })
                    .catch(error => {
                        this._pageEvent.addClass('show')
                        this._pageEventText.val('Impossible de charger le profil. (' + error.code + ')')
                    })
                    .finally(() => {
                        $('main.page').addClass('show')
                    })
            }
        })

        $('#btnPhotoUrl').click(() => {
            this._formEvent.removeClass('event-success event-error')
            this._formEvent.addClass('show')
            this._formTextEvent.html('<span class="spinner-grow spinner-grow-sm" role="status"></span>&nbsp;Chargement...')
            if (this._photoUrl.val() && this._photoUrl.val().match(new RegExp(/https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\\+.~#?&/=]*)/gi))) {
                firebase.database().ref('users/' + this._sectionPage.attr('user-uid')).update({
                    'photoUrl': this._photoUrl.val()
                })
                    .then(() => {
                        this._formEvent.addClass('event-success')
                        this._formTextEvent.html('<span class="spinner-grow spinner-grow-sm" role="status"></span>&nbsp;Modification avec succès, application des changements dans quelques instants...')
                    })
                    .catch(error => {
                        this._formEvent.addClass('event-error')
                        this._formTextEvent.html('<span class="spinner-grow spinner-grow-sm" role="status"></span>&nbsp;Modification échouée. (' + error.code + ')')
                    })
            } else {
                this._formEvent.addClass('event-error')
                this._formTextEvent.html('<span class="spinner-grow spinner-grow-sm" role="status"></span>&nbsp;Modification échouée. (Input-Not-Url)')
            }
            this._launchTimeout()
        })

        $('#btnUsername').click(() => {
            this._username.attr("disabled", "")
            this._formEvent.removeClass('event-success event-error')
            this._formEvent.addClass('show')
            this._formTextEvent.html('<span class="spinner-grow spinner-grow-sm" role="status"></span>&nbsp;Chargement...')
            if (this._username.val() && this._username.val().match(new RegExp(/([a-zA-Z_.0-9]).{3,16}/gi))) {
                firebase.database().ref("users").once('value')
                    .then(dataSnapshot => {
                        if (!dataSnapshot.forEach(element => {
                            if (this._username.val() === element.val().username)
                                return true
                        }))
                            firebase.database().ref('users/' + this._sectionPage.attr('user-uid')).update({
                                'username': this._username.val()
                            })
                                .then(() => {
                                    this._formEvent.addClass('event-success')
                                    this._formTextEvent.html('<span class="spinner-grow spinner-grow-sm" role="status"></span>&nbsp;Modification avec succès, application des changements dans quelques instants...')
                                    this._inputClean(this._username)
                                    this._username.attr("disabled", null)
                                    throw new Error("test")
                                })
                                .catch(error => {
                                    this._formEvent.addClass('event-error')
                                    this._formTextEvent.html('<span class="spinner-grow spinner-grow-sm" role="status"></span>&nbsp;Modification échouée. (' + error.code + ')')
                                    this._username.attr("disabled", null)
                                })
                        else {
                            this._formEvent.addClass('event-error')
                            this._formTextEvent.html('<span class="spinner-grow spinner-grow-sm" role="status"></span>&nbsp;Modification échouée. (Already-Username-Exist)')
                            this._username.attr("disabled", null)
                        }
                    })
                    .catch(error => {
                        this._formEvent.addClass('event-error')
                        this._formTextEvent.html('<span class="spinner-grow spinner-grow-sm" role="status"></span>&nbsp;Modification échouée. (' + error.code + ')')
                        this._username.attr("disabled", null)
                    })
            } else {
                this._formEvent.addClass('event-error')
                this._formTextEvent.html('<span class="spinner-grow spinner-grow-sm" role="status"></span>&nbsp;Modification échouée. (Input-Malformated)')
                this._username.attr("disabled", null)
            }
            this._launchTimeout()
        })

    }

    _formEventMessaging(__input, __class, __str) {
        this._formEvent.addClass(__class)
        this._formTextEvent.html('<span class="spinner-grow spinner-grow-sm" role="status"></span>&nbsp;' + __str)
        __input.attr("disabled", null)
    }

    _inputClean(__input) {
        __input.attr('placeholder', __input.val())
        __input.val("")
    }

    _launchTimeout() {
        if (this._isLaunchTimeout) clearTimeout(this._currentTimeout)
        this._isLaunchTimeout = true
        this._currentTimeout = setTimeout(() => this._formEvent.removeClass('show'), 3000)
    }
}

$(document).ready(() => new UkuaProfile())