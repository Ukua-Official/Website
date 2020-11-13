$('form#signIn').submit(function (event) {
    let loadingEvent = $('form#signIn .form-event')
    let loadingText = $('form#signIn .form-event #signInText')
    loadingEvent.removeClass('event-success event-error')
    loadingEvent.addClass('show')
    loadingText.html('<span class="spinner-grow spinner-grow-sm" role="status"></span>&nbsp;Chargement...')
    event.preventDefault()
    let values = $(this).serializeArray()
    let email = values[0]['value']
    let password = values[1]['value']
    let remember_me = values.length === 3
    firebase.auth().setPersistence(remember_me ? firebase.auth.Auth.Persistence.qd : firebase.auth.Auth.Persistence.sd).then(() => {
        firebase.auth().signInWithEmailAndPassword(email, password)
            .then(function () {
                loadingEvent.addClass('event-success')
                loadingText.html('<span class="spinner-grow spinner-grow-sm" role="status"></span>&nbsp;Connexion avec succès, redirection dans quelques instants...')
            })
            .catch(function (error) {
                loadingEvent.addClass('event-error')
                loadingText.html('<span class="spinner-grow spinner-grow-sm" role="status"></span>&nbsp;Connexion échouée. (' + error.code + ')')
            })
    }).catch(function (error) {
        loadingEvent.addClass('event-error')
        loadingText.html('<span class="spinner-grow spinner-grow-sm" role="status"></span>&nbsp;Connexion échouée. (' + error.code + ')')
    })
})

$('form#signUp').submit(function (event) {
    let loadingEvent = $('form#signUp .form-event')
    let loadingText = $('form#signUp .form-event #signUpText')
    loadingEvent.removeClass('event-success event-error')
    loadingEvent.addClass('show')
    loadingText.html('<span class="spinner-grow spinner-grow-sm" role="status"></span>&nbsp;Chargement...')
    event.preventDefault()
    let values = $(this).serializeArray()
    let email = values[0]['value']
    let username = values[1]['value']
    let password = values[2]['value']
    let c_password = values[3]['value']
    if (password === c_password) {
        firebase.database().ref("users").once('value')
            .then(function (dataSnapshot) {
                if (!dataSnapshot.forEach(element => {
                    if (username === element.val().username)
                        return true
                }))
                    firebase.auth().createUserWithEmailAndPassword(email, password)
                        .then(function () {
                            firebase.database().ref("users/" + firebase.auth().currentUser.uid).set({
                                "uid": firebase.auth().currentUser.uid,
                                "username": username
                            })
                            loadingEvent.addClass('event-success')
                            loadingText.html('<span class="spinner-grow spinner-grow-sm" role="status"></span>&nbsp;Inscription avec succès, redirection dans quelques instants...')
                        })
                        .catch(function (error) {
                            loadingEvent.addClass('event-error')
                            loadingText.html('<span class="spinner-grow spinner-grow-sm" role="status"></span>&nbsp;Inscription échouée. (' + error.code + ')')
                        })
                else {
                    loadingEvent.addClass('event-error')
                    loadingText.html('<span class="spinner-grow spinner-grow-sm" role="status"></span>&nbsp;Inscription échouée.<br/>Le nom d\'utilisateur est déjà pris.')
                }
            })
    } else {
        loadingEvent.addClass('event-error')
        loadingText.html('<span class="spinner-grow spinner-grow-sm" role="status"></span>&nbsp;Inscription échouée.<br/>Les mots de passe ne correspondent pas.')
    }
})