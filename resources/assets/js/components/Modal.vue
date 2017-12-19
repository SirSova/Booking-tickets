<template>
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">

                    <div class="modal-header">
                        <slot name="header">
                            <h3>Place {{ place.id }}</h3>
                        </slot>
                    </div>

                    <div class="modal-body">
                        <slot v-if='place.user_id == null' name="body">
                            Price : {{ place.price }}
                        </slot>
                        <slot v-else name="body">
                            This place already reserved(
                        </slot>
                    </div>

                    <div class="modal-footer">
                        <slot name="footer">
                            <button class="btn btn-danger" @click="close">
                                exit
                            </button>
                            <button v-if='place.user_id == null' class="btn btn-success" @click="booking_place">
                                reserve place
                            </button>
                        </slot>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        props: ['booking_url'],
        name: "modal",
        methods: {
            booking_place(){
                var self = this;
                axios.post(this.booking_url, {
                    place: self.place.id
                })
                this.$emit('close');
            },
            close() {
                var self = this;
                axios.post(this.booking_url, {
                    place: self.place.id,
                    close_modal : true
                })
                this.$emit('close');
            }
        },
        data(){
            return {
                place: '',
            }
        },
        mounted() {
            this.place = this.$parent.place;
        }
    }
</script>

<style scoped>

</style>