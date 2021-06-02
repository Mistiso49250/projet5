class formLoginValidate{
    constructor(){
        this.form = document.getElementsByName('login_form')[0];
        console.log(this.form);

        this.validatePassword = document.getElementById('inputPassword');
        this.aideMdp = document.getElementById('aideMdp');

        this.validateMail = document.getElementById('inputEmail');
        this.aideMail = document.getElementById('aideEmail');

        //vérification du mot de passe
        this.validatePassword.addEventListener("change", () => {
            console.log('password');
            let passwordIsValide = this.validPassword(this.validatePassword);
        });

        // vérification email
        this.validateMail.addEventListener("change", () => {
            console.log('Email');
            let isValide = this.validEmail(this.validateMail);
        });

        // vérification soumission formulaire
        this.form.addEventListener('submit', (event) => {
            event.preventDefault();

            if(this.validEmail(this.validateMail) && this.validPassword(this.validatePassword)){
                this.form.submit();
            }
        });

    }

    affichMsgError(element, msg, isValid){
        element.innerHTML = msg;
        if(isValid){
            element.classList.remove('text-danger');
            element.classList.add('text-success');
        }
        else{
            element.classList.remove('text-success');
            element.classList.add('text-danger');
        }
        return isValid
    }

    validEmail(inputEmail){
        // (^) début de la chaîne de caractères
        // (\w) Correspond à n'importe quel caractère de mot (alphanumérique et underscore) 
        // (+) 1 ou plusieurs fois 
        //  @ Contient ensuite le caractère @ 
        // () Regroupe plusieurs tokens et crée un groupe de capture pour l'extraction d'une sous-chaîne ou l'utilisation d'une rétro-référence 
        //{2,4} Correspond à la quantité spécifiée du jeton précédent. {2,4}correspondra de 2 à 4. {4}correspondra exactement à 4. {2,}correspondra à 2 ou plus.
        // $ fin de la chaîne de caratère
        this.regexMail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
        this.testEmail = this.regexMail.test(inputEmail.value);

        if(this.testEmail){
            return this.affichMsgError(this.aideMail, 'Email valide', true);
        } else{
            return this.affichMsgError(this.aideMail, 'Email non valide', false );
        }

    }

    validPassword(inputPassword){
        this.msg;
        this.valide = false;

        // au moins 8 caractères, 
        if(inputPassword.value.length < 8){
            this.msg = 'Le mot de passe doit contenir au moins 3 caractères';
        }
        // au moins 1majuscule, 
        else if(!/[A-Z]/.test(inputPassword.value)){
            this.msg = 'Le mot de passe doit contenir au moins 1 majuscule';
        }
        // au moins 1minuscule 
        else if(!/[a-z]/.test(inputPassword.value)){
            this.msg = 'Le mot de passe doit contenir au moins 1 minuscule';
        }
        // au moins 1 chiffre
        else if(!/[0-9]/.test(inputPassword.value)){
            this.msg = 'Le mot de passe doit contenir au moins 1 chiffre';
        }
        else{
            this.valide = true;
            this.msg = 'Le mot de passe est valide';
        }

        // affichage
        if(this.valide){
            this.aideMdp.innerHTML = 'Mot de passe valide';
            this.aideMdp.classList.remove('text-danger');
            this.aideMdp.classList.add('text-success');
            return true;
        } else{
            this.aideMdp.innerHTML = this.msg; 
            this.aideMdp.classList.remove('text-success');
            this.aideMdp.classList.add('text-danger');
            return false;
        }
    }
}

const ValidateForm = new formLoginValidate();