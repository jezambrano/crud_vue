<template>
<div>
<h2>Productos</h2>
  <div class="actions">

    <router-link :to="{ path: '/productos/create' }" class="btn btn-info">Nuevo</router-link>

  </div>

  <table class="table">
    <thead>
    <tr>
      <th>Nombre</th>
      <th>Codigo</th>
      <th>Categoria</th>
   
    </tr>
    </thead>
    <tbody>
    <tr v-for="product in model">
      <td>
        <router-link :to="{ path: '/productos/'+product.id }">{{ product.nombre }}</router-link>
      </td>
      <td>{{ product.codigo }}</td>
      <td>
       
      </td>
     
    </tr>

    </tbody>
  </table>

</div>
</template>



<script>
    export default {
        data(){
          return {
              model : {}

          }

        },
        mounted() {
            console.log('Component mounted.')
            this.fetchData()
        },
        methods:{
          fetchData(){
            var vm = this
              vm.$http.get('api/productos') .then(function(response) {
                        
                        Vue.set(vm.$data, 'model', response.data)
              })
              .catch(function(error) {
                console.log(error)
              })
          },
          

        }
    }
</script>



<style>
	.logo {
		width: 50px;
		float: left;
		margin-right: 15px;
	}

	.form-group {
		max-width: 500px;
	}

	.actions {
		padding: 10px 0;
	}

	.glyphicon-euro {
		font-size: 12px;
	}

	
</style>