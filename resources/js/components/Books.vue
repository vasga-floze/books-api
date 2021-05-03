<template>
    <div>
        <h1 class="text-center">API de libros</h1> 
        <hr>

        <form @submit.prevent="addBook">
            <div class="form-group">
                <label for="title">Titulo</label>
                <input type="text" class="form-control" v-model="book.title" placeholder="Título"/>
            </div>
            <div class="form-group">
                <label for="genre">Genero</label>
                <input type="text" class="form-control" v-model="book.genre" placeholder="Género"/>
            </div>
            <div class="form-group">
                <label for="author">Autor</label>
                <input type="text" class="form-control" v-model="book.author" placeholder="Autor"/>
            </div>
            <div class="form-group">
                <label for="publisher">Editorial</label>
                <input type="text" class="form-control" v-model="book.publisher" placeholder="Editorial"/>
            </div>
            <div class="form-group">
                <label for="year">Año</label>
                <input type="text" class="form-control" v-model="book.year" placeholder="Año"/>
            </div>
            <div class="form-group">
                <label for="portada">Portada</label>
                <input type="text" class="form-control" v-model="book.cover" placeholder="Portada"/>
            </div> 
            <div class="text-center">
                <button type="button" @click="addUpdateBook()" class="btn btn-primary">Guardar</button>
            </div>
            <hr>
        </form>
        <br>
        <h2 class="text-center">Listado de libros</h2>

        <!--Pinta la tabla-->
        <table class="table table-info">
            <thead class="bg-primary">
                <th>ID</th>
                <th>Título</th>
                <th>Género</th>
                <th>Autor</th>
                <th>Editorial</th>
                <th>Año</th>
                <th>Portada</th>
                <th colspan="2" class="text-center">Actions</th>
            </thead>
            <tbody>
                <tr v-for="book in books" v-bind:key="book.id">
                    <td> <b>{{ book.id }}</b> </td>
                    <td> {{ book.title }} </td>
                    <td> {{ book.genre }} </td>
                    <td> {{ book.author }} </td>
                    <td> {{ book.publisher }} </td>
                    <td> {{ book.year }} </td>
                    <td> {{ book.cover }} </td>
                    <td><button type="button" class="btn btn-success" @click="updateBook(book)">Actualizar</button></td>
                    <td><button type="button" class="btn btn-danger"  @click="deleteBook(book.id)">Eliminar</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                books:[],
                book: [],
                book:{
                    id: '',
                    title: '',
                    genre: '',
                    author: '',
                    publisher: '',
                    year: '',
                    cover: ''
                },
                update: false,
                book_id: ''
            }
        },
        created(){
            this.getBooks();
        },
        methods: {
            getBooks(api_url){
                api_url = api_url || '/api/books';
                fetch(api_url)
                    .then(response=>response.json())
                    .then(response=>{
                        this.books = response.data;
                    })
                    .catch(err=>console.log(err));
                    
            },
            addUpdateBook(){                

                if(this.update===false){
                    fetch('/api/book',{
                        method: 'post',
                        body: JSON.stringify(this.book),
                        headers: {
                            'content-type': 'application/json'
                        }
                        })
                        .then(response=>response.json())
                        .then(data=>{
                            this.getBooks();
                        })
                        .catch(err=>console.log(err));

                }else{
                    fetch('/api/book/',{
                        method: 'put',
                        body: JSON.stringify(this.book),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(response=>response.json())
                        .then(data=>{
                            this.getBooks();
                        })
                        .catch(err=>console.log(err));
                }


            },
            deleteBook(id){
                fetch('/api/book/' + id,{
                  method: 'delete'
                })
                    .then(response=>response.json())
                    .then(data=>{
                        this.getBooks();
                    })
                    .catch(err=>console.log(err));

            },
            updateBook(book){
                this.update =true;
                this.book.id = book.id;
                this.book.book_id = book.id;
                this.book.title = book.title;
                this.book.genre = book.genre;
                this.book.author = book.author;
                this.book.publisher = book.publisher;
                this.book.year= book.year;
                this.book.cover= book.cover;
            }
        }
    };
</script>