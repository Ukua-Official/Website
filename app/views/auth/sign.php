<?php
new UkuaPage(
    'Ukua | Sign',
    "<!--suppress HtmlFormInputWithoutLabel, HtmlUnknownTarget -->
<section class='page-section'>
    <div class='container'>
        <div class='row d-flex justify-content-center align-items-center'>
            <div class='col-md-12 col-lg-5 col-xl-5 text-left'>
                <form class='p-5' id='signIn' method='post'>
                    <h1 class='text-center'>Connexion</h1>
                    <div class='form-group'>
                        <label>
                            <i class='fa fa-envelope-o'></i>&nbsp;Adresse mail
                            <span class='text-danger'>*</span>
                        </label>
                        <input autocomplete='off' class='form-control' inputmode='email' name='email' required
                               type='email'>
                    </div>
                    <div class='form-group'>
                        <label>
                            <i class='fa fa-lock'></i>&nbsp;Mot de passe
                            <span class='text-danger'>*</span>
                        </label>
                        <input autocomplete='off' class='form-control' maxlength='32' minlength='8' name='password'
                               pattern='^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,32}$'
                               required type='password'>
                        <div class='form-tooltips'>
                            <ul class='list-unstyled border rounded shadow-sm p-1'>
                                <li>
                                    Au moins un chiffre <strong>[0-9]</strong>
                                </li>
                                <li>
                                    Au moins un caractère minuscule <strong>[a-z]</strong>
                                </li>
                                <li>
                                    Au moins un caractère majuscule <strong>[A-Z]</strong>
                                </li>
                                <li class='li-sm'>
                                    Au moins un caractère spécial
                                    <strong>[*.!@#$%^&amp;(){}[]:;&lt;&gt;,.?/~_+-=|\]</strong>
                                </li>
                                <li>
                                    Au moins <strong>8</strong> caractères, mais pas plus de <strong>32</strong>.
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class='form-group'>
                        <small class='form-text text-center'>
                            <input name='remember_me' type='checkbox'>
                            &nbsp;Se souvenir de moi?
                        </small>
                    </div>
                    <div class='form-event'>
                        <ul class='list-unstyled border rounded shadow-sm p-2'>
                            <li class='text-center' id='loadingText'>
                                <span class='spinner-grow spinner-grow-sm' role='status'></span>
                            </li>
                        </ul>
                    </div>
                    <div class='form-group'>
                        <button class='btn ukua-btn btn-block' data-bs-hover-animate='pulse' type='submit'>
                            Se connecter
                        </button>
                        <small class='form-text text-center'>
                            <a href='/auth/forgot'>Mot de passe oublié?</a>
                        </small>
                    </div>
                </form>
            </div>
            <div class='col-lg-1 d-flex justify-content-center align-items-center or'>
                <p>Ou</p>
            </div>
            <div class='col-md-12 col-lg-5 col-xl-5 text-left'>
                <form class='p-5' id='signUp' method='post'>
                    <h1 class='text-center'>Inscription</h1>
                    <div class='form-group'>
                        <label>
                            <i class='fa fa-envelope-o'></i>
                            &nbsp;Adresse mail<span class='text-danger'>*</span>
                        </label>
                        <input autocomplete='off' class='form-control' inputmode='email' name='email' required
                               type='email'>
                    </div>
                    <div class='form-group'>
                        <label>
                            <i class='fa fa-tag'></i>
                            &nbsp;Nom d'utilisateur
                            <span class='text-danger'>*</span>
                        </label>
                        <div class='input-group'>
                            <div class='input-group-prepend'>
                                <span class='input-group-text'>@</span>
                            </div>
                            <input autocomplete='off' class='form-control' maxlength='16' minlength='3'
                                   name='pseudo'
                                   pattern='^([a-zA-Z_.0-9]){3,16}$' required type='text'/>
                            <div class='form-tooltips'>
                                <ul class='list-unstyled border rounded shadow-sm p-1'>
                                    <li>
                                        Doit-être composer de chiffre <strong>[0-9]</strong>
                                    </li>
                                    <li>
                                        Doit-être composer de minuscule ou majuscule <strong>[a-Z]</strong>
                                    </li>
                                    <li>
                                        Ne dois pas contenir de caractère spécial sauf <strong>[._]</strong>.
                                    </li>
                                    <li>
                                        Au moins <strong>3</strong> caractères, mais pas plus de <strong>16</strong>.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label>
                            <i class='fa fa-lock'></i>
                            &nbsp;Mot de passe
                            <span class='text-danger'>*</span>
                        </label>
                        <input autocomplete='off' class='form-control' maxlength='32' minlength='8' name='password'
                               pattern='^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,32}$'
                               required type='password'>
                        <div class='form-tooltips'>
                            <ul class='list-unstyled border rounded shadow-sm p-1'>
                                <li>
                                    Au moins un chiffre <strong>[0-9]</strong>
                                </li>
                                <li>
                                    Au moins un caractère minuscule <strong>[a-z]</strong>
                                </li>
                                <li>
                                    Au moins un caractère majuscule <strong>[A-Z]</strong>
                                </li>
                                <li class='li-sm'>
                                    Au moins un caractère spécial
                                    <strong>[*.!@#$%^&amp;(){}[]:;&lt;&gt;,.?/~_+-=|\]</strong>
                                </li>
                                <li>
                                    Au moins <strong>8</strong> caractères, mais pas plus de <strong>32</strong>.
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label>
                            <i class='fa fa-lock'></i>
                            &nbsp;Confirmation du mot de passe
                            <span class='text-danger'>*</span>
                        </label>
                        <input autocomplete='off' class='form-control' name='c_password'
                               pattern='^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,32}$'
                               required type='password'>
                        <div class='form-tooltips'>
                            <ul class='list-unstyled border rounded shadow-sm p-1'>
                                <li>
                                    Au moins un chiffre <strong>[0-9]</strong>
                                </li>
                                <li>
                                    Au moins un caractère minuscule <strong>[a-z]</strong>
                                </li>
                                <li>
                                    Au moins un caractère majuscule <strong>[A-Z]</strong>
                                </li>
                                <li class='li-sm'>
                                    Au moins un caractère spécial
                                    <strong>[*.!@#$%^&amp;(){}[]:;&lt;&gt;,.?/~_+-=|\]</strong>
                                </li>
                                <li>
                                    Au moins <strong>8</strong> caractères, mais pas plus de <strong>32</strong>.
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class='form-event'>
                        <ul class='list-unstyled border rounded shadow-sm p-2'>
                            <li class='text-center'>
                                <span class='spinner-grow spinner-grow-sm' role='status'></span>
                                &nbsp;Chargement...
                            </li>
                        </ul>
                    </div>
                    <div class='form-group'>
                        <button class='btn ukua-btn btn-block' data-bs-hover-animate='pulse' type='submit'>
                            S'inscrire
                        </button>
                        <small class='form-text'>
                            En cliquant sur ce bouton, vous accepter nos <a href='/conditions-of-use'>Conditions
                            d'Utilisations</a>.
                        </small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>"
);