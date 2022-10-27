require('./bootstrap');

import { createApp } from 'vue'
import  Employees from './components/Employees.vue'
import  Departaments from './components/Departaments.vue'


const app = createApp({})

app.component('employees', Employees)
app.mount('#employees_table')

app.component('departaments', Departaments)
app.mount('#departaments_table')