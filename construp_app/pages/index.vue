<template>
  <div>
    
    <div class="container" id="container">
        <div class="container_title">
            <h2>Meus Materiais</h2>
            <p>Listagem dos Materiais cadastrados</p>
        </div>
        <div class="container_body">
          
          <productCard
            v-for="(product, index) in products" :key="index"
            :product="product"
            @delete="destroyProduct()"
          ></productCard>
            
        </div>
    </div>
        
  </div>
</template>

<script>
  import axios from "axios";
  
  export default {
    async asyncData() {
      const products = await axios.get("http://127.0.0.1:8000/api/v1/products").then((response) => {
        return response.data
      })
      return { products }
    },
    mounted() {
      this.$nuxt.$on('update:product', (item) => {
        this.$nuxt.refresh()
      })
      this.$nuxt.$on('add:product', (item) => {
        this.$nuxt.refresh()
      })
    },
    methods: {
      destroyProduct() {
        this.$nuxt.refresh()
      }
    }
  }
  
</script>


<style scoped>

  #container {
      transition: .8s;
  }

  .container {
      width: 1230px;
      height: 500px;
      margin-left: 90px;
      margin-top: 100px;
      display: flex;
      flex-direction: column;
      align-items: flex-start;
  }

  .container .container_title {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
  }

  .container .container_title h2 {
      font-size: 18px;
      font-weight: 600;
      color: rgb(22, 31, 66);
      margin-bottom: 10px;
  }

  .container .container_title p {
      font-size: 13px;
      font-weight: 600;
      color: rgb(148, 148, 148);
  }

  .container .container_body {
      width: 100%;
      display: flex;
      justify-content: flex-start;
      column-gap: 10px;
      row-gap: 10px;
      flex-wrap: wrap;
      margin-top: 30px;
  }

  @media (max-width: 1340px) {
    .container {
      margin-left: 0;
      width: 100%;
      padding: 20px;
    }
  }
  
  @media (max-width: 650px) {
    .container {
      padding: 10px;
    }
  }

</style>