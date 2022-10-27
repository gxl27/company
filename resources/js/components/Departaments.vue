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
            <label for="nume" class='cursor-pointer text-blue-500' @click="this.orderAndChangeInput('nume')">Departamente</label>
            <input name="nume" type="text" id="nume" v-model="numeValue" @keyup="this.changeInput()">
          </div>
        </th>
        <th class='align-top'>
          <div class='flex flex-column'>
              <label class='cursor-pointer text-blue-500' @click="this.orderAndChangeInput('salariu_mediu')">Salariu mediu (lei)</label>
          </div>        
        </th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(departament, index) in departamentsData.data" :key="departament.id">
        <td>{{ (departamentsData.current_page - 1) * departamentsData.per_page + index + 1 }}</td>
        <td>{{ departament.nume }}</td>
        <td>{{ departament.salariu_mediu }}</td>
      </tr>
    </tbody>
  </table>
  <Pagination :data="departamentsData" @pagination-change-page="getResults" :limit="2">
    <span slot="prev-nav">&lt; Previous</span> <span slot="next-nav">Next &gt;</span>
  </Pagination>
</template>

<script>

import axios from 'axios'
import LaravelVuePagination from 'laravel-vue-pagination';

export default {
  name: 'Departaments',
  data: () => {
        return {
            departamentsData: {},
            numeValue:"",
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
      let link = '/api/departament?page=' + page;

      if(this.numeValue){
        link += '&nume=' + this.numeValue;
      }
      if(this.order){
        link += '&order=' + this.order;
      }
      if(this.orderDirection == 'desc'){
        link += '&orderdirection=' + this.orderDirection;
      }

      let getResult  = await axios.get(link)
          .then(response => {
              this.departamentsData = response.data;
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
