class formResetPasswordValidate{
    constructor(){
        this.form = document.getElementsByName('reset_password_request_form')[0];
        console.log(this.form);

        this.validateMail = document.getElementById('reset_password_request_form[email]');
        this.aideMail = document.getElementById('reset_password_request[email]');

        // vérification email
        this.validateMail.addEventListener("change", () => {
            console.log('Email');
            let isValide = this.validEmail(this.validateMail);
        });

        // vérification soumission formulaire
        this.form.addEventListener('submit', (event) => {
            event.preventDefault();

            if(this.validEmail(this.validateMail) ){
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
}

const ValidateForm = new formResetPasswordValidate();