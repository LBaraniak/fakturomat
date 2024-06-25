<template>
    <div>
        <p>Aktualne kursy walut</p>
        <select v-on:change="changeItem($event)">
            <option v-for="rate in rates" :value="rate.mid">{{ rate.code }}</option>
        </select>
        <p>Kurs: {{ selectedRate }}</p>
    </div>
</template>


<script>
export default {
    data() {
        return {
            rates: [],
            selectedRate: 0
        }
    },
    mounted() {
        axios.get('api/rates').then(response =>{
            this.rates = response.data;
            this.selectedRate = this.rates[0].mid;
        })
    },
    methods: {
        changeItem: function changeItem(event) {
            this.selectedRate = event.target.value;
        }
    }
}
</script>
