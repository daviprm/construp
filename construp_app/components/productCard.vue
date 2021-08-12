<template>
   
   <div class="card">
      <div class="card_header">
         <h2>{{product.name}}</h2>
         <p>{{product.quantity}}</p>
      </div>
      <p class="brand">{{product.brand}}</p>
      <div class="hr_section">
         <hr>
      </div>
      <p class="description_title">Descrição:</p>
      <p class="description">
         {{product.description}}
      </p>
      
      <div class="card_actions">
         <button class="edit" @click="openEditModal(product.id)">Edit</button>
         <button class="delete" @click="destroyProduct(product.id)">Delete</button>
      </div>
      
      <!-- form edit product -->
      
      <formProduct
         ref="formProduct"
      ></formProduct>
      
   </div>

</template>

<script>

   import axios from 'axios';

   export default {
      props: ['product'],
      methods: {
         async destroyProduct(id) {
            await axios.delete(`http://127.0.0.1:8000/api/v1/product/${id}`).then(response => {
               this.$emit('delete', response.data);
            });
         },
         openEditModal(id) {
            this.$refs.formProduct.openDialogEdit(id);
         }
      }
   }
   
</script>

<style scoped>

   .container .container_body .card {
      width: 300px;
      padding: 20px;
      border-radius: 10px;
      border: 1px solid rgb(242, 242, 242);
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      justify-content: flex-start;
      transition: .6s;
   }

   .container .container_body .card:hover {
      border: 1px solid rgb(181, 181, 181);
   }

   .container .container_body .card .card_header {
      width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 5px;
   }

   .container .container_body .card .card_header h2 {
      color: rgb(22, 31, 66);
      font-size: 15px;
   }

   .container .container_body .card .card_header p {
      padding: 4px 6px;
      border-radius: 3px;
      background: rgb(235, 243, 255);
      font-size: 10px;
      color: rgb(140, 163, 197);
      font-weight: 600;
   }

   .container .container_body .card .brand {
      font-size: 10px;
      font-weight: 600;  
      padding: 3px 9px;
      border-radius: 3px;
      background: rgb(235, 243, 255);
      color: rgb(36, 61, 99);
   }

   .container .container_body .card .hr_section {
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
   }

   .container .container_body .card .hr_section hr {
      width: 100%;
      height: 1px;
      background: rgb(228, 228, 228);
      border-radius: 3px;
      border: none;
      margin: 5px 0;
   }

   .container .container_body .card .description_title {
      margin-top: 10px;
      font-size: 12px;
      font-weight: bold;
      color: rgb(22, 31, 66);
   }

   .container .container_body .card .description {
      margin-top: 5px;
      font-size: 11px;
      font-weight: 600;
      color: rgb(148, 148, 148);
   }

   .container .container_body .card .card_actions {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: space-between;
      column-gap: 20px;
      margin-top: 15px;
   }

   .container .container_body .card .card_actions button {
      width: 50%;
      padding: 10px;
      border-radius: 4px;
      border: none;
      font-weight: 600;
      font-size: 10px;
   }

   .container .container_body .card .card_actions .edit {
      border: 1px solid rgb(22, 51, 255);
      padding: 9px;
      background: none;
      color: rgb(22, 51, 255);
      font-weight: 600;
      cursor: pointer;
      transition: .3s;
   }

   .container .container_body .card .card_actions .edit:hover {
      color: rgb(28, 40, 128);
      border: 1px solid rgb(28, 40, 128);
      background: rgb(243, 242, 255);
   }

   .container .container_body .card .card_actions .delete {
      background: rgb(22, 51, 255);
      color: white;
      font-weight: 600;
      cursor: pointer;
      transition: .3s;
   }

   .container .container_body .card .card_actions .delete:hover {
      background: rgb(28, 40, 128);
   }

   @media (max-width: 650px) {
      .container .container_body .card {
         width: 100%;
      }
   }

</style>