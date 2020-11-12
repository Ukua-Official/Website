$('form#signIn').submit(function (event) {
    let loadingEvent = $('form#signIn .form-event')
    let loadingText = $('form#signIn .form-event #loadingText')
    loadingEvent.addClass('show')
    loadingText.html('<span class="spinner-grow spinner-grow-sm" role="status"></span>&nbsp;Chargement...')
    event.preventDefault()
    let values = $(this).serializeArray()
    let email = values[0]['value']
    let password = values[1]['value']
    firebase.auth().setPersistence(firebase.auth.Auth.Persistence.SESSION)
    firebase.auth().signInWithEmailAndPassword(email, password)
        .then(function () {
            loadingEvent.addClass('event-success')
            loadingText.html('<span class="spinner-grow spinner-grow-sm" role="status"></span>&nbsp;Connexion avec succès, redirection dans quelques instants...')
        })
        .catch(function (error) {
            loadingEvent.addClass('event-error')
            loadingText.html('<span class="spinner-grow spinner-grow-sm" role="status"></span>&nbsp;Connexion échoue. (' + error.code + ')')
            var errorCode = error.code;
            var errorMessage = error.message;
            console.error(errorCode)
            console.error(errorMessage)
        })
})