<template>
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">

                    <div class="modal-header">
                        <slot name="header">
                            <h3>Row: {{ this.row }} -> Place {{ this.index }}</h3>
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
                index : '',
                row : '',
            }
        },
        mounted() {
            this.place = this.$parent.place;
            this.index = $(`div[data-id="${this.place.id}"]`).first().text();
            this.row = $(`div[data-id="${this.place.id}"]`).first().parent().attr('data-row');
        }
    }
</script>

<style scoped>

</style>