<template>
    <div class="wrapper">
        <div class="button" @click="create">
            Create new country
        </div>
    </div>
</template>

<script>

export default {
    name: 'CreateCountrieButton',
    methods: {
        create () {
            this.$router.push({name: 'CreateNewCountry'})
        }
    }
}
</script>

<style lang="scss" scoped>

    .wrapper {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }
    .button {
        width: 250px;
        height: 50px;
        border: 0px solid black;
        border-radius: 25px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 20px;
        background-color: #28a745;
        cursor: pointer;
        transition: all 0.5s;
            &:hover {
                scale: 1.05;
            }
    }
</style>
