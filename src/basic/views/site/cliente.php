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

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-vue">
  

  <div id="app">
      

<form>
<div class="form-group">
    <label for="id" v-show="ciego">Id</label>
    <input type="number" class="form-control" v-model="idModificar" id="id" aria-describedby="emailHelp" v-show="ciego">

  </div>
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" v-model="nuevoNombre" id="nombre" aria-describedby="emailHelp" placeholder="Ingrese nombre">

  </div>
  <div class="form-group">
    <label for="apellido">Apellido</label>
    <input type="text" class="form-control" id="apellido"  v-model="nuevoApellido" placeholder="Ingrese apellido">
  </div>
  <div class="form-group">
    <label for="telefono">Telefono</label>
    <input type="text" class="form-control"  v-model="nuevoTelefono" id="telefono" placeholder="Ingrese su número de telefono">
  </div>
  
  <div class="form-group">
    <label for="cuit">Cuit</label>
    <input type="text" class="form-control" id="cuit"  v-model="nuevoCuit" placeholder="Ingrese número de CUIT">
  </div>
  <div class="form-group">
    <label for="idDomicilio">ID domicilio</label>
    <input type="number" class="form-control" id="idDomicilio"  v-model="nuevoDomicilio" placeholder="Ingrese número de domicilio">
  </div>
  <div class="form-group">
    <label for="idTiposDePago">ID pago</label>
    <input type="text" class="form-control" id="idTiposDePago"  v-model="nuevoPago">
  </div>
  <button type="submit" v-on:click="agregarClientes()" class="btn btn-primary">Nuevo cliente</button>
  <button type="submit" v-on:click="modificarCliente()" v-show="estado" class="btn btn-primary">Guardar cambios</button>
</form>
  <hr>
  <table class="table">
  <tr> <th>ID</th> <th>Nombre</th><th>Apellido</th> <th>Telefono</th><th>Cuit</th><th>Ciudad</th> <th>Id_Domicilio</th>   <th>ID tipos de pago</th>          <th>Estado</th><th>Acción</th>  </tr>
  <tr v-for="cliente in clientes.data"> <td>{{cliente.id}}</td> <td>  {{cliente.nombre}} </td> <td>  {{cliente.apellido}} </td><td>  {{cliente.telefono}} </td><td>{{cliente.cuit}}</td> <td>{{cliente.ciudad}}</td><td>{{cliente.id_domicilio}}</td> <td>{{cliente.id_tiposDePago}}</td> <td> <input></td><td> <span v-if="cliente.corriente > 30" >Deudor Moroso</span><span v-else-if="cliente.id_tiposDePago==9">Deudor Normal</span>  <span v-else>NO tiene cta cte</span>   </td><td> <button @click="editarCliente(cliente.id)" class="btn btn-warning" >Modificar</button> <button v-on:click="deleteCliente(cliente.id)" class="btn btn-danger" >Borrar</button>   </td> </tr>
  </table>

  </div>
  
<script>
var app=new Vue ({
    el:'#app',
    data:{
        ciego:false,
        idModificar:null,
        nuevoNombre:"",
        nuevoApellido:null,
        nuevoTelefono:"",
        nuevoCuit:null,
        nuevoPago:null,
        nuevoDomicilio:null,
        estado:false,
        clientes: {
            selected:null,
            data: [

            ]

        }

    },

    computed:{

    },

    mounted(){
        this.getClientes();
    },
    methods:{ 
        //console.log(axios)
        getClientes: function(){ 
        var that = this ;
        axios.get('/apiv1/cliente')
            
            .then(function (response) {
                // handle success
               that.clientes.data=response.data ;
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .then(function () {
                // always executed
            });
        },
        editarCliente: function(id){ 
        var that = this ;
        axios.get('/apiv1/cliente/'+ id)
            
            .then(function (response) {
                // handle success
               that.idModificar=response.data.id;
               that.nuevoNombre=response.data.nombre ;
               that.nuevoApellido=response.data.apellido ;
               that.nuevoCuit=response.data.cuit ;
               that.nuevoTelefono=response.data.telefono ;
               that.nuevoDomicilio=response.data.id_domicilio;
               that.nuevoPago=response.data.id_tiposDePago;
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
        modificarCliente: function(){ 
        var that = this ;
                id=that.idModificar ;
                nom=that.nuevoNombre ;
               ape=that.nuevoApellido ;
               cui=that.nuevoCuit;
               tel=that.nuevoTelefono;
               dom=that.nuevoDomicilio;
               pag=that.nuevoPago;
        axios.patch('/apiv1/cliente/'+ id,{
                nombre:nom,
                apellido: ape,
                cuit:cui ,
                telefono: tel,
                id_domicilio: dom,
                id_tiposDePago: pag
        })
            
            .then(function (response) {
                // handle success
                console.log(response);
                that.getClientes();
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .then(function () {
                // always executed
            });
        },
        deleteCliente: function(id){ 
            if(confirm("Está seguro de eliminar éste cliente ? ")){ 
        var that = this ;
        axios.delete('/apiv1/cliente/'+ id)
            
            .then(function (response) {
                // handle success
               console.log(response.data);
               that.getClientes();
            })
            .catch(function (error) {
                // handle error
                console.log(error.toJSON());
            })
            .then(function () {
                // always executed
            });}
        },
        agregarClientes: function(){ 
        var that = this ;
            nom=that.nuevoNombre,
            ape=that.nuevoApellido ;
            cui=that.nuevoCuit;
            tel=that.nuevoTelefono;
            dom=that.nuevoDomicilio;
            pag=that.nuevoPago;
        axios.post('/apiv1/cliente', {
            nombre: nom,
            apellido: ape,
            cuit:cui ,
            telefono: tel,
            id_domicilio: dom,
            id_tiposDePago: pag

  
  })
            .then(function (response) {
                // handle success 
               console.log(response.data);
               that.getClientes();
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

