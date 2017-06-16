<template >
<div>
  <h2>{{titulo}}</h2>
  <form  @submit.prevent="save">
    <div class="form-group">
      <label for="add-nombre">Nombre</label>
      <input class="form-control" id="add-nombre" v-model="form.nombre" />
      <small class="text-danger" v-if="errors.nombre"  v-for="error in errors.nombre" >{{ error }}</small>
    </div>
    <div class="form-group">
      <label for="add-codigo">Codigo</label>
      <input type="text"  class="form-control" id="add-codigo" rows="10" v-model="form.codigo">
      <small class="text-danger" v-if="errors.codigo"  v-for="error in errors.codigo" >{{ error }}</small>
    </div>
    <div class="form-group">
      <label for="add-price">Categoria</label>
     //select()
    </div>
    <button class="btn btn-success">Guardar</button>
     <router-link :to="{ path: '/productos' }" class="btn btn-danger">Cancelar</router-link>
  </form>
</div> 
</template>

<script>
    export default {
      //props:['titulo'],
      data(){
      
        return {
                form: {},
                errors: {},
                option: {},
                url: 'api/productos',
                method: 'post',
                initialize:'api/productos'
            }
      },
      beforeMount() {

            if( this.$route.meta.mode === 'edit') {
           
                this.initialize = this.initialize +'/'+this.$route.params.id + '/edit'
                this.url        = this.url +'/'+this.$route.params.id
                this.method     = 'put' 

            }else{
                this.initialize= this.initialize+'/create'
            }    

            this.fetchData()
        },

      methods:{
          fetchData() {

                var vm = this
                vm.$http.get(this.initialize)
                    .then(function(response) {
                        Vue.set(vm.$data, 'form', response.data.form)
                        Vue.set(vm.$data, 'option', response.data.option)
                    })
                    .catch(function(error) {
                        console.log(error)
                    })
            },
            save() {
                var vm = this

                         vm.$http[vm.method](vm.url, vm.form).then(function(response) {
                            
                            if(response.data.saved) {    
                                
                                vm.$router.push('/productos')

                            }else{
                                
                                Vue.set(vm.$data, 'errors', response.data)
                            }                           
                        })
                        .catch(function(error) {

                            Vue.set(vm.$data, 'errors', error.response.data)
                        })

                            
                   
            },


      }
    }
</script>
