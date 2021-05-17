class formValidate{
    constructor(){
        this.validateFirstName = document.getElementById('registration_form_firstname');
        this.validateLastName = document.getElementById('registration_form_lastname');


        this.validatePassword = document.getElementById('inputPassword');
        this.aideMdp = document.getElementById('aideMdp');

        this.validateMail = document.getElementById('registration_form_email');
        this.aideMail = document.getElementById('aideEmail');

        //vérification de la longueur du mot de passe
        this.validatePassword.addEventListener("input", function (event) {
            let mdp = event.target.value;//valeur saisie dans le champ mdp
            let lengthMdb = "faible";
            let colorMsg = "red";// longueur faible => couleur rouge
            if(mdp.length >= 8){
                lengthMdb = "suffisant";
                colorMsg = "green";//longueur suffisante => couleur verte
            } else if(mdp.length >= 4){
                lengthMdb = "moyen";
                colorMsg = "orange";//longueur moyen => couleur organge
            }
            this.aideMdp.textContent = "longueur : " + lengthMdb;//texte de l'aide
            this.aideMdp.style.color = colorMsg;// couleur du texte de l'aide
        });


        //vérification prénom
        this.validateFirstName.addEventListener("keyup", () => {
            let validate = !this.verifPseudo(this.validateFirstName) ? "Prénom invalide" : "";
            this.validateFirstName.textContent = validate;
        });

        //vérification nom
        this.validateLastName.addEventListener("keyup", () => {
            let validate = !this.verifPseudo(this.validateLastName) ? "Nom invalide" : "";
            this.validateLastName.textContent = validate;
        });

        this.verifMail();

    }


    surligne(champ, erreur){
        if(erreur){
            champ.style.boxshadow = "0 0 5px 3px red";
        } else {
            champ.style.boxshadow = "";
        }
    }

    verifPseudo(champ)
    {
        let regexPseudo = /^[A-Za-z\é\è\ê\-\¨]+$/;
        // ^   l'élément qui suit commence le groupe de caractère ,  $ l'élément précédent, fini
        if(champ.value.length <= 2 || champ.value.length >= 15 || !regexPseudo.test(champ.value)){
            this.surligne(champ, true);
            return false;
        } else {
            this.surligne(champ, false);
            return true;
        }
    }

    verifMail()
    {
        // Commence par un ou plusieurs caractères (.+)
        // Contient ensuite le caractère @ (@)
        // Contient ensuite un ou plusieurs caractères (.+)
        // Contient ensuite le caractère.(\.)
        // Finit par  un ou plusieurs caractères (.+)
        this.validateMail.addEventListener("blur", function (event) {
            let regexMail = /.+@.+\..+/;
            let validate = "";
            if(!regexMail.test(event.target.value)){
                validate = "Email invalide";
            }
            this.aideMail.textContent = validate;
        });
    }

}