<template>
    <div>
        <h2 class="text-center">Listado de libros</h2>

        <!--Pinta la tabla-->
        <table class="table ">
            <thead>
                <th>ID</th>
                <th>Título</th>
                <th>Género</th>
                <th>Autor</th>
                <th>Editorial</th>
                <th>Año</th>
            </thead>
            <tbody>
                <tr v-for="book in books" v-bind:key="book.id">
                    <td> {{ book.id }} </td>
                    <td> {{ book.title }} </td>
                    <td> {{ book.genre }} </td>
                    <td> {{ book.author }} </td>
                    <td> {{ book.publisher }} </td>
                    <td> {{ book.year }} </td>
                </tr>
            </tbody>
        </table>
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