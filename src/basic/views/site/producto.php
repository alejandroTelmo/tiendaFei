<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\web\View;
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",[
    'position'=> View::POS_HEAD
]) ;
$this->registerJsFile("https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js",[
    'position'=> View::POS_HEAD
]) ;

$this->title = 'Catalogo de Productos';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-vue">
  

  <div id="app">
      

<form v-show="nuevoModificar">
<div class="form-group" >
    <label for="id" v-show="ciego">Id</label>
    <input type="number" class="form-control" v-model="idModificar" id="id" aria-describedby="emailHelp" v-show="ciego">

  </div>
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" v-model="nuevoNombre" id="nombre" aria-describedby="emailHelp" placeholder="Ingrese nombre del producto">

  </div>
  <div class="form-group">
    <label for="descripcion">Descripción</label>
    <input type="text" class="form-control"  v-model="nuevoDescripcion" id="descripcion" placeholder="Ingrese descripcion del producto">
  </div>
  <div class="form-group">
    <label for="cantidad">Cantidad</label>
    <input type="number" class="form-control" id="stock"  v-model="nuevoCantidad" placeholder="Ingrese cantidad de unidades del producto">
  </div>
  <div class="form-group">
    <label for="precio">Precio</label>
    <input type="number" class="form-control" id="precio"  v-model="nuevoPrecio" placeholder="Ingrese precio de venta del producto">
  </div>
  <button type="submit" v-on:click.prevent="agregarProductos" class="btn btn-primary">Nuevo producto</button>
  <button type="submit" v-on:click="modificarProducto()" v-show="estado" class="btn btn-primary">Guardar cambios</button>
</form>
<button class="btn btn-success" v-show="!nuevoModificar"v-on:click="nuevoModificar = !nuevoModificar" >Crear producto</button>
  <hr>
<form class="form-group">
<label for="buscar1">Buscar producto</label>

<input v-model="buscar" id="buscar1"><p v-if="busqueda"> {{nada}} </p>
</form>
  <table class="table" v-show="buscar" >
  <tr> <th>ID</th> <th>Nombre</th><th>Descripción</th> <th>Precio</th><th>Cantidad</th><th>Estado</th><th>Acción</th>  </tr>
  <tr v-for="item in productosFiltro"> <td>{{item.id}}</td> <td>  {{item.nombre}} </td> <td>  {{item.descripcion}} </td><td>  {{item.precioVenta}} </td> <td> <input></td><td> <span v-if="item.stock > 10" >En stock</span><span v-else-if="item.stock <= 10 && item.stock > 0">Últimas unidades</span>  <span v-else>Sin Stock</span>   </td><td> <button  @click="editarProducto(item.id)" class="btn btn-warning">Modificar</button> <button v-on:click="deleteProductos(item.id)" class="btn btn-danger" >Borrar</button>   </td> </tr>

    </table>
     

  <table class="table table-dark" v-show="!buscar">
  <tr> <th>ID</th> <th>Nombre</th><th>Descripción</th> <th>Precio</th><th>Cantidad</th><th>Estado</th><th>Acción</th>  </tr>
  <tr v-for="producto in productos.data"> <td>{{producto.id}}</td> <td>  {{producto.nombre}} </td> <td>  {{producto.descripcion}} </td><td>  {{producto.precioVenta}} </td> <td> <input></td><td> <span v-if="producto.stock > 10" >En stock</span><span v-else-if="producto.stock <= 10 && producto.stock > 0">Últimas unidades</span>  <span v-else>Sin Stock</span>   </td><td> <button @click="editarProducto(producto.id)" class="btn btn-warning" >Modificar</button> <button v-on:click="deleteProductos(producto.id)" class="btn btn-danger" >Borrar</button>   </td> </tr>
  </table>

  </div>
  
<script>
var app=new Vue ({
    el:'#app',
    data:{
        ciego:false,
        idModificar:null,
        nuevoNombre:"",
        nuevoDescripcion:"",
        nuevoCantidad:null,
        nuevoPrecio:null,
        estado:false,
        busqueda:false,
        buscar:"",
        nuevoModificar:false,
        productos: {
            selected:null,
            data: [

            ]

        }

    },

    computed:{
        productosFiltro:function(){
               
                return this.productos.data.filter((item) => {

                 return item.nombre.toLowerCase().includes(this.buscar.toLowerCase()) ||

                 item.descripcion.toLowerCase().includes(this.buscar.toLowerCase()) 
            



              
                    
                })
             }

    },

    mounted(){
        this.getProductos();
    },
    methods:{ 
        //console.log(axios)
        getProductos: function(){ 
        var that = this ;
        axios.get('/apiv1/producto')
            
            .then(function (response) {
                // handle success
               that.productos.data=response.data ;
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .then(function () {
                // always executed
            });
        },
        editarProducto: function(id){ 
        var that = this ;
        that.nuevoModificar=true,
        axios.get('/apiv1/producto/'+ id)
            
            .then(function (response) {
                // handle success
                that.idModificar=response.data.id;
               that.nuevoNombre=response.data.nombre ;
               that.nuevoDescripcion=response.data.descripcion ;
               that.nuevoCantidad=response.data.stock ;
               that.nuevoPrecio=response.data.precioVenta ;
               that.estado=true
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .then(function () {
                // always executed
            });
        },
        modificarProducto: function(){ 
        var that = this ;
                id=that.idModificar ;
                nom=that.nuevoNombre ;
               des=that.nuevoDescripcion ;
               can=that.nuevoCantidad;
               pre=that.nuevoPrecio;
        axios.patch('/apiv1/producto/'+ id,{
                nombre:nom,
                descripcion: des,
                stock: can,
                precioVenta: pre
        })
            
            .then(function (response) {
                // handle success
                console.log(response);
                that.getProductos();
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .then(function () {
                // always executed
            });
        },
        deleteProductos: function(id){ 
            if(confirm("Está seguro de eliminar éste producto")){ 
        var that = this ;
        axios.delete('/apiv1/producto/'+ id)
            
            .then(function (response) {
                // handle success
               console.log(response.data);
               that.getProductos();
            })
            .catch(function (error) {
                // handle error
                console.log(error.toJSON());
            })
            .then(function () {
                // always executed
            });}
        },
        agregarProductos: function(){ 
        var that = this ;
        
            nom=that.nuevoNombre,
            des=that.nuevoDescripcion,
            can=that.nuevoCantidad,
            pre=that.nuevoPrecio,
          
        axios.post('/apiv1/producto', {
    nombre: nom,
    descripcion: des,
    stock: can,
    precioVenta: pre
  })
            .then(function (response) {
                // handle success 
               console.log(response.data);
            that.nuevoNombre="",
            that.nuevoDescripcion="",
            that.nuevoCantidad=null,
            that.nuevoPrecio=null,
            that.nuevoModificar=false,
               that.getProductos();
            })
            .catch(function (error) {
                // handle error
                console.log(error.toJSON());
            })
            .then(function () {
                // always executed
            });
        
        },
    },

  


})

</script>


</div>

