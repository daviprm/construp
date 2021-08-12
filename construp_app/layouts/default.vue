<template>
   <div>
      <header>
         <div class="header_items">
            <h2>Constr UP</h2>
            <button @click="addProduct()">Novo Produto</button>
         </div>
      </header>
      <!-- <input type="text" ref="inputTeste" value="239849872342"> -->
      
      <Nuxt />
      
      <formProduct
         ref="formProduct"
      ></formProduct>
            
   </div>
</template>

<script>
   export default {
      methods: {
         addProduct() {
            this.$refs.formProduct.openDialog();
            
         }
      }
   }
</script>



<style scoped>

   header {
      width: 100%;
      position: absolute;
      top: 0;
      left: 0;
      height: 80px;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 10px;
   }

   header .header_items {
      width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
      height: 60px;
      background: white;
      border-radius: 8px;
      padding: 5px 30px;
      /* box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); */
      border: 1px solid rgb(242, 242, 242);
   }
   
   header .header_items h2 {
      font-size: 18px;
      color: rgb(22, 51, 255);
      font-weight: 800;
   }
   
   header .header_items button {
      width: 140px;
      padding: 9px;
      font-weight: 600;
      font-size: 12px;
      background: rgb(22, 51, 255);
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
   }
   

   @media (max-width: 650px) {
      header .header_items {
         padding: 5px 10px;
      }
      
      header .header_items h2 {
         font-size: 15px;
      }
      
      header .header_items button {
         width: 110px;
         padding: 8px;
         font-size: 11px;
      }
   }

</style>