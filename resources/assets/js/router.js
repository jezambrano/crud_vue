import Vue from 'vue'
import VueRouter  from 'vue-router'

Vue.use(VueRouter)

import  Form   from './components/form.vue'
import  Show   from './components/show.vue'

Vue.component('index',require('./components/index.vue')) //activa el componente para crear nuevas instancias

export default new VueRouter({

	  mode: 'hash',
    base: __dirname,
    routes: [
        { 
        	path: '/productos', 
        	component: {
        	 template:  '<div> <index> </index> </div>'
       		} 
       	},
       	{ path:'/productos/create' , component: Form},
       	{ path: '/productos/:id/edit',component: Form, meta: { mode: 'edit' }},
        { path:'/productos/:id' , component: Show},
       
       


    ]

})

