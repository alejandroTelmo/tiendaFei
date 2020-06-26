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

$this->title = 'Vue';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-vue">
  

  <div id="app">

  <hr>
  <table class="table">
  <tr> <th>ID</th> <th>Nombre</th><th>Descripción</th> <th>Precio</th><th>Cantidad</th><th>Estado</th><th>Acción</th>  </tr>
  <tr v-for="producto in productos.data"> <td>{{producto.id}}</td> <td>  {{producto.nombre}} </td> <td>  {{producto.descripcion}} </td><td>  {{producto.precioVenta}} </td> <td> <input></td><td> <span v-if="producto.stock > 10" >En stock</span><span v-else-if="producto.stock <= 10 && producto.stock > 0">Últimas unidades</span>  <span v-else>Sin Stock</span>   </td><td> <button @click="" class="btn btn-warning" >Modificar</button> <button v-on:click="deleteProductos(producto.id)" class="btn btn-danger" >Borrar</button>   </td> </tr>
  </table>

  </div>
  
<script>
var app=new Vue ({
    el:'#app',
    data:{
     
        productos: {
            selected:null,
            data: []

        }

    },
    methods:{
        mas(){
            this.cam='text-primary'
        }

    },
    computed:{

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
        deleteProductos: function(id){ 
        var that = this ;
        axios.delete('/apiv1/producto'+ id)
            
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
            });
        },
    },

  


})

</script>


</div>

