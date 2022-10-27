<template>
  <table>
    <thead>
      <tr>
       <th>        
          <div class='flex flex-column'>
            <label class='pt-9 cursor-pointer text-blue-500' @click="this.resetFilters()"><i class="fa-solid fa-refresh"></i></label>
          </div>
        </th>
        <th>        
          <div class='flex flex-column'>
            <label for="nume" class='cursor-pointer text-blue-500' @click="this.orderAndChangeInput('nume')">Nume</label>
            <input class='border border-gray-800' name="nume" type="text" id="nume" v-model="numeValue" @keyup="this.changeInput()">
          </div>
        </th>
        <th>
          <div class='flex flex-column'>
            <label for="prenume" class='cursor-pointer text-blue-500' @click="this.orderAndChangeInput('prenume')">prenume</label>
            <input name="prenume" type="text" id="prenume" v-model="prenumeValue" @keyup="this.changeInput()">
          </div>
        </th>
        <th class='align-top'>
          <div class='flex flex-column'>
            <label class='cursor-pointer text-blue-500' @click="this.orderAndChangeInput('salariu')">salariu (lei)</label>
          </div>        
        </th>
        <th>
          <div class='flex flex-column'>
            <label for="cnp" class='cursor-pointer text-blue-500' @click="this.orderAndChangeInput('cnp')">cnp</label>
            <input name="cnp" type="text" id="cnp" v-model="cnpValue" @keyup="this.changeInput()">
          </div>        
        </th>
        <th>
          <div class='flex flex-column'>
            <label for="functie" class='cursor-pointer text-blue-500' @click="this.orderAndChangeInput('functie')">functie</label>
            <input name="functie" type="text" id="functie" v-model="functieValue" @keyup="this.changeInput()">
          </div>
        </th>
        <th>
          <div class='flex flex-column'>
            <label for="departament" class='cursor-pointer text-blue-500' @click="this.orderAndChangeInput('departament')">departament</label>
            <input name="departament" type="text" id="departament" v-model="departamentValue" @keyup="this.changeInput()">
          </div>
        </th>
        <th class='align-top'>
          <div class='flex flex-column'>
            <label>descriere dept</label>

          </div>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(employee, index) in employeesData.data" :key="employee.id">
        <td>{{ (employeesData.current_page - 1) * employeesData.per_page + index + 1 }}</td>
        <td>{{ employee.nume }}</td>
        <td>{{ employee.prenume }}</td>
        <td>{{ employee.salariu }}</td>
        <td>{{ employee.cnp }}</td>
        <td>{{ employee.functie }}</td>
        <td>{{ employee.departament}}</td>
        <td class='table-td-description'>{{ employee.departament_descriere}}</td>
      </tr>
    </tbody>
  </table>
  <Pagination :data="employeesData" @pagination-change-page="getResults" :limit="2">
    <span slot="prev-nav">&lt; Previous</span> <span slot="next-nav">Next &gt;</span>
  </Pagination>
</template>

<script>

import axios from 'axios'
import LaravelVuePagination from 'laravel-vue-pagination';

export default {
  name: 'Employees',
  data: () => {
        return {
            employeesData: {},
            numeValue:"",
            prenumeValue:"",
            cnpValue:"",
            functieValue:"",
            departamentValue:"",
            order:"",
            orderDirection:"asc",
        
        }
    },
  components: {
    'Pagination': LaravelVuePagination
 
  },
  methods: {
    async getResults(page = 1) 
    {
      let link = '/api/employee?page=' + page;

      if(this.numeValue){
        link += '&nume=' + this.numeValue;
      }
      if(this.prenumeValue){
        link += '&prenume=' + this.prenumeValue;
      }
      if(this.cnpValue){
        link += '&cnp=' + this.cnpValue;
      }
      if(this.functieValue){
        link += '&functie=' + this.functieValue;
      }
      if(this.departamentValue){
        link += '&departament=' + this.departamentValue;
      }
      if(this.order){
        link += '&order=' + this.order;
      }
      if(this.orderDirection == 'desc'){
        link += '&orderdirection=' + this.orderDirection;
      }

      let getResult  = await axios.get(link)
          .then(response => {
              this.employeesData = response.data;
          })
          .catch(err =>console.error(err));
    },

    async changeInput() 
    {
        this.getResults();
    },
    
    resetFilters() 
    {
      this.numeValue = "",
      this.prenumeValue ="",
      this.cnpValue = "",
      this.functieValue = "",
      this.departamentValue = "",
      this.order = "",
      this.orderDirection = "asc"

    },

    async orderAndChangeInput(newOrder) 
    {
      if(this.order == newOrder && this.orderDirection == 'asc'){
          this.orderDirection = "desc"
      }else{
        this.orderDirection = 'asc'
      }

      this.order = newOrder

      this.getResults();
    },
      
  },
  mounted() {
        this.getResults();
  },
}

</script>

<style lang="scss">
main {
  
  // opacity:0.01;

}
</style>
