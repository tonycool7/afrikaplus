<template>
      <div class="container dw-table">
          <table class="table table-hover table-responsive">
              <thead>
              <tr>
                  <th></th>
                  <th>Product image</th>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th>Category</th>
              </tr>
              </thead>
              <tbody>
                  <tr v-for="(item, index) in cart">
                      <td><button @click="deleteFromCart(index)"><i class="fa fa-trash text-danger"></i></button></td>
                      <td><div class="cart-img default-bg" :style="['background-image: url(/storage/images/'+item.item.image+')']"></div></td>
                      <td>{{item.item.name}}</td>
                      <td>{{item.item.new_price}}</td>
                      <td>{{item.qty}}</td>
                      <td>{{item.price}}</td>
                      <td>{{item.item.category}}</td>
                  </tr>
              </tbody>
          </table>

          <div id="cart-total">
                <div v-if="cartEmpty">
                    Your cart is currently empty<br><br>
                    <a href='/shop/product' class='btn btn-default'> Return to shop </a>
                </div>
              <div v-else>
                  <h1>Cart Totals</h1>
                  <table class='table table-hover' >
                        <tr><td><b>Subtotal</b></td><td>{{totalPrice}} Rubles</td></tr>
                        <tr><td><b>Shipping</b></td><td>Flat rate: 300 Rubles</td></tr>
                        <tr><td><b>Total</b></td><td><b>{{totalPlusDelivery}} Rubles</b></td></tr>
                    </table>

                  <a href='/shop/checkout' class='btn btn-info'>Proceed to checkout </a><br><br>
                  <a href='/shop/product' class='btn btn-default'> Return to shop </a>
              </div>
          </div>
      </div>
</template>

<script>
    export default {
        name : 'Cart',
        data(){
            return {
                cart : [],
                totalPrice : 0,
                totalPlusDelivery : 0,
                cartEmpty : true
            }
        },

        created(){
            this.fetchCart();
        },

        methods: {
            fetchCart : function(){
                axios.get('/shop/fetch_cart').then((res) => {
                      this.cart = res.data.cart;
                      this.totalPrice = res.data.totalPrice;
                      $('#total').html(' '+this.totalPrice);
                      this.totalPlusDelivery = res.data.totalPrice + 300;
                      this.cartEmpty = (this.cart.length == 0) ? true : false;

                  })
                  .catch((err) => console.error(err));
            },
             deleteFromCart : function (id) {
                axios.get('/shop/delete_from_cart/'+id).then((res) => {
                    this.fetchCart();
                }).catch((err) => console.error(err));
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
