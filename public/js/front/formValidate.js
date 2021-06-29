class formValidate{
    constructor(){
        this.form = document.getElementsByName('registration_form')[0];
        console.log(this.form);

        this.validateFirstName = document.getElementById('registration_form_firstname');
        this.aideFirstname = document.getElementById('aideFirstname');

        this.validateLastName = document.getElementById('registration_form_lastname');
        this.aideLastname = document.getElementById('aideLastname');

        this.validatePassword = document.getElementById('registration_form_plainPassword');
        this.aideMdp = document.getElementById('aideMdp');

        this.validateMail = document.getElementById('registration_form_email');
        this.aideMail = document.getElementById('aideEmail');

        //vérification du mot de passe
        this.validatePassword.addEventListener("change", () => {
            console.log('password');
            let passwordIsValide = this.validPassword(this.validatePassword);
        });

        //vérification prénom
        this.validateFirstName.addEventListener("change", () => {
            console.log('FirstName');
            let validate = this.verifFirstname(this.validateFirstName);
        });

        //vérification nom
        this.validateLastName.addEventListener("change", () => {
            console.log('LastName');
            let validate = this.verifLastname(this.validateLastName) ;
        });

        // vérification email
        this.validateMail.addEventListener("change", () => {
            console.log('Email');
            let isValide = this.validEmail(this.validateMail);
        });

        // vérification soumission formulaire
        // this.form.addEventListener('submit', (event) => {
        //     event.preventDefault();

        //     if(this.validEmail(this.validateMail) && this.validPassword(this.validatePassword) && 
        //     this.verifPseudo(this.validateLastName) && this.verifPseudo(this.validateFirstName)){
        //         this.form.submit();
        //     }
        // });

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

    verifFirstname(inputName)
    {
        this.regexPseudo = /^[A-Za-z\é\è\ê\-\_\¨]+$/;
        this.msg;
        this.valide = false;

        // au moins 3 caractères, 
        if(inputName.value.length < 3){
            this.msg = 'Votre prénom doit contenir au moins 3 caractères';
        }
        // au moins 1majuscule, 
        else if(!this.regexPseudo.test(inputName.value)){
            this.msg = 'Votre prénom ne doit pas contenir de caractères spéciaux comme : @, $, %,*';
        }
        else{
            this.valide = true;
            this.msg = 'Votre prénom est valide';
        }

        // affichage
        if(this.valide){
            this.aideFirstname.innerHTML = 'Prénom valide';
            this.aideFirstname.classList.remove('text-danger');
            this.aideFirstname.classList.add('text-success');
            return true;
        } else{
            this.aideFirstname.innerHTML = this.msg; 
            this.aideFirstname.classList.remove('text-success');
            this.aideFirstname.classList.add('text-danger');
            return false;
        }
    }

    verifLastname(inputName)
    {
        this.regexPseudo = /^[A-Za-z\é\è\ê\-\_\¨]+$/;
        this.msg;
        this.valide = false;

        // au moins 3 caractères, 
        if(inputName.value.length < 3){
            this.msg = 'Votre nom doit contenir au moins 3 caractères';
        }
        // au moins 1majuscule, 
        else if(!this.regexPseudo.test(inputName.value)){
            this.msg = 'Votre nom ne doit pas contenir de caractères spéciaux comme : @, $, %,*';
        }
        else{
            this.valide = true;
            this.msg = 'Votre nom est valide';
        }

        // affichage
        if(this.valide){
            this.aideLastname.innerHTML = 'Nom valide';
            this.aideLastname.classList.remove('text-danger');
            this.aideLastname.classList.add('text-success');
            return true;
        } else{
            this.aideLastname.innerHTML = this.msg; 
            this.aideLastname.classList.remove('text-success');
            this.aideLastname.classList.add('text-danger');
            return false;
        }
    }
}

const ValidateForm = new formValidate();