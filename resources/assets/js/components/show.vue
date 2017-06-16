<template>
<div>   
        <router-link :to="model.id+'/edit'" class="btn btn-warning">Editar</router-link>
        <button class="btn btn-danger" @click="remove"> Borrar </button>
      

  <h2>{{ model.nombre }}</h2>
  <b>Codigo: </b>
  <div>{{ model.codigo }}</div>
  <b>Categoria:</b>
  <div> </div>
  <br/>
 
    <router-link :to="{ path: '/productos' }" class="btn btn-danger">Listado</router-link>
	
</div> 	
</template>

<script>
    export default {
        data(){
          return {
              model : {}
          }
        },
        beforeMount() {
            this.fetchData()
        },
        methods:{
        	fetchData(){
        		var vm = this
        		vm.$http.get('api/productos/'+this.$route.params.id).then(function(response) {
                                         
                          Vue.set(vm.$data, 'model', response.data.model)

                    })
                    .catch(function(error) {
                        console.log(error)
                    })

        	},
        	remove(){
  				var vm = this
                vm.$http.delete( '/api/productos/'+vm.model.id )
                    .then(function(response) {
                        if(response.data.deleted) {                        
                            vm.$router.push('/productos')
                        }
                    })
                    .catch(function(error) {
                        console.log(error)
                    })
			}	
        }
    }
</script>





