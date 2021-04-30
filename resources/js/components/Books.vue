<template>
    <div>
        <h2 class="text-center">Listado de libros</h2>

        <!--Pinta la tabla-->

        <b-table-simple b-table striped hover>
        <b-thead>
          <b-th>ID</b-th>
          <b-th>Título</b-th>
          <b-th>Género</b-th>
          <b-th>Autor</b-th>
          <b-th>Editorial</b-th>
          <b-th>Año</b-th>
          <b-th></b-th>
          <b-th></b-th>
        </b-thead>
        <b-tbody>
          <b-tr v-for="book in books" v-bind:key="book.id">
              <b-td>{{ book.id }}</b-td>
              <b-td>{{ book.title }}</b-td>
              <b-td>{{ book.genre }}</b-td>
              <b-td>{{ book.author }}</b-td>
              <b-td>{{ book.publisher }}</b-td>
              <b-td>{{ book.year }}</b-td>
          </b-tr>
        </b-tbody>
    </b-table-simple>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                books:[]
            }
        },
        created(){

            this.getBooks(); //llama al método

        },
        methods:{
            //se define método para listar
            getBooks(api_url){
                //escribe la ruta con la que se va a listar
                api_url = api_url || '/api/books';
                //La API Fetch es una API estándar para realizar solicitudes HTTP en el navegador
                fetch(api_url)
                    .then(response=>response.json())
                    .then(response=>{
                        this.books = response.data;
                    })
                    .catch(err=>console.log(err));
            }
        }
    }
</script>