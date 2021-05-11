class Search {
    constructor(){
        //On pointe sur l'élément de champ de saisie search
        this.searchField = document.getElementById('formControlSearch');
        this.resultSearch = document.getElementById('resultSearch');
        this.searchField.addEventListener('input', (event) => {
            const field = event.currentTarget.value;

            if(field.length > 3){   
                this.fetchData(field);
            }

        });

    }

    fetchData(searchParam){
        console.log(searchParam)
        // http://localhost:8000/index.php/search?q=petit
        fetch('http://localhost:8000/index.php/search?q=petit').then((response) => {
            const result = response.text();
            console.log(result)
            this.resultSearch.innerHTML = result;
        }).catch((error) => {
            console.log(error)
        })
    }

}

let formSearch = new Search();

// console.log('Salut')



