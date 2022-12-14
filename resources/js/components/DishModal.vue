<template>
    <div class="modal fade" :id="'dish' + dish.id" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <img v-if="dish.image" :src="'/storage/img/dishes/' + dish.image" class="card-img-top" :alt="dish.name">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h4 class="modal-title fw-bold margin-custom" id="staticBackdropLabel ">{{dish.name}}</h4>
                    <p class="fst-italic" v-if="dish.description">{{dish.description}}</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <div class="col-12 row justify-content-center text-center align-items-center p-3">
                        <div class="col-2">
                            <div class="content p-2">
                                <button @click="changeQuantity('minus')" class="btn btn-primary rounded-circle text-white fw-bold border-radius" :class="quantity === 1 ? 'disabled' : ''">-</button>
                            </div>
                        </div>
                        <div class="col-2">{{quantity}}</div>
                        <div class="col-2">
                            <div class="content p-2">
                                <button @click="changeQuantity('plus')" class="btn btn-primary rounded-circle text-white fw-bold border-radius">+</button>
                            </div>
                        </div>
                    </div>
                    <button type="button" data-bs-dismiss="modal" @click="addToCart()" class="btn btn-primary w-100 text-white fw-bold">Aggiungi per {{returnTotal}}€</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            dish: Object
        },

        data() {
            return {
                quantity: 1,
                total: this.dish.price,
                cart: JSON.parse(window.localStorage.getItem('cart'))
            }
        },

        watch: {
            dish: {
                handler() {
                    this.total = this.dish.price;
                    this.quantity = 1
                },
                deep: true,
                immediate: true,
            }
        },

        methods: {
            changeQuantity(operator) {
                if (operator === "plus") {
                    this.quantity++;
                } else {
                    this.quantity--;
                }
                this.total = (this.quantity * this.dish.price).toFixed(2);
            },

            isCartCurrentRestaurant() {
                return JSON.parse(window.localStorage.getItem('restaurant')) === this.dish.user_id
            },

            addToCart() {
                if (window.localStorage.getItem('restaurant')) {
                    if (!this.isCartCurrentRestaurant()) {
                        document.getElementById("cartControlModalButton").click();
                        this.$emit('changeCart', {
                            'dish': this.dish,
                            'quantity': this.quantity
                        })
                        return
                    }
                }
                window.localStorage.setItem('restaurant', this.dish.user_id)
                let cart = JSON.parse(window.localStorage.cart)
                if (cart.length === 0) {
                    cart.push(
                        {
                            id: this.dish.id,
                            qty: this.quantity
                        }
                    )
                } else {
                    let itemNotFinded = true
                    cart.forEach(item => {
                        if (item.id === this.dish.id) {
                            item.qty += this.quantity
                            itemNotFinded = false
                        }

                    })
                    if (itemNotFinded) {
                        cart.push(
                            {
                                id: this.dish.id,
                                qty: this.quantity
                            }
                        )
                    }
                }
                window.localStorage.cart = JSON.stringify(cart)
                this.cart = JSON.parse(window.localStorage.getItem('cart'));
                this.$emit('updateCart')
            }
        },

        computed: {
            returnTotal() {
                return this.total
            }
        }
    }
</script>

<style lang="scss" scoped>
    .modal-dialog {
        position: relative;

        .btn-close {
            background-color: #26D4C6;
            border-radius: 2rem;
            padding: 0.5rem;
            width: 1.5rem;
            height: 1.5rem;
            position: absolute;
            top: 1rem;
            right: 1rem;
        }
    }

    .border-radius {
        padding: .5rem 1rem;
    }

    .margin-custom {
        margin-bottom: 1rem;
    }
</style>