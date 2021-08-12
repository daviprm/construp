<template>
   
   <div class="modal_create_product_bg" v-if="isOpen">
      <div class="modal_create_product">
      <div class="modal_header">
         <h2>{{isEdit ? 'Editar Produto' : 'Cadastrar Produto'}}</h2>
         <svg @click="isOpen = !isOpen; resetInput()" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <line x1="18" y1="6" x2="6" y2="18" />
            <line x1="6" y1="6" x2="18" y2="18" />
         </svg>
      </div>
      <form @submit.prevent="saveStatus" class="modal_body">
         
         <input v-model="product.name" required type="text" id="name" placeholder="Nome">
         <input v-model="product.description" required type="text" id="description" placeholder="Descrição">
         <input v-model="product.brand" required type="text" id="brand" placeholder="Marca">         
         <input v-model="product.quantity" required type="text" id="quantity" placeholder="Quantidade">
         <button type="submit">{{isEdit ? 'Editar' : 'Cadastrar'}}</button>
         
      </form>
      </div>
   </div>
   
</template>

<script>

   import axios from 'axios';

   export default ({
      name: "newProduct",
      data() {
         return {
            product: {
               name: "",
               description: "",
               brand: "",
               quantity: "",
            },
            isOpen: false,
            isEdit: false,
         }
      },
      methods: {
         resetInput () {
            this.product.name = "";
            this.product.description = "";
            this.product.brand = "";
            this.product.quantity = "";
         },
         newProduct() {
            axios.post("http://127.0.0.1:8000/api/v1/product", this.product).then((response) => {
               this.isOpen = false;
               this.resetInput();
               return this.$nuxt.$emit('add:product', response.data);
            }, (error) => {
               const err = error.response;
               if (err.status == 422) {
                  alert('Preencha todos os dados!');
               }
            });
         },
         updateProduct() {
            axios.put(`http://127.0.0.1:8000/api/v1/product/${this.product.id}`, this.product).then((response) => {
               this.isOpen = false;
               this.resetInput();
               return this.$nuxt.$emit('update:product', response.data);
            }, (error) => {
               const err = error.response;
               if (err.status == 422) {
                  alert('Preencha todos os dados!');
               }
            })
         },
         openDialog() {
            this.isOpen = true;
            this.isEdit = false;
         },
         openDialogEdit(id) {
            axios.get(`http://127.0.0.1:8000/api/v1/product/${id}`).then((response) => {
               this.product = response.data;
               this.isOpen = true;
               this.isEdit = true;
            })
         }, 
         saveStatus(event) {
            if(this.isEdit) {
               this.updateProduct();
            } else {
               this.newProduct();
            }
         }
      }
   })
   
</script>



<style scoped>

   /* modal new product */

   .modal_create_product_bg {
      width: 100%;
      height: 100vh;
      background: rgba(20, 16, 44, 0.227);
      display: flex;
      justify-content: center;
      align-items: center;
      position: fixed;
      top: 0;
      left: 0;
      z-index: 10;
   }

   .modal_create_product_bg .modal_create_product {
      width: 400px;
      display: flex;
      background: white;
      z-index: 11;
      padding: 30px;
      flex-direction: column;
      align-items: flex-start;
      border-radius: 5px;
   }

   .modal_create_product_bg .modal_create_product .modal_header {
      width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
   }

   .modal_create_product_bg .modal_create_product .modal_header h2 {
      font-size: 18px;
      color: rgb(20, 29, 100);
      font-weight: 700;
   }

   .modal_create_product_bg .modal_create_product .modal_header svg {
      width: 30px;
      height: 30px;
      border-radius: 3px;
      cursor: pointer;
      stroke: rgb(20, 29, 100);
      stroke-width: 2;
   }

   .modal_create_product_bg .modal_create_product .modal_header svg:hover {
      background: rgb(230, 230, 230);
   }

   .modal_create_product_bg .modal_create_product .modal_body {
      display: flex;
      width: 100%;
      flex-direction: column;
      align-items: flex-start;
      margin-top: 20px;
   }

   .modal_create_product_bg .modal_create_product .modal_body input {
      width: 100%;
      padding: 10px 0;
      border: none;
      border-bottom: 2px solid rgb(220, 220, 220);
      margin-bottom: 10px;
      outline: none;
      transition: .3s;
   }

   .modal_create_product_bg .modal_create_product .modal_body input:focus {
      border-bottom: 2px solid rgb(20, 29, 100);
      color: rgb(20, 29, 100);
   }

   .modal_create_product_bg .modal_create_product .modal_body button {
      width: 100%;
      margin-top: 20px;
      padding: 13px;
      background: rgb(22, 51, 255);
      border-radius: 4px;
      color: white;
      font-weight: 600;
      border: none;
      transition: .3s;
      cursor: pointer;
   }

   .modal_create_product_bg .modal_create_product .modal_body button:hover {
      background: rgb(22, 41, 180);
   }


</style>