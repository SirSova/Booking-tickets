<template>
    <div class="row">
        <div v-for="row in rows" class="row col-sm-6 col-xs-12 col-centered">
            <div v-for="(value, key) in row"
                 v-bind:class="{ 'place' : value.user_id == undefined , 'booked' : value.user_id != undefined  }"
                 v-on:click="open_modal"
                 class="text-center" :data-id="value.id">
                {{ key + 1 }}
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        props: ['sector_id', 'sector_url', 'get_place_url'],
        methods: {
            open_modal: function(event) {
                var self = this;
                axios.post(this.get_place_url, {
                    place: event.target.getAttribute('data-id')
                }).then((response) => {
                    self.$parent.place = response.data;
                    self.$parent.$data.showModal = true;
                })
            }
        },
        data(){
            return {
                rows:[],
            }
        },
        mounted() {
            var self = this;
            axios.post(this.sector_url).then((response) => {
                _.each(response.data, function(item){
                    self.rows.push(item);
                })
            })

            Echo.join('sector')
                .listen('OpenModalPlace', (e) => {
                    $(`.place[data-id="${e.place.id}"]`).addClass('in_process').removeClass('place');
                })
                .listen('CloseModalPlace', (e) => {
                    $(`.in_process[data-id="${e.place.id}"]`).removeClass('in_process').addClass('place');
                })
                .listen('BookingPlace', (e) => {
                    $(`.in_process[data-id="${e.place.id}"]`).addClass('booked').removeClass('in_process place');
                })
        }
    }
</script>

<style scoped>

</style>